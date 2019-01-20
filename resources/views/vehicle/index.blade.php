@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Vehicle Management</span>
                    <span class="pull-right"><a href="{{route('vehicleadd')}}" class="themeBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></span>
                </div>

                <div class="card-body">
                    <table class="table datatableBx">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Customer</th>
                            <th>Vehicle Number</th>
                            <th>Vehicle Type</th>
                            <th>Vehicle GCV</th>
                            <th>Vehicle Seater</th>
                            <th>Vehicle Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($vehicles as $index=>$value)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$value->customer->company_name}}</td>
                                <td>{{$value->vehicle_no}}</td>
                                <td>{{$value->vehicle_type}}</td>
                                <td>{{$value->vehicle_gcv}}</td>
                                <td>{{$value->vehicle_seater}}</td>
                                <td>{{$value->vehicle_description}}</td>
                                <td>
                                    @if($value->status==0) <span style="color: Red;">Inactive</span> @else <span style="color: Green;">Active</span> @endif
                                </td>
                                <td>
                                    <a href="{{route('vehicleedit',$value->id)}}"  class="icoBtn" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    {{--<a href="{{route('vehicledelete',$value->id)}}" class="">Delete</a>--}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
$.noConflict();

    jQuery( document ).ready(function( $ ) {
        $('.datatableBx').DataTable({
            responsive: true,
        });
    });
</script>


@endsection
