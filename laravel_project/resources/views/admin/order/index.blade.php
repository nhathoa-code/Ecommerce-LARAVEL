<x-adminLayout>
    <main>
        <h1>Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        @if(session('message'))
        <div>
            <p class="alert alert-success">{{ session('message') }}</p>
        </div>
        <script>
            let alert = document.querySelector('.alert');
            setTimeout(function() {
                alert.remove();
            }, 3000)
        </script>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Order List
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Customer's Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Subtotal</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>${{ number_format($order->subtotal,1,'.','') }}</td>
                        <td><a href='{{ url("admin/order/detail/$order->id") }}'>Detail</a></td>
                        <td>
                            <select id="status" data-id="{{ $order->id }}">
                                <option value="Unpaid" {{ $order->status == "Unpaid" ? "selected" : "" }}>Unpaid</option>
                                <option value="Paid" {{ $order->status == "Paid" ? "selected" : "" }}>Paid</option>
                            </select>
                        </td>
                        <td>
                            <a href='{{url("admin/order/delete/{$order->id}")}}'>
                                <span class="material-icons">
                                    delete
                                </span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        $("#status").change(function() {
            $.ajax({
                method: "get",
                url: "/admin/order/statusUpdate/" + $(this).data("id"),
                data: {
                    "status": $(this).val()
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
    </script>
</x-adminLayout>