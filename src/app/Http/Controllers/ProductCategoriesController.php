<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;

class ProductCategoriesController extends Controller
{
    public function listView()
    {
        $data = (new ProductCategories)->getGridData();
        $columns = (new ProductCategories)->getGridColumns();
        return view('pages.productcategories-list', ['columns'=>$columns, 'data'=>$data ?? []]);
    }
    public function addView(Request $req)
    {
        if ($req->has('id')) {
            $id = $req->input('id');
            $data = ProductCategories::find($id)->toArray();
        }
        $fields = (new ProductCategories)->getFormFields();
        return view('pages.productcategories-form', ['method'=> 'post', 'action'=> route('product-categories-save'), 'fields'=>$fields, 'data'=>$data ?? []]);
    }

    public function save(Request $req)
    {
        $customer = new ProductCategories();
        $data = $req->only((new ProductCategories)->getFillable());
        $id = $req->input('id') ?? null;
        $saved = ProductCategories::updateOrCreate(
            ['id' => $id],
            $data
        );
        if ($saved !== false) {
            return redirect()->route('product-categories-list')->with('success', __('main.save_sucess'));
        } else {
            return redirect()->route('product-categories-list')->with('error', __('errors.save_fail'));
        }
    }
}
