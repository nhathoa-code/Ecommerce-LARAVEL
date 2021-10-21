<x-adminLayout>
    <div class="text-end">
        <a class="btn btn-info" href="/admin/user">LIST</a>
    </div>
    <main class="w-50 mx-auto">
        <form class="mb-3" method="post" action='{{url("admin/user/edit/{$user->id}")}}'>
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('_token') ? old('email') : $user->email }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('_token') ? old('name') : $user->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="{{ $user->password }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm password</label>
                <input type="password" class="form-control" name="password_confirmation" value="{{ $user->password }}">
            </div>
            <div class="mb-3">
                <div class="form-check form-check-inline ms-0 p-0">
                    <label class="form-check-label">Role: </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="1" {{ old('_token') ? (old('role') == 1 ? 'checked' : '') : ($user->role == 1 ? 'checked' : '') }}>
                    <label class="form-check-label">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="0" {{ old('_token') ? (old('role') == 0 ? 'checked' : '') : ($user->role == 0 ? 'checked' : '') }}>
                    <label class="form-check-label">Employee</label>
                </div>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <div class="form-check form-check-inline ms-0 p-0">
                    <label class="form-check-label">Status: </label>
                </div>
                <div class="form-check form-check-inline form-switch">
                    <input class="form-check-input" type="checkbox" name="status" {{ $user->status == 1 ? 'checked' : '' }}>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Edit</button>
        </form>
        @if (session('message'))
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
        <script>
            let alert = document.querySelector(".alert");
            setTimeout(function() {
                alert.remove();
            }, 3000)
        </script>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </main>
</x-adminLayout>