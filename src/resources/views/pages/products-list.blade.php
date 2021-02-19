@extends('main.app')

@section('tittle', __("pages.products.tittle"))
@section('page-name', __("pages.products.page-name"))
@section('add-link', route('products-add'))

@section('content')
    @parent
    @include('main.datagrid', ['page'=>'products', 'columns'=>$columns, 'data'=>$data])
@endsection