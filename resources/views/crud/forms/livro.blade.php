@extends('layouts.app')
@include('layouts.message')
@section('content')

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="form-group">
                        @yield('alert_message')
                    </div>
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form method="POST" enctype="multipart/form-data" action="{{url('compartilhar')}}">
                            <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                            @csrf
                            <div class="wizard-header">
                                <h3>
                                    <b>COMPARTILHE</b> SEU PRODUÇÃO CIENTÍFICA <br>
                                    <small>Lembre-se você está concordando em disponibilizar seu material publicamente!</small>
                                </h3>
                            </div>

                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#info" data-toggle="tab">Informações</a></li>
                                    <li><a href="#author" data-toggle="tab">Autores</a></li>
                                    <li><a href="#details" data-toggle="tab">Detalhes</a></li>
                                    {{--<li><a href="#account" data-toggle="tab">Conta</a></li>--}}
                                </ul>

                            </div>
                            <div class="tab-content">

                                <div class="tab-pane" id="info">
                                    <div class="row">
                                        <h4 class="info-text card-body align-items-center d-flex justify-content-center col-sm-12">  Informações do material</h4>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="colecao_id" class="control-label">Tipo de Produção<small>(obrigatório)</small></label>
                                                <select id="colecao_id" name="colecao_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($colecoes as $row)
                                                        <option value="{{ $row['id'] }}" @if ( (isset($item->colecao_id) && $row['id'] == $item->colecao_id )  || old('colecao_id') )  selected="selected" @endif>{{ $row['nome'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Titulo <small>(obrigatório)</small></label>
                                                <input name="title" type="text" value="{{ old('title') }}" class="form-control" placeholder="DESENVOLVIMENTO DE UMA PLATAFORMA DE REPOSITÓRIOS DIGITAIS OPEN SOURCE:...">
                                            </div>
                                            <div class="form-group">
                                                <label>Subtítulo</label>
                                                <input name="subtitle" type="text" value="{{ old('subtitle') }}" class="form-control" placeholder="um estudo de caso com a UNDB - MA...">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="curso_id" class="control-label">Área/Curso<small>(obrigatório)</small></label>
                                                <select id="curso_id" name="curso_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($cursos as $row)
                                                        <option value="{{ $row['id'] }}" @if ( (isset($item->curso_id) && $row['id'] == $item->curso_id) || old('curso_id') )  selected="selected" @endif>{{ $row['nome'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="disciplina_id" class="control-label">Área específica/Disciplina</label>
                                                <select id="disciplina_id" name="disciplina_id" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($disciplinas as $row)
                                                        <option value="{{ $row['id'] }}" @if ( (isset($item->disciplina_id) && $row['id'] == $item->disciplina_id) || old('disciplina_id') )  selected="selected" @endif>{{ $row['nome'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="author">
                                    <h4 class="info-text"> Informe quem são os envolvidos no projeto </h4>

                                    <div class="row" id="repeater">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="papel_id" class="control-label">Papel</label>
                                                <select id="roles[0]" name="roles[]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($papeis as $row)
                                                        <option value="{{ $row['id'] }}" @if ( (isset($item->papel_id) && $row['id'] == $item->papel_id) || old('papel_id') )  selected="selected" @endif>{{ $row['nome'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Nome Completo <small>(obrigatório)</small></label>
                                                <select id="authors[0]" name="authors[]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($usuarios as $row)
                                                        <option value="{{ $row->id }}" @if (isset($item->papel_id) && $row->id == $item->papel_id)  selected="selected" @endif>{{ $row->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="papel_id" class="control-label">Papel</label>
                                                <select id="papel_id" name="roles[1]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($papeis as $row)
                                                        <option value="{{ $row['id'] }}" @if (isset($item->papel_id) && $row['id'] == $item->papel_id)  selected="selected" @endif>{{ $row['nome'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Nome Completo <small>(obrigatório)</small></label>
                                                <select id="authors[]" name="authors[1]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($usuarios as $row)
                                                        <option value="{{ $row->id }}" @if (isset($item->papel_id) && $row->id == $item->papel_id)  selected="selected" @endif>{{ $row->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="details">
                                    <h4 class="info-text"> Hora de mandar os detalhes do seu projeto </h4>
                                    <div class="row" >

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label clas>Resumo <small>(obrigatório)</small></label>
                                                <textarea name="resumo"  rows="4" cols="100" class="form-control" placeholder="Coloque o resumo do trabalhgo aqui..."> {{ old('title') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Palavras-chave <small>(obrigatório)</small></label>
                                            </div>
                                        </div>


                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select id="tags[]" name="tags[0]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($tags as $row)
                                                        <option value="{{ $row['id'] }}" @if (isset($item->papel_id) && $row['id'] == $item->papel_id)  selected="selected" @endif>{{ $row['texto'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select id="tags[]" name="tags[1]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($tags as $row)
                                                        <option value="{{ $row['id'] }}" @if (isset($item->papel_id) && $row['id'] == $item->papel_id)  selected="selected" @endif>{{ $row['texto'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select id="tags[]" name="tags[2]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($tags as $row)
                                                        <option value="{{ $row['id'] }}" @if (isset($item->papel_id) && $row['id'] == $item->papel_id)  selected="selected" @endif>{{ $row['texto'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <select id="tags[]" name="tags[3]" class="form-control" >
                                                    <option value="" selected="selected">Selecione</option>
                                                    @foreach($tags as $row)
                                                        <option value="{{ $row['id'] }}" @if (isset($item->papel_id) && $row['id'] == $item->papel_id)  selected="selected" @endif>{{ $row['texto'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Anexe seu arquivo aqui <small>(obrigatório)</small></label>
                                        <input type="file" name="item_file" id="item_file">
                                        </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Avançar' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Cadastrar' />

                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Voltar' />
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->


@stop


@section('script')
    <script src="{!! asset('assets/js/itemadd.js') !!}"></script>
@stop
