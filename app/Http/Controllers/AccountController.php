<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Account::all(), 200);
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
            $account = new Account([
                'name' => $request->name,
                'code' => $request->code,
                'acctGroupId' => $request->acctGroupId,
                'acctTypeId' => $request->acctTypeId,
                'isDebit' => $request->isDebit == 1 ? true : false,
                'showInBalanceSheet' => $request->showInBalanceSheet == 1 ? true : false, 
                'showInIncomeStatement' => $request->showInIncomeStatement == 1 ? true : false, 
                'showInTrialBalance' => $request->showInTrialBalance == 1 ? true : false,
                'beginningBalance'=> $request->beginningBalance,
                'createdTimeStamp' => date('Y-m-d H:i:s'),
                'createdBy' => auth()->user()->id
            ]);
    
            if ($account->save()) return response()->json($account, 201);

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
        $account = Account::find($id);

        if(!$account) return response()->json(['message' => 'Account Not Found'], 404);

        return response()->json($account, 200);
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
            $account = Account::find($id);

            if (!$account) {
                return response()->json(['message' => 'Account Not Found'], 404);
            }

            $account->name = $request->name;
            $account->code = $request->code;
            $account->acctGroupId = $request->acctGroupId;
            $account->acctTypeId = $request->acctTypeId;
            $account->isDebit = $request->isDebit == 1 ? true : false;
            $account->showInBalanceSheet = $request->showInBalanceSheet == 1 ? true : false;
            $account->showInIncomeStatement = $request->showInIncomeStatement == 1 ? true : false;
            $account->showInTrialBalance = $request->showInTrialBalance == 1 ? true : false;
            $account->beginningBalance = $request->beginningBalance;
            $account->modifiedBy = auth()->user()->id;
            $account->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($account->save()) {
                return response()->json($account, 200);
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
            $account = Account::find($id);

            if(!$account) return response()->json(['message' => 'Account Not Found'], 404);

            $account->delete();
        
            return response()->json(['message' => 'Successfully deleted Account.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
