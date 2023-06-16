<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourierRequest;
use App\Http\Requests\EditCourierRequest;
use App\Http\Resources\CourierResource;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Courier;
class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couriers = Courier::query()
        ->filter(request()->s)
        ->paginate(10);


        return Inertia::render('Admin/Couriers/Index', [
            'couriers' => CourierResource::collection($couriers),
            'search' => [
                'keyword' => request()->s,
                'url' => route('couriers.index'),
            ],
            'identifiers' => [
                [ 'key' => 'logo_name', 'type' => 'image', 'url_key' => 'logo_url' ],
                [ 'key' => 'name', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'email', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'contact_no', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'address', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'actions', 'type' => 'actions', 'url_key' => '' ],
            ],
            'columns' => ['image', 'name', 'email', 'contact no', 'address', ''],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Couriers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourierRequest $request)
    {
        
        $courier = Courier::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'logo_name' => 'NA',
            'logo_url' => 'NA'
        ]);

        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();

            // Save courier logo
            $imagePath = $file->storeAs('public/files/courier/'. $courier->id, $imageName);

            $courier->update([
                'logo_name' => $imageName,
                'logo_url' => $imagePath
            ]);
        }

        return Redirect::route('couriers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courier $courier)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courier $courier)
    {
        return Inertia::render('Admin/Couriers/Edit', [
            'courier' => $courier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCourierRequest $request, Courier $courier)
    {
        $courier->update([
            'name' => $request->name,
            'address' => $request->address,
            'contact_no' => $request->contact_no,
            'email' => $request->email
        ]);

        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();

            // Save courier logo
            $imagePath = $file->storeAs('public/files/courier/'. $courier->id, $imageName);

            $courier->update([
                'logo_name' => $imageName,
                'logo_url' => $imagePath
            ]);
        }

        return Redirect::route('couriers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courier $courier)
    {
        //
    }
}
