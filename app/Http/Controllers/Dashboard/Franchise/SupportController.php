<?php

namespace App\Http\Controllers\Dashboard\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Franchise\Support;
use App\Models\Franchise\Support\Group;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    use Dashboard;

    public function index(Request $request)
    {
        $request->validate([
            'group_id' => 'exists:' . get_relation_table(Support::class, 'group') . ',id',
        ]);

        $supports = Support::query();

        $request->whenHas('group_id', fn ($id) => $supports->where('group_id', $id));

        return view('dashboard.franchises.supports.index', [
            'supports' => $supports->with('group')->get(),
        ]);
    }

    public function form(?Support $support = null)
    {
        return $this->dashboard->form('dashboard.franchises.supports', [
            'groups' => Group::get(),
            'support' => $support,
        ]);
    }

    public function save(Request $request)
    {
        /** @var \App\Models\Franchise\Support $support */
        $support = Support::updateOrCreate(
            ['id' => $request->support_id],
            $request->all()
        );

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(Support $support)
    {
        $this->authorize('franchise.delete');

        $support->delete();

        return redirect()->back();
    }
}
