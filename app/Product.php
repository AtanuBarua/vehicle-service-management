<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['brand_id','category_id','name','slug','description','image','regular_price','discount_price','stock','sold','availability','status','star'];

    const ACTIVE = 1;
    const INACTIVE = 0;
    const IMAGE_PATH = 'product-images/';
    const NO_IMAGE_PATH = self::IMAGE_PATH . 'no_image.jpg';

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getAllProducts($search = []){
        $query = $this->query();

        if(isset($search['relation']) && $search['relation']){
            $query->with('category');
        }
        if (isset($search['category_id'])) {
            $query->where('category_id',$search['category_id']);
        }
        if (isset($search['brand_id'])) {
            $query->where('brand_id',$search['brand_id']);
        }
        if (isset($search['status'])) {
            $query->where('status',$search['status']);
        }
        if (!empty($search['take'])) {
            $query->take($search['take']);
        }

        if (!empty($search['order_by'])) {
            $query->latest($search['order_by'] ?? 'updated_at');
        }
        if (!empty($search['paginate'])) {
            $result = $query->paginate($search['paginate']);
        } else {
            $result = $query->get();
        }

        return $result;
    }

    public function getProductsByCategoryId($id){
        if (empty($search['take'])) {
            $query = $this->query()->where('category_id',$id)->get();
        }
        else{
            $query = $this->query()->where('category_id',$id)->take($search['take'])->get();
        }
        if (!empty($search['order_by'])) {
            $query->latest($search['order_by'] ?? 'updated_at');
        }

        return $query;
    }

    public function getSingleProductBySlug($slug,$relation=null){
        $query = $this->query();
        if (!empty($relation)) {
            $query = $query->with($relation);
        }
        $result = $query->where('slug', $slug)->first();
        return $result;
    }

    public function getSingleProductById($id,$relation=null){
        $query = $this->query();
        if (!empty($relation)) {
            $query->with($relation);
        }
        $result = $query->find($id);
        return $result;
    }

    public function getSingleProductByName($name,$relation=null){
        $query = $this->query();
        if (!empty($relation)) {
            $query->with($relation);
        }
        $result = $query->where('name',$name)->first();
        return $result;
    }

    public function getRelatedProducts($id, $search){
        $query = $this->query();
        $query->where('id','!=',$id)->latest($search['order_by'] ?? 'updated_at');

        if (empty($search['take'])) {
            $result  = $query->get();
        }
        else{
            $result = $query->take($search['take'])->get();
        }

        return $result;
    }

    public function createProduct($data){
        return $this->query()->create($data);
    }

    public function updateProduct($data, $id){
        return $this->where('id',$id)->update($data);
    }

    public function deleteProduct($id){
        return $this->query()->where('id',$id)->delete();
    }

    public function topProducts($search){
        $query = $this->query()->where('status', Product::ACTIVE)->latest('sold');
        if (!empty($search['take'])) {
            $query->take($search['take']);
        }
        if (!empty($search['paginate'])) {
            $result = $query->paginate($search['paginate_number']);
        } else {
            $result = $query->get();
        }

        return $result;
    }

    public function newProducts($search){
        $query = $this->query()->where('status', Product::ACTIVE)->latest('created_at');
        if (!empty($search['take'])) {
            $query->take($search['take']);
        }
        if (!empty($search['paginate'])) {
            $result = $query->paginate($search['paginate_number']);
        } else {
            $result = $query->get();
        }

        return $result;
    }
}
