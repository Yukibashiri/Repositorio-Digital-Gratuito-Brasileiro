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
                        <form method="POST" enctype="multipart/form-data" action="{{url('registrar')}}">
                            <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                            @csrf
                            <div class="wizard-header">
                                <h3>
                                    <b>CRIE</b> SEU PERFIL <br>
                                    <small>Não se preocupe suas informações estarão seguras conosco!</small>
                                </h3>
                            </div>

                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab">Sobre</a></li>
                                    <li><a href="#account" data-toggle="tab">Conta</a></li>
                                </ul>

                            </div>
                            <div class="tab-content">

                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h4 class="info-text card-body align-items-center d-flex justify-content-center" >  Vamos começar com sua informação pessoal</h4>

                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="assets/images/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                    <input type="file" id="wizard-picture">
                                                </div>
                                                <h6>Escolha uma foto</h6>
                                                <small> Foto deve possuir mesmas proporções (ex: 200x200)</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nome <small>(obrigatório)</small></label>
                                                <input name="firstname" type="text" class="form-control" placeholder="João...">
                                            </div>
                                            <div class="form-group">
                                                <label>Sobrenome <small>(obrigatório)</small></label>
                                                <input name="lastname" type="text" class="form-control" placeholder="Silva...">
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Email <small>(obrigatório)</small></label>
                                                <input name="email" type="email" class="form-control" placeholder="joaosilva@email.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h4 class="info-text"> Agora vamos preencher suas informações de Acesso </h4>
                                    <div class="row">

                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Usuário <small>(obrigatório)</small></label>
                                                <input name="login" type="text" class="form-control" placeholder="joaosilva...">
                                            </div>
                                            <div class="form-group">
                                                <label>Apelido <small>(obrigatório)</small></label>
                                                <input name="nickname" type="text" class="form-control" placeholder="Quero ser chamado de...">
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Senha <small>(obrigatório)</small></label>
                                                <input name="password" id="password" type="password" class="form-control" placeholder="******">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirmar Senha <small>(obrigatório)</small></label>
                                                <input name="confirmpassword" id="confirmpassword" type="password" class="form-control" placeholder="******">
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
    <script src="{!! asset('assets/js/useradd.js') !!}"></script>
    <script src="{!! asset('assets/js/wizard/jquery.validate.min.js') !!}"></script>
@stop
