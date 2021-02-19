@extends('main.app')

@section('tittle', __("pages.customers.tittle"))
@section('page-name', __("pages.customers.page-name"))
@section('add-link', route('customers-add'))

@section('content')
    @parent
    @include('main.datagrid', ['page'=>'customers', 'columns'=>$columns, 'data'=>$data ?? []])
@endsection