<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Thể loại</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Xem chi tiết</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->code }}</td>
            <td>{{ $row->productname }}</td>
            <td>{{ $row->productcate }}</td>
            <td>giá quên tạo cột r</td>
            <td>{!! $row->description !!}</td>
            <td><a href="{{route('test',$row->id)}}"><i class="far fa-eye"></i></a></td>
        </tr>
        @endforeach
        {!! $data->links() !!}
    </tbody>
</table>