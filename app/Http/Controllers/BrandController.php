<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index($category_id, $subcat_id, $brand_id)  {
         $display_items = Item::paginateItems($brand_id, 9);

         return view('brand', compact(['display_items', 'category_id', 'subcat_id', 'brand_id']));
    }
}