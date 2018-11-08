@extends('layouts.main')

@section('head')
    {{--<script src="js/jquery.steps.js"></script>--}}
    <script src="js/user.js"></script>

@stop

@section('content')
{{--@section('form_field')--}}
<form id="user-create-form" action="#">
    <h3>Conta</h3>
    <fieldset>
        <legend>Informações da Conta</legend>

        <label for="nome">Usuário *</label>
        <input type="text" class="form-control" id="login" name="login" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o Nome de usuário..." required>

        <label for="password">Senha *</label>
        <input type="password" class="form-control" id="password" name="password" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite sua senha..." required>

        <label for="confirm_password">Confirmar senha *</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite novamente a senha..." required>
        <input id="confirm-2" name="confirm" type="text" class="required">
        <p>(*) Obrigatório</p>
    </fieldset>

    <h3>Pessoal</h3>
    <fieldset>
        <legend>Informações Pessoais</legend>

        <label for="nome">Nome *</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o  seu nome ..." required>

        <label for="sobrenome">Sobrenome *</label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o seu sobrenome..." required>

        <label for="email">Email *</label>
        <input type="email" class="form-control" id="email" name="email" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite um e-mail válido..." required>

        <label for="codinome">Apelido *</label>
        <input type="text" class="form-control" id="codinome" name="codinome" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o nome por qual quer ser chamado ..." required>


        <p>(*) Obrigatório</p>
    </fieldset>



    <h3>Finish</h3>
    <fieldset>
        <legend>Terms and Conditions</legend>


    </fieldset>
</form>
@stop

@section('script')



@stop
