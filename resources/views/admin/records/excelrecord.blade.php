<table>
    <thead>
    <tr>
        <th><strong>N°</strong></th>
        <th><strong>Solución</strong></th>
        <th><strong>Nombres</strong></th>
        <th><strong>Email</strong></th>
        <th><strong>Empresa</strong></th>
        <th><strong>País</strong></th>
        <th><strong>Fecha de registro</strong></th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $record->item_solution->name }}</td>
            <td>{{ $record->name }} {{ $record->lastname }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->company }}</td>
            <td>{{ $record->country }}</td>
            <td>{!! \Carbon\Carbon::parse($record->created_at)->format('d/m/Y H:i:s') !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>