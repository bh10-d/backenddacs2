@extends('layouts.app')


@section('link')

@endsection


@section('body')


<div style="width:67% !important; margin:0 auto 0 !important;">
    <div style="font: size 15px;border-bottom: 1px solid #e4e4e4;padding:20px 0;">
        <a href="{{ url('/') }}" style="text-decoration:none;color:black;">Trang chủ</a> <span
            style="font-weight:700;"><i class="fas fa-angle-right"></i></span> <a class="redirect"
            style="text-decoration:none;color:#e74c3c;" href="{{ route('login') }}">Tất cả sản phẩm</a>
    </div>
</div>

<div style="width:67% !important; margin:0 auto 0 !important;">
    <h2 style="margin-top:20px;">Tất cả sản phẩm</h2>
    <div id="container-img-all">
        <div
            style="width:100% !important;margin:40px auto; display: flex !important; flex-direction:row !important; flex-wrap: wrap !important;">
            @foreach($products as $value)
            <div style="width: 250px !important; border: 1px solid #c4c4c4 !important;" onclick="window.location.href='{{ URL::to('/detail-product/'.$value->id) }}'">
                <div style="width: 100%;">
                    <img style="width:100%; height: auto;" src="image/ipad-pro.jpg" alt="Avatar">
                </div>
                <div style="margin-left:20px;">
                    <p><a href="detail-product/{{$value->id}}"
                            style="text-decoration: none;">{{$value->productname}}</a></p>
                    <h5 style="color:#e74c3c">{{$value->price}}đ</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<section class="section-banner2" style="margin-bottom: 40px;">
    <div class="container-banner2">
        <img src="{{asset('image/banner2.png')}}" alt="">
    </div>
</section>


@endsection


@section('script')
<script>
$('#search-input').keyup(function() {
    let data_key = $(this).val();


    if (data_key != '') {
        let _token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{ url('/search-ajax') }}",
            method: "POST",
            data: {
                query: data_key,
                _token: _token
            },
            success: function(data) {
                console.log(data_key);

                $('#container-img-all').html(data);
            }


        })
    } else {
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ url('/show-all') }}",
            method: "POST",
            data: {
                query: data_key,
                _token: _token
            },
            success: function(data) {
                console.log(data_key);

                $('#container-img-all').html(data);
            }


        })

    }

})
</script>
@endsection