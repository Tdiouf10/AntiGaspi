<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCategoryRequest $request)
    {

        $newImage = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImage);

        Category::create([
            'name' => $request->name,
            'image' => $newImage,
        ]);

        session()->flash('success', 'Catégorie ajoutée');

        return redirect(route('categories.index'))->with('categories', Category::all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $newImage = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImage);


        $category->name = $request->name;
        $category->image = $newImage;


        $category->save();

        session()->flash('success', 'Catégorie modifié');

        return redirect(route('categories.index'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Supprimée');

        return redirect(route('categories.index'));
    }
}
