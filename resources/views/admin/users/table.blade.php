<table class="table table-condensed">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Nome de Usuario</th>
      <th>Tipo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{!! $user->name !!}</td>
        <td>{!! $user->email !!}</td>
        <td>{!! $user->username !!}</td>
        <td>{!! $user->present()->type !!}</td>
      </tr>
    @endforeach
  </tbody>
</table>
