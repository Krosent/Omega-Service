<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index($category_id) {
        $display_sub_cats = Category::find($category_id)->child;
        return view('category', compact(['display_sub_cats', 'category_id']));
    }

}
