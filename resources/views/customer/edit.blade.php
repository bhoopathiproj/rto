@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card formBox">
                <div class="card-header"><a  href="{{route('customerindex')}}" class="bread_crum"> Customer Management &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i> </a>&nbsp;  Edit </div>
                <form action="{{route('customerupdate',$customer->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" value="{{$customer->company_name}}" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" value="{{$customer->customer_name}}" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{$customer->email}}" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{$customer->phone}}" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{$customer->mobile}}" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" required="">{{$customer->address}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0" @if($customer->status==0) selected @endif >Inactive</option>
                                <option value="1"  @if($customer->status==1) selected @endif >Active</option>
                            </select>
                        </div>

                        <div class="form-group"> 
                            <button type="submit" class="btn btn-primary themeBtn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
