@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Users Management</span>
                    <span class="pull-right"><a href="{{route('admin.usersadd')}}">+ Add</a></span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>                           
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $index=>$value)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <!-- <td>
                                    @if($value->status==0) <span style="color: Red;">Inactive</span> @else <span style="color: Green;">Active</span> @endif
                                </td> -->
                                <td>
                                    <a href="{{route('admin.usersedit',$value->id)}}" class="">Edit</a>

                                   
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
