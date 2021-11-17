<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr class="abc1" >{{--style="display:none;"--}}
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
        <tr class="abc" >{{--style="display:none;"--}}
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
<script src="{{ asset('js/admin/pagination.js') }}"></script>
<script src="{{ asset('js/admin/product/pagiproductadmin.js') }}"></script>
