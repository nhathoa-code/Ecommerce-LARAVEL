<x-clientLayout cssfile="index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <main>
        <div id="banner" class="row">
            <!-- Slider main container -->
            <div class="swiper col-md-8 g-2 pt-2">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="{{asset('images\830-300-830x300-3.png')}}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images\830-300-830x3000(1).png')}}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images\iphone-12-830-300-830x300.png')}}" alt="">
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
            <div class="col-md-4 row row-cols-2 g-2">
                <div class="col"><img src="{{asset('images\Frame39592x-340x340.png')}}" alt=""></div>
                <div class="col"><img src="{{asset('images\Group3913-340x340.jpg')}}" alt=""></div>
                <div class="col"><img src="{{asset('images\laptopdesk-340x340-1.jpg')}}" alt=""></div>
                <div class="col"><img src="{{asset('images\StikyT8-340x340.jpg')}}" alt=""></div>
            </div>
        </div>
        <div class="products-container">
            <!--------------- Latest smartphones ----------------->
            <div class="box-heading">
                <h3>Latest smartphones</h3>
            </div>
            <div class="products">
                @php
                $latest_smartphones = $Product::where("field_id",20)->take(8)->orderBy("id")->get();
                @endphp
                @foreach($latest_smartphones as $product)
                <div class="product">
                    <div>
                        <a href='{{ url("/product/{$product->slug}") }}'>
                            <img src="{{asset('storage/'.$product->images.'/main_image.jpg')}}" alt="">
                        </a>
                    </div>
                    <p class="price">${{ $product->price }}</p>
                    <p class="name">
                        <a href='{{ url("/product/{$product->slug}") }}'>{{ $product->name }}</a>
                    </p>
                    <div class="cart" data-id="{{ $product->id }}">
                        <span class="lnr lnr-cart"></span>
                    </div>
                </div>
                @endforeach
            </div>
            <!--------------- Most viewed smartphones ----------------->
            <div class="box-heading">
                <h3>Most viewed smartphones</h3>
            </div>
            <div class="owl-carousel owl-theme">
                @php
                $most_viewed_smartphones = $Product::where("field_id",20)->take(8)->orderBy("views")->get();
                @endphp
                @foreach($most_viewed_smartphones as $product)
                <div class="item">
                    <div class="product">
                        <div>
                            <a href='{{ url("/product/{$product->slug}") }}'>
                                <img src="{{asset('storage/'.$product->images.'/main_image.jpg')}}" alt="">
                            </a>
                        </div>
                        <p class="price">${{ $product->price }}</p>
                        <p class="name">
                            <a href='{{ url("/product/{$product->slug}") }}'>{{ $product->name }}</a>
                        </p>
                        <div class="cart" data-id="{{ $product->id }}">
                            <span class="lnr lnr-cart"></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--------------- Latest laptops ----------------->
            <div class="box-heading">
                <h3>Latest laptops</h3>
            </div>
            <div class="products">
                @php
                $latest_laptops = $Product::where("field_id",21)->take(8)->orderBy("id")->get();
                @endphp
                @foreach($latest_laptops as $product)
                <div class="product">
                    <div>
                        <a href='{{ url("/product/{$product->slug}") }}'>
                            <img src="{{asset('storage/'.$product->images.'/main_image.jpg')}}" alt="">
                        </a>
                    </div>
                    <p class="price">${{ $product->price }}</p>
                    <p class="name">
                        <a href='{{ url("/product/{$product->slug}") }}'>{{ $product->name }}</a>
                    </p>
                    <div class="cart" data-id="{{ $product->id }}">
                        <span class="lnr lnr-cart"></span>
                    </div>
                </div>
                @endforeach
            </div>
            <!--------------- Most viewed laptops ----------------->
            <div class="box-heading">
                <h3>Most viewed laptops</h3>
            </div>
            <div class="owl-carousel owl-theme">
                @php
                $most_viewed_laptops = $Product::where("field_id",21)->take(8)->orderBy("views")->get();
                @endphp
                @foreach($most_viewed_laptops as $product)
                <div class="item">
                    <div class="product">
                        <div>
                            <a href='{{ url("/product/{$product->slug}") }}'>
                                <img src="{{asset('storage/'.$product->images.'/main_image.jpg')}}" alt="">
                            </a>
                        </div>
                        <p class="price">${{ $product->price }}</p>
                        <p class="name">
                            <a href='{{ url("/product/{$product->slug}") }}'>{{ $product->name }}</a>
                        </p>
                        <div class="cart" data-id="{{ $product->id }}">
                            <span class="lnr lnr-cart"></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
    <x-slot name="script">
        <script>
            const swiper = new Swiper('.swiper', {
                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                }
            });
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 18,
                nav: true,
                items: 4,
                slideBy: 4,
                dots: false
            })
            $(".owl-carousel .owl-nav .owl-prev").html('<span class="material-icons">keyboard_arrow_left</span>');
            $(".owl-carousel .owl-nav .owl-next").html('<span class="material-icons">keyboard_arrow_right</span>');
        </script>
    </x-slot>
</x-clientLayout>