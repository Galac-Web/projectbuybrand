<?php

namespace App\Http\Controllers\Dashboard\Franchise;

use App\Http\Controllers\Controller;
use App\Http\Requests\FranchiseCategorySaveRequest;
use App\Models\Franchise\Category;
use App\Traits\Controllers\Dashboard;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Dashboard;

    public function index(Request $request)
    {
        $categories = Category::query();

        if ($request->has('parent_id')) {
            $categories = $categories->where('id', $request->parent_id)->with('childrens')->first();
        } else {
            $categories = $categories->whereNull('parent_id')->get();
        }

        return view('dashboard.franchises.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function form(?Category $category = null)
    {
        return $this->dashboard->form('dashboard.franchises.categories', [
            'categories' => Category::whereNull('parent_id')->get(),
            'category' => $category,
        ]);
    }

    public function save(FranchiseCategorySaveRequest $request)
    {
        /** @var \App\Models\Franchise\Category $category */
        $category = Category::updateOrCreate(
            ['id' => $request->category_id],
            $request->all()
        );

        return redirect()->back()->with('success', 'text');
    }

    public function destroy(Category $category)
    {
        $this->authorize('franchise.delete');

        $category->delete();

        return redirect()->back();
    }
}
