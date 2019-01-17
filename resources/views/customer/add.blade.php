@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Customer Add
                    <a  href="{{route('customerindex')}}" > < Back</a>
                </div>

                <form action="{{route('customerstore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Address</label>
                            <textarea name="address" class="form-control" required=""></textarea>
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
