@extends('main.app')

@section('title', __("pages.users.title"))
@section('page-name', __("pages.users.page-name"))


@section('content')
    @parent
    @include('main.form', ['page'=>'users', 'method'=>$method, 'action'=>$action, 'fields'=>$fields, 'data'=>$data])
@endsection