<?php

namespace App\Http\Controllers;

use App\Filters\Collections\Main\FranchiseCatalogFilter;
use App\Models\Franchise;
use App\Models\Franchise\Category;
use App\Models\Preset;
use Illuminate\Http\Request;

class FranchiseCatalogController extends Controller
{
    public function index(Request $request, FranchiseCatalogFilter $filter)
    {
        return view('franchise-catalog.index', [
            'filter' => (object) [
                'paybacks' => $filter->getPaybacks(),
                'investments' => $filter->getInvestments(),
            ],
            'presets' => Franchise::presets()->whereHas('franchises')->get(),
            'categories' => Category::get(),
            'franchises' => Franchise::filter($filter)->with('terms')->withMedia()->paginate(10)->withQueryString(),
        ]);
    }

    public function preset(Preset $preset)
    {
        return view('franchise-catalog.index', [
            'presets' => Franchise::presets()->whereHas('franchises')->get(),
            'franchises' => Franchise::preset($preset->slug, 'preset_pivot')->with('terms')->withMedia()->get(),
        ]);
    }
}
