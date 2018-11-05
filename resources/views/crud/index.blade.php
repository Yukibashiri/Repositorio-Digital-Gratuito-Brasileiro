@extends('layouts.main')

@section('head')
    <link href="{{ asset('css/dashboard/dataTables.bootstrap4.css') }}" rel="stylesheet">
@stop
@section('title',$title)
@section ('content')

    <div class="container" align="right">
        <a class="btn btn-primary" href="javascript:history.go(-1)">Voltar</a>
        <a class="btn btn-primary" href="{{URL::to($route_path)}}/create">Criar</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{$crud_name}}</h2>
            <div class="table-responsive">
                <table id="crud_table_index" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            @foreach($fields_name as $field)
                                <th>{{$field}}</th>
                            @endforeach
                            <th> Opções </th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script src="{{ asset('libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
         *       Config Table            *
         ****************************************/
        // $('#crud_table_index').DataTable();

        $(document).ready(function() {
            $('#crud_table_index').DataTable( {
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    }
                }
            } );
        } );
    </script>
@stop
