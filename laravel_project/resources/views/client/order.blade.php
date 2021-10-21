<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('client_asset/checkout.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="row g-0">
            <div id="form" class="col-md-7">
                <form action="order" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label">Phone number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                    </div>
                    @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    </div>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Complete Order</button>
                </form>
            </div>
            <div id="cart-show" class="col-md-5">
                @foreach(session('cart') as $item)
                <div>
                    <div class="product-cart row g-0  align-items-center">
                        <div class="img col-md-2">
                            <img src="{{ asset('storage/'.$item['image'].'/main_image.jpg') }}" alt="">
                            <span class="quantity">{{ $item['quantity'] }}</span>
                        </div>
                        <div class="name col-md-8 ps-4">
                            <p>{{ $item['name'] }}</p>
                        </div>
                        <div class="price col-md-2">
                            <p class="float-end">${{ number_format($item['price'],'1','.',',') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div id="subtotal" class="row g-0">
                    <div class="col-md-10">
                        <p>Subtotal</p>
                    </div>
                    <div class="subtotal col-md-2">
                        <p class="float-end">$@php
                            $subtotal = 0;
                            foreach(session('cart') as $item){
                            $subtotal += $item['quantity']*$item['price'];
                            }
                            echo number_format($subtotal,1,'.',',');
                            @endphp
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>