@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    User Add
                    <a  href="{{route('admin.usersindex')}}" > < Back</a>
                </div>

                <form action="{{route('admin.usersstore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <label>Name</label>
                            <input type="text" name="name"  class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Confirm Password</label>
                            
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

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
