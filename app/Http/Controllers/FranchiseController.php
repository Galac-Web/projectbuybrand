<?php

namespace App\Http\Controllers;

use App\Models\Country\Group;
use App\Models\Franchise;
use App\Models\Franchise\Support;
use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    public function add()
    {
        dd('test');
    }

    public function show(Franchise $franchise)
    {
        return view('franchise-catalog.show', [
            'franchise' => $franchise->load([
                'faq' => fn (HasMany $relation) => $relation->active(),
                'materials' => fn (BelongsToMany $relation) => $relation->with('type'),
                'requirements' => fn (HasMany $relation) => $relation->hasNotEmpty(),
                'points' => fn (HasMany $relation) => $relation->with('country.group'),
            ]),
            'supports' => Support::with('group')->get()->groupBy('group.name'),
            'countries' => (object) [
                'groups' => Group::get(),
            ],
            'dynamics' => app(\App\Helpers\Models\Dynamics::class),
        ]);
    }
}
