<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','slug','image','status'];

    const ACTIVE = 1;
    const INACTIVE = 0;
    const IMAGE_PATH = 'brand-images/';

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getAllActiveBrands(){
        return $this->query()->where('status', self::ACTIVE)->get();
    }

    public function getAllBrands(){
        return $this->query()->get();
    }

    public function findBrandBySlug($slug){
        if (!empty($name)) {
            return $this->query()->where('slug',$slug)->first();
        }
    }

    public function findBrandByName($name){
        if (!empty($name)) {
            return $this->query()->where('name','LIKE', '%' . $name . '%')->first();
        }
    }
}
