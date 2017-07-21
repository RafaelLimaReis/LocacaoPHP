<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cpf</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inviteds as $invited)
        <tr>
            <td>{{$invited->name}}</td>
            <td>{{$invited->cpf}}</td>
        </tr>
        @endforeach
    </tbody>
</table>