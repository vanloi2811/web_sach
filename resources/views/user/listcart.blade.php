@extends('layouts.appuser')

@section('content')

<div class="container my-5">
    <div class="card shadow sach_data">
        <div class="card-body">
            @if(count($carts) > 0)
                @foreach($carts as $cart)
                    <div class="row">
                        <input type="hidden" class="id_cart" value="{{$cart->id}}">
                        <div class="col-md-2">
                            <img src="/storage/images/{{$cart->Img_Sach}}" alt="">
                        </div>
                        <div class="col-md-4">
                            <h3> {{ $cart->TenSach }} </h3>
                        </div>
                        <div class="col-md-2">
                            <h4> {{ number_format($cart->GiaBan) }} vnđ </h4>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group quantity">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-subtract" type="button">-</button>
                                </span>
                                <input type="text" class="form-control no-padding text-center sach_quantity" value={{$cart->sach_quantity}}>
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-add" type="button">+</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <!-- <button><i class="fas fa-trash" style="color:red"></i></button> -->
                            <form action="{{route('user.deletecart', $cart->id)}}" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-sm show-confirm" type="submit" data-toggle="tooltip" title='Delete'>
                                    <i class="fas fa-trash">
                                    </i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 style="text-align:center">Không có sản phẩm để đặt hàng</h3>
            @endif
        </div>
        <div class="cart-od-total">
            <form action="{{route('ordercart')}}" method="POST">
                @csrf
                <div>
                    <button type="submit">Đặt Hàng</button>
                </div>
                <div>
                    <label for="" name="total">Tổng Tiền : {{$total}}</label>
                    <input type="hidden" name="total" value="{{$total}}">
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    img {
        width: 70px;
        height: 70px;
    }

    .row {
        margin-bottom: 5px;
    }

    .cart-od-total {
        margin-left: 10px;
    }
</style>

<script>
        // //tăng giảm số lượng
        // var minus = document.querySelector(".btn-subtract")
        // var add = document.querySelector(".btn-add");
        // var quantityNumber = document.querySelector(".sach_quantity");
        // console.log(quantityNumber);
        // var currentValue = 1;

        // add.addEventListener("click", function() {
        //     currentValue += 1;
        //     quantityNumber.value = currentValue;
        //     console.log(currentValue);
        // });

        // minus.addEventListener("click", function(){
        //     if(currentValue > 1)
        //     {
        //         currentValue -= 1;
        //         quantityNumber.value = currentValue;
        //         console.log(currentValue)
        //     }
            
        // });


    $(document).ready(function () {
        // console.log('hi');

        $('.btn-add').click(function (e) {
            const id = document.querySelector(".id_cart");
            // console.log('+');
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.sach_quantity').val();
            // console.log(incre_value);
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.sach_quantity').val(value);
                //update quantity to cart
                //axios.patch('cart/${id}')
            }
        });

        $('.btn-subtract').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.sach_quantity').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.sach_quantity').val(value);
            }
        });

    });


    //đặt hàng
    // $(document).ready(function(){
    //             $('.addToCartBtn').click(function(e){
    //                 e.preventDefault();

    //                 $.ajaxSetup({
    //                     headers: {
    //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                     }
    //                 });

    //                 $.ajax({
    //                     method: "POST",
    //                     url: "{{ route('addtocart') }}",
    //                     data: {
    //                         'sach_id': sach_id,
    //                         'sach_qty': sach_qty,
    //                     },
    //                     success: function(response) {
    //                         // window.location.href = "/paymentsuccess/" + sach_id;
    //                         alert(response.status);
    //                     }
    //                 });
    //             });
    //         });

</script>

@endsection