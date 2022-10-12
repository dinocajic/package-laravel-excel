<table>
    <thead>
    <tr>
        <th><strong>Full Name</strong></th>
        <th><strong>Email</strong></th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
