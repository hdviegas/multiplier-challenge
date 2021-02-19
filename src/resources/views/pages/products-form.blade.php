@extends('main.app')

@section('tittle', __("pages.products.tittle"))
@section('page-name', __("pages.products.page-name"))


@section('content')
    @parent
    @include('main.form', ['page'=>'products', 'method'=>$method, 'action'=>$action, 'fields'=>$fields, 'data'=>$data])
@endsection