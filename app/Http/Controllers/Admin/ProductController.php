<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Product::class);

        $products = Product::with('category')->get();
        // $products = DB::table('products')
        //     ->join('categories', 'categories.id', '=', 'products.category_id')
        //     ->join('brands', 'brands.id', '=', 'products.brand_id')
        //     ->select('products.*', 'brands.name as brand_name', 'categories.name as category_name')
        //     ->get();

        return view('dashboard.products.manage-product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);

        $brands = Brand::get();
        $categories = Category::get();
        return view('dashboard.products.add-product', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);

        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'regular_price' => 'required',
            'stock' => 'required',
            'availability' => 'required',
            'status' => 'required',
        ]);

        $productImage = $request->file('image');

        $rand1 = rand(1000, 9999);
        $rand2 = rand(1000, 9999);

        $fileType  = $productImage->getClientOriginalExtension();
        $imageName = $rand1 . $rand2 . '.' . $fileType;
        $directory = 'product-images/';
        $img       = Image::make($productImage)->resize(800, 800)->save($directory . $imageName);

        Product::create([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'name'  => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $directory . $imageName,
            'regular_price' => $request->regular_price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'availability' => $request->availability,
            'status' => $request->status,
            'star' => 4,
        ]);
        
        return redirect()->route('product.index')->with('message', 'Product created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $brands = Brand::get();
        $categories = Category::get();
        return view('dashboard.products.edit-product', compact('brands', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'stock' => 'required',
            'availability' => 'required',
            'status' => 'required',
        ]);

        $productImage = $request->file('image');

        if ($productImage) {
            //unlink($category->image);
            $rand1 = rand(1000, 9999);
            $rand2 = rand(1000, 9999);

            $fileType  = $productImage->getClientOriginalExtension();
            $imageName = $rand1 . $rand2 . '.' . $fileType;
            $directory = 'product-images/';
            $img       = Image::make($productImage)->resize(800, 800)->save($directory . $imageName);

            $product->update([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'image' => $directory . $imageName,
                'regular_price' => $request->regular_price,
                'discount_price' => $request->discount_price,
                'stock' => $request->stock,
                'availability' => $request->availability,
                'status' => $request->status,
                'star' => 4,
            ]);

        } else {
            $product->update([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'regular_price' => $request->regular_price,
                'discount_price' => $request->discount_price,
                'stock' => $request->stock,
                'availability' => $request->availability,
                'status' => $request->status,
                'star' => 4,
            ]);
        }

        return redirect('/product/')->with('message', 'Product updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete',$product);

        $product->delete();
        return redirect('/product/')->with('message', 'Product deleted successfully!!');
    }
}
