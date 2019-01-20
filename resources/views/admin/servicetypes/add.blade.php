@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card formBox">
                <div class="card-header">
                    <a  href="{{route('admin.servicetypesindex')}}"  class="bread_crum">Services Type&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i> </a>&nbsp; Add
                </div>

                <form action="{{route('admin.servicetypesstore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Service Name</label>
                            <input type="text" name="service_name"  class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Service Charge</label>
                            <input type="text" name="service_charge" class="form-control" required="" />
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
