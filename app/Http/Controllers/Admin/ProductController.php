<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Services\BrandService;
use App\Services\ProductService;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $product_service;
    protected $brand_service;

    public function __construct(ProductService $product_service, BrandService $brand_service)
    {
        $this->product_service = $product_service;
        $this->brand_service = $brand_service;
    }

    public function index()
    {
        $search['relation'] = true;
        $search['paginate'] = 10;
        $products = (new ProductService)->getProducts($search);
        return view('dashboard.products.manage-product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands'] = $this->brand_service->getBrands();
        $data['categories'] = Category::get();
        return view('dashboard.products.add-product', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $this->product_service->storeProduct($request);
            return redirect()->route('product.index')->with('message', 'Product created successfully!!');
        } catch (\Throwable $th) {
            Log::error('PRODUCT_STORE_LOG',['exception'=>$th->getMessage()]);
            return redirect()->route('product.index')->with('message', 'Something went wrong!');
        }
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
        $brands = $this->brand_service->getBrands();
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
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $this->product_service->updateProduct($request, $product);
            return redirect('/product/')->with('message', 'Product updated successfully!!');
        } catch (\Throwable $th) {
            Log::error('PRODUCT_UPDATE_LOG',['exception'=>$th->getMessage()]);
            return redirect('/product/')->with('danger', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $this->product_service->deleteProduct($product);
            return redirect('/product/')->with('message', 'Product deleted successfully!!');
        } catch (\Throwable $th) {
            Log::error('PRODUCT_DELETE_LOG',['exception'=>$th->getMessage()]);
            return redirect('/product/')->with('danger', 'Something went wrong!');
        }

    }
}
