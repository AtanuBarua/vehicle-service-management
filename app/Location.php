<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name','type','parent_id'];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    public function getNameAttribute($value){
        return ucwords($value);
    }
    
    public function getTypeAttribute($value){
        return ucwords($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
}
