<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AccountType::all(), 200);
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
            $accountType = new AccountType([
                'name' => $request->name,
                'groupId' => $request->groupId,
                'createdTimeStamp' => date('Y-m-d H:i:s'),
                'createdBy' => auth()->user()->id
            ]);
    
            if ($accountType->save()) return response()->json($accountType, 201);

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
        $accountType = AccountType::find($id);

        if(!$accountType) return response()->json(['message' => 'AccountType Not Found'], 404);

        return response()->json($accountType, 200);
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
            $accountType = AccountType::find($id);

            if (!$accountType) {
                return response()->json(['message' => 'AccountType Not Found'], 404);
            }

            $accountType->name = $request->name;
            $accountType->groupId = $request->groupId;
            $accountType->modifiedBy = auth()->user()->id;
            $accountType->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($accountType->save()) {
                return response()->json($accountType, 200);
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
            $accountType = AccountType::find($id);

            if(!$accountType) return response()->json(['message' => 'AccountType Not Found'], 404);

            $accountType->delete();
        
            return response()->json(['message' => 'Successfully deleted AccountType.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
