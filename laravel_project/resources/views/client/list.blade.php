<x-clientLayout cssfile="list.css">

    <main>
        @if(count($products) > 0)
        <div class="brands text-center mt-4">
            @foreach($brands as $brand)
            <div class="mb-3 form-check form-check-inline">
                <label style="font-weight:500" class="form-check-label" for="exampleCheck1">{{$brand->name}}</label>
                <input type="checkbox" class="form-check-input" name="brand" {{ isset($brands_array) ? (in_array($brand->id,$brands_array) ? 'checked' : '') : '' }} brand_id="{{ $brand->id }}" brand_name="{{ $brand->name }}">
            </div>
            @endforeach
        </div>
        <div class="price d-flex justify-content-center mt-1">
            <div class="middle">
                <div id="price-box" class="d-flex justify-content-between">
                    <div>$<span id="price-min">0</span></div>
                    <div>$<span id="price-max">100</span></div>
                </div>
                <div class="multi-range-slider">
                    <input type="range" id="input-left" class="price-range" min="0" max="2000" value="{{ isset($price) ? $price[0] : 0}}" step="10">
                    <input type="range" id="input-right" class="price-range" min="0" max="2000" value="{{ isset($price) ? $price[1] : 2000}}" step="10">

                    <div class="slider">
                        <div class="track"></div>
                        <div class="range"></div>
                        <div class="thumb left"></div>
                        <div class="thumb right"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products-container mt-5">
            <div class="products">
                @foreach($products as $product)
                <div class="product">
                    <div>
                        <a href='{{ url("/product/{$product->slug}") }}'>
                            <img src="{{asset('storage/'.$product->images.'/main_image.jpg')}}" alt="">
                        </a>
                    </div>
                    <p class="price">$<span>{{ $product->price }}</span></p>
                    <p class="name">
                        <a href='{{ url("/product/{$product->slug}") }}'>{{ $product->name }}</a>
                    </p>
                    <div class="cart" data-id="{{ $product->id }}">
                        <span class="lnr lnr-cart"></span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <h1 style="text-align:center;padding:10rem 0">products not found !</h1>
        @endif
    </main>

    <x-slot name="script">
        <script>
            let array_query = [];
            let brands_id = [];
            let query_brand = "";
            let query_price = "";

            function seturl(query_brand, query_price) {
                let query_string = "";
                if (query_brand != "") {
                    query_string += "&" + query_brand;
                }
                if (query_price != "") {
                    query_string += "&" + query_price;
                }
                if (query_string != "") {
                    query_string = query_string.substr(1);
                    window.history.pushState({}, "", "http://127.0.0.1:8000/{{ strtolower($field->name) }}" + "?" + query_string);
                } else {
                    window.history.pushState({}, "", "http://127.0.0.1:8000/{{ strtolower($field->name) }}");
                }
            }

            function ajaxCall() {
                $.ajax({
                    url: "product/list",
                    method: "get",
                    data: {
                        brands_id: brands_id,
                        field: "{{ $field->id }}",
                        price: query_price.match(/[0-9]+/g)
                    },
                    success: function(data) {
                        $(".products").html(data);
                    },
                    error: function(message) {
                        console.log(message);
                    }
                })
            }
            $("input[name=brand]").change(function() {
                let brands_name = [];
                brands_id = [];
                $("input[name=brand]").each(function(index, brand) {
                    if (brand.checked) {
                        brands_id.push(Number(brand.getAttribute("brand_id")));
                        brands_name.push(brand.getAttribute("brand_name"));
                    }
                })

                /*------------- set url --------------*/
                if (brands_name.length == 0) {
                    query_brand = "";
                } else {
                    query_brand = "brand=";
                    brands_name.forEach(function(item, index) {
                        if (query_brand.indexOf(item, index) == -1) {
                            if (index != 0) {
                                query_brand += "," + item;
                            } else {
                                query_brand += item;
                            }
                        }
                    });

                }
                seturl(query_brand, query_price);
                /*------------- set url --------------*/
                ajaxCall();
            })
        </script>
        <script>
            var inputLeft = document.getElementById("input-left");
            var inputRight = document.getElementById("input-right");
            var thumbLeft = document.querySelector(".slider > .thumb.left");
            var thumbRight = document.querySelector(".slider > .thumb.right");
            var range = document.querySelector(".slider > .range");

            function setLeftValue() {
                var _this = inputLeft,
                    min = parseInt(_this.min),
                    max = parseInt(_this.max);

                _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value));

                var percent = ((_this.value - min) / (max - min)) * 100;

                thumbLeft.style.left = percent + "%";
                range.style.left = percent + "%";
                document.querySelector('#price-min').innerText = _this.value;

            }
            setLeftValue();

            function setRightValue() {
                var _this = inputRight,
                    min = parseInt(_this.min),
                    max = parseInt(_this.max);

                _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value));

                var percent = ((_this.value - min) / (max - min)) * 100;

                thumbRight.style.right = (100 - percent) + "%";
                range.style.right = (100 - percent) + "%";
                document.querySelector('#price-max').innerText = _this.value;
            }
            setRightValue();

            inputLeft.addEventListener("input", setLeftValue);
            inputRight.addEventListener("input", setRightValue);

            inputLeft.addEventListener("mouseover", function() {
                thumbLeft.classList.add("hover");
            });
            inputLeft.addEventListener("mouseout", function() {
                thumbLeft.classList.remove("hover");
            });
            inputLeft.addEventListener("mousedown", function() {
                thumbLeft.classList.add("active");
            });
            inputLeft.addEventListener("mouseup", function() {
                thumbLeft.classList.remove("active");

            });

            inputRight.addEventListener("mouseover", function() {
                thumbRight.classList.add("hover");
            });
            inputRight.addEventListener("mouseout", function() {
                thumbRight.classList.remove("hover");
            });
            inputRight.addEventListener("mousedown", function() {
                thumbRight.classList.add("active");
            });
            inputRight.addEventListener("mouseup", function() {
                thumbRight.classList.remove("active");
            });

            $(".price-range").mouseup(function() {
                let min_price = inputLeft.value;
                let max_price = inputRight.value;
                query_price = "price=" + min_price + "-" + max_price;
                seturl(query_brand, query_price);
                ajaxCall();
            })
        </script>
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