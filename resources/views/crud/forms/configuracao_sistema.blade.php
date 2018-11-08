@section('form_field')

    <div class="form-group mb-3">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($item->nome) ? $item->nome : '' }}" {{ isset($item->nome) ? 'readonly="readonly"' : ''}}" placeholder="Digite o Nome..." required>
    </div>

    <div class="form-group mb-3">
        <label for="desc">Descrição</label>
        <input type="text" class="form-control" id="desc" name="desc" value="{{isset($item->desc) ? $item->desc : ''}}" placeholder="Digite a descrição da configuração...">
    </div>

    <div class="form-group mb-3">
        <label for="desc">Valor</label>
        <input type="text" class="form-control" id="valor" name="valor" value="{{isset($item->valor) ? $item->valor : ''}}" placeholder="Informe o valor ...">
    </div>


@stop
