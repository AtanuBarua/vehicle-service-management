<?php

namespace App\Services;

use App\Product;
use Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductService {

    public function getProducts($search){
        return (new Product())->getAllProducts($search);
    }

    public function prepareData($input, $is_update = false){
        $data['category_id'] = $input['category_id'];
        $data['brand_id'] = $input['brand_id'];
        $data['name'] = $input['name'];
        $data['description'] = $input['description'];
        $data['slug'] = Str::slug($input['name']);
        $data['image'] = $input['image_name'] ?? Product::NO_IMAGE_PATH;
        $data['regular_price'] = $input['regular_price'];
        $data['discount_price'] = $input['discount_price'];
        $data['stock'] = $input['stock'];
        $data['availability'] = $input['availability'];
        $data['status'] = $input['status'];
        $data['star'] = 4;
        if ($is_update && empty($input['image_name'])) {
            unset($data['image']);
            unset($data['slug']);
        }
        return $data;
    }

    public function storeProduct($request){
        $productImage = $request['image'];
        if ($productImage) {
            $imageName = $this->storeImage($productImage, Product::IMAGE_PATH);
            $request->merge(['image_name'=>$imageName]);
        }

        $data = $this->prepareData($request);
        return (new Product())->createProduct($data);
    }

    private function storeImage($image, $path){
        try {
            $imageName = $image->hashName() . '.' . $image->extension();
            $image->move($path,$imageName);

            return $path.$imageName;
        } catch (\Throwable $th) {
            Log::error('PRODUCT_IMAGE_UPLOAD_LOG',['exception'=>$th->getMessage()]);
        }

    }

    public function updateProduct($request, $product){
        $productImage = $request['image'];
        if ($productImage) {
            $imageName = $this->storeImage($productImage, Product::IMAGE_PATH);
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
