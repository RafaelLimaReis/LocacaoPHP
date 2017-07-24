<table class="table table-condensed">
    <thead>
        <tr>
            <th>Data</th>
            <th>Area</th>
            <th>Hora Inicio</th>
            <th>Hora Fim</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reserves as $reserve)
        <tr>
            <td>{{$reserve->date}}</td>
            <td>{{$reserve->name}}</td>
            <td>{{$reserve->hour_start}}</td>
            <td>{{$reserve->hour_end}}</td>
            <td>
                <a href="{{route('admin.inviteds.show',[$reserve->id])}}" class="btn btn-info btn-xs fa fa-search"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>