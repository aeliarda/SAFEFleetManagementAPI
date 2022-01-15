<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Address::all(), 200);
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
        try {
            $address = new Address([
                'addressLine1' => $request->addressLine1,
                'addressLine2' => $request->addressLine2,
                'cityMunCode' => $request->cityMunCode,
                'contacts' => $request->contacts,
                'notes' => $request->notes,
                'provinceCode' => $request->provinceCode,
                'zipCode' => $request->zipCode,
                //'createdTimeStamp' => date('Y-m-d H:i:s'),
                //'createdBy' => auth()->user()->id
            ]);
    
            if ($address->save()) return response()->json($address, 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
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
        $address = Address::find($id);

        if(!$address) return response()->json(['message' => 'Address Not Found'], 404);

        return response()->json($address, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $address = Address::find($id);

            if (!$address) {
                return response()->json(['message' => 'Address Not Found'], 404);
            }

            $address->addressLine1 = $request->addressLine1;
            $address->addressLine2 = $request->addressLine2;
            $address->cityMunCode = $request->cityMunCode;
            $address->contacts = $request->contacts;
            $address->notes = $request->notes;
            $address->provinceCode = $request->provinceCode;
            $address->zipCode = $request->zipCode;
            //$address->modifiedBy = auth()->user()->id;
            //$address->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($address->save()) {
                return response()->json($address, 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $address = Address::find($id);

            if(!$address) return response()->json(['message' => 'Address Not Found'], 404);

            $address->delete();
        
            return response()->json(['message' => 'Successfully deleted Address.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
