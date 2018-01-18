<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name', 'brand_id', 'sub_category_id',
        'item_desc', 'item_add_desc', 'item_image_url',
        'category_id', 'item_on_warehouse', 'price_manufac', 'price_display'];
    public function parent() {
        return $this->belongsTo(SubCategory::class);
    }

    public function child() {
    return $this->hasMany(Chars::class);
}

    public function childImages() {
        return $this->hasMany(Image::class);
    }

public static function paginateItems($brand, $num) {
    return static::where('brand_id', $brand)->paginate($num);
}
}
