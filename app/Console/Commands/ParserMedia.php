<?php

namespace App\Console\Commands;

use App\Helpers\Media as MediaLibrary;
use App\Models\Media;
use App\Models\Media\Type;
use App\Services\Parsers\Media\Parser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ParserMedia extends Command
{
    protected $signature = 'parser:media
                            {--T|truncate : Clear table before parsing}
                            {--module=* : Module name (news|video|articles)}
                            {--count= : Max materials count}
                            {--pages= : Max pages count}';

    protected $description = 'Parse media materials from buybrand.ru';

    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $types;

    /** @var \App\Services\Parsers\Media\Parser */
    private $parser;

    private function boot(): void
    {
        $this->types = Type::get();
        $this->parser = new Parser();
    }

    public function handle(): void
    {
        $this->boot();

        $materials = [];

        if ($this->option('module')) {
            foreach ($this->option('module') as $module) {
                $method = $this->parser->getMethod($module);

                $materials[$module] = $this->parser->$method(
                    $this->option('count') ?: null,
                    $this->option('pages') ?: null
                );
            }
        }

        if ($this->option('truncate')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table(Media::class)->model()->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        foreach ($materials as $type => $items) {
            foreach ($items as $item) {
                try {
                    $this->save($type, $item);
                } catch (\Exception $e) {
                    continue;
                }
            }
        }
    }

    /**
     * Save media material
     * 
     * @param  string $type
     * @param  object $data
     * @return void
     */
    private function save(string $type, $data): void
    {
        if (empty($data->created_at)) {
            return;
        }

        if (!is_object($data)) {
            dd($data);
        }

        /**
         * @var \App\Models\Media $media
         */
        $media = Media::create([
            'type_id'    => $this->types->firstWhere('name', $type)->id,
            'title'      => $data->title,
            'subtitle'   => $data->subtitle,
            'content'    => $data->content ?? null,
            'is_active'  => true,
            'created_at' => $data->created_at,
        ]);

        $tags = collect($data->tags)->map(fn(string $item) => Media::listTags()->where('name', $item)->firstOrCreate([
            'name'  => $item,
            'slug'  => (string) str($item)->slug(),
            'model' => Media::class,
        ]));

        $media->tags()->sync(
            $tags->pluck('id')->toArray()
        );

        if ($data->image) {
            $image = is_null(parse_url($data->image, PHP_URL_HOST))
                ? $this->parser->getBaseUri() . $data->image
                : $data->image;

            MediaLibrary::toCollection($media, $image, 'media');
        }
    }
}
