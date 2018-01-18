<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['sub_name', 'sub_cat_img', 'category_id'];
    public $timestamps = false;

    public function parent() {
        return $this->belongsTo(Category::class);
    }

    public function child() {
        return $this->hasMany(Brand::class);
    }

    public static function getBrandsFromSubCategory($sub_cat_id, $category) {
        return static:: find($sub_cat_id)->child;
    }
}
