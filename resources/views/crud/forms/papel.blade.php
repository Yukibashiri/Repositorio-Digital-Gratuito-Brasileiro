@section('form_field')

    <div class="form-group mb-3">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o Nome do Papel..." required>
    </div>


    <div class="form-group mb-3">
        <label for="desc">Posição/Ordem</label>
        <input type="number" class="form-control" id="posicao" name="posicao" value="{{isset($item->posicao) ? $item->posicao : $last_position}}" placeholder="Digite a descrição do Papel...">
    </div>

    <div class="form-group required">
        <label for="status" class="control-label">Status</label>
        <select id="status" name="status" class="form-control">
            @foreach($status as $row)
                <option value="{{ $row['id'] }}" @if (isset($item->status) && $row['id'] == $item->status)  selected="selected" @endif>{{ $row['nome'] }}</option>
            @endforeach
        </select>
    </div>



@stop
