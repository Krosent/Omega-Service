<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleChar extends Model
{
    protected $fillable = ['char_title'];
    public $timestamps = false;
}
