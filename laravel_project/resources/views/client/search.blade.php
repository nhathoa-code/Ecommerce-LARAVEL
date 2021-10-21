<x-clientLayout cssfile="search.css">
    <div id="result-container">
        @if(count($results) > 0)
        <h3 style="text-align: center;margin-top:1rem">Found {{ count($results) }} results</h3>
        <div class="products">
            @foreach($results as $result)
            <div class="product">
                <div>
                    <a href='{{ url("/product/{$result->slug}") }}'>
                        <img src="{{asset('storage/'.$result->images.'/main_image.jpg')}}" alt="">
                    </a>
                </div>
                <p class="price">${{ $result->price }}</p>
                <p class="name">
                    <a href='{{ url("/product/{$result->name}") }}'>{{ $result->name }}</a>
                </p>
                <div class="cart" data-id="{{ $result->id }}">
                    <span class="lnr lnr-cart"></span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h3 style="text-align:center;margin-top:100px">No results found !</h3>
        @endif
    </div>
    <x-slot name="script">
        <script>
            let timeout = null;
            let timeout_error = null;
            $('.cart').click(function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ url('cart')}}/" + id,
                    method: "get",
                    dataType: "json",
                    success: function(data) {
                        if (data.message == "OK") {
                            clearTimeout(timeout);
                            $("html").animate({
                                scrollTop: 0
                            }, 1);
                            $("#cart_quantity").removeClass("hide");
                            $("#little_cart").css("display", "block");
                            $("#little_cart img").attr('src', data.image);
                            $("#little_cart #product_name").text(data.name);
                            $('#cart_quantity').text(data.cart_total);
                            timeout = setTimeout(function() {
                                $("#little_cart").css("display", "none");
                            }, 5000)
                        } else {
                            clearTimeout(timeout_error);
                            if (!$(".cart[data-id=" + id + "]").next().hasClass('error')) {
                                $(".cart[data-id=" + id + "]").after("<span class='error'>Quantity exceeded 5</span>");
                            }
                            timeout_error = setTimeout(function() {
                                $(".error").remove();
                            }, 3000)
                        }
                    },
                    error: function(message) {
                        console.log(message)
                    }
                })
            })
        </script>
    </x-slot>
</x-clientLayout>