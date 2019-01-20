@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card formBox">

                <div class="card-header"><a  href="{{route('customerindex')}}" class="bread_crum"> Customer Management &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i> </a>&nbsp;  Add </div>

                <form action="{{route('customerstore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" required=""></textarea>
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
