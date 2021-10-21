<x-adminLayout>
    <div class="text-end">
        <a class="btn btn-info" href="/admin/brand">LIST</a>
    </div>
    <main class="w-50 mx-auto">
        <form class="mb-3" method="post" action="{{url('admin/user/add')}}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm password</label>
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
            </div>
            <div class="mb-3">
                <div class="form-check form-check-inline ms-0 p-0">
                    <label class="form-check-label">Role: </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="1" {{ old('role') == 1 ? 'checked' : '' }}>
                    <label class="form-check-label">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="0" {{ old('role') == 0 ? 'checked' : '' }}>
                    <label class="form-check-label">Employee</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add</button>
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