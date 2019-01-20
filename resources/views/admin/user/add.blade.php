@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card formBox">
                <div class="card-header">
                    <a  href="{{route('admin.usersindex')}}" class="bread_crum" > User Management &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i> </a>&nbsp; Add
                </div>

                <form action="{{route('admin.usersstore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name"  class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">             
                            <button type="submit" class="btn btn-primary themeBtn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
