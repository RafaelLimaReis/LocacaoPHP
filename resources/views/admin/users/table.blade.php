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
          {{Form::open(['route' => ['admin.User.destroy', $user->id],'method' =>'delete'] )}}
          <div class="btn-group">
            <a class="btn btn-info btn-xs btn-icon" href="{{ route('admin.User.show',[$user->id]) }}">
              <i class="fa fa-eye"></i>
            </a>
            <a class="btn btn-default btn-xs btn-icon" href="{{ route('admin.User.edit',[$user->id])}}">
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
