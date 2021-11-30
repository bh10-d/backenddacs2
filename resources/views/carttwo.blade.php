@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection


@section('body')


<h3><a href="{{URL::to('/')}}">trang chu</a> > gio hang</h3>



<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:30%">Product</th>
            <th style="width:10%">Name</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <form action="">
        @csrf
        <tbody>


            @php $total = 0 @endphp
            @if(Session::get('cart'))
            @foreach(Session::get('cart') as $id => $details)
            @php $total = $details['product_price'] @endphp

            


            <input data-id_cart="{{ $details['product_id'] }}" type="hidden" value="{{ $details['product_price'] }}" id="cart_two_product_price" class="cart_two_product_price_{{ $details['product_id'] }}">
            {{-- $id --}}

            

            <tr class="tr-select" data-id="{{ $details['product_id'] }}">
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="" width="100" height="100" class="img-responsive" />{{ $details['product_image'] }}</div>
                        <div class="col-sm-9">
                            <h4 class="nomargin"> </h4>
                        </div>
                    </div>
                </td>
                <td data-th="Title"> {{ $details['product_title'] }} </td>
                <td id="price-cart" data-th="Price" class="price">{{ $details['product_price'] }}</td>
                
                <input class="rest-qty" data-th="restQty" type="hidden" value="{{ $details['product_rest_qty'] }}">

                <td data-th="Quantity">
                    <input min="1" max="100" type="number" value="{{ $details['product_qty'] }}" class="form-control quantity update-cart" />{{--cho nay co value 1--}}
                </td>
                <td data-th="Subcart" class="text-center sub-cart">{{$details['product_price'] * $details['product_qty']}}</td>
                <td class="actions" data-th="">
                   <button id="remove-from-cart" class="btn btn-danger btn-sm btn-test" value="{{$id}}"><i class="fas fa-trash-alt"></i></button>{{-- class cua i fa fa-trash-o--}}
                </td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </form>

</table>
<input type="button" value="Back" onclick="goBack()">
<input type="button" value="Đi tới thanh toán" onclick="topurchase()">
@endsection

@section('script')
<script type="text/javascript">
    $(".btn-test").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: "{{ route('remove.from.cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    'id': ele.parents("tr").attr("data-id"),
                },
                success: function(response) {
                    $("tr[data-id='" + ele.parents("tr").attr("data-id") + "']").remove();
                },
                error: function(response) {
                    console.log(response);
                    console.log(response['id']);
                }
            });
        }
    });


    $(".update-cart").change(function() {
        let id_chan = $(this).parents("tr").attr("data-id");
        let price = $(this).parents("tr").find(".price").text();
        let rest_qty = $(this).parents("tr").find(".rest-qty").val();
        let price_hidden = $(this).parents("tr").find(".price_hidden").text();
        let qty = $(this).parents("tr").find(".quantity").val();
        let _token = $('input[name="_token"]').val();
        let test = $("tr[data-id='" + $(this).parents("tr").attr("data-id") + "']>.sub-cart");
        let lua = $('.hieu-test');
        let tach = '';
        // for (var i = 0; i < price.length; i++) {
        //     if (price[i] !== ',') {
        //         tach += price[i];
        //     }
        // }
        let subtotal = price * qty;

        console.log('sub-total: ', subtotal);
        console.log('price: ', price);
        console.log('price_hidden: ', price_hidden);


        if( parseInt(qty,10) > parseInt(rest_qty,10) ){
            if(confirm("chi con "+rest_qty)){
                $(this).parents("tr").find(".quantity").val(1);
                qty = $(this).parents("tr").find(".quantity").val();
                
            
            }
            else{
                $(this).parents("tr").find(".quantity").val(1);
                qty = $(this).parents("tr").find(".quantity").val();
                
            }
            
        }

        
        $.ajax({
            url: "{{ url('/update-cart-ajax') }}",
            method: "post",
            data: {
                _token: _token,
                'id': $(this).parents("tr").attr("data-id"),
                'qty': qty
            },
            success: function(response) {
                test.html(subtotal);
                lua.html(qty);
                console.log('quantity: ', qty);
                console.log('rest_quan:',rest_qty);
            },
            error: function(response) {
                console.log("error change:"+response)
            }
        });
    });


    $(".update-cart").keyup(function() {
        let price = $(this).parents("tr").find(".price").text();
        let qty = $(this).parents("tr").find(".quantity").val();
        let rest_qty = $(this).parents("tr").find(".rest-qty").val();
        let test = $("tr[data-id='" + $(this).parents("tr").attr("data-id") + "']>.sub-cart");
        let lua = $('.hieu-test');
        let _token = $('input[name="_token"]').val();
        let subtotal = price * qty;


        // console.log('sub-total: ', subtotal);
        // console.log('price: ', price);
        test.html(subtotal);
        let hieupro = 1;


        if( parseInt(qty,10) > parseInt(rest_qty,10) ){
            if(confirm("chi con "+rest_qty)){
                $(this).parents("tr").find(".quantity").val(1);
                qty = $(this).parents("tr").find(".quantity").val();
                
            
            }
            else{
                $(this).parents("tr").find(".quantity").val(1);
                qty = $(this).parents("tr").find(".quantity").val();
                
            }
            
        }
        $.ajax({
            url: "{{ route('update.cart.ajax') }}",
            method: "post",
            data: {
                _token: _token,
                'id': $(this).parents("tr").attr("data-id"),
                'qty': qty
            },
            success: function(response) {
                test.html(subtotal);
                lua.html(qty);
                console.log('quantity: ', qty);
                console.log('rest_qty:',rest_qty);
            },
            error: function(response) {
                console.log(response)
            }
        });
        
    });

    function goBack() {
        window.history.back();
    }

    function topurchase() {
        window.location.href = '/thanhtoan';
    }
</script>

@endsection