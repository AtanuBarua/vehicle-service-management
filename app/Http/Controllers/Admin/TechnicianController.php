<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Technician;
use App\TechnicianDetails;
use App\User;
use Illuminate\Validation\Rule;
use DB;

class TechnicianController extends Controller
{
    public function createTechnician(Request $request){
        $this->authorize('create', Technician::class);

        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')],
            'password' => 'required',
            'phone' => 'required',
        ]);

        $user  = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->role_id = 3;
        $user->save();

        // $user->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'phone' => $request->phone,
        //     'role_id' => 3,
        // ]);

        TechnicianDetails::create([
            'user_id' => $user->id
        ]);

        // User::create([
            
        // ]);
        return redirect()->back()->with('success','Technician created successfully');

    }
    
    public function manageTechnicians(){
        $this->authorize('viewAny', Technician::class);

        //$technicians = Technician::all();
        $technicians = DB::table('technicians')
        ->join('regions','technicians.region_id','=','regions.id')
        ->join('cities','technicians.city_id','=','cities.id')
        ->select('technicians.*','regions.name as region','cities.name as city')
        ->get();
        return view('dashboard.technicians.manage-technicians', compact('technicians'));
    }
    
    public function updateTechnicianSlot(Request $request){
        
        $technician = Technician::find($request->id);

        $this->authorize('viewAny', $technician);

        $technician->slot = $request->slot;
        $technician->save();
        
        if($technician->queue < $technician->slot){
            $technician->availability = 1;
            $technician->save();
        }
        else{
            $technician->availability = 0;
            $technician->save();
        }
        return redirect()->back()->with('message','Slot updated successfully');
    }
}
