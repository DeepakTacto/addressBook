<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\address as AddressResource;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::paginate(10);
        return new AddressResource($address);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = $request->isMethod('put') ? Address::findOrFail($request->address_id) : new Address;

        $address->id = $request->input('address_id');
        $address->title = $request->input('title');
        $address->name = $request->input('name');
        $address->userId = $request->input('userId');
        $address->contactNumbar = $request->input('contactNumbar');
        $address->addressLine1 = $request->input('addressLine1');
        $address->addressLine2 = $request->input('addressLine2');
        $address->addressLine3 = $request->input('addressLine3');
        $address->pincode = $request->input('pincode');
        $address->street = $request->input('street');
        $address->state = $request->input('state');
        $address->city = $request->input('city');

        if($address->save()) {
            return new AddressResource($address);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::where('userId',$id)->get();

        // Return single article as a resource
        return new AddressResource($address);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        if($address->delete()) {
            return new AddressResource($address);
        }
    }
}
