<table class="table table-condensed">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Responsavel</th>
    </tr>
  </thead>
  <tbody>
    @foreach($areas as $area)
      <tr>
        <td>{!! $area->name !!}</td>
        <td>{!! $area->description !!}</td>
        <td>{!! $area->present()->responsible !!}</td>
      </tr>
    @endforeach
  </tbody>
</table>
