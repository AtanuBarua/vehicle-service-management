<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Service::class);

        return view('dashboard.services.manage-service',[
            'services' => Service::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Service::class);

        return view('dashboard.services.add-service');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create');

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        Service::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return back()->with('message','Service created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $this->authorize('update', $service);

        return view('dashboard.services.edit-service',[
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $service->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        
        return redirect(route('service.index'))->with('message','Service updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);

        $service->delete();
        return redirect(route('service.index'))->with('message','Service deleted successfully!!');
    }
}
