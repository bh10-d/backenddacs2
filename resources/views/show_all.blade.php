@extends('layouts.app')


@section('link')

@endsection


@section('body')

<div id="container-img-all">
    <div style="width:90% !important;margin:80px auto; display: flex !important; flex-direction:row !important; flex-wrap: wrap !important;" >
    @foreach($products as $value)
    <div style="width: 250px !important; border: 1px solid #000 !important;">
                            <div style="width: 100%;">
                                <img style="width:100%; height: auto;" 
                                src="image/ipad-pro.jpg" alt="Avatar">
                            </div>
                            
                            <h4><a href="detail-product/{{$value->id}}">{{$value->productname}}</a></h4> 
                            <p>{{$value->price}}'d</p> 
                        </div>


    @endforeach
    </div>
</div>

@endsection


@section('script')
<script>
$('#search-input').keyup(function () {
    let data_key = $(this).val();
        

    if(data_key != ''){
        let _token = $('input[name="_token"]').val();
        
        $.ajax({
            url:"{{ url('/search-ajax') }}",
            method: "POST",
            data: {query:data_key, _token:_token},
            success: function(data) {
                console.log(data_key);
                
                $('#container-img-all').html(data);
            }


        })
    }else{
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ url('/show-all') }}",
            method: "POST",
            data: {query:data_key, _token:_token},
            success: function(data) {
                console.log(data_key);
                
                $('#container-img-all').html(data);
            }


        })
        
    }

})

</script>
@endsection