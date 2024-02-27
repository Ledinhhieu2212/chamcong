@extends('layout')

@section('css')
@endsection

@section('script')
    @yield('script.search')
@endsection

@section('nav')
    @include('components.nav')
@endsection

@section('navbar')
    @include('components.navbar')
@endsection


@section('content')
    <div class="wrapper wrapper-content">
        <section class="content">
            <div class="content-wrapper">
                @yield('search')
            </div>
        </section>
    </div>
@endsection
