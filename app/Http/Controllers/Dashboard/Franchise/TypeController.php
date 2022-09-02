<?php

namespace App\Http\Controllers\Dashboard\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Franchise\Type;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    use Dashboard;

    public function index()
    {
        return view('dashboard.franchises.types.index', [
            'types' => Type::get(),
        ]);
    }

    public function form(?Type $type = null)
    {
        return $this->dashboard->form('dashboard.franchises.types', [
            'type' => $type,
        ]);
    }

    public function save(Request $request)
    {
        /** @var \App\Models\Franchise\Type $type */
        $type = Type::updateOrCreate(
            ['id' => $request->type_id],
            $request->all()
        );

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(Type $type)
    {
        $this->authorize('franchise.delete');

        $type->delete();

        return redirect()->back();
    }
}
