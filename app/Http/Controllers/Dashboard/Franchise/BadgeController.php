<?php

namespace App\Http\Controllers\Dashboard\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Franchise\Badge;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BadgeController extends Controller
{
    use Dashboard;

    public function index()
    {
        return view('dashboard.franchises.badges.index', [
            'badges' => Badge::get(),
        ]);
    }

    public function form(?Badge $badge = null)
    {
        return $this->dashboard->form('dashboard.franchises.badges', [
            'badge' => $badge,
        ]);
    }

    public function save(Request $request)
    {
        if ($request->has('icon.file')) {
            $file = Storage::disk('public')->put('/franchises/badges', $request->file('icon.file'));
            $file = Storage::disk('public')->url($file);
        }

        /** @var \App\Models\Franchise\Badge $badge */
        $badge = Badge::updateOrCreate(
            ['id' => $request->badge_id],
            [
                'name' => $request->name,
                'icon' => isset($file) ? $file : $request->input('icon.link'),
            ]
        );

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(Badge $badge)
    {
        $this->authorize('franchise.delete');

        $badge->delete();

        return redirect()->back();
    }
}
