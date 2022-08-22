<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\FranchiseSaveAction;
use App\Enums\RoyaltyType;
use App\Filters\Collections\Dashboard\FranchiseFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\FranchiseSaveRequest;
use App\Models\Franchise;
use App\Models\Franchise\Advantage;
use App\Models\Franchise\Badge;
use App\Models\Franchise\Category;
use App\Models\Franchise\Support;
use App\Models\Franchise\Terms;
use App\Models\Franchise\Type;
use App\Models\User;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    use Dashboard;

    public function index(Request $request, FranchiseFilter $filter)
    {
        return view('dashboard.franchises.index', [
            'statuses' => Franchise::getStatusList(),
            'franchises' => Franchise::filter($filter)->latest()->paginate(50)->withQueryString(),
        ]);
    }

    public function form(?Franchise $franchise = null)
    {
        return $this->dashboard->form('dashboard.franchises', [
            'advantages' => Advantage::get(),
            'types' => Type::get(),
            'royalty_types' => Terms::getRoyaltyTypes(),
            'categories' => Category::get(),
            'badges' => Badge::get(),
            'presets' => Franchise::presets()->get(),
            'users' => User::get(),
            'supports' => Support::with('group')->get()->groupBy('group.name'),
            'franchise' => $franchise,
            'video_drivers' => $this->video->getDrivers(),
        ]);
    }

    public function save(FranchiseSaveRequest $request, FranchiseSaveAction $action)
    {
        /** @var \App\Models\Franchise $franchise */
        $franchise = Franchise::updateOrCreate(
            ['id' => $request->franchise_id],
            $request->all()
        );

        $action->save($franchise, $request);

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(Franchise $franchise)
    {
        $this->authorize('franchise.delete');

        $franchise->delete();

        return redirect()->back();
    }
}
