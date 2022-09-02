<?php

namespace App\Actions;

use App\Helpers\Media;
use App\Helpers\Pivot;
use App\Http\Requests\FranchiseSaveRequest;
use App\Models\Franchise;
use App\Models\Franchise\Advantage;
use App\Services\Video\Service;

class FranchiseSaveAction
{
    /** @var \App\Helpers\Pivot */
    protected $pivot;

    /** @var \App\Services\Video\Service */
    protected $video;

    /** @var \App\Helpers\Media */
    protected $medialibrary;

    public function __construct()
    {
        $this->pivot        = app(Pivot::class);
        $this->video        = app(Service::class);
        $this->medialibrary = app(Media::class);
    }

    public function save(Franchise $franchise, FranchiseSaveRequest $request)
    {
        // $request->dd();
        // dd(
        //     $request->points
        // );

        $relationships = ['terms', 'information'];

        foreach ($relationships as $relationship) {
            $request->whenHas($relationship, fn($value) => $franchise->$relationship()->updateOrCreate(
                ['franchise_id' => $franchise->id],
                $value
            ));
        }

        if ($request->has('formats')) {
            foreach ($request->formats as $data) {
                $format = $franchise->formats()->updateOrCreate(
                    [
                        'id' => $data['format_id'] ?? null,
                    ],
                    [
                        'name'           => $data['name'],
                        'created_by'     => $data['created_by'] ?? auth()->id(),
                        'description'    => $data['description'],
                        'investments'    => $data['investments'],
                        'payback_period' => $data['payback_period'],
                        'floor_space'    => $data['floor_space'],
                        'staff'          => $data['staff'],
                        'is_active'      => checkbox($data['is_active'] ?? null),
                    ],
                );

                if (isset($data['preview'])) {
                    $this->medialibrary->toCollection($format, $data['preview'], 'preview');
                }
            }
        }

        $franchise->points()->delete();

        if ($request->has('points')) {
            foreach ($request->points as $point) {
                $franchise->points()->updateOrCreate(
                    [
                        'city' => $point['city'] ?? null,
                        'country_id' => $point['country_id'] ?? 1,
                    ],
                    $point
                );
            }
        }

        $franchise->faq()->delete();

        if ($request->has('faq')) {
            foreach ($request->faq as $faq) {
                $franchise->faq()->updateOrCreate(
                    ['question' => $faq['question']],
                    [
                        'answer' => $faq['answer'],
                        'is_active' => checkbox($faq['is_active'] ?? null),
                    ]
                );
            }
        }

        $franchise->dynamics()->delete();
        if ($request->has('dynamics')) {
            foreach ($request->dynamics as $dynamic) {
                if (!empty($dynamic['year']) && !empty($dynamic['count'])) {
                    $franchise->dynamics()->create($dynamic);
                }
            }
        }

        if ($request->has('requirements')) {
            foreach ($request->requirements as $requirement) {
                $requirementItem = $franchise->requirements()->updateOrCreate(
                    ['name' => $requirement['name']],
                    [
                        'items' => $requirement['items'] ?? null,
                        'button_caption' => $requirement['button_caption'],
                    ]
                );

                if (isset($requirement['file'])) {
                    $this->medialibrary->toCollection($requirementItem, $requirement['file'], 'requirement_file');
                }
            }
        }

        $franchise->advantages()->detach();

        if ($request->has('advantages')) {
            foreach ($request->advantages as $id => $value) {
                $advantage = Advantage::firstOrCreate(['name' => $value['name']]);

                $franchise->advantages()->attach($advantage->id, [
                    'type'    => $value['type'],
                    'label'   => $value['label'],
                    'is_main' => checkbox($value['is_main'] ?? null),
                ]);
            }
        }

        foreach (['logo', 'cover', 'presentation'] as $media) {
            $request->whenHas($media, fn($file) => $this->medialibrary->toCollection($franchise, $file, $media));
        }

        if ($request->has('video')) {
            $this->video->save($franchise, $request->video);
        }

        $this->pivot->sync($request, $franchise, ['categories', 'supports', 'badges', 'presets' => 'presetPivot']);
    }
}
