{{Form::open(['route' => 'admin.registerArea.store'])}}
    {{Form::text()}}
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{route('admin.home')}}" class="btn btn-default">Cancelar</a>
    </div>
{{Form::close()}}