@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Customer Management</span>
                    <span class="pull-right"><a href="{{route('customeradd')}}" class="themeBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></span>
                </div>

                <div class="card-body">
                    <table class="table datatableBx" >
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Company Name</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($companies as $index=>$value)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$value->company_name}}</td>
                                <td>{{$value->customer_name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->mobile}}</td>
                                <td>{{$value->address}}</td>
                                <td>
                                    @if($value->status==0) <span style="color: Red;">Inactive</span> @else <span style="color: Green;">Active</span> @endif
                                </td>
                                <td>
                                    <a href="{{route('customeredit',$value->id)}}" class="icoBtn" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a href="{{route('vehicleadd')}}?cid={{$value->id}}" class="icoBtn" title="Add vehicle" > <i class="fa fa-car" aria-hidden="true"></i> </a>

                                    {{--<a href="{{route('customerdelete',$value->id)}}" class="">Delete</a>--}}
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