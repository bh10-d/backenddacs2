<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr class="abc1">{{--style="display:none;"--}}
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Thể loại</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Xem chi tiết</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $m)
        <tr class="abc">{{--style="display:none;"--}}
            <td>{{$m->code}}</td>
            <td>{{$m->productname}}</td>
            <td>{{$m->productcate}}</td>
            <td>giá quên tạo cột rồi</td>
            <td>{!! $m->description !!}</td>
            <td>{{$m->id}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        let producthieu = document.getElementsByClassName("abc");
        let arr = [];
        const obj = [];
        for (let i = 0; i < producthieu.length; i++) {
            arr.push(producthieu[i].getElementsByTagName('td'));
            code = arr[i][0].innerHTML;
            namepro = arr[i][1].innerHTML;
            cate = arr[i][2].innerHTML;
            price = arr[i][3].innerHTML;
            description = arr[i][4].innerHTML;
            detail = arr[i][5].innerHTML;
            obj.push({
                code,
                namepro,
                cate,
                price,
                description,
                detail
            });
        }
        // console.log(product);
        // console.log(arr[1]);
        // console.log("js product da in ra");
        function simpleTemplating(data) {
            var html = '<table class = "table table-bordered" width = "100%" cellspacing = "0" >';
            html += `<tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Thể loại</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Xem chi tiết</th>  
            </tr>`;
            $.each(data, function(index, data) {
                var encodedStr = data.description;
                var decoded = $("<div/>").html(encodedStr).text();
                html += `<tr>`;
                html += `<td>${data.code}</td>`;
                html += `<td>${data.namepro}</td>`;
                html += `<td>${data.cate}</td>`;
                html += `<td>${data.price}</td>`;
                html += `<td>${data.description}</td>`;
                html += `<td><a href="test/${data.detail}"><i class="far fa-eye"></i></a></td>`;
                html += `</tr>`;
            });
            html += '</table>';
            return html;
        }

        function launcher() {
            $('#demo').pagination({ //#demo
                dataSource: obj,
                // className: 'paginationjs-theme-blue paginationjs-small',
                pageSize: 5,
                callback: function(data, pagination) {
                    var html = simpleTemplating(data);
                    $('#product').html(html); //#data-container
                }
            });
        }
        launcher();
    })
</script>