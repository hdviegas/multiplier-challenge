<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function listView()
    {
        $data = (new Product)->getGridData();
        $columns = (new Product)->getGridColumns();
        return view('pages.products-list', ['columns'=>$columns, 'data'=>$data ?? []]);
    }
    public function addView(Request $req)
    {
        if ($req->has('id')) {
            $id = $req->input('id');
            $data = Product::find($id)->toArray();
        }
        $fields = (new Product)->getFormFields();
        return view('pages.products-form', ['method'=> 'post', 'action'=> route('products-save'), 'fields'=>$fields, 'data'=>$data ?? []]);
    }

    public function save(Request $req)
    {
        $customer = new Product();
        $data = $req->only((new Product)->getFillable());
        $id = $req->input('id') ?? null;
        $saved = Product::updateOrCreate(
            ['id' => $id],
            $data
        );
        if ($saved !== false) {
            return redirect()->route('products-list')->with('success', __('main.save_sucess'));
        } else {
            return redirect()->route('products-list')->with('error', __('errors.save_fail'));
        }
    }
}
