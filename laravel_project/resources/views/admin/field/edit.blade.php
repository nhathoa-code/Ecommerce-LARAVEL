<x-adminLayout>
    <div class="text-end">
        <a class="btn btn-info" href="/admin/field">LIST</a>
    </div>
    <main class="w-50 mx-auto">
        <form class="mb-3" method="post" action='{{url("admin/field/edit/{$field->id}")}}'>
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('_token') ? old('name') : $field->name }}">
            </div>
            <button type="submit" class="btn btn-primary w-100">Edit</button>
        </form>
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