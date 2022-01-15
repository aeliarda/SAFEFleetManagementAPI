<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Tax::all(), 200);
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
            $tax = new Tax([
                'name' => $request->name,
                'abbreviation' => $request->abbreviation,
                'description' => $request->description,
                'defaultRate' => $request->defaultRate,
                'accountId' => $request->accountId,
                'showInOwners' => $request->showInOwners == 1 ? true : false,
                'showInItems' => $request->showInItems == 1 ? true : false,
                'createdTimeStamp' => date('Y-m-d H:i:s'),
                'createdBy' => auth()->user()->id
            ]);
    
            if ($tax->save()) return response()->json($tax, 201);

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
        $tax = Tax::find($id);

        if(!$tax) return response()->json(['message' => 'Tax Not Found'], 404);

        return response()->json($tax, 200);
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
            $tax = Tax::find($id);

            if (!$tax) {
                return response()->json(['message' => 'Tax Not Found'], 404);
            }

            $tax->name = $request->name;
            $tax->abbreviation = $request->abbreviation;
            $tax->description = $request->description;
            $tax->defaultRate = $request->defaultRate;
            $tax->accountId = $request->accountId;
            $tax->showInOwners = $request->showInOwners == 1 ? true : false;
            $tax->showInItems = $request->showInItems == 1 ? true : false;
            $tax->modifiedBy = auth()->user()->id;
            $tax->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($tax->save()) {
                return response()->json($tax, 200);
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
            $tax = Tax::find($id);

            if(!$tax) return response()->json(['message' => 'Tax Not Found'], 404);

            $tax->delete();
        
            return response()->json(['message' => 'Successfully deleted Tax.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
