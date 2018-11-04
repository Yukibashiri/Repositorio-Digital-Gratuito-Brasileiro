@section('form_field')

    <div class="form-group mb-3">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o Nome do Curso..." required>
    </div>

    <div class="form-group mb-3">
        <label for="desc">Descrição</label>
        <input type="text" class="form-control" id="desc" name="desc" value="{{isset($item->desc) ? $item->desc : ''}}" placeholder="Digite a descrição do Curso...">
    </div>


@stop
