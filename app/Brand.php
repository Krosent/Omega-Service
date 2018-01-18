<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $fillable = ['brand_name', 'brand_img', 'sub_category_id', 'category_id'];
    public $timestamps = false;
    public function child() {
        return $this->hasMany(Item::class);
    }

    public static function getItems($brand_id) {
        return static:: find($brand_id)->child;
    }
}
