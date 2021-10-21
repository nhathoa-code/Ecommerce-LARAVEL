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
        <div class="text-end mb-3">
            <a href="product/add" class="btn btn-success">Add product</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Field</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                    <tr>
                        <td><img width="100px" height="auto" src="{{ asset('storage/'. $product->images .'/main_image.jpg') }}" alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price,2,'.',',') }}</td>
                        <td>{{ $product->field->name }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="/admin/product/edit/{{$product->id}}">
                                <span class="material-icons">
                                    edit
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/product/delete/{{$product->id}}">
                                <span class="material-icons">
                                    delete
                                </span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links()  }}
            </div>
        </div>

    </main>
</x-adminLayout>
@php
session(["previous"=>url()->full()]);
@endphp