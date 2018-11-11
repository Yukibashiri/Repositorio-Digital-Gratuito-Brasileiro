@extends('layouts.template')


@section('content')

    <!-- Validation wizard -->
    <div class="container" id="validation" >
        <div class="col-12 ">
            <div class="card wizard-content" >
                <div class="card-body">
                    <h4 class="card-title">Cadastro de Usuário</h4>
                    <h6 class="card-subtitle">Não se preocupe sua informação estará segura conosco!</h6>
                    <form action="#" class="validation-wizard wizard-circle">
                        <!-- Step 1 -->
                        <h6>Informação Pessoal</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"> Nome : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" id="name" name="firstName"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname"> Sobrenome : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" id="lastname" name="lastName"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email"> E-mail : <span class="danger">*</span> </label>
                                        <input type="email" class="form-control required" id="email" name="emailAddress"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nickname"> Apelido : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" id="nickname" name="lastName"> </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Dados de Acesso</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="login"> Usuário : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" id="name" name="login"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password"> Senha : <span class="danger">*</span> </label>
                                        <input type="password" class="form-control required" id="password" name="password"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="confirmpassword"> Confirmar senha : <span class="danger">*</span> </label>
                                        <input type="password" class="form-control required" id="password" name="password"> </div>
                                </div>

                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Termos e condições</h6>
                        <section>
                            <p> Aqui ficarão os termos de condições do sistema!</p>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- vertical wizard -->


@stop

@section('script')

    <script src="js/user.js"></script>

@stop
