<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\TransHeader;
use App\Models\Item;


class CommonController extends Controller
{
    public function searchTransHeader(Request $request){
        $fields = $request->validate([
            'transTypeId'=>'string'
        ]);

        $transHeader = DB::select('call spSearchTransHeader(?)', [$fields['transTypeId']]);

        return response($transHeader, 201);
    }
   
    public function getTransHeaderById($id){

        $transHeader = TransHeader::where('id', '=', $id)->get()->first();

        return response($transHeader, 201);
    }
   
    public function getTransDetailByHeaderId($id){
        $transDetail = DB::select('call spGetTransDetail(?)', [$id]);

        return response($transDetail, 201);
    }

    public function getItemsByTransTypeId($transTypeId){
        
        $item = Item::select('id','name', 'description', 'price', 'transTypeId', 'taxId', 'expenseAccountId as expenseChartOfAccountId', 'incomeAccountId as incomeChartOfAccountId')->where('transTypeId', '=', $transTypeId)->get();
        return response()->json($item);

        // $item = Item::where('transTypeId', '=', $transTypeId)->get();
        // $collection=collect([]);
        // foreach ($item as $i) {
        //     $collection->push(collect(['id' => $i->id, 'name'=> $i->name, 'description' => $i->description, 'price' => $i->price, 'transTypeId' => $i->transTypeId, 'taxId' => $i->taxId??0, 'expenseChartOfAccountId' => $i->expenseAccountId??0, 'incomeChartOfAccountId' => $i->incomeAccountId??0]));
        // }
        // return $collection;
    }

    public function saveTrans(Request $request){
        try {
            // Get and validate Trans Header
             $request->validate([
                'transTypeId'=>'required|integer|between:0,4'
            ]);

            $th = $request->input();

            // Get Trans Details
            $td = $request->input('transDetails'); // Reference found in https://laravel.com/docs/7.x/requests#retrieving-input
            $collection=collect([]);

            // DB Transaction
            DB::transaction(function () use ($th, $td, $collection) {  // Reference found in https://stackoverflow.com/questions/22906844/laravel-using-try-catch-with-dbtransaction
                // Save Trans Header
                    // Reference to call output paramters found in the following articles:
                        //   https://stackoverflow.com/questions/36877656/using-stored-procedure-with-an-out-parameter-in-laravel
                        //   https://stackoverflow.com/questions/52070741/laravel-model-sql-server-get-output-parameters-from-stored-procedure
                    $transHeader = DB::select('call spSaveTransHeader(?,?,?,?,?,?,?,?,?, @pTransHeaderID)', [$th['transTypeId'], $th['id'], $th['userId'], $th['transDate'], $th['invoiceNumber'], $th['orcrNumber'], $th['poNumber'], $th['ownerId'], $th['amount']]);
                    $results = DB::select('select @pTransHeaderID as pTransHeaderID');
                    $thId = $results[0]->pTransHeaderID;
                    // echo $transHeaderId."\n"; 
                    // $collection->push(collect(['output' => $th['transTypeId']]));
                // Save Trans Details
                if($td!=null){
                    // $colDtl=collect([]);
                    foreach ($td as $tdi) {
                        if($tdi['action']=='add' OR $tdi['action']=='update'){
                            $transDetail = DB::select('call spSaveTransDetail(?,?,?,?,?,?,?,?,?,?,?,?)', [$tdi['id'], $th['userId'], $thId, $tdi['itemId'], $tdi['accountId'], $tdi['quantity'], $tdi['price'], $tdi['amount'], $tdi['taxId'], $tdi['taxAccountId'], $tdi['taxAmount'], $tdi['totalAmount']]);
                        } elseif ($tdi['action']=='delete') {
                           $transDetail = DB::select('call spDeleteTransDetail(?)', [$tdi['id']]);
                           // $colDtl->push(collect(['dtl' => $tdi['id']]));
                        }
                        // echo $tdi['id']."\n";
                        // $colDtl->push(collect(['dtl' => $tdi['id']]));
                    }
                    // $collection->push(collect(['output' => $colDtl]));
                }
               
                // To force exception, you can enable the code below.
                    // throw new Exception("Error");
                $collection->push(collect(['success' => true]));
            });
        }
        catch (\Throwable $e) {
            // echo $e->getMessage()."\n";
            $collection->push(collect(['success' => false]));
            $collection->push(collect(['error' => $e->getMessage()]));
        }

        return response($collection , 201);
    }
    
}
