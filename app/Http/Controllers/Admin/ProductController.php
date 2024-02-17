<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Services\BrandService;
use App\Services\ProductService;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data['search'] = $this->handleSearchData($request);
        $data['categories'] = Category::get();
        $data['products'] = (new ProductService)->getProducts($data['search']);
        return view('dashboard.products.manage-product', $data);
    }

    private function handleSearchData($request){
        $search['relation'] = true;
        $search['paginate'] = 10;
        $search['name'] = $request->name;
        $search['status'] = $request->status;
        $search['category_id'] = $request->category_id;
        $search['min_price'] = $request->min_price;
        $search['max_price'] = $request->max_price;
        return $search;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands'] = (new BrandService())->getBrands();
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
            (new ProductService())->storeProduct($request);
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
        $brands = (new BrandService())->getBrands();
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
            (new ProductService())->updateProduct($request, $product);
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
            (new ProductService())->deleteProduct($product);
            return redirect('/product/')->with('message', 'Product deleted successfully!!');
        } catch (\Throwable $th) {
            Log::error('PRODUCT_DELETE_LOG',['exception'=>$th->getMessage()]);
            return redirect('/product/')->with('danger', 'Something went wrong!');
        }

    }

    public function exportReport(Request $request) {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
