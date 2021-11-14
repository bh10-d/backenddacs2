<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Styles --}}
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">// -->

    {{-- css of dung --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/glider.min.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- css of summary --}}
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/number.css')}}">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    {{-- sweetalert --}}
    <link href="{{asset('css/sweetalert.css')}}">

    @yield('link')

    {{-- css of hieu --}}
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    @include('header')
    @yield('body')

    
    <script type="text/javascript" src="{{asset('js/number.js')}}"></script>
    @yield('script')

    <script src="{{asset('js/sweetalert.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //them vao gio hang
            $(".add-to-cart").click(function() {
                let id = $(this).data("id_product");
                let cart_product_id = $('.cart_product_id_' + id).val();
                let cart_product_title = $('.cart_product_title_' + id).val();
                let cart_product_price = $('.cart_product_price_' + id).val();
                let cart_product_qty = $('.cart_product_qty_' + id).val();

                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ url('/add-cart-ajax') }}",
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_title: cart_product_title,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        // $("#price-cart").html("ahihi");
                        window.location.href = "{{url('/cart')}}"

                    }

                });
            });
            // di thang toi thanh toan
            $('.purchase').click(function() {
                let id = $(this).data("id_product");
                let cart_product_id = $('.cart_product_id_' + id).val();
                let cart_product_title = $('.cart_product_title_' + id).val();
                let cart_product_price = $('.cart_product_price_' + id).val();
                let cart_product_qty = $('.cart_product_qty_' + id).val();
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ url('/add-cart-ajax') }}",
                    method: "POST",
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_title: cart_product_title,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        // $("#price-cart").html("ahihi");
                        window.location.href = "{{url('/thanhtoan')}}"
                    }
                })
            })
        });
        function cartbutton(){
            window.location.href="{{ url('/cart')}}";
        }
    </script>
    @include('footer')
</body>

</html>