<table class="table table-condensed">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Tipo</th>
      <th colspan="3">Opção</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{!! $user->name !!}</td>
        <td>{!! $user->email !!}</td>
        <td>{!! $user->present()->type !!}</td>
        <td>
          <a class="btn btn-info btn-xs btn-icon" href="{{ route('admin.User.show',[$user->id]) }}">
            <i class="fa fa-eye"></i>
          </a>
          <a class="btn btn-default btn-xs btn-icon">
            <i class="fa fa-pencil-square-o"></i>
          </a>
          <a class="btn btn-danger btn-xs btn-icon">
            <i class="fa fa-times"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
