<x-adminLayout>
    <div class="text-end">
        <a class="btn btn-info" href="/admin/product">LIST</a>
    </div>
    <main>
        <form class="row g-3" action='{{url("admin/product/edit/{$product->id}")}}' method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('_token') ? old('name') : $product->name }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="number" step="0.1" class="form-control" name="price" min="1" value="{{ old('_token') ? old('price') : $product->price }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Field</label>
                <select class="form-select" aria-label="Default select example" name="field_id">
                    @if(old('_token'))
                    <option value="-1">Select field</option>
                    @foreach($fields as $field)
                    <option {{ $field->id == old('field_id') ? 'selected' : '' }} value="{{ $field->id }}">{{$field->name}}</option>
                    @endforeach
                    @else
                    <option value="-1">Select field</option>
                    @foreach($fields as $field)
                    <option {{ $field->id == $product->field_id ? 'selected' : '' }} value="{{ $field->id }}">{{$field->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Brand</label>
                <select class="form-select" aria-label="Default select example" name="brand_id">
                    @php
                    $brands = $brand::where("field_id",$product->field_id)->get();
                    @endphp
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                    @endforeach
                    <!-- <option value="{{ $field->id }}">$field->name</option> -->
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">image</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('_token') ? old('description') : $product->description }}</textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
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
    <script>
        // $("select[name='brand_id']").change(function() {
        //     if ($("select[name='field_id']").val() > 0) {
        //         $field_id = $("select[name='field_id']").val();
        //         $.ajax({
        //             url: "{{url('admin/brand/getbyfield')}}/" + $field_id,
        //             method: "get",
        //             dataType: "json",
        //             success: function(data) {
        //                 $("select[name='brand_id']").html(data);
        //             },
        //             error: function(message) {
        //                 console.log(message);
        //             }
        //         })
        //     }
        // })
        $('select[name=field_id]').change(function() {
            $.ajax({
                url: "{{url('admin/brand/getbyfield')}}/" + $(this).val(),
                method: "get",
                dataType: "json",
                success: function(data) {
                    $("select[name='brand_id']").html(data);
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
    </script>
</x-adminLayout>