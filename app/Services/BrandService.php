<?php

namespace App\Services;

use App\Brand;
use Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BrandService{

    public function getBrands(){
        return (new Brand())->getAllBrands();
    }

    public function store($request){
        $brandImage = $request['image'];
        $imageName = $this->storeImage($brandImage, Brand::IMAGE_PATH, [174, 106]);

        $request['image_name'] = $imageName;
        $data = $this->prepareData($request);
        return Brand::create($data);
    }

    public function update($request, $brand){
        $brandImage = $request['image'];
        if ($brandImage) {
            unlink($brand->image);
            $imageName = $this->storeImage($brandImage,Brand::IMAGE_PATH,[174,106]);
            $request->merge(['image_name'=>$imageName]);
        }
        $data = $this->prepareData($request, true);
        return $brand->update($data);
    }

    public function storeImage($image, $path, $resize=[100,100]){
        try {
            $rand1 = rand(100000, 999999);
            $rand2 = rand(100000, 999999);

            $fileType  = $image->getClientOriginalExtension();
            $imageName = $rand1 . $rand2 . '.' . $fileType;
            Image::make($image)->resize($resize[0], $resize[1])->save($path . $imageName);

            return $path.$imageName;

        } catch (\Throwable $th) {
            Log::error('BRAND_IMAGE_UPLOAD_LOG',['exception'=>$th->getMessage()]);
        }

    }

    public function delete($brand){
        return $brand->delete();
    }

    private function prepareData($input,$is_update = false){
        $data['name'] = $input['name'];
        $data['status'] = $input['status'];
        $data['image'] = $input['image_name'];
        $data['slug'] = Str::slug($input['name']);
        if ($is_update && empty($input['image_name'])) {
            unset($data['image']);
        }
        return $data;
    }
}
