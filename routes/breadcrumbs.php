<?php
use \App\Category;
use \App\SubCategory;
use \App\Brand;
use \App\Item;

// Breadcrumbs is a kind of menu with explicit path (главная->каталог->субкаталог->бренд->товары->товар-> and so on)

// Breadcrumbs главной страницы
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Главная', route('home'));
});

// На странице с выбором сабкатегорий
Breadcrumbs::register('category', function($breadcrumbs, $category_id)
{
    $defined = Category::find($category_id);
    $breadcrumbs->parent('home');
    $breadcrumbs->push($defined->category_title, route('category', $defined->id));
});

// На странице с выбором брендов
Breadcrumbs::register('subcategory', function($breadcrumbs, $category_id ,$subcat_id)
{
    $defined = SubCategory::find($subcat_id);
    $breadcrumbs->parent('category', $category_id);
    $breadcrumbs->push($defined->sub_name, route('subcategory', [$category_id, $subcat_id]));
});

// На странице с перечислением предметов по бренду
Breadcrumbs::register('brand', function($breadcrumbs, $category_id ,$subcat_id, $brand_id)
{
    $defined = Brand::find($brand_id);
    $breadcrumbs->parent('subcategory', $category_id, $subcat_id);
    $breadcrumbs->push($defined->brand_name, route('brand', [$category_id, $subcat_id, $brand_id]));
});

// Breadcrumbs на странице с описанием товара
Breadcrumbs::register('item', function($breadcrumbs, $category_id ,$subcat_id, $brand_id, $item_id)
{
    $defined = Item::find($item_id);
    $breadcrumbs->parent('brand', $category_id,$subcat_id, $brand_id);
    $breadcrumbs->push($defined->item_name, route('item', [$category_id, $subcat_id, $brand_id, $item_id]));
});

// Поиск
Breadcrumbs::register('search_page', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Поиск', route('search_page'));
});
