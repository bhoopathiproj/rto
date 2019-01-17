@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer Edit <a  href="{{route('customerindex')}}" > < Back</a></div>
                <form action="{{route('customerupdate',$customer->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <label>Company Name</label>
                            <input type="text" name="company_name" value="{{$customer->company_name}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" value="{{$customer->customer_name}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Email</label>
                            <input type="text" name="email" value="{{$customer->email}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{$customer->phone}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{$customer->mobile}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Address</label>
                            <textarea name="address" class="form-control" required="">{{$customer->address}}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0" @if($customer->status==0) selected @endif >Inactive</option>
                                <option value="1"  @if($customer->status==1) selected @endif >Active</option>
                            </select>
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
