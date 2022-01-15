<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Owner::all(), 200);
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
            $owner = new Owner([
                'name' => $request->name,
                'phoneNumber' => $request->phoneNumber,
                'email' => $request->email,
                'taxIdNumber' => $request->taxIdNumber,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'ownerTypeId' => $request->ownerTypeId,
                'wthTaxId' => $request->wthTaxId,
                'wthTaxRate' => $request->wthTaxRate,
                //'createdTimeStamp' => date('Y-m-d H:i:s'),
                //'createdBy' => auth()->user()->id
            ]);
    
            if ($owner->save()) return response()->json($owner, 201);

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
        $owner = Owner::find($id);

        if(!$owner) return response()->json(['message' => 'Owner Not Found'], 404);

        return response()->json($owner, 200);
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
            $owner = Owner::find($id);

            if (!$owner) {
                return response()->json(['message' => 'Owner Not Found'], 404);
            }

            $owner->name = $request->name;

            $owner->phoneNumber = $request->phoneNumber;
            $owner->email = $request->email;
            $owner->taxIdNumber = $request->taxIdNumber;
            $owner->firstName = $request->firstName;
            $owner->lastName = $request->lastName;
            $owner->ownerTypeId = $request->ownerTypeId;
            $owner->wthTaxId = $request->wthTaxId;
            $owner->wthTaxRate = $request->wthTaxRate;
            //$owner->modifiedBy = auth()->user()->id;
            //$owner->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($owner->save()) {
                return response()->json($owner, 200);
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
            $owner = Owner::find($id);

            if(!$owner) return response()->json(['message' => 'Owner Not Found'], 404);

            $owner->delete();
        
            return response()->json(['message' => 'Successfully deleted Owner.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
