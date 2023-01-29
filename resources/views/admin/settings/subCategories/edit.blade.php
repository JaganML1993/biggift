@extends('header')

@section('content')
<style>
.table td {
    padding: 0 rem !important;

}
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Sub Category</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('update.subcategory') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Category<span class="required_star">*</span></label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $data->category_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Sub Category<span class="required_star">*</span></label>
                                <input type="text" class="form-control" required name="name" value="{{$data->name }}" />
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="basic-default-name">Status<span class="required_star">*</span></label>
                                <select class="form-control" name="status">
                                    <option value="1" @if ($data->status == 1) selected @endif>Active</option>
                                    <option value="0" @if ($data->status == 0) selected @endif>Inactive</option>
                                </select>
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

</script>
@endsection