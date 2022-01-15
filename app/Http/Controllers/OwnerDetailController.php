<?php

namespace App\Http\Controllers;

use App\Models\OwnerDetail;
use Illuminate\Http\Request;

class OwnerDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(OwnerDetail::all(), 200);
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
            $ownerDetail = new OwnerDetail([
                'addressId' => $request->addressId,
                'ownerId' => $request->ownerId,
                //'createdTimeStamp' => date('Y-m-d H:i:s'),
                //'createdBy' => auth()->user()->id
            ]);
    
            if ($ownerDetail->save()) return response()->json($ownerDetail, 201);

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
        $ownerDetail = OwnerDetail::find($id);

        if(!$ownerDetail) return response()->json(['message' => 'OwnerDetail Not Found'], 404);

        return response()->json($ownerDetail, 200);
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
            $ownerDetail = OwnerDetail::find($id);

            if (!$ownerDetail) {
                return response()->json(['message' => 'OwnerDetail Not Found'], 404);
            }

            $ownerDetail->addressId = $request->addressId;
            $ownerDetail->ownerId = $request->ownerId;
            //$ownerDetail->modifiedBy = auth()->user()->id;
            //$ownerDetail->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($ownerDetail->save()) {
                return response()->json($ownerDetail, 200);
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
            $ownerDetail = OwnerDetail::find($id);

            if(!$ownerDetail) return response()->json(['message' => 'OwnerDetail Not Found'], 404);

            $ownerDetail->delete();
        
            return response()->json(['message' => 'Successfully deleted OwnerDetail.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
