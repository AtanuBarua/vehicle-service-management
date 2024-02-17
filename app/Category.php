<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','image','status'];

    const ACTIVE = 1;
    const INACTIVE = 0;

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getAllCategories($search = []){
        $query = $this->query();
        if (!empty($search['status'])) {
            $query = $query->where($search['status']);
        }
        return $query->get();
    }

    public function findCategoryBySlug($slug){
        return $this->query()->where('slug',$slug)->first();
    }

    public function createCategory($data){
        return $this->query()->create($data);
    }

    public function updateCategory($data, $id){
        return $this->query()->where('id',$id)->update($data);
    }

    public function deleteCategory($id){
        return $this->query()->where('id',$id)->delete();
    }
}
