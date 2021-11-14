@extends('layouts.app')


@section('link')

@endsection


@section('body')

<div id="container-img-all">

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