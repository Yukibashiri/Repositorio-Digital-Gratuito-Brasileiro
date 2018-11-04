@extends('layouts.app')
@include('crud.forms.'.$form)
@include('layouts.message')
@section('title',$title_create)
@section('content')
    <h1 class="mb-3">Novo item para {{$title}}</h1>
    @yield('alert_message')
    <form method="POST" enctype="multipart/form-data" action="{{url($route_path)}}">
        @csrf
        @yield('form_field')
        <button type="submit" class="btn btn-primary">Cadastrar Item</button>
    </form>
    <div class="container" align="right">
        <a class="btn btn-primary" href="{{ url('/'.$route_path) }}">Voltar</a>
    </div>
@stop
