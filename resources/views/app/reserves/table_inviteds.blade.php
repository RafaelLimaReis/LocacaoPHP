<table class="table table-condensed mar-top">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inviteds as $invited)
        <tr>
            <td>{!! $invited->name !!}</td>
            <td>{!! $invited->cpf !!}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>