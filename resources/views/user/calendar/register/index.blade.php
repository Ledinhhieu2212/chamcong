@extends('layout')

@section('css')
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
                <section class="content">
                    <div class="container-fluid ">
                        @include('user.calendar.register.add')
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
