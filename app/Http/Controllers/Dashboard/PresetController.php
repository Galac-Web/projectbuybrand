<?php

namespace App\Http\Controllers\Dashboard;

use App\Filters\Collections\Dashboard\PresetFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PresetSaveRequest;
use App\Models\Preset;
use App\Models\Tag;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;

class PresetController extends Controller
{
    use Dashboard;

    public function index(Request $request, PresetFilter $filter)
    {
        return view('dashboard.presets.index', [
            'presets' => Preset::filter($filter)->paginate(50),
            'modules' => Preset::getModules(),
        ]);
    }

    public function form(?Preset $preset = null)
    {
        return $this->dashboard->form('dashboard.presets', [
            'preset' => $preset,
            'tags' => Tag::get(),
            'modules' => Preset::getModules(),
        ]);
    }

    public function save(PresetSaveRequest $request)
    {
        /** @var \App\Models\Preset $preset */
        $preset = Preset::updateOrCreate(
            ['id' => $request->preset_id],
            $request->all()
        );

        $this->pivot->sync($request, $preset, 'tags');

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(int $id)
    {
        $this->authorize('media.delete');

        Preset::findOrFail($id)->delete();

        return redirect()->back();
    }
}
