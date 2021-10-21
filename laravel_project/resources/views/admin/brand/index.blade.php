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
            <a href="{{url('admin/brand/add')}}" class="btn btn-success">Add brand</a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Brand List
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Field</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->name}}</td>
                        <td>{{ $brand->field->name}}</td>
                        <td>
                            <a href="/admin/brand/edit/{{$brand->id}}">
                                <span class="material-icons">
                                    edit
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href='{{url("admin/brand/delete/{$brand->id}")}}'>
                                <span class="material-icons">
                                    delete
                                </span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $brands->links() }}
            </div>
        </div>
    </main>
</x-adminLayout>