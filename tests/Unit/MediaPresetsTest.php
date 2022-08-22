<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\Media;
use App\Models\Preset;
use App\Models\Franchise;
use App\Models\Media\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MediaPresetsTest extends TestCase
{
    use RefreshDatabase;

    /** @var \Illuminate\Database\Eloquent\Collection */
    protected $types;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\MediaTypesTableSeeder::class);

        $this->types = Type::get();
    }

    public function test_media_presets_materials()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $media */
        $media = Media::factory()->count(20)->sequence(
            ['type_id' => $this->types->where('name', 'news')->first()->id],
            ['type_id' => $this->types->where('name', 'lifehack')->first()->id],
        )->create();

        $modules = [
            'media' => 3,
            'franchise' => 5,
        ];
        $presets = [];

        foreach ($modules as $module => $count) {
            // Создаем пресеты с тегами
            for ($i = 0; $i < $count; $i++) {
                $presets[$module][] = Preset::factory()->state(['module' => $module])->has(
                    Tag::factory()->state(['model' => Media::class])->count($i*2)
                )->create();
            }
        }

        // Разделяем материалы, проходим по ним и добавляем теги пресета по индексу
        // Так как у нас 10 материалов с типом news, то получится массив по 4/4/2 материала
        $media->where('type.name', 'news')->chunk(4)->each(function (Collection $item, $index) use ($presets) {
            $item->each(fn (Media $item) => $item->tags()->sync($presets['media'][$index]->tags->pluck('id')));
        });

        // Первый пресет должен быть без материалов
        $this->assertNull(Media::preset($presets['media'][0]->slug)->first());
        // Должны получить модель медиа по пресету
        $this->assertInstanceOf(Media::class, Media::preset($presets['media'][1]->slug)->first());

        // Проверяем корректность количества пресетов у модулей
        foreach (array_keys($modules) as $module) {
            $model = (string) Str::of($module)->ucfirst()->start('\\App\\Models\\');

            if (class_exists($model)) {
                $count = $model::presets()->count();

                $this->assertCount($count, $presets[$module]);
                $this->assertEquals($count, $modules[$module]);
            }
        }

        // Проверяем scope для модели с пресетами
        $this->assertEquals(
            Media::whereHas('tags.preset', fn (Builder $query) => $query->where('name', $presets['media'][1]->name))->first(),
            Media::preset($presets['media'][1]->slug)->first()
        );

        // Проверяем получение модели пресета через тег
        $this->assertInstanceOf(Preset::class, Tag::with('preset')->first()->preset);
    }
}
