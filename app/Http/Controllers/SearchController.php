<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchRequest;

class SearchController extends Controller
{
    public function __invoke(SearchRequest $request)
    {
        dd(
            $request->all()
        );
    }
}
