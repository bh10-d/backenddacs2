<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>job position</th>
            <th>option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->password }}</td>
            <td>vi tri cong viec</td>
            <td><a href="#"><i class="fas fa-user-cog"></i></a></td>
        </tr>
        @endforeach
        {!! $data->links() !!}
    </tbody>
</table>