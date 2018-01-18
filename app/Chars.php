<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chars extends Model
{
    public function parent() {
        return $this->belongsTo(Item::class);
    }

    public function child() {
        return $this->hasMany(Char::class);
    }
}
