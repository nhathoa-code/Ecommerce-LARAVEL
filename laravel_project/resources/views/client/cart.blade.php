<x-clientLayout cssfile="cart.css">
    <main>
        @if(session()->has('cart') && count(session('cart')) > 0 )
        <div id="cart-container">
            <div class="cart-product pb-4">
                @foreach(session('cart') as $key => $item)
                <div class="row cart-item" style="margin-bottom: 5rem;" data-id="{{ $key }}">
                    <div class="col-md-3">
                        <a href="{{ url('product/'.$item['slug']) }}">
                            <img src="{{asset('storage/'. $item['image'].'/main_image.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="name d-flex">
                            <div class="flex-grow-1">
                                <a href="{{ url('product/'.$item['slug']) }}">{{ $item['name'] }}</a>
                            </div>
                            <span class="material-icons delete-item" style="cursor: pointer;">
                                clear
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p class="price">$<span>{{ number_format($item['price'],1,".","") }}</span></p>
                            </div>
                            <div class="col-md-7">
                                <div class="quantity d-flex">
                                    <button class="d-flex align-items-center justify-content-center btn-minus {{ $item['quantity'] == 1 ? 'disabled' : '' }}">
                                        <span class="material-icons minus">
                                            remove
                                        </span>
                                    </button>
                                    <input type="number" readonly name="quantity" class="input-quantity" value="{{ $item['quantity'] }}">
                                    <button class="d-flex align-items-center justify-content-center btn-plus {{ $item['quantity'] == 5 ? 'disabled' : '' }}">
                                        <span class="material-icons plus">
                                            add
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="float-end mt-4">
                            <p class="total">TOTAL: $<span>{{ number_format($item['price']*$item['quantity'],1,".","")  }}</span></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex subtotal">
                <div class="flex-grow-1">
                    <p>SUBTOTAL</p>
                </div>
                <div>
                    <p>$<span id="subtotal">@php
                            $subtotal = 0;
                            foreach(session('cart') as $item){
                            $subtotal += $item['quantity']*$item['price'];
                            }
                            echo number_format($subtotal,1,".","");
                            @endphp</span>
                    </p>
                </div>
            </div>
            <div>
                <a class="btn btn-primary w-100 my-5" href="{{ url('order') }}">Order</a>
            </div>
        </div>
        @else
        <h1 style="margin:10rem 0;text-align:center">Your cart is currently empty!</h1>
        @endif
    </main>
    <x-slot name="script">
        <script>
            $(".cart-item").click(function(e) {
                let id = $(this).data("id");
                if (e.target.classList.contains("plus")) {
                    $("div[data-id=" + id + "] input").val(Number($("div[data-id=" + id + "] input").val()) + 1);
                    let total = $("div[data-id=" + id + "] input").val() * $("div[data-id=" + id + "] .price span").text();
                    $("div[data-id=" + id + "] .total span").text(total.toFixed(1));
                    if ($("div[data-id=" + id + "] input").val() == 5) {
                        $("div[data-id=" + id + "] button.btn-plus").addClass('disabled');
                    }
                    if ($("div[data-id=" + id + "] input").val() > 1) {
                        $("div[data-id=" + id + "] button.btn-minus").removeClass('disabled');
                    }
                }
                if (e.target.classList.contains("minus")) {
                    $("div[data-id=" + id + "] input").val(Number($("div[data-id=" + id + "] input").val()) - 1);
                    let total = $("div[data-id=" + id + "] input").val() * $("div[data-id=" + id + "] .price span").text();
                    $("div[data-id=" + id + "] .total span").text(total.toFixed(1));
                    if ($("div[data-id=" + id + "] input").val() == 1) {
                        $("div[data-id=" + id + "] button.btn-minus").addClass('disabled');
                    }
                    if ($("div[data-id=" + id + "] input").val() < 5) {
                        $("div[data-id=" + id + "] button.btn-plus").removeClass('disabled');
                    }
                }
                if (e.target.classList.contains("plus") || e.target.classList.contains("minus")) {
                    /*------ tinh tong gio hang ---------*/
                    let subtotal = 0;
                    $(".total span").each(function(index, value) {
                        subtotal += parseFloat(value.innerText);
                    })
                    let cart_quantity = 0;
                    $(".cart-product .input-quantity").each(function(index, value) {
                        cart_quantity += parseInt(value.value);
                    })
                    $("#cart_quantity").text(cart_quantity);
                    $("#subtotal").text(subtotal.toFixed(1));
                    /*------- cap nhat gio hang ---------*/
                    $.ajax({
                        url: "{{ url('cart/update') }}/" + id,
                        method: "get",
                        data: {
                            "quantity": $("div[data-id=" + id + "] input").val()
                        },
                        error: function(message) {
                            console.log(message);
                        }
                    })
                }
            })
        </script>
        <script>
            $(".cart-item").click(function(e) {
                if (e.target.classList.contains('delete-item')) {
                    let id = e.currentTarget.getAttribute('data-id');
                    $.ajax({
                        url: "{{ url('cart/delete') }}/" + id,
                        method: "get",
                        success: function(data) {
                            $('.cart-item[data-id=' + id + ']').remove();
                            if (data.message == "empty") {
                                $("#cart_quantity").addClass("hide");
                                $('#cart-container').html('<h1 style="margin:10rem 0;text-align:center">Your cart is currently empty!</h1>');
                            }
                            $("#cart_quantity").text(data.total_items);
                        },
                        error: function(message) {
                            console.log(message);
                        }
                    })
                }
            })
        </script>
    </x-slot>
</x-clientLayout>