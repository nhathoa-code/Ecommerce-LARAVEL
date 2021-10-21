<x-clientLayout cssfile="detail.css">
    <main>
        <div class="row g-0" id="product-detail">
            <div class="col-md-8 pe-3">
                <!-- Swiper -->

                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @foreach($images as $image)
                        <div style="text-align: center;" class="swiper-slide">
                            <img style="height: 100%;width:100%" src="{{ asset('storage'.$image) }}" />
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div style="margin-top: 1rem;height:200px" thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($images as $image)
                        <div style="text-align: center;" class="swiper-slide">
                            <img style="width: 100%;height:auto" src="{{ asset('storage/'.$image) }}" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="product-info">
                    <p class="name">{{ $product->name }}</p>
                    <p class="status">Availability: <span>In Stock</span></p>
                    <p class="price">${{ $product->price }}</p>
                </div>
                <div id="add-to-cart" class="mt-5">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <button id="add-btn" data-id="{{ $product->id }}">Add To Cart</button>
                        </div>
                        <div id="quantity" class="d-flex">
                            <button class="d-flex align-items-center justify-content-center">
                                <span class="material-icons minus" style="pointer-events: none;">
                                    remove
                                </span>
                            </button>
                            <input type="number" readonly name="quantity" id="input-quantity" value="1" step="1">
                            <button class="d-flex align-items-center justify-content-center">
                                <span class="material-icons plus">
                                    add
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="description">
                    <h3>
                        Description
                    </h3>
                    <p>
                        {{ $product->description }}
                    </p>
                </div>
            </div>
            <!----------------  Review  --------------->
            <div id="review" class="col-md-8">
                <h1>review</h1>
                <div id="review-box" data-id="{{ $product->id }}">
                    <textarea id="review-content" rows="5"></textarea>
                    <div class="d-flex align-items-center">
                        @if(isset($_COOKIE['name']))
                        <a href="javascript:void(0)" id="change-info" class="btn btn-primary me-1">change info</a>
                        @endif
                        <button>Send</button>
                    </div>
                </div>
                <div id="review-container">
                    @foreach($reviews as $review)
                    <div class="review" data-id="{{ $review->id }}">
                        <strong><span class="name">{{$review->name}}</span><span class="review-time">
                                @php
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $now = time();
                                $time_created = strtotime($review->created_at);
                                $time_distance = $now - $time_created;
                                $time_created_at = floor($time_distance / (24*60*60));
                                $time_reply = null;
                                if($time_created_at >= 1){
                                echo floor($time_distance / (24*60*60)) . " day ago";
                                }else if(floor($time_distance / (60*60)) < 1){ echo floor($time_distance / 60)." minute ago"; } else{ echo floor($time_distance / (60*60))." hour ago"; } @endphp </span></strong>
                        <p class="content">{{ $review->content }}</p>
                        <div>
                            <a class="reply-btn" href="javascript:void(0)" onclick=showformreply({{ $review->id }})>Reply</a>
                        </div>
                        @php
                        $replies = $Review::where('parent_path','like','/'.$review->id.'%')->orderBy('created_at')->get();
                        @endphp
                        <div id="r{{ $review->id }}" class="reply-list {{ count($replies) > 0 ? '' : 'hide-list' }}">
                            @foreach($replies as $reply)
                            <div class="reply-content" data-id="{{ $reply->id }}" data-product={{ $product->id }} data-parent="{{ $review->id }}">
                                <strong><span class="name">{{$reply->name}}</span><span class="review-time">
                                        @php
                                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                                        $now = time();
                                        $time_created = strtotime($reply->created_at);
                                        $time_distance = $now - $time_created;
                                        $time_created_at = floor($time_distance / (24*60*60));
                                        $time_reply = null;
                                        if($time_created_at >= 1){
                                        echo floor($time_distance / (24*60*60)) . " day ago";
                                        }else if(floor($time_distance / (60*60)) < 1){ echo floor($time_distance / 60)." minute ago"; } else{ echo floor($time_distance / (60*60))." hour ago"; } @endphp </span></strong>
                                <p class="content">{{$reply->content}}</p>
                                <a class="child-reply-btn" href="javascript:void(0)">Reply</a>
                            </div>
                            @endforeach
                        </div>
                        <div class="inputreply">
                            <form method="post" autocomplete="off" id="r{{ $review->id }}">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="reply_content" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <a href="javascript:void(0)" class="sendreply-btn" onclick="sendreply({{ $review->id }})">Send</a>
                                <a href="javascript:void(0)" onclick="closereplyform(this)">Cancel</a>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!----------------  Review  --------------->
                <div id="user-info">
                    <form>
                        <span class="material-icons">
                            clear
                        </span>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name*</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email*</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone number*</label>
                            <input type="text" class="form-control" name="phone_number">
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
            <div id="related-products">
                <!-- <div class="products">
                    <div class="product">
                        <div class="img">
                            <a href="#">
                                <img src="{{asset('images/product-7-270x270.png')}}" alt="">
                            </a>
                        </div>
                        <p class="price">$100</p>
                        <p class="name">
                            <a href="#">Sound Bar with Wireless Subwoofe</a>
                        </p>
                        <div class="cart">
                            <span class="lnr lnr-cart"></span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </main>
    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="{{ asset('client_asset/detail.js') }}"></script>
    </x-slot>
</x-clientLayout>