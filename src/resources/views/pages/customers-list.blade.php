@extends('main.app')

@section('title', __("pages.customers.title"))
@section('page-name', __("pages.customers.page-name"))

@section('content')
    @parent
    @include('main.grid', ['columns'=>$columns, 'data'=>$data])
@endsection