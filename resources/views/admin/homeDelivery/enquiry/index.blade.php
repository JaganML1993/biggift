@extends('header')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('status'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h4 class="fw-bold py-3 mb-4">Enquiries</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">

        <div class="table-responsive text-nowrap">
            <table class="table" id="tablePagination">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Domain</th>
                        <th>City</th>
                        <th>Approved</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                    @php
                        if($item->status == 1){
                            $status = '<span class="badge bg-label-success me-1">Active</span>';
                        }else{
                            $status = '<span class="badge bg-label-warning me-1">In-Active</span>';
                        }

                        if($item->approval == 1){
                            $approval = '<span class="badge bg-label-success me-1">YES</span>';
                        }else{
                            $approval = '<span class="badge bg-label-warning me-1">NO</span>';
                        }
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item->firstname}} {{$item->lastname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->company}}</td>
                        <td>{{$item->domain}}</td>
                        <td>{{$item->city}}</td>
                        <td><?php echo $approval ?></td>
                        <td><?php echo $status ?></td>
                        <td>{{ date('d-m-Y',strtotime($item->created_at)) }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('homeDelivery.enquiry.view_enquiry',$item->id) }}"><i
                                    class="bx bx-edit-alt me-1"></i> View</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

</div>
<!-- / Content -->
@endsection
@section('scripts')
@parent

<script>
    $(document).ready(function () {
        $('#tablePagination').DataTable({
            pagingType: 'full_numbers',
        });
    });
</script>

@endsection