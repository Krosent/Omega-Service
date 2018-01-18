<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\SingleChar;
use Image;
use App\Item;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;



class AdminController extends Controller

{
public function __construct()
{
    $this->middleware('admin');
}

public function index() {
    $items = Item::all();
    $items_count  = count($items);
    $brands = Brand::all();
    $brands_count = count($brands);
    $categories = Category::all();
    $categories_count = count($categories);

    $sub_categories = SubCategory::all();
    $sub_categories_count = count($sub_categories);
    return view('admin.start', compact(['items_count', 'categories_count', 'brands_count',
        'sub_categories_count']));
}

public function categories_index() {
    $allCategories = Category::paginate(10);
    return view('admin.categories', compact(['allCategories']));
}

public function products_index() {
    $allItems = Item::paginate(6);
    return view('admin.products', compact(['allItems']));
}

public function brands_index() {
    $allBrands = Brand::paginate(6);
    return view('admin.brands', compact(['allBrands']));
}

public function subcats_index() {
    $allSubCats = SubCategory::paginate(6);
    return view('admin.sub_categories', compact(['allSubCats']));
}

public function tryToAddCategory(Request $request) {
    // implement code here!
    // if success - return success message
    // if not - return error msg
    $this->validate($request, [
        'category_name_field' => 'required|max:50',
    ]);

    $category_title = $request->input('category_name_field');
    $category = Category::create(['category_title' => $category_title]);
    session()->flash('CategoryAdded', 'Новая категория была успешно добавлена.');
    return redirect()->back();
}

    public function tryToEditCategory(Request $request) {
        $this->validate($request, [
            'category_name_field' => 'required|max:50',
        ]);
        $category = Category::find($request->input('cat_id'));
        $category_title = $request->input('category_name_field');
        $category->update(['category_title' => $category_title]);
        //$category = Category::create(['category_title' => $category_title]);
        session()->flash('CategoryEdited', 'Название категории было успешно изменено');
        return redirect()->back();
    }

    public function tryToDeleteCategory(Request $request) {

        $category = Category::find($request->input('cat_id'));
        $category->child()->delete();
        $category->delete();
        session()->flash('CategoryDeleted', 'Вы успешно удалили категорию');
        return redirect()->back();
    }

    /// END OF CATEGORIES METHODS

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tryToAddSUBCategory(Request $request) {
        // implement code here!
        // if success - return success message
        // if not - return error msg
        $this->validate($request, [
            'subcategory_name_field' => 'required|max:50',
            'category_id_field' => 'required',
            'image_url_field' => 'required',

        ]);

        $subcategory_title = $request->input('subcategory_name_field');
        $category_id = $request->input('category_id_field');

        $RandomImageName = "uploaded/img_" . uniqid() . ".png";
        $image = Image::make($request->file('image_url_field')->getRealPath())
            ->fit(500, 500)
            ->save($RandomImageName);

        SubCategory::create(['sub_name' => $subcategory_title, 'sub_cat_img' => $RandomImageName,
            'category_id' => $category_id]);
        session()->flash('SubCategoryAdded', 'Новая суб-категория была успешно добавлена.');

        return redirect()->back();
    }

    public function tryToEditSUBCategory(Request $request) {
        // implement code here!
        // if success - return success message
        // if not - return error msg
        $this->validate($request, [
            'subcategory_name_field' => 'required|max:50',
            'category_id_field' => 'required',

        ]);

        $subcategory_title = $request->input('subcategory_name_field');
        $category_id = $request->input('category_id_field');

        $sub_category = SubCategory::find($request->input('sub_id'));
        $sub_category->update(['sub_name' => $subcategory_title, 'category_id' => $category_id]);

        session()->flash('SubCategoryEdited', 'Суб-категория была успешно редактирована.');

        return redirect()->back();
    }

    public function tryToDeleteSUBCategory(Request $request) {

        $sub_category = SubCategory::find($request->input('sub_id'));
        $sub_category->child()->delete();
        $sub_category->delete();
        session()->flash('SubCategoryDeleted', 'Вы успешно удалили саб-категорию');
        return redirect()->back();
    }


//   --------------- END OF SUB CATEGORIES ------------------


    public function tryToAddBrand(Request $request) {
        // implement code here!
        // if success - return success message
        // if not - return error msg
        $this->validate($request, [
            'brand_name_field' => 'required|max:50',
            'category_id_field' => 'required',
            'sub_id_field' => 'required',

        ]);
        $brand_title = $request->input('brand_name_field');
        $category_id = $request->input('category_id_field');
        $sub_id = $request->input('sub_id_field');
        $RandomImageName = "uploaded/img_" . uniqid() . ".png";

      Image::make($request->file('image_url_field')->getRealPath())
            ->fit(500, 500)
            ->save($RandomImageName);

        Brand::create(['brand_name' => $brand_title, 'brand_img' => $RandomImageName,
            'category_id' => $category_id, 'sub_category_id' => $sub_id]);
        session()->flash('BrandAdded', 'Новый бренд был успешно добавлен.');

        return redirect()->back();
    }

    public function tryToEditBrand(Request $request) {
        // implement code here!
        // if success - return success message
        // if not - return error msg
        $this->validate($request, [
            'brand_name_field' => 'required|max:50',
            'category_id_field' => 'required',
            'sub_id_field' => 'required',

        ]);

        $brand_title = $request->input('brand_name_field');
        $category_id = $request->input('category_id_field');
        $sub_id = $request->input(('sub_id_field'));

        $brand = Brand::find($request->input('brand_id'));
        $brand->update(['brand_name' => $brand_title, 'category_id' => $category_id, 'sub_category_id' => $sub_id]);

        session()->flash('BrandEdited', 'Бренд был успешно редактирован.');

        return redirect()->back();
    }

    public function tryToDeleteBrand(Request $request) {

        $brand = Brand::find($request->input('brand_id'));
        $brand->child()->delete();

        $brand->delete();
        session()->flash('BrandDeleted', 'Вы успешно удалили бренд');
        return redirect()->back();
    }

    public function tryToAddProduct(Request $request) {
        // implement code here!
        // if success - return success message
        // if not - return error msg
        $this->validate($request, [
            'prod_name_field' => 'required|max:50',
            'category_id_field' => 'required',
            'sub_id_field' => 'required',
            'brand_id_field' => 'required',
            'warhouse_name_field' => 'required|max:50',
            'manufacpr_name_field' => 'required|max:50',
            'sellpr_name_field' => 'required|max:50',
            'item_desc' => 'required',
            'item_add_desc' => 'required',
        ]);
        $prod_title = $request->input('prod_name_field');
        $category_id = $request->input('category_id_field');
        $sub_id = $request->input('sub_id_field');
        $brand_id = $request->input('brand_id_field');
        $warhouse_amount= $request->input('warhouse_name_field');
        $manuf_price =  $request->input('manufacpr_name_field');
        $sell_price = $request->input('sellpr_name_field');
        $description = $request->input('item_desc');
        $add_descr = $request->input('item_add_desc');


        Item::create(['item_name' => $prod_title, 'brand_id' => $brand_id,
            'category_id' => $category_id, 'sub_category_id' => $sub_id,
            'item_on_warehouse' => $warhouse_amount,
            'price_manufac' => $manuf_price,
            'price_display' => $sell_price,
            'item_desc' => $description,
            'item_add_desc' => $add_descr,
            'item_image_url' => 'null']);
        session()->flash('ItemAdded', 'Новый продукт был успешно добавлен.');

        return redirect()->back();
    }

    public function tryToEditProduct(Request $request) {
        // implement code here!
        // if success - return success message
        // if not - return error msg
        $this->validate($request, [
            'prod_name_field' => 'required|max:50',
            'category_id_field' => 'required',
            'sub_id_field' => 'required',
            'brand_id_field' => 'required',
            'warhouse_name_field' => 'required|max:50',
            'manufacpr_name_field' => 'required|max:50',
            'sellpr_name_field' => 'required|max:50',
            'item_desc' => 'required',
            'item_add_desc' => 'required',

        ]);

        $prod_title = $request->input('prod_name_field');
        $category_id = $request->input('category_id_field');
        $sub_id = $request->input('sub_id_field');
        $brand_id = $request->input('brand_id_field');
        $warhouse_amount= $request->input('warhouse_name_field');
        $manuf_price =  $request->input('manufacpr_name_field');
        $sell_price = $request->input('sellpr_name_field');
        $description = $request->input('item_desc');
        $add_descr = $request->input('item_add_desc');

        $item = Item::find($request->input('item_id'));
        $item->update(
            ['item_name' => $prod_title, 'brand_id' => $brand_id,
                'category_id' => $category_id, 'sub_category_id' => $sub_id,
                'item_on_warehouse' => $warhouse_amount,
                'price_manufac' => $manuf_price,
                'price_display' => $sell_price,
                'item_desc' => $description,
                'item_add_desc' => $add_descr,
                'item_image_url' => 'null']
        );

        session()->flash('ItemEdited', 'Продукт был успешно редактирован.');

        return redirect()->back();
    }

    public function tryToDeleteProduct(Request $request) {

        $item = Item::find($request->input('item_id'));
        $item->child()->delete();
        $item->delete();
        session()->flash('ItemDeleted', 'Вы успешно удалили продукт');
        return redirect()->back();
    }

    // -------------------------

    public function AddChar(Request $request) {
        // implement code here!
        // if success - return success message
        // if not - return error msg
        $this->validate($request, [
            'char_name_field' => 'required|max:50',
        ]);

        $char_title = $request->input('char_name_field');
        $char = SingleChar::create(['char_title' => $char_title]);
        session()->flash('CharAdded', 'Новая характеристика.');
        return redirect()->back();
    }


}
