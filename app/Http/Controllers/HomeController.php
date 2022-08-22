<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use App\Models\Media;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $media = (object) [
            'materials' => Media::whereType('news')->with('type', 'tags')->withMedia()->latest()->paginate(10),
            'lifehacks' => Media::lifehacks()->with('type', 'tags')->withMedia()->latest('id')->get(),
        ];

        $franchises = (object) [
            'items' => Franchise::with('terms')->withMedia()->latest('id')->limit(8)->get(),
            'presets' => Franchise::presets()->whereHas('franchises')->get(),
        ];

        return view('index', [
            'franchises' => $franchises,
            'media' => $media,
        ]);
    }
}
