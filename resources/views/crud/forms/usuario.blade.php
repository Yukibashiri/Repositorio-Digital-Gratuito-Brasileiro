@section('form_field')
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="nome">Nome*</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o nome do Usuário..." required>
    </div>

    <div class="form-group col-md-4">
        <label for="sobrenome">Sobrenome*</label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{isset($item->sobrenome) ? $item->sobrenome : ''}}" placeholder="Digite o sobrenome do Usuário..." required>
    </div>

    <div class="form-group col-mb-4">
        <label for="codinome">Apelido*</label>
        <input type="text" class="form-control" id="codinome" name="codinome" value="{{isset($item->codinome) ? $item->codinome : ''}}" placeholder="Digite o apelido do Usuário..." required>
    </div>

    <div class="form-group col-md-4">
        <label for="login">Usuário*</label>
        <input type="text" class="form-control" id="login" name="login" value="{{isset($item->login) ? $item->login : ''}}" placeholder="digite um nome de  Usuário válido..." required>
    </div>

    <div class="form-group col-md-4">
        <label for="email">E-mail*</label>
        <input type="email" class="form-control" id="email" name="email" value="{{isset($item->email) ? $item->email : ''}}" placeholder="Digite a descrição da Situação..." required>
    </div>

    <div class="form-group col-auto-md-4">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" value="{{isset($item->password) ? $item->password : ''}}" placeholder="Digita uma senha" >
    </div>

    <div class="form-group col-md-4">
        <label for="esta_ativo" class="control-label">Status*</label>
        <select id="esta_ativo" name="esta_ativo" class="form-control" >
            @foreach($status as $row)
                <option value="{{ $row['id'] }}" @if (isset($item->esta_ativo) && $row['id'] == $item->esta_ativo)  selected="selected" @endif>{{ $row['nome'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="categoria_id" class="control-label">Cargo*</label>
        <select id="categoria_id" name="categoria_id" class="form-control" >
            <option value="" selected="selected">Selecione</option>
            @foreach($categorias as $row)
                <option value="{{ $row['id'] }}" @if (isset($item->categoria_id) && $row['id'] == $item->categoria_id)  selected="selected" @endif>{{ $row['nome'] }}</option>
            @endforeach
        </select>
    </div>

</div>



@stop

