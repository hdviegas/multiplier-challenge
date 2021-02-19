@extends('main.app')

@section('tittle', __("pages.product-categories.tittle"))
@section('page-name', __("pages.product-categories.page-name"))
@section('add-link', route('product-categories-add'))

@section('content')
    @parent
    @include('main.datagrid', ['page'=>'product-categories', 'columns'=>$columns, 'data'=>$data])
@endsection