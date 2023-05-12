<?php

namespace App\Http\Controllers\Client;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $address = Address::whereUserId(Auth::id())->get();
        // return
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        Address::create([
            'user_id' => Auth::id(),
            'location_id' => $request->area_id,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'default_shipping_address' => $request->default_shipping_address == "on" ? true : false,
            'default_billing_address' => $request->default_billing_address == "on" ? true : false,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($address)
    {
        $address = Address::with('location.parent.parent')->find($address);
        return response()->json($address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        if ($request->has('default_shipping_address')) {
            $others = Address::whereUserId(Auth::id())->where('id','!=',$request->id);
            $others->update(['default_shipping_address'=>null]);
        }

        if ($request->has('default_billing_address')) {
            $others = Address::whereUserId(Auth::id())->where('id','!=',$request->id);
            $others->update(['default_billing_address'=>null]);
        }

        $address->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'location_id' => $request->area_id,
            'default_shipping_address' => $request->has('default_shipping_address') ? 1 : null,
            'default_billing_address' => $request->has('default_billing_address') ? 1 : null,
        ]);

        return redirect()->route('checkout');
        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
