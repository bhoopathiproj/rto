<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\User;
use App\Customer;
use App\Vehicle;
use App\TypesOfServices;
use App\Services;

class AdminController extends Controller
{
    // User Management - Start    
    public function usersindex()
    {
        $users=User::get();
        return view('admin.user.index',compact('users'));
    }
    public function usersadd()
    {        
        return view('admin.user.add');
    }

    public function usersstore(Request $request){

        $this->validate($request, [               
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',        
        ]);

        try{           
            
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;           
            $user->password=Hash::make($request->password);           
            $user->save();

            return back()->with('flash_success', 'User added successfully !');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function usersedit($id)
    {
        $users=User::findOrFail($id);

        return view('admin.user.edit',compact('users'));
    }

    public function usersupdate($id,Request $request){

        $this->validate($request, [    
            'name' => 'required|string|max:255',
            //'email' =>'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:6|confirmed',                  
        ]);

        try{

            $user=User::findOrFail($id);
            $user->name=$request->name;
            //$user->email=$request->email;           
            //$user->password=Hash::make($request->password); 
            //$user->status=$request->status;
            $user->save();

            return back()->with('flash_success', 'User updated successfully !');

        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    } 

    // User Management - End


    // servicetypes Management - Start
    
    public function servicetypesindex()
    {
        $servicetypes=TypesOfServices::get();
        return view('admin.servicetypes.index',compact('servicetypes'));
    }

    public function servicetypesadd()
    {        
        return view('admin.servicetypes.add');
    }

    public function servicetypesstore(Request $request){

        $this->validate($request, [               
            'service_name' => 'required',           
            'service_charge' => 'required',           
        ]);

        try{

            
            
            $servicetypes=new TypesOfServices;
            $servicetypes->service_name=$request->service_name;
            $servicetypes->service_charge=$request->service_charge;           
            $servicetypes->save();

            return back()->with('flash_success', 'Service types added successfully !');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function servicetypesedit($id)
    {
        $servicetypes=TypesOfServices::findOrFail($id);

        return view('admin.servicetypes.edit',compact('servicetypes'));
    }

    public function servicetypesupdate($id,Request $request){

        $this->validate($request, [               
            'service_name' => 'required',           
            'service_charge' => 'required',           
        ]);

        try{

            $servicetypes=TypesOfServices::findOrFail($id);
            $servicetypes->service_name=$request->service_name;
            $servicetypes->service_charge=$request->service_charge;           
            $servicetypes->status=$request->status;
            $servicetypes->save();

            return back()->with('flash_success', 'Service types updated successfully !');

        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function servicetypesdelete($id)
    {
        $servicetypes=TypesOfServices::findOrFail($id);
        $servicetypes->status=0;
        $servicetypes->save();

        return back()->with('flash_success', 'Service types deleted successfully !');
    }

    // servicetypes Management - End
}
