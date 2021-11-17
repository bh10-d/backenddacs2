function product(){
                $.ajax({
                    url: "{{route('producttable')}}",
                    method: "get",
                    success: function(data) {
                        $('#product').html(data);
                        // console.log(data);
                    }
                });
            };
            product();






            
// $('#product').html(data); //#datatest