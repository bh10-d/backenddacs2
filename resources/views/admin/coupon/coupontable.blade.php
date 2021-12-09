<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr class="abc1">
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng mã</th>
            <th>Điều kiện chi tiết</th>
            <th>Số giảm</th>
            <th>Chỉnh sửa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coupons as $coupon)
        <tr>
            <td>{{ $coupon->name }}</td>
            <td>{{ $coupon->coupon }}</td>
            <td>{{ $coupon->quantity }}</td>
            @if( $coupon->condition == 0 )
            <td>Giảm giá theo phần trăm</td>
            <td>{{ $coupon->price }}%</td>
            @else
            <td>Giảm giá theo số tiền</td>
            <td>{{ $coupon->price }}đ</td>
            @endif
            <td><button class="btn btn-outline-info" data-id="{{ $coupon->id }}" onclick="edit(this)">Chỉnh sửa</button>|<button class="btn btn-outline-danger" data-id="{{ $coupon->id }}" onclick="deletef(this)">Xóa</button></td>
        </tr>
        @endforeach
    </tbody>
</table>