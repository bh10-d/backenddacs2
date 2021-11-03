@extends('layouts.app')

@section('body')

<div class="link-detail">
        <a href="{{URL::to('/')}}">trang chu</a>dienthoai
    </div>

    <div class="title">
        <h3>Dien thoai Samsung Galaxy S10+</h3>
    </div>
    
    <div class="product-transaction">
        <div class="slide-product">

        
        <div class="container">
            
            <img id="expandedImg" style="width:100%">
         
            <div id="imgtext"></div>
        </div>

    
        <div class="row">
            <div class="column">
                <img src="./image/galaxy-s10-plus-den-1.png" alt="" onclick="myFunction(this)">
            </div>

            <div class="column">
                <img src="./image/huawei-y7-pro-den-1.png" alt="" onclick="myFunction(this)">
            </div>

            <div class="column">
                <img src="./image/oppoF3.jpg" alt="" onclick="myFunction(this)">
            </div>

            <div class="column">
                <img src="./image/ipad-pro.jpg" alt="" onclick="myFunction(this)">
            </div>
    
 
        </div>
        
        </div>

        @foreach($details as $d)
            <form >
                
                @csrf
                <input type="hidden" value="{{$d->id}}" class="cart_product_id_{{$d->id}}">
                <input type="hidden" value="{{$d->title}}" class="cart_product_title_{{$d->id}}">
                <input type="hidden" value="{{$d->price}}" class="cart_product_price_{{$d->id}}">
                <input type="hidden" value="{{$d->image}}" class="cart_product_image_{{$d->id}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$d->id}}">
                

                <h1>{{$d->image}}</h1>
                <h1>{{$d->title}}</h1>
                <div class="desc-product">

                <h4>{{$d->price}}d</h4>
                <p>Gia thi truong:<s></s></p>
                <p>Tinh trang:Con hang</p>
                <p>Dung luong:</p>
                <button>512gb</button>



                {{--<a href="{{ URL::to('/add-to-cart/' . $d->id) }}">Them gio hang</a>--}}
                <button type="submit" class="add-to-cart" name="add-to-cart" data-id_product="{{$d->id}}">Them gio hang</button>
                </div>
            </form>

        
        @endforeach

    </div>


 
    <div class="tabs">
        <div class="tab-header">
            <div class="active">
                mo ta san pham

            </div>
            <div>
                chinh sach bao hanh

            </div>
            
        </div>


        <div class="tab-indicator"></div>
        <div class="tab-body">
            <div class="active">
                <h2>Mo ta san pham</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, odit sapiente enim possimus quidem quia impedit accusamus facilis dignissimos soluta eaque esse, repellendus minus. Natus eaque asperiores qui debitis explicabo.
                Ratione qui voluptatum obcaecati? Quae ad eveniet aliquid, at repellendus soluta deserunt modi praesentium, beatae corporis labore porro voluptatum! Quasi quidem minus consectetur distinctio sit voluptatum ipsa maiores error quas.
                Amet, dolor quos veniam neque maxime iste illo praesentium similique magnam eum ea, dignissimos accusamus sed cum molestiae consequuntur soluta officia est, laborum laboriosam autem blanditiis dolores error. Nulla, fugit.</p>
            </div>

            <div>
                <h2>Chinh sach bao hanh</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus suscipit, ducimus nesciunt similique eum quibusdam laboriosam accusamus, vel, aliquid cupiditate consectetur! Eaque omnis rerum dolor repellat voluptas nobis, consequatur possimus!
                Perspiciatis exercitationem nemo possimus sit, vitae laboriosam! Voluptatem dignissimos ratione officia, odio recusandae ut ipsam unde maiores, modi illo voluptate sapiente a repudiandae enim consequuntur inventore reiciendis dolores velit debitis.
                Inventore eos libero odit rerum, ad debitis tempore iure voluptatum repellendus vitae omnis necessitatibus qui provident excepturi repellat aspernatur perferendis doloribus magnam nihil dignissimos quo! Pariatur unde omnis mollitia iusto?
                Laudantium doloribus nihil delectus laboriosam iusto accusantium, dignissimos nulla eos. Ducimus repellendus, numquam mollitia vitae molestias pariatur dolor eos excepturi aperiam maxime est quidem distinctio a, rem sit earum placeat?
                Cumque vero quisquam nisi, exercitationem in tempora quasi quam quis nostrum modi, voluptatibus veniam id maxime est praesentium maiores laboriosam aperiam deleniti ea officia? Laborum commodi ipsa at accusantium saepe?
                Repellat quis sed magni nisi ipsum! Qui est at sunt, tempore, debitis neque minus mollitia inventore excepturi similique dolorum. Quod perspiciatis libero repellat tempore rem eius obcaecati labore voluptas consequatur?
                Maiores optio quasi illum voluptates sit consequuntur, dolores labore adipisci quis itaque voluptatem aspernatur eius, possimus modi beatae magni quod? Debitis rerum tempora nisi deserunt fugit voluptatem tenetur veritatis fuga!
                Iure, exercitationem voluptatibus. Similique natus minus tempore nihil aliquam, possimus quam impedit maiores reiciendis obcaecati optio quibusdam quidem officia eaque. Vero nihil minus maxime officiis accusantium, maiores quaerat incidunt rem!</p>
            
            
            </div>

            

        </div>
        </div>

        

@endsection

@section('script')

<script src="detailproduct.js"></script>

@endsection
