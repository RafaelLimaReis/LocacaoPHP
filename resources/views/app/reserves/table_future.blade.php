<table class="table table-condensed">
    <thead>
        <tr>
            <th>Data</th>
            <th>Area Reservada</th>
            <th>Hora Inicio</th>
            <th>Hora Final</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reserves as $reserve)
            @if($reserve->pivot->date >= date("Y-m-d"))
                <tr>
                    <td>{{$reserve->present()->reserve}}</td>
                    <td>{{$reserve->name}}</td>
                    <td>{{$reserve->pivot->hour_start}}</td>
                    <td>{{$reserve->pivot->hour_end}}</td>
                    <td>
                        <a href="{{route('app.reserves.show',[$reserve->pivot->id])}}" class="btn btn-info btn-labeled fa fa-plus">Adicionar Convidado</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>