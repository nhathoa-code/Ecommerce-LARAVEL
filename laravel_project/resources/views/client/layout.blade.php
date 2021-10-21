<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset("client_asset/" . $cssfile); ?>">
    <title></title>
    <style>
        .hide {
            display: none !important;
        }
    </style>
</head>

<body>
    <div id="user">
        @if (Route::has('login'))
        @auth
        @if(auth()->user()->role == 1)
        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline">Welcome {{ auth()->user()->name }} | Dashboard</a><a href="/logout">| logout</a>
        @else
        <a href="javascript:avoid(0)">Welcome {{ auth()->user()->name }}</a><a href="/logout">| logout</a>
        @endif
        @else
        <a href="{{ route('login') }}">Log in</a>
        @endauth
        @endif
    </div>
    <header>
        <div style="background-color: #f2f2f2;padding: 0.5rem 4rem;" class="row g-0 text-center py-4 d-flex align-items-center">
            <div id="logo" class="col-md-3">
                <a href="/">LARAVEL PROJECT</a>
            </div>
            <div style="position:relative" class="col-md-6">
                <form action="{{ url('product/search') }}" method="get" id="form-search" autocomplete="off">
                    <div id="search" class="d-flex px-5">
                        <input type="text" class="flex-grow-1 py-1" name="keyword">
                        <button>Search</button>
                    </div>
                </form>
                <div id="search-result">

                </div>
            </div>
            <div id="cart" class="col-md-3">
                <a href="{{ url('cart') }}"><span class="lnr lnr-cart"></span></a>
                <span id="cart_quantity" class="{{ (session()->has('cart') && count(session('cart')) > 0) ?  : 'hide'}}">
                    @if(session()->has('cart') && count(session('cart')) > 0)
                    @php
                    $total_quantity = 0;
                    foreach(session('cart') as $item){
                    $total_quantity += $item['quantity'];
                    }
                    echo $total_quantity
                    @endphp
                    @else
                    0
                    @endif
                </span>
                <div style="display: none;" id="little_cart">
                    <p id="message">Added to cart successfully</p>
                    <div id="product" class="px-2 my-2">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('storage/1631173924/main_image.jpg') }}" alt="">
                            </div>
                            <p class="col-8 text-start p-0" id="product_name">name</p>
                        </div>
                        <a href="{{ url('cart') }}">Check out your cart</a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @foreach($fields as $field)
                        <li class="nav-item d-flex align-items-center">
                            <!-- <span class="material-icons">
                                {{ strtolower($field->name) }}
                            </span> -->
                            <a class="nav-link active" aria-current="page" href="/{{ strtolower($field->name) }}">{{ strtoupper($field->name) }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{ $slot }}
    <footer>
        <h3>VONG NHAT HOA</h3>
    </footer>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script>
        let keyword = "";
        $(document).on('keyup', '#search input', function() {
            keyword = $(this).val();
            $.ajax({
                url: "{{url('product/searchAjax')}}",
                method: "get",
                data: {
                    keyword: keyword
                },
                success: function(data) {
                    if (keyword.length < 3) {
                        $("#search-result").empty();
                    } else {
                        if (data != "") {
                            $("#search-result").html(data);
                        } else {
                            $("#search-result").empty();
                        }

                    }
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })

        $("#form-search button").click(function(e) {
            e.preventDefault();
            if ($("#form-search input").val().length >= 3) {
                $("#form-search").submit();
            }
        })
    </script>
    {{ $script }}
</body>

</html>