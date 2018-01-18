<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function child() {

    }

    public function parent() {
        return $this->belongsTo(Item::class);
    }
}
