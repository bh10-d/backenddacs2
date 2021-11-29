<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Tổng tiền</th>
            <th>Chi tiết đơn hàng</th>
            <th>Tình trạng đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        @if($check != 0)
        @foreach($orders as $order)
        <tr class="ordertable">
            <td>{{$order->NameUser}}</td>
            <td>0{{$order->PhoneUser}}</td>
            <td>{{$order->totalprice}}</td>
            <td><span class="label-show-details" onclick="showDetails(this)" data-id="{{$order->CodeOrder}}"><i class="far fa-eye"></i></span></td><!-- <td>{{$order->CodeOrder}}</td> -->
            <!-- <td>Chấp nhận | Không chấp nhận</td> -->
            <td><button onclick="accept(this)" data-id="{{$order->CodeOrder}}" value="Chấp nhận" class="btn btn-outline-success">Chấp nhận</button> | <button onclick="notaccept(this)" data-id="{{$order->CodeOrder}}" value="Không chấp nhận" class="btn btn-outline-info">Không chấp nhận</button> | <button onclick="deleteorder(this)" data-id="{{$order->CodeOrder}}" value="Hủy đơn hàng" disabled class="btn btn-outline-danger">Hủy đơn hàng</button></td>
        </tr>
        <tr class="showdetail" data-id="{{$order->CodeOrder}}"><!--showdetail-->
            <td colspan="4">
                <div class="text-left ">
                    <p>Mã đơn hàng: <strong>{{$order->CodeOrder}}</strong></p>
                    <p>Tên khách hàng: <strong>{{$order->NameUser}}</strong></p>
                    <table class="table table-bordered " id="dataTable " width="100% " cellspacing="0 " style="background-color:#d9d9d9 ">
                        <tr>
                            <td>Số thứ tự</td>
                            <td>Tên sản phẩm</td>
                            <td>Số lượng sản phẩm</td>
                            <td>Giá</td>
                        </tr>
                        @php $num = 1; @endphp
                        @foreach($order->productlist as $product)
                        <tr class="ordershowdetail{{$order->CodeOrder}}" data-show="{{$order->CodeOrder}}">
                            <td>{{$num}}</td>
                            <td>{{$product->NameProduct}}</td>
                            <td>{{$product->Quantity}}</td>
                            <td>{{$product->Price}}</td>
                        </tr>
                        @php $num++; @endphp
                        @endforeach
                    </table>
                    <div style="float:right ">
                        <table class="hieu-disable">
                            <tr>
                                <td class="text-right ">Tổng tiền:</td>
                                <td class="text-left "><strong>{{$order->totalprice}}</strong></td>
                            </tr>
                            <tr>
                                <td class="text-right ">Phương thức thanh toán:</td>
                                <td class="text-left "><strong>COD</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
            <td>
                @if($order->Status=='Đang xử lý')
                <p class="text-warning">{{$order->Status}}</p>
                @elseif($order->Status=='Chấp nhận')
                <p class="text-success">{{$order->Status}}</p>
                @else
                <p class="text-info">{{$order->Status}}</p>
                @endif
                <p>chú thích: nếu bấm nút chấp nhận thì sẽ hiện đã chấp nhận không thì ngược lại</p>
                <p>và mặc định khi khách vừa mua hàng xong thì trạng thái sẽ là đang xử lý</p>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5">Hiện chưa có đơn hàng nào</td>
        </tr>
        @endif
    </tbody>
</table>
<!-- <script>
    $(document).ready(function() {
        let producthieu = document.getElementsByClassName("ordertable");
        let arr = [];
        const obj = [];
        for (let i = 0; i < producthieu.length; i++) {
            arr.push(producthieu[i].getElementsByTagName('td'));
            name = arr[i][0].innerHTML;
            phone = arr[i][1].innerHTML;
            totalprice = arr[i][2].innerHTML;
            iduser = arr[i][3].innerHTML;
            obj.push({
                name,
                phone,
                totalprice,
                iduser
            });
        }



        let test = document.getElementsByClassName("ordershowdetail1");
        let arr1 = [];
        
        for (let i = 0; i < test.length; i++) {
            // arr1.push(test[i].getElementsByTagName('td'));
            arr1[i] = test[i].getElementsByTagName('td');
            // name = arr[i][0].innerHTML;
            // phone = arr[i][1].innerHTML;
            // totalprice = arr[i][2].innerHTML;
            // iduser = arr[i][3].innerHTML;
            
        }


        console.log(arr1);




        function simpleTemplating(data) {
            var html = '<table class = "table table-bordered" width = "100%" cellspacing = "0" >';
            html += `<tr>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Chi tiết đơn hàng</th>
            </tr>`;
            $.each(data, function(index, data) {
                // var encodedStr = data.description;
                // var decoded = $("<div/>").html(encodedStr).text();
                html += `<tr>`;
                html += `<td>${data.name}</td>`;
                html += `<td>${data.phone}</td>`;
                html += `<td>${data.totalprice}</td>`;
                html += `<td><span class="label-show-details" onclick="showDetails(this)" data-id="${data.iduser}"><i class="far fa-eye"></i></span></td>`;
                html += `</tr>`;
                html += `<tr class="showdetail" data-id="${data.iduser}">`;
                html += `<td colspan="4">
                            <div class="text-left">
                                <p>Mã đơn hàng: <strong>${data.iduser}</strong></p>
                                <p>Tên khách hàng: <strong>${data.name}</strong></p>
                                <p>Số điện thoại: <strong>${data.phone}</strong></p>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#d9d9d9">
                                    <tr>
                                        <td>Số thứ tự</td>
                                        <td>Tên sản phẩm</td>
                                        <td>Số lượng sản phẩm</td>
                                        <td>Giá</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Iphone 13 Promax</td>
                                        <td>1</td>
                                        <td>30.000.000</td>
                                    </tr>
                                </table>
                                <div style="float:right ">
                                    <table class="hieu-disable">
                                        <tr>
                                            <td class="text-right">Tổng tiền:</td>
                                            <td class="text-left"><strong>${data.totalprice}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Phương thức thanh toán:</td>
                                            <td class="text-left"><strong>COD</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>`;
                html += `</tr>`
            });
            html += '</table>';
            return html;
        }

        function launcher() {
            $('#orderr').pagination({
                dataSource: obj,
                // className: 'paginationjs-theme-blue paginationjs-small',
                pageSize: 5,
                showGoInput: true,
                showGoButton: true,
                callback: function(data, pagination) {
                    var html = simpleTemplating(data);
                    $('#order').html(html);
                }
            });
        }
        launcher();

        function showDetails(animal) {
            var animalType = animal.getAttribute("data-id");
            var hieu = document.querySelector("tr[data-id='" + animalType + "']");
            hieu.classList.toggle("showdetail");
        }
    })
</script> -->
<script>
    function showDetails(animal) {
            var animalType = animal.getAttribute("data-id");
            var hieu = document.querySelector("tr[data-id='" + animalType + "']");
            hieu.classList.toggle("showdetail");
        }
</script>