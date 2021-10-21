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
            <a href="{{url('admin/user/add')}}" class="btn btn-success">Add user</a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User List
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role == 1 ? 'Admin' : 'Employee' }}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input onclick="return false;" class="form-check-input" type="checkbox" {{ $user->status == 1 ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>
                            <a href="/admin/user/edit/{{$user->id}}">
                                <span class="material-icons">
                                    edit
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/user/delete/{{$user->id}}">
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
</x-adminLayout>