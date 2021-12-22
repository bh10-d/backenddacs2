@extends('layouts.app')


@section('link')

@endsection


@section('body')


<div style="width:67% !important; margin:0 auto 0 !important;">
    <div style="font: size 15px;border-bottom: 1px solid #e4e4e4;padding:20px 0;">
        <a href="{{ url('/') }}" style="text-decoration:none;color:black;">Trang chủ</a> <span
            style="font-weight:700;"><i class="fas fa-angle-right"></i></span> <a class="redirect"
            style="text-decoration:none;color:#e74c3c;" href="{{ url('/search') }}">Tất cả sản phẩm</a>
    </div>
</div>
<!-- <section class="section-banner2" style="margin-bottom: 40px;">
    <div class="container-banner2">
        <img src="{{asset('image/banner2.png')}}" alt="">
    </div>
</section> -->
<section class="section-banner2">
    <div class="container-banner2">
        <form action="">
            @csrf
            <div style="display:grid; grid-template-columns: repeat(5,20%); text-align:center">
                <span style="border: 1px solid black"><a href="#" name="iphone" onclick="option(this);"><img src="/image/logoiphonepng.png" alt="logoIphone" style="width: 40%;padding-top: 15px;"></a></span>
                <span style="border: 1px solid black;border-left:none;"><a href="#" name="samsung" onclick="option(this)"><img src="/image/logosamsung.png" alt="logoSamsung" style="width: 40%;"></a></span>
                <span style="border: 1px solid black;border-left:none"><a href="#" name="xiaomi" onclick="option(this)"><img src="/image/logoxiaomi.png" alt="logoXiaomi" style="width: 40%;padding-top:12px"></a></span>
                <span style="border: 1px solid black;border-left:none"><a href="#" name="oppo" onclick="option(this)"><img src="/image/logooppo2.png" alt="logoOppo" style="width: 50%;padding-top:15px"></a></span>
                <span style="border: 1px solid black;border-left:none"><a href="#" name="asus" onclick="option(this)"><img src="/image/logoasus2.png" alt="logoAsus" style="width: 30%;"></a></span>
            </div>
    </form>
    </div>
</section>
<div class="section-category1">
    <h2 class="top-section-cate1">Sản phẩm nổi bật</h2>
    <div id="container-img-all">
        <div
            class="container-category1 list">
            @foreach($products as $value)
            <div class="card-cate list-element" style="display:none;" onclick="window.location.href='{{ URL::to('/detail-product/'.$value->id) }}'">
                <div class="container-img">
                    <img src="image/ipad-pro.jpg" alt="Avatar">
                </div>
                <div class="container">
                    <p><a href="detail-product/{{$value->id}}"
                            style="text-decoration: none;">{{$value->productname}}</a></p>
                    <h5 style="color:#e74c3c">{{$value->price}}đ</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="text-center mt-4">
        <div id="loadmore" class="btn btn-outline-danger">Xem thêm</div>
    </div>
</div>
@endsection


@section('script')
<script>
    //loadmoreproduct
    const loadmore = document.querySelector('#loadmore');
    let currentItems = 10;
    function moreproduct() {
        loadmore.removeAttribute("style");
        currentItems = 10;
        const firstLoad = [...document.querySelectorAll('.list .list-element')];
        for (let i = 0; i < 15; i++) {
            if (firstLoad[i]) {
                firstLoad[i].style.display = 'block';
            }
        }
        // console.log(firstLoad);
    }
    moreproduct();
    loadmore.addEventListener('click', (e) => {
        const elementList = [...document.querySelectorAll('.list .list-element')];
        for (let i = currentItems; i < currentItems + 10; i++) {
            if (elementList[i]) {
                elementList[i].style.display = 'block';
            }
        }
        currentItems += 10;
        if (currentItems >= elementList.length) {
            event.target.style.display = 'none';
        }
    })
    //search
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
                    // console.log(data_key);
                    $('#container-img-all').html(data);
                    moreproduct();
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
                    // console.log(data_key);
                    $('#container-img-all').html(data);
                    moreproduct();
                }
            })
        }
    })
    //choosemenu
    function option(data) {
        // let dataa = data.name;
        let _token = $('input[name="_token"]').val();
        $.ajax({
                url: "{{ url('/search-ajax') }}",
                method: "POST",
                data: {
                    query: data.name,
                    _token: _token
                },
                success: function(data) {
                    // console.log(data.name);
                    $('#container-img-all').html(data);
                    moreproduct();
                }
            })
        console.log(data.name);
    }
</script>
@endsection