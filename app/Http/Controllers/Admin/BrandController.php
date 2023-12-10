<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Image;
use Illuminate\Support\Str;
use App\Services\BrandService;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $brand_service;

    public function __construct(BrandService $brand_service)
    {
        $this->brand_service = $brand_service;
    }

    public function index()
    {
        $this->authorize('viewAny', Brand::class);

        $brands = $this->brand_service->getBrands();
        return view('dashboard.brands.manage-brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Brand::class);
        return view('dashboard.brands.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        try {
            $this->brand_service->store($request);
            return redirect()->route('brand.index')->with('message', 'Brand created successfully!!');

        } catch (\Throwable $th) {
            Log::error('BRAND_STORE_LOG',['exception'=>$th->getMessage()]);
            return redirect()->route('brand.index')->with('message', 'Something went wrong!');
        }
        $this->authorize('create', Brand::class);
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
        $this->authorize('update', $brand);

        return view('dashboard.brands.edit-brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        try {
            $this->authorize('update', $brand);
            $this->brand_service->update($request,$brand);
            return redirect('/brand/')->with('message', 'Brand updated successfully!!');
        } catch (\Throwable $th) {
            Log::error('BRAND_UPDATE_LOG',['exception'=>$th->getMessage()]);
            return redirect('/brand/')->with('danger', 'Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        // $this->authorize('delete', Brand::class);
        try {
            $this->brand_service->delete($brand);
            return redirect('/brand/')->with('message','Brand deleted successfully!!');
        } catch (\Throwable $th) {
            Log::error('BRAND_DELETE_LOG',['exception'=>$th->getMessage()]);
            return redirect('/brand/')->with('danger', 'Something went wrong');
        }
    }
}
