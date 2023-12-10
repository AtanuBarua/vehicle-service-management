<?php

namespace App\Services;

use App\Product;
use Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductService {

    public function getProducts($data,$relation){
        return (new Product())->getAllProducts($data,$relation);
    }

    public function prepareData($input, $is_update = false){
        $data['category_id'] = $input['category_id'];
        $data['brand_id'] = $input['brand_id'];
        $data['name'] = $input['name'];
        $data['description'] = $input['description'];
        $data['slug'] = Str::slug($input['name']);
        $data['image'] = $input['image_name'];
        $data['regular_price'] = $input['regular_price'];
        $data['discount_price'] = $input['discount_price'];
        $data['stock'] = $input['stock'];
        $data['availability'] = $input['availability'];
        $data['status'] = $input['status'];
        $data['star'] = 4;
        if ($is_update && empty($input['image_name'])) {
            unset($data['image']);
        }
        return $data;
    }

    public function storeProduct($request){
        $productImage = $request['image'];
        $imageName = $this->storeImage($productImage, Product::IMAGE_PATH,[174, 106]);
        $request->merge(['image_name'=>$imageName]);
        $data = $this->prepareData($request);
        return (new Product())->create($data);
    }

    private function storeImage($image, $path, $resize=[100,100]){
        try {
            $rand1 = rand(100000, 999999);
            $rand2 = rand(100000, 999999);

            $fileType  = $image->getClientOriginalExtension();
            $imageName = $rand1 . $rand2 . '.' . $fileType;
            Image::make($image)->resize($resize[0], $resize[1])->save($path . $imageName);

            return $path.$imageName;
        } catch (\Throwable $th) {
            Log::error('PRODUCT_IMAGE_UPLOAD_LOG',['exception'=>$th->getMessage()]);
        }

    }

    public function updateProduct($request, $product){
        $productImage = $request['image'];
        if ($productImage) {
            $imageName = $this->storeImage($productImage, Product::IMAGE_PATH,[174, 106]);
            $request->merge(['image_name'=>$imageName]);
        }
        $data = $this->prepareData($request, true);
        return $product->update($data);
    }

    public function deleteProduct($product){
        try {
            return $product->delete();
        } catch (\Throwable $th) {
            Log::error('PRODUCT_DELETE_LOG',['exception'=>$th->getMessage()]);
        }
    }

}
