@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Customer Management</span>
                    <span class="pull-right"><a href="{{route('customeradd')}}">+ Add</a></span>
                </div>

                <div class="card-body">
                    <table class="table">
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
                                    <a href="{{route('customeredit',$value->id)}}" class="">Edit</a>

                                    <a href="{{route('vehicleadd')}}?cid={{$value->id}}" class="">+ Add Vehicle</a>

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
