@extends('main.app')

@section('title', __("pages.users.title"))
@section('page-name', __("pages.users.page-name"))
@section('add-link', route('users-add'))

@section('content')
    @parent
    @include('main.datagrid', ['columns'=>$columns, 'data'=>$data])
@endsection