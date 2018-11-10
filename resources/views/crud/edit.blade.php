@extends('layouts.template')
@include('crud.forms.'.$form)
@include('layouts.message')
@section('title',$title_edit)

@section('button_create')
    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="window.location.href='{{ url()->previous() }}'"><i class="fa fa-chevron-circle-left" ></i> Voltar</button>
@stop


@section('content')
    <h1 class="mb-3">Atualizar item </h1>
    @yield('alert_message')
    <form method="POST" enctype="multipart/form-data" action="{{url($route_path.'/'.$id.'/edit')}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        @yield('form_field')
        <button type="submit" class="btn btn-primary">Atualizar Item</button>
    </form>
@stop
