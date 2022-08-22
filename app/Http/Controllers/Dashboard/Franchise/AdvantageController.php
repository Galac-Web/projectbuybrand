<?php

namespace App\Http\Controllers\Dashboard\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Franchise\Advantage;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    use Dashboard;

    public function index()
    {
        return view('dashboard.franchises.advantages.index', [
            'advantages' => Advantage::get(),
        ]);
    }

    public function form(?Advantage $advantage = null)
    {
        return $this->dashboard->form('dashboard.franchises.advantages', [
            'advantage' => $advantage,
        ]);
    }

    public function save(Request $request)
    {
        /** @var \App\Models\Franchise\Advantage $advantage */
        $advantage = Advantage::updateOrCreate(
            ['id' => $request->type_id],
            $request->all()
        );

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(Advantage $advantage)
    {
        $this->authorize('franchise.delete');

        $advantage->delete();

        return redirect()->back();
    }
}
