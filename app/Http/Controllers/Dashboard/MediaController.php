<?php

namespace App\Http\Controllers\Dashboard;

use App\Filters\Collections\Dashboard\MediaFilter;
use App\Helpers\Media as MediaLibrary;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediaSaveRequest;
use App\Models\Franchise;
use App\Models\Media;
use App\Models\Media\Type;
use App\Models\Person;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use Dashboard;

    public function index(Request $request, MediaFilter $filter)
    {
        $types = Type::get();
        $materials = Media::filter($filter)->with('type')->withMedia()->latest()->paginate(50)->withQueryString();

        return view('dashboard.media.index', [
            'types' => $types,
            'materials' => $materials,
        ]);
    }

    public function form(?Media $media = null)
    {
        return $this->dashboard->form('dashboard.media', [
            'tags' => Media::listTags()->get(),
            'types' => Type::get(),
            'persons' => Person::get(),
            'franchises' => Franchise::get(),
            'material' => $media,
            'materials' => Media::select('id', 'title')->latest()->get(),
            'video_drivers' => $this->video->getDrivers(),
        ]);
    }

    public function save(MediaSaveRequest $request)
    {
        /** @var \App\Models\Media $material */
        $material = Media::updateOrCreate(
            ['id' => $request->material_id],
            $request->all()
        );

        $this->pivot->sync($request, $material, ['tags', 'persons', 'related', 'franchises']);

        if ($request->has('video')) {
            $this->video->save($material, $request->video);
        }

        if ($request->has('preview')) {
            $this->medialibrary->toCollection($material, $request->preview, 'media');
        }

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(Media $media)
    {
        $this->authorize('media.delete');

        $media->delete();

        return redirect()->back();
    }
}
