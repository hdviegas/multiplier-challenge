@extends('main.app')

@section('tittle', __("pages.product-categories.tittle"))
@section('page-name', __("pages.product-categories.page-name"))


@section('content')
    @parent
    @include('main.form', ['page'=>'product-categories', 'method'=>$method, 'action'=>$action, 'fields'=>$fields, 'data'=>$data])
@endsection