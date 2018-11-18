@extends('layouts.template')

@section('button_create')
    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" onclick="window.location.href='{{URL::to($route_path)}}'"><i class="fa fa-chevron-circle-left" ></i> Voltar</button>
@stop

@section('title',$title_show .': '. $item_id)
@section ('content')
    <h1>Descrição</h1>
    <table class="table">
        <tr>
            @foreach($fields_name as $field)
                <th>{{$field}}</th>
            @endforeach
        </tr>
        <tr>
            @foreach($fields as $field)
                <td>{{$item->$field}}</td>
            @endforeach
        </tr>
    </table>
@stop
