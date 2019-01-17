<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Customer;
use App\Vehicle;
use App\TypesOfServices;
use App\Services;
use App\ServiceChild;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

 


    // Customer Management - Start
    
    public function customerindex()
    {
        $user=Auth::user();
        $companies=Customer::get();
        return view('customer.index',compact('companies'));
    }

    public function customeradd()
    {
        
        return view('customer.add');
    }

    public function customerstore(Request $request){

        $this->validate($request, [               
            'company_name' => 'required',           
            'customer_name' => 'required',           
            'email' => 'required',           
            //'phone' => 'required',           
            'mobile' => 'required',           
            'address' => 'required',           
        ]);

        try{

            $user=Auth::user();
            
            $customer=new Customer;
            $customer->user_id=$user->id;
            $customer->company_name=$request->company_name;            
            $customer->customer_name=$request->customer_name;            
            $customer->email=$request->email;            
            $customer->phone=$request->phone;            
            $customer->mobile=$request->mobile;            
            $customer->address=$request->address;            
            $customer->save();

            return back()->with('flash_success', 'Customer added successfully !');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function customeredit($id)
    {
        $customer=Customer::findOrFail($id);

        return view('customer.edit',compact('customer'));
    }

    public function customerupdate($id,Request $request){

        $this->validate($request, [               
            'company_name' => 'required',           
        ]);

        try{

            $user=Auth::user();
            
            $customer=Customer::findOrFail($id);
            $customer->user_id=$user->id;
            $customer->company_name=$request->company_name;            
            $customer->customer_name=$request->customer_name;            
            $customer->email=$request->email;            
            $customer->phone=$request->phone;            
            $customer->mobile=$request->mobile;            
            $customer->address=$request->address; 
            $customer->status=$request->status;
            $customer->save();

            return back()->with('flash_success', 'Customer updated successfully !');

        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function customerdelete($id)
    {
        $customer=Customer::findOrFail($id);
        $customer->status=0;
        $customer->save();

        return back()->with('flash_success', 'Customer deleted successfully !');
    }

    // Customer Management - End


    // Vehicle Management - Start
    
    public function vehicleindex()
    {
        $user=Auth::user();
        $vehicles=Vehicle::with('customer')->get();
        return view('vehicle.index',compact('vehicles'));
    }

    public function vehicleadd()
    {
        $user=Auth::user();
        $customers=Customer::get();   
        return view('vehicle.add',compact('customers'));
    }

    public function vehiclestore(Request $request){

        $this->validate($request, [               
            'vehicle_no' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'customer_id' => 'required',
            //'vehicle_type' => 'required',
            'vehicle_gcv' => 'required',
            'vehicle_seater' => 'required|numeric',
            'vehicle_description' => 'required',
        ]);

        try{

            $user=Auth::user();
            
            $vehicle=new Vehicle;
            $vehicle->user_id=$user->id;
            //$vehicle->user_type=1;
            $vehicle->customer_id=$request->customer_id;
            $vehicle->vehicle_no=$request->vehicle_no;
            $vehicle->vehicle_type=$request->vehicle_type;
            $vehicle->vehicle_gcv=$request->vehicle_gcv;
            $vehicle->vehicle_seater=$request->vehicle_seater;
            $vehicle->vehicle_description=$request->vehicle_description;
            $vehicle->save();

            return back()->with('flash_success', 'Vehicle added successfully !');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function vehicleedit($id)
    {
        $user=Auth::user();
        $vehicle=Vehicle::findOrFail($id);
        $customers=Customer::get();   
        return view('vehicle.edit',compact('vehicle','customers'));
    }

    public function vehicleupdate($id,Request $request){

        $this->validate($request, [      
            'customer_id' => 'required',         
            'vehicle_no' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'vehicle_type' => 'required',
            'vehicle_gcv' => 'required',
            'vehicle_seater' => 'required|numeric',
            'vehicle_description' => 'required',
        ]);

        try{

            $user=Auth::user();
            
            $vehicle=Vehicle::findOrFail($id);
            $vehicle->user_id=$user->id;
            //$vehicle->user_type=1;          
            $vehicle->customer_id=$request->customer_id;  
            $vehicle->vehicle_no=$request->vehicle_no;
            $vehicle->vehicle_type=$request->vehicle_type;
            $vehicle->vehicle_gcv=$request->vehicle_gcv;
            $vehicle->vehicle_seater=$request->vehicle_seater;
            $vehicle->vehicle_description=$request->vehicle_description;
            $vehicle->status=$request->status;
            $vehicle->save();

            return back()->with('flash_success', 'Vehicle updated successfully !');

        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function vehicledelete($id)
    {
        $vehicle=Vehicle::findOrFail($id);
        $vehicle->status=0;
        $vehicle->save();

        return back()->with('flash_success', 'Vehicle deleted successfully !');
    }

    // Vehicle Management - End


    // Services Management - Start
    
    public function serviceindex()
    {
        $user=Auth::user();
        $services=Services::where('delete_status','=',1)->with('servicestype')->with('servicescustomer')->with('servicesvehicle')->get();
        return view('service.index',compact('services'));
    }

    public function serviceadd()
    {
        $vehicles=Vehicle::where('status','=',1)->get();
        $servicetypes=TypesOfServices::where('status','=',1)->get();
        return view('service.add',compact('vehicles','servicetypes'));
    }

    public function servicestore(Request $request){

        $this->validate($request, [                          
            'service_type_id' => 'required',           
            'vehicle_id' => 'required',           
            'from_date' => 'required',           
            'to_date' => 'required',           
            'term_period' => 'required',           
            //'service_charge' => 'required',           
            'service_amount' => 'required',           
            'total' => 'required',           
            'advance' => 'required',           
            'balance' => 'required',           
        ]);

        try{

            $user=Auth::user();
            
            $vehicle=Vehicle::findOrFail($request->vehicle_id);

            $servicetype=TypesOfServices::findOrFail($request->service_type_id);

            $service=new Services;
            $service->user_id=$user->id;
            $service->customer_id=$vehicle->customer_id;            
            $service->service_type_id=$request->service_type_id;            
            $service->vehicle_id=$request->vehicle_id;            
            $service->from_date=date('Y-m-d',strtotime($request->from_date));            
            $service->to_date=date('Y-m-d',strtotime($request->to_date));            
            $service->term_period=$request->term_period;            
            $service->service_charge=$servicetype->service_charge;           
            $service->service_amount=$request->service_amount;    

            $total=$servicetype->service_charge+$request->service_amount;            
            $service->total=$total;

            $service->advance=$request->advance;            
            
            $balance=$total-$request->advance;            
            $service->balance=$balance;

            $service->year=date('Y');            
            $service->month=date('m');   
            
            if($balance>0){
                $service->status=0;            
            }else{         
                $service->status=1;            
            }
            $service->delete_status=1;            
            
            $service->save();

            $service_child=new ServiceChild;
            $service_child->user_id=$user->id;
            $service_child->customer_id=$vehicle->customer_id;
            $service_child->service_id=$service->id;
            $service_child->service_type_id=$request->service_type_id;
            $service_child->vehicle_id=$request->vehicle_id;            
            $service_child->service_charge=$servicetype->service_charge;
            $service_child->amount=$request->service_amount;            
            $service_child->total=$total;            
            $service_child->advance=$request->advance;            
            $service_child->balance=$balance;            
            $service_child->save();


            return back()->with('flash_success', 'Service added successfully !');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function serviceedit($id)
    {
        $service=Services::findOrFail($id);
        $vehicles=Vehicle::where('status','=',1)->get();
        $servicetypes=TypesOfServices::where('status','=',1)->get();
        return view('service.edit',compact('service','vehicles','servicetypes'));
    }

    public function serviceupdate($id,Request $request){

        $this->validate($request, [ 
            'advance' => 'required', 
        ]);

        try{

            $user=Auth::user();            
            
            $service=Services::findOrFail($id);
            $prev_balance=$service->balance;

            if($prev_balance>=$request->advance){
                return back()->with('flash_error', 'Given amount is greater than balance !');
            }

            $service->advance=$request->advance;
            $curr_balance=$prev_balance-$request->advance;            
            $service->balance=$curr_balance;
            if($curr_balance>0){
                $service->status=0;            
            }else{         
                $service->status=1;            
            }            
            $service->delete_status=1;            
            //dd($service);
            $service->save();


            $service_child=new ServiceChild;
            $service_child->user_id=$user->id;
            $service_child->customer_id=$service->customer_id;
            $service_child->service_id=$service->id;
            $service_child->service_type_id=$service->service_type_id;
            $service_child->vehicle_id=$service->vehicle_id;            
            $service_child->service_charge=$service->service_charge;
            $service_child->amount=$service->service_amount;            
            $service_child->total=$service->total;            
            $service_child->advance=$request->advance;            
            $service_child->balance=$curr_balance;            
            $service_child->save();

            return back()->with('flash_success', 'Services updated successfully !');

        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function servicehistory($id)
    {
        $service=Services::where('id','=',$id)->with('servicestype')->with('servicescustomer')->with('servicesvehicle')->first();

        //$serviceschild=ServiceChild::where('service_id','=',$id)->with('services')->with('servicestype')->with('servicescustomer')->with('servicesvehicle')->get();
        $serviceschild=ServiceChild::where('service_id','=',$id)->get();

        return view('service.history',compact('service','serviceschild'));
    }

    public function servicedelete($id)
    {
        $service=Services::findOrFail($id);
        $service->delete_status=0;
        $service->save();

        return back()->with('flash_success', 'Services deleted successfully !');
    }

    // Services Management - End

    public function getservicetypedetail($id){
        $servicetype=TypesOfServices::findOrFail($id);
        $servicetype=$servicetype->toArray();
        return $servicetype;
    }
}
