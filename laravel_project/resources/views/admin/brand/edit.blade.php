<x-adminLayout>
    <div class="text-end">
        <a class="btn btn-info" href="/admin/brand">LIST</a>
    </div>
    <main class="w-50 mx-auto">
        <form class="mb-3" method="post" action='{{url("admin/brand/edit/{$brand->id}")}}'>
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('_token') ? old('name') : $brand->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Field</label>
                <select class="form-select" aria-label="Default select example" name="field_id">
                    @foreach($fields as $field)
                    <option {{ old('_token') ? (old('field_id') == $field->id ? 'selected' : '') : ($brand->field_id == $field->id ? 'selected' : '')}} value="{{ $field->id }}">{{ $field->name }}</option>
                    @endforeach
                </select>
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