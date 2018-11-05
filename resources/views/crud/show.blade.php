@extends('layouts.main')

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
    <div class="container" align="right">
        <a class="btn btn-primary" href="javascript:history.go(-1)">Voltar</a>
    </div>
@stop
