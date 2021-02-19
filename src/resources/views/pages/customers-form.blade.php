@extends('main.app')

@section('tittle', __("pages.customers.tittle"))
@section('page-name', __("pages.customers.page-name"))


@section('content')
    @parent
    @include('main.form', ['page'=>'customers', 'method'=>$method, 'action'=>$action, 'fields'=>$fields, 'data'=>$data])
@endsection