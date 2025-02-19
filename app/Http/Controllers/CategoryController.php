<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save_category(Request $request)
    {
        $request->validate([
            'title'=>['required']
        ],
        ['title.required'=>['Поле обязательно для заполнения']]);
        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect()->route('show_categories')->with('success','Новая категория создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Category $category)
    {   
        $request->validate([
            'title'=>['required']
        ],
        ['title.required'=>['Поле обязательно для заполнения']]);
        $category->title = $request->title;
        $category->update();
        return redirect()->route('show_categories')->with('success','Категория успешно изменена');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('show_categories')->with('success','Категория успешно удалена');
    }
}
