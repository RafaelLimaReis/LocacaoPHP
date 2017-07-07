<table class="table table-condensed">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Responsavel</th>
      <th>Opção</th>
    </tr>
  </thead>
  <tbody>
    @foreach($areas as $area)
      <tr>
        <td>{!! $area->name !!}</td>
        <td>{!! $area->description !!}</td>
        <td>{!! $area->present()->responsible !!}</td>
        <td>
          <a href="{{ route('admin.Area.show',[$area->id]) }}" class="btn btn-info btn-xs btn-icon">
            <i class="fa fa-eye"></i>
          </a>
          <a href="{{ route('admin.Area.edit',[$area->id]) }}" class="btn btn-default btn-xs btn-icon">
            <i class="fa fa-pencil-square-o"></i>
          </a>
          <a href="" class="btn btn-danger btn-xs btn-icon">
            <i class="fa fa-times"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
