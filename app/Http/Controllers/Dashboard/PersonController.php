<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controllers\Dashboard;
use App\Filters\Collections\Dashboard\PersonFilter;

class PersonController extends Controller
{
    use Dashboard;

    public function index(Request $request, PersonFilter $filter)
    {
        return view('dashboard.persons.index', [
            'persons' => Person::filter($filter)->paginate(50),
        ]);
    }

    public function form(?Person $person = null)
    {
        return $this->dashboard->form('dashboard.persons', [
            'person' => $person,
        ]);
    }

    public function save(Request $request)
    {
        /** @var \App\Models\Preset $preset */
        $person = Person::updateOrCreate(
            ['id' => $request->person_id],
            $request->all()
        );

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(int $id)
    {
        $this->authorize('media.delete');

        Person::findOrFail($id)->delete();

        return redirect()->back();
    }
}
