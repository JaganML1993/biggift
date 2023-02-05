@extends('header')

@section('content')
<style>
.table td {
    padding: 0 rem !important;

}
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Product</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('products.home_delivery.update') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="id" value="{{$product_edit->id}}">
                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Product Name<span class="required_star">*</span></label>
                                <input type="text" class="form-control" required name="name" value="{{ $product_edit->name }}"/>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Product Price<span class="required_star">*</span></label>
                                <input type="text" class="form-control" value="{{ $product_edit->price }}" onkeypress="validate(event)" required name="price" />
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Company<span class="required_star">*</span></label>
                                <select class="form-control" name="company_id" required>
                                    <option value="">Select Company</option>
                                    @foreach ($company as $item)
                                        <option value="{{$item->id}}" @if ($product_edit->company_id == $item->id) selected @endif>{{$item->company}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Brand<span class="required_star">*</span></label>
                                <select class="form-control" name="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $item)
                                        <option value="{{$item->id}}" @if ($product_edit->brand_id == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Color</label>
                                <select class="form-control" name="color_id">
                                    <option value="">Select Color</option>
                                    @foreach ($colors as $item)
                                        <option value="{{$item->id}}" @if ($product_edit->color_id == $item->id) selected @endif style="background:{{$item->color_code}}">{{$item->color}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @php
                            if ($product_edit->thumbnail){
                                $required = '';
                            }else{
                                $required = 'required';
                            }
                            @endphp
                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Thumbnail<span class="required_star">*</span></label>
                                <input type="file" class="form-control" {{ $required }} name="thumbnail" accept="image/png, image/jpeg">
                                @if ($product_edit->thumbnail)
                                <a href="{{ url('').$product_edit->thumbnail }}" target="_blank"><img src="{{ url('').$product_edit->thumbnail }}" style="width:40%; margin-top: 10px;"></a>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Browse By</label>
                                <select class="form-control" name="browse_by">
                                    <option value="">Please select</option>
                                    <option value="Trending" @if ($product_edit->browse_by == 'Trending') selected @endif>Trending</option>
                                    <option value="Top Sales" @if ($product_edit->browse_by == 'Top Sales') selected @endif>Top Sales</option>
                                    <option value="New Arrivals" @if ($product_edit->browse_by == 'New Arrivals') selected @endif>New Arrivals</option>
                                    <option value="Top Rated" @if ($product_edit->browse_by == 'Top Rated') selected @endif>Top Rated</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Status<span class="required_star">*</span></label>
                                <select class="form-control" name="status">
                                    <option value="1" @if ($product_edit->status == 1) selected @endif>Active</option>
                                    <option value="0" @if ($product_edit->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="basic-default-name">Description<span
                                        class="required_star">*</span></label>
                                <textarea class="form-control" name="description" id="editor1" rows="4">{{ $product_edit->description }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="basic-default-name">Specification<span
                                        class="required_star">*</span></label>
                                <textarea class="form-control" name="specification" id="editor2" rows="4">{{ $product_edit->specification }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Short Description</label>
                                <textarea class="form-control" name="short_description" rows="3">{{ $product_edit->short_description }}</textarea>
                            </div>

                            @php
                            if (count($product_images)){
                                $required = '';
                            }else{
                                $required = 'required';
                            }
                            @endphp
                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Product Images<span class="required_star">*</span></label>
                                <input type="file" class="form-control" {{ $required }} name="product_images[]" accept="image/png, image/jpeg" multiple>
                                @if (count($product_images))
                                    @foreach ($product_images as $item)
                                    <a href="{{ url('').$item->path }}" target="_blank"><img src="{{ url('').$item->path }}" style="width:20%; margin-top: 20px;"></a><a style="margin-left: -10px; margin-top: -35px; color: #fff;" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to remove this image?')" href="{{ route('products.home_delivery.delete_image', ['id' => $item->id]) }}">X</a>
                                    @endforeach
                                @endif
                            </div>
                            
                        </div>

                        <br>
                        <div class="row justify-content-start">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->
@endsection
@section('scripts')
@parent
<script type="text/javascript">
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
<script>
    ClassicEditor
    .create(document.querySelector('#editor1'))
    .then(editor => {
        // console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
<script>
    ClassicEditor
    .create(document.querySelector('#editor2'))
    .then(editor => {
        // console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endsection