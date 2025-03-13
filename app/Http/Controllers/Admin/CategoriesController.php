<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    private $category;

    public function index()
    {
        $all_categories = $this->category->paginate(5);

        return view('admin.categories.index')
        ->with('all_categories', $all_categories);
    }

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50'
        ]);

        $this->category->category_name = $request->name;
        $this->category->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $this->category->destroy($id);

        return redirect()->back();
    }

    public function update(Request $request)
    {

        $request->validate([
            'name'          => 'required|min:1|max:50',
        ]);

        $user = $this->category->findOrFail($request->id);
        $user->category_name         = $request->name;

        $user->save();

        return redirect()->back();
    }
}
