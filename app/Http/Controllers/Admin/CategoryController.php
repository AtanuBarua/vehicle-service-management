<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.manage-category', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);

        $categoryImage = $request->file('image');

        $rand1 = rand(1000, 9999);
        $rand2 = rand(1000, 9999);

        $fileType  = $categoryImage->getClientOriginalExtension();
        $imageName = $rand1 . $rand2 . '.' . $fileType;
        $directory = 'category-images/';
        $img       = Image::make($categoryImage)->resize(600, 600)->save($directory . $imageName);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $directory . $imageName,
            'status' => $request->status,
        ]);

        return back()->with('message', 'Category created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $categoryImage = $request->file('category_image');

        //return $categoryImage;

        if ($categoryImage) {
            //unlink($category->image);
            $rand1 = rand(1000, 9999);
            $rand2 = rand(1000, 9999);

            $fileType  = $categoryImage->getClientOriginalExtension();
            $imageName = $rand1 . $rand2 . '.' . $fileType;
            $directory = 'category-images/';
            $img       = Image::make($categoryImage)->resize(600, 600)->save($directory . $imageName);

            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $directory . $imageName,
                'status' => $request->status,
            ]);

        } else {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'status' => $request->status,
            ]);
        }

        return redirect('/category/')->with('message', 'Category updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category/')->with('message', 'Category deleted successfully!!');
    }
}
