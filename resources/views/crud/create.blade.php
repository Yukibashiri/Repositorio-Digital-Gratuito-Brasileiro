@extends('layouts.template')
@include('crud.forms.'.$form)
@include('layouts.message')
@section('title',$title_create)

@section('button_create')
    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="window.location.href='{{URL::to($route_path)}}'"><i class="fa fa-chevron-circle-left" ></i> Voltar</button>
@stop


@section('content')
    <div class="container">
        <h1 class="mb-3">Novo item para {{$title}}</h1>
        @yield('alert_message')
        <form method="POST" enctype="multipart/form-data" action="{{url($route_path)}}">
            @csrf
            @yield('form_field')
            <button type="submit" class="btn btn-primary">Cadastrar Item</button>
        </form>
    </div>
@stop
