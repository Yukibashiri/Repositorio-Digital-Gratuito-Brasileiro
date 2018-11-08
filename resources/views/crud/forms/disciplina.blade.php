@section('form_field')

    <div class="form-group mb-3">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($item->nome) ? $item->nome : '' }}" placeholder="Digite o Nome do Cargo..." required>
    </div>

    <div class="form-group mb-3">
        <label for="desc">Descrição</label>
        <input type="text" class="form-control" id="desc" name="desc" value="{{isset($item->desc) ? $item->desc : ''}}" placeholder="Digite a descrição do Cargo...">
    </div>

    <div class="form-group required">
        <label for="curso_id" class="control-label">Curso</label>
        <select id="curso_id" name="curso_id" class="form-control">
            <option value="" @if (!isset($item->curso_id))  selected="selected" @endif>Selecione</option>
            @foreach($cursos as $row)
                <option value="{{ $row->id }}" @if (isset($item->curso_id) && $row->id == $item->curso_id)  selected="selected" @endif>{{ $row->nome }}</option>
            @endforeach
        </select>
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
