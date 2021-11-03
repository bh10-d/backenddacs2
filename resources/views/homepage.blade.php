@extends('layouts.app')

@section('body')
    <section>
        <header>
            <div style="background-color:#f45100; width: 100%;height:100px;">

            </div>
            

        </header>
        
        <div class="container-list-advertise">
            <ul class="list-category">
                <li><span><a href="#"><i class="fas fa-gifts"></i></span>DANH MUC SAN PHAM</a></li>
                <li><span><i class="fas fa-gifts"></i></span>Dien thoai-May tinh bang</li>
                <li><span><i class="fas fa-gifts"></i></span>Laptop-Laptop Gaming</li>
                <li><span><i class="fas fa-gifts"></i></span>May giat-May say</li>
                <li><span><i class="fas fa-gifts"></i></span>Tivi-Loa am thanh</li>
                <li><span><i class="fas fa-gifts"></i></span>Thiet bi van phong</li>
                <li><span><i class="fas fa-gifts"></i></span>Ki thuat so</li>
                <li><span><i class="fas fa-gifts"></i></span>Phu kien</li>
                
                

            </ul>
            <div class="container-img">
                <img src="./image/banner1.png" alt="no image">
            </div>
            

            <ul class="list-advertise">
                <li><span><i class="fas fa-gifts"></i></span>San pham khuyen mai</li>
                <li><span><i class="fas fa-american-sign-language-interpreting"></i></i></span>Doi tra trong 15 ngay</li>
                <li><span><i class="fas fa-shuttle-van"></i></span>Mien phi giao hang toan quoc</li>
                <li><span><i class="fas fa-money-check-alt"></i></span>Thanh toan khi nhan hang</li>
            </ul>
        </div>

    </section>

{{-- flashsale-section --}}
<section class="flashsale-section">
    <a href="#"><i class="fas fa-bolt"></i>FLASH SALE</a>
    <span>00</span>:<span>00</span>:<span>00</span>
   
    
    <div class="row justify-content-center">
        <div class="glider-contain">    
            
        
        <button class="glider-prev">
            <i class="fa fa-chevron-left"></i>
        </button>
     
        <div id="container-carousel-p" class="glider">

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>
        

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>
        

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>
        

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="container-img-product">
                        <img src="{{asset('image/galaxy-s10-plus-den-1.png')}}" alt="">
                    </div>
                    <p class="card-text">Samsung galaxy anime</p>
                    
                </div>
            </div>

            
        </div>
        
        
        <button class="glider-next">
            <i class="fa fa-chevron-right"></i>
        </button>
        
        </div>
    </div>
</section>


<section class="section-category1">
    <div class="top-section-cate1">
        <h2>DIEN THOAI</h2>
        <ul>
            <li>Trang chu</li>
            <li>Gioi thieu</li>
            <li>San pham</li>
            <li>Tin tuc</li>
            <li>Lien he</li>
            <li>Xem tat ca</li>
        </ul>

    </div>
    
    <div class="container-category1">
        @foreach($allproduct as $product)
        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>2
            
            <div class="container">
                
              <h4><a href="{{URL::to('/detail-product/'.$product->id)}}">{{$product->title}}</a></h4> 
              <p>{{$product->price}} d</p> 
            </div>
        </div>
        @endforeach
        

    </div>
</section>

<section class="section-banner2">
    <div class="container-banner2">
        <img src="{{asset('image/banner2.png')}}" alt="">
    </div>
</section>


<section class="section-category1">
    <div class="top-section-cate1">
        <h2>TV</h2>
        <ul>
            <li>Trang chu</li>
            <li>Gioi thieu</li>
            <li>San pham</li>
            <li>Tin tuc</li>
            <li>Lien he</li>
            <li>Xem tat ca</li>
        </ul>

    </div>
    
    <div class="container-category1">
        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            
            <div class="container">
              <h4><b>Ipad pro</b></h4> 
              <p>4.500.000 d</p> 
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
              <h4><b>Ipad pro</b></h4> 
              <p>4.500.000 d</p> 
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
              <h4><b>Ipad pro</b></h4> 
              <p>4.500.000 d</p> 
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
              <h4><b>Ipad pro</b></h4>

              <p>4.500.000 d</p> 
            </div>
        </div>

        <div class="card-cate">
            <div class="container-img">
                <img src="{{asset('image/ipad-pro.jpg')}}" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
              <h4><b>Ipad pro</b></h4> 
              <p>4.500.000 d</p> 
            </div>
        </div>

    </div>
</section>

<section class="last-banner">

    <div class="last-banner-1">
        <img src="./image/banner3-1.png" alt="">
    </div>

    <div class="last-banner-2">
        <img src="./image/banner4-1.png" alt="">
    </div>

</section>



<script src="{{asset('js/glider.min.js')}}"></script>
<script>
    new Glider(document.querySelector('.glider'), {
        slidesToShow: 5,
        

        draggable: true,
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        }

    });



 </script>
<script src="https://kit.fontawesome.com/721d15c2a9.js" crossorigin="anonymous"></script>


@endsection
