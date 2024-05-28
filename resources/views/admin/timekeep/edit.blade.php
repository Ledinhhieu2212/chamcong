@extends('layout')

@section('css')
    @include('components.admin.head')
    <title>{{$title}}</title>
@endsection
@section('script')
    @include('components.admin.script')
@endsection


@section('navbar')
    @include('components.admin.navbar')
@endsection

@section('sidebar')
    @include('components.admin.sidebar')
@endsection

@section('content')
@endsection
