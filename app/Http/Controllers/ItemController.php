<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Chars;

class ItemController extends Controller
{
   public function index($brand_id, $category_id, $subcat_id, $item_id) {
       $item = Item::find($item_id);
       $chars = Item::find($item_id)->child;
       $images = Item::find($item_id)->childImages;

        return view('item', compact(['item','item_id', 'brand_id', 'subcat_id', 'category_id', 'chars',
                                                                         'images']));
   }
}
