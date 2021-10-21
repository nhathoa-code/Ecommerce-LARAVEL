  <style>
      img {
          width: 100px;
          height: auto;
      }
  </style>
  <x-adminLayout>
      <a class="btn btn-info float-end" href="{{ url()->previous() }}">List</a>
      <p>Order Id: <span>{{ $order->id }}</span></p>
      <p>Subtotal: $<span>{{ $order->subtotal }}</span></p>
      <p>Status: <span>{{ $order->status }}</span></p>
      <hr>
      <p>Customer name: <span>{{ $order->name }}</span></p>
      <p>Address: <span>{{ $order->address }}</span></p>
      <p>Email: <span>{{ $order->email }}</span></p>
      <p>Phone number: <span>{{ $order->phone_number }}</span></p>
      <h5>DETAIL</h5>
      <table class="table border-less">
          <thead class="alert-success">
              <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
              </tr>
          </thead>
          <tbody>
              @foreach($order_infos as $order_info)
              <tr>
                  <td><img src="{{ asset('storage/'.$order_info->product->images.'/main_image.jpg') }}" alt=""></td>
                  <td>{{ $order_info->product->name }}</td>
                  <td>${{ number_format($order_info->product->price, 1, ".", "") }}</td>
                  <td>{{ $order_info->quantity }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </x-adminLayout>