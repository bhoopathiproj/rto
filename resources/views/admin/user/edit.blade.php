@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Edit <a  href="{{route('admin.usersindex')}}" > < Back</a></div>
                <form action="{{route('admin.usersupdate',$users->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$users->name}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Email</label>
                            <input type="email" value="{{$users->email}}" class="form-control" required="" readonly="" />
                        </div>

                        {{--<div class="col-md-12">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0" @if($users->status==0) selected @endif >Inactive</option>
                                <option value="1"  @if($users->status==1) selected @endif >Active</option>
                            </select>
                        </div>--}}

                        <div class="col-md-4"> 
                        <br>                      
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
