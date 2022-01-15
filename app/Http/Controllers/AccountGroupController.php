<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use Illuminate\Http\Request;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AccountGroup::all(), 200);
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
            $accountGroup = new AccountGroup([
                'name' => $request->name,
                'createdTimeStamp' => date('Y-m-d H:i:s'),
                'createdBy' => auth()->user()->id
            ]);
    
            if ($accountGroup->save()) return response()->json($accountGroup, 201);

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
        $accountGroup = AccountGroup::find($id);

        if(!$accountGroup) return response()->json(['message' => 'AccountGroup Not Found'], 404);

        return response()->json($accountGroup, 200);
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
            $accountGroup = AccountGroup::find($id);

            if (!$accountGroup) {
                return response()->json(['message' => 'AccountGroup Not Found'], 404);
            }

            $accountGroup->name = $request->name;
            $accountGroup->modifiedBy = auth()->user()->id;
            $accountGroup->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($accountGroup->save()) {
                return response()->json($accountGroup, 200);
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
            $accountGroup = AccountGroup::find($id);

            if(!$accountGroup) return response()->json(['message' => 'AccountGroup Not Found'], 404);

            $accountGroup->delete();
        
            return response()->json(['message' => 'Successfully deleted AccountGroup.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
