<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function listView()
    {
        $data = (new Customer)->getGridData();
        $columns = (new Customer)->getGridColumns();
        return response()->view('pages.customers-list', ['columns'=>$columns, 'data'=>$data], 200);
    }
    public function addView(Request $req)
    {
        if ($req->has('id')) {
            $id = $req->input('id');
            $data = Customer::find($id)->toArray();
        }
        $fields = (new Customer)->getFormFields();
        return view('pages.customers-form', ['method'=> 'post', 'action'=> route('customers-save'), 'fields'=>$fields, 'data'=>$data ?? []]);
    }

    public function save(Request $req)
    {
        $customer = new Customer();
        $data = $req->only((new Customer)->getFillable());
        $id = $req->input('id') ?? null;
        $saved = Customer::updateOrCreate(
            ['id' => $id],
            $data
        );
        if ($saved !== false) {
            return redirect()->route('customers-list')->with('success', __('main.save_sucess'));
        } else {
            return redirect()->route('customers-list')->with('error', __('errors.save_fail'));
        }
    }
}
