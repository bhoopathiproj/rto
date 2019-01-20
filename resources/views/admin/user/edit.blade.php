@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card formBox">
                <div class="card-header">
                    <a  href="{{route('admin.usersindex')}}" class="bread_crum" > User Management &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i> </a>&nbsp; Edit
                </div>
                <form action="{{route('admin.usersupdate',$users->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$users->name}}" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{$users->email}}" class="form-control" required="" readonly="" />
                        </div>

                        {{--<div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0" @if($users->status==0) selected @endif >Inactive</option>
                                <option value="1"  @if($users->status==1) selected @endif >Active</option>
                            </select>
                        </div>--}}

                        <div class="form-group"> 
                        <br>                      
                            <button type="submit" class="btn btn-primary themeBtn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
