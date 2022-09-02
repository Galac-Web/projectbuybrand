<?php

namespace App\Http\Controllers\API\v1\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Franchise\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public function deleteRequirementById(Request $request)
    {
        $validation = $request->validate([
            'id' => 'required|exists:franchises_requirements,id',
        ]);

        $requirement = Requirement::findOrFail($request->id);

        $requirement->delete();
    }
}
