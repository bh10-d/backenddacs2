<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $row)
        <tr class="usertable">
            <td>{{ $row->id }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->password }}</td>
            <td><a href="#"><i class="fas fa-user-cog"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        let producthieu = document.getElementsByClassName("usertable");
        let arr = [];
        const obj = [];
        for (let i = 0; i < producthieu.length; i++) {
            arr.push(producthieu[i].getElementsByTagName('td'));
            id = arr[i][0].innerHTML;
            username = arr[i][1].innerHTML;
            password = arr[i][2].innerHTML;
            obj.push({
                id,
                username,
                password,
            });
        }
        // console.log(product);
        // console.log(obj);
        // console.log("js product da in ra");
        function simpleTemplating(data) {
            var html = '<table class = "table table-bordered" width = "100%" cellspacing = "0" >';
            html += `<tr>
                <th>id</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Tùy chọn</th>
            </tr>`;
            $.each(data, function(index, data) {
                // var encodedStr = data.description;
                // var decoded = $("<div/>").html(encodedStr).text();
                html += `<tr>`;
                html += `<td>${data.id}</td>`;
                html += `<td>${data.username}</td>`;
                html += `<td>${data.password}</td>`;
                html += `<td><a href="test/${data.detail}"><i class="far fa-eye"></i></a></td>`;
                html += `</tr>`;
            });
            html += '</table>';
            return html;
        }

        function launcher() {
            $('#userr').pagination({ //#demo
                dataSource: obj,
                // className: 'paginationjs-theme-blue paginationjs-small',
                pageSize: 5,
                showGoInput: true,
                showGoButton: true,
                callback: function(data, pagination) {
                    var html = simpleTemplating(data);
                    $('#user').html(html); //#data-container
                }
            });
        }
        launcher();
    })
</script>