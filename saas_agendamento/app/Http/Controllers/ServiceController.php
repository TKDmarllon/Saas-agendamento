<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tenant)
{
    $services = \App\Models\Service::paginate(10);

    return view('services.index', compact('services'));
}
     

    /**
     * Show the form for creating a new resource.
     */
public function create($tenant)
{
    return view('services.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store($tenant)
{
    request()->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'duration' => 'required|integer'
    ]);

    \App\Models\Service::create([
        'name' => request('name'),
        'price' => request('price'),
        'duration' => request('duration')
    ]);

    return redirect("/$tenant/services");
}

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
