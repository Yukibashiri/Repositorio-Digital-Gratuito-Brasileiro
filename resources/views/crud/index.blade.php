@extends('layouts.app')

@section('title',$title)
@section ('content')
    <h1>{{$crud_name}}</h1>
    <div class="container" align="right">
        <a class="btn btn-primary" href="javascript:history.go(-1)">Voltar</a>
        <a class="btn btn-primary" href="{{URL::to($route_path)}}/create">Criar</a>
    </div>
    <div>
        <table class="table">
            <tr>
                @foreach($fields_name as $field)
                <th>{{$field}}</th>
                @endforeach
                <th> Opções </th>
            </tr>
            @foreach($itens as $item)
                <tr>
                    @foreach($fields as $field)
                        <td>{{$item->$field}}</td>
                    @endforeach
                    <td>
                        <a class="btn btn-primary" href="{{URL::to($route_path)}}/{{$item->id}}">Ver</a>
                        <a class="btn btn-warning" href="{{URL::to($route_path)}}/{{$item->id}}/edit">Editar</a>
                        <a class="btn btn-danger" href="{{URL::to($route_path)}}/{{$item->id}}/delete">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop
