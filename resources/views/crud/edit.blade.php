@extends('layouts.app')
@include('crud.forms.'.$form)
@include('layouts.message')
@section('title',$title_edit)
@section('content')
    <h1 class="mb-3">Atualizar item </h1>
    @yield('alert_message')
    <form method="POST" enctype="multipart/form-data" action="{{url($route_path.'/'.$id.'/edit')}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        @yield('form_field')
        <button type="submit" class="btn btn-primary">Atualizar Item</button>
    </form>
    <div class="container" align="right">
        <a class="btn btn-primary" href="{{ url('/'.$route_path) }}">Voltar</a>
    </div>
@stop
