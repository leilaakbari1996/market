<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category as RequestsCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        return view('Admin.category.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('Admin.category.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(RequestsCategory $request)
    {

        Category::query()->create([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id')
        ]);
        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     *
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     *
     */
    public function edit(Category $category)
    {
        return view('Admin.category.edit',[
            'category' => $category,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @
     */
    public function update(RequestsCategory $request, Category $category)
    {
        $category->update([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id')
        ]);
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     *
     */
    public function destroy(Category $category)
    {
        if($category->childrens()->count() == 0){
            $category->delete();
            return redirect(route('admin.category.index'));
        }
        return redirect()->back()->withErrors([
            'category'=>'این دسته بندی نمیتواند حذف شود چون والد دسته بندی های دیگر است.'
        ]);
    }
}
