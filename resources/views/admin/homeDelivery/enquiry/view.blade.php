@extends('header')

@section('content')
<style>
.table td {
    padding: 0 rem !important;

}
</style>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Enquiry Data</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Full Name</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{ $data->firstname }} {{ $data->lastname }}" readonly class="form-control" id="basic-default-name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{ $data->company }}" readonly class="form-control" id="basic-default-company">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Domain</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{ $data->domain }}" readonly class="form-control" id="basic-default-company">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" value="{{ $data->email }}" readonly class="form-control" aria-label="john.doe" aria-describedby="basic-default-email2">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone</label>
                        <div class="col-sm-10">
                        <input type="text" id="basic-default-phone" value="{{ $data->phone }}" readonly class="form-control phone-mask" aria-label="658 799 8941" aria-describedby="basic-default-phone">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Street Address 1</label>
                        <div class="col-sm-10">
                        <textarea id="basic-default-message" readonly class="form-control" aria-describedby="basic-icon-default-message2">{{ $data->street_address1 }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Street Address 2</label>
                        <div class="col-sm-10">
                        <textarea id="basic-default-message" readonly class="form-control" aria-describedby="basic-icon-default-message2">{{ $data->street_address2 }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">City</label>
                        <div class="col-sm-10">
                        <input type="text" readonly value="{{ $data->city }}" class="form-control" id="basic-default-company">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">State</label>
                        <div class="col-sm-10">
                        <input type="text" readonly value="{{ $data->state }}" class="form-control" id="basic-default-company">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">PIN</label>
                        <div class="col-sm-10">
                        <input type="text" readonly value="{{ $data->pin }}" class="form-control" id="basic-default-company">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Created At</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{ $data->created_at }}" readonly class="form-control" id="basic-default-name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Updated At</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{ $data->updated_at }}" readonly class="form-control" id="basic-default-name">
                        </div>
                    </div>
                      
                </div>
                <hr>
                <div class="card-body">
                    <form action="{{ route('homeDelivery.enquiry.update_enquiry') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option value="1" @if ($data->status == 1) selected @endif>Active</option>
                                    <option value="0" @if ($data->status == 0) selected @endif>In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Approve</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="approval" id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option value="0" @if ($data->approval == 0) selected @endif>No</option>
                                    <option value="1" @if ($data->approval == 1) selected @endif>Yes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
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