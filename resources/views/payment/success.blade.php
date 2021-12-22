<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/payment/successfully.css') }}">
    <title>Thanh toán thành công</title>
</head>
<body>
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Thành công</h1>
        <p>Bạn đã mua hàng thành công<br/> in hóa đơn
            <a target="__blank" href="{{ URL::to('/render-bill') }}">tại đây!</a>{{--chức năng in hóa đơn của dũng--}}
        </p>
        <div class="info">
            @if(isset($data))
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Đơn hàng đã thanh toán # </td>
                    <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> 2345678 </td>
                </tr>
                @php $total=0; $ele=0 @endphp
                @foreach($data as $id => $details)
                    <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> {{$details['product_title']}} ({{$details['product_qty']}}) </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> {{$details['product_price']}} </td>
                    </tr>
                    @php $ele=$details['product_price'] * $details['product_qty']; $total+=$ele; @endphp
                @endforeach
            </table>
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> Tổng cộng </td>
                    @if (isset($coupon))
                    @if($coupon->condition==0)
                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> {{ $total-$total*$coupon->price/100 }} </td>
                    @elseif($coupon->condition==1)
                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> {{ $total-$coupon->price }} </td>
                    @else
                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> {{ $total }} </td>
                    @endif
                    @else
                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> {{ $total }} </td>
                    @endif
                </tr>
            </table>
            @endif
        </div>
        <button class="e-card" onclick="window.location='/'"><p>Quay về cửa hàng</p></button>
    </div>
</body>
</html>