<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_title', 'cat_id'];
    public $timestamps = false;

    public function parent()
    {
        // No parent
    }

    public function child()
    {
        return $this->hasMany(SubCategory::class);
    }





}
