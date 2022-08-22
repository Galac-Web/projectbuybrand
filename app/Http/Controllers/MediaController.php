<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Preset;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $materials = $this->getMaterials();

        return view('media.index', [
            'media' => $materials->media,
            'lifehacks' => $materials->lifehacks,
        ]);
    }

    public function show(Media $media)
    {
        return view('media.show', [
            'material' => $media,
        ]);
    }

    public function filter(Request $request, string $filter)
    {
        $filter = $this->getFilter($filter);

        if (!Media::presetExists($filter['preset'])) {
            abort(404);
        }

        $model = Media::query();
        $materials = $this->getMaterials();

        if ($filter['type'] === 'lifehacks') {
            $lifehacks = (object) [
                'materials' => $model->lifehacks()->with('type', 'tags')->withMedia()->preset($filter['preset'])->get(),
                'presets' => Media::lifehacks()->getPresets(),
            ];
        } else {
            $media = (object) [
                'materials' => $model->lifehacks(false)->with('type', 'tags')->withMedia()->preset($filter['preset'])->get(),
                'presets' => Media::lifehacks(false)->getPresets(),
            ];
        }

        $request->request->add($filter);

        return view('media.index', [
            'media' => isset($media) ? $media : $materials->media,
            'lifehacks' => isset($lifehacks) ? $lifehacks : $materials->lifehacks,
        ]);
    }

    private function getMaterials(): object
    {
        $media = (object) [
            'materials' => Media::lifehacks(false)->with('type', 'tags')->withMedia()->get(),
            'presets' => Media::lifehacks(false)->getPresets(),
        ];

        $lifehacks = (object) [
            'materials' => Media::lifehacks()->with('type', 'tags')->withMedia()->get(),
            'presets' => Media::lifehacks()->getPresets(),
        ];

        return (object) [
            'media'     => $media,
            'lifehacks' => $lifehacks,
        ];
    }

    private function getFilter(string $filter): array
    {
        $filter = explode('/', $filter);

        switch (count($filter)) {
            case 1:
                $preset = $filter[0];
                break;
            case 2:
                $type = $filter[0];
                $preset = $filter[1];
                break;
        }

        return [
            'preset' => $preset,
            'type' => $type ?? null,
        ];
    }
}
