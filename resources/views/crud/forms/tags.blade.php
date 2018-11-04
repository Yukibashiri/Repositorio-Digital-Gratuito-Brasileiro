@section('form_field')

    <div class="form-group mb-3">
        <label for="texto">Nome</label>
        <input type="text" class="form-control" id="texto" name="texto" value="{{isset($item->texto) ? $item->texto : '' }}" placeholder="Digite a palavra chave..." required>
    </div>



@stop
