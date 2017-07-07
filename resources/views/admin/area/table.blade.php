<table class="table table-condensed">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Responsavel</th>
      <th colspan="3">Opção</th>
    </tr>
  </thead>
  <tbody>
    @foreach($areas as $area)
      <tr>
        <td>{!! $area->name !!}</td>
        <td>{!! $area->description !!}</td>
        <td>{!! $area->present()->responsible !!}</td>
        <td>
        {{Form::open(['route' => ['admin.Area.destroy', $area->id],'method' =>'delete'] )}}
          <div class="btn-group">
            <a href="{{ route('admin.Area.show',[$area->id]) }}" class="btn btn-info btn-xs btn-icon">
              <i class="fa fa-eye"></i>
            </a>
            <a href="{{ route('admin.Area.edit',[$area->id]) }}" class="btn btn-default btn-xs btn-icon">
              <i class="fa fa-pencil-square-o"></i>
            </a>
            {{Form::button('<i class="fa fa-times"></i>',['type' => 'submit' , 'class' => 'btn btn-danger btn-icon btn-xs'])}}
          </div>
        {{Form::close()}}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
