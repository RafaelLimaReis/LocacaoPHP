<table class="table table-condensed">
    <thead>
        <tr>
            <th>Data</th>
            <th>Area Reservada</th>
            <th>Hora Inicio</th>
            <th>Hora Final</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reserves as $reserve)

            @if($reserve->date_reserve >= date("Y-m-d"))
                <tr>
                    <td>{{$reserve->pivot->date_reserve}}</td>
                    <td>{{$reserve->reservesArea->name}}</td>
                    <td>{{$reserve->id_inicio}}</td>
                    <td>{{$reserve->id_fim}}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>