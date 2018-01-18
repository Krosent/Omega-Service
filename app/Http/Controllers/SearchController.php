<?php

namespace App\Http\Controllers;
use App\Item;
use App\Category;
use App\SubCategory;
use App\Brand;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index() {
        $search = request('search_field');
        $items = Item::where('item_name', 'like', '%'.$search.'%')
            ->orWhere('item_desc', 'like', '%'.$search.'%')
            ->orWhere('item_add_desc', 'like', '%'.$search.'%')
            ->orWhere('price_display', 'like', '%'.$search.'%')
            ->orWhere('item_on_warehouse', 'like', '%'.$search.'%')
            ->paginate(20);

        return view('search', compact(['search', 'items']));
    }
}
