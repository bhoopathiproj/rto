@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Service Type Edit <a  href="{{route('admin.servicetypesindex')}}" > < Back</a></div>
                <form action="{{route('admin.servicetypesupdate',$servicetypes->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <label>Service Name</label>
                            <input type="text" name="service_name" value="{{$servicetypes->service_name}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Service Charge</label>
                            <input type="text" name="service_charge" value="{{$servicetypes->service_charge}}" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0" @if($servicetypes->status==0) selected @endif >Inactive</option>
                                <option value="1"  @if($servicetypes->status==1) selected @endif >Active</option>
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
