<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Log;

class SubCategoryController extends Controller
{
    public function index($category_id, $subcat_id) {
        $display_brands = SubCategory::getBrandsFromSubCategory($subcat_id, $category_id);

        return view('subcat', compact(['display_brands', 'category_id', 'subcat_id']));
    }
}
