<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.manage-brand', [
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.add-brand');
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
            'status' => 'required'
        ]);

        $brandImage = $request->file('image');

        $rand1 = rand(1000, 9999);
        $rand2 = rand(1000, 9999);

        $fileType  = $brandImage->getClientOriginalExtension();
        $imageName = $rand1 . $rand2 . '.' . $fileType;
        $directory = 'brand-images/';
        $img       = Image::make($brandImage)->resize(174, 106)->save($directory . $imageName);

        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $directory . $imageName,
            'status' => $request->status,
        ]);

        // $brand = new Brand();
        // $brand->name = $request->name;
        // $brand->slug = Str::slug($request->name);
        // $brand->image = $directory . $imageName;
        // $brand->status = $request->status;
 
        return redirect()->route('brand.index')->with('message', 'Brand created successfully!!');
        // return back()->with('message', 'Brand created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit-brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $brandImage = $request->file('image');

        //return $categoryImage;

        if ($brandImage) {

            //unlink($category->image);
            $rand1 = rand(1000, 9999);
            $rand2 = rand(1000, 9999);

            $fileType  = $brandImage->getClientOriginalExtension();
            $imageName = $rand1 . $rand2 . '.' . $fileType;
            $directory = 'brand-images/';
            $img       = Image::make($brandImage)->resize(600, 600)->save($directory . $imageName);

            $brand->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'status' => $request->status,
                'image' => $directory . $imageName,
            ]);
        } else {
            $brand->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'status' => $request->status,
            ]);
        }

        return redirect('/brand/')->with('message', 'Brand updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/brand/')->with('message','Brand deleted successfully!!');
    }
}
