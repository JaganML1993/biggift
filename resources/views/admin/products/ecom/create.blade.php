@extends('header')

@section('content')
<style>
.table td {
    padding: 0 rem !important;

}
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Create Product</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('products.ecom.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Product Name<span class="required_star">*</span></label>
                                <input type="text" class="form-control" required name="name" />
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Product Price<span class="required_star">*</span></label>
                                <input type="text" class="form-control" onkeypress="validate(event)" required name="price" />
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Category<span class="required_star">*</span></label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Sub Category<span class="required_star">*</span></label>
                                <select class="form-control" name="subcategory_id" required>
                                    <option value="">Select Sub Category</option>
                                    @foreach ($subCategory as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Brand<span class="required_star">*</span></label>
                                <select class="form-control" name="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Color</label>
                                <select class="form-control" name="color_id">
                                    <option value="">Select Color</option>
                                    @foreach ($colors as $item)
                                        <option value="{{$item->id}}" style="background:{{$item->color_code}}">{{$item->color}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Thumbnail<span class="required_star">*</span></label>
                                <input type="file" class="form-control" required name="thumbnail" accept="image/png, image/jpeg">
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Browse By</label>
                                <select class="form-control" name="browse_by">
                                    <option value="">Please select</option>
                                    <option value="Trending">Trending</option>
                                    <option value="Top Sales">Top Sales</option>
                                    <option value="New Arrivals">New Arrivals</option>
                                    <option value="Top Rated">Top Rated</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Status<span class="required_star">*</span></label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="basic-default-name">Description<span
                                        class="required_star">*</span></label>
                                <textarea class="form-control" name="description" id="editor1" rows="4"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label" for="basic-default-name">Specification<span
                                        class="required_star">*</span></label>
                                <textarea class="form-control" name="specification" id="editor2" rows="4"></textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Short Description</label>
                                <textarea class="form-control" name="short_description" rows="3"></textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Related Products</label>
                                <select class="form-control" name="related_products[]" multiple="multiple">
                                    @foreach ($products as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Product Images<span class="required_star">*</span></label>
                                <input type="file" class="form-control" required name="product_images[]" accept="image/png, image/jpeg" multiple>
                            </div>
                            
                        </div>

                        <br>
                        <div class="row justify-content-start">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
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