<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Collection;
use App\Models\Item;
use DB;
use App\Models\Tax;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\AccountGroup;

class DataLookupController extends Controller
{

    
    public function getChartOfAccounts(){

        $account = Account::all();
        $collection=collect([]);
        foreach ($account as $a) {
            $collection->push(collect(['id' => $a->id, 'code'=> $a->code, 'description' => $a->name ]));
        }

    return $collection;
    }

    public function getOwnersByOwnerTypeId($ownerTypeId){

    $owner = Owner::where('ownerTypeId', '=', $ownerTypeId)->get();
    $collection=collect([]);
    foreach ($owner as $o) {
       $collection->push(collect(['id' => $o->id, 'code'=> $o->name, 'description' =>'']));
    }

    return $collection;
    }

    public function getReceiptInvoiceLookup(){
        $receiptInvoice = DB::select('call spGetReceiptInvoiceLookup()');

        $collection=collect([]);
        foreach ($receiptInvoice as $r) {
           $collection->push(collect(['id' => $r->id, 'code'=> $r->code, 'description' => $r->description]));
        }

        return response($collection, 201);
    }

    public function getItemsLookupByTransTypeId($transTypeId){

        $item = Item::where('transTypeId', '=', $transTypeId)->get();
        $collection=collect([]);
        foreach ($item as $i) {
          $taxId=$i->taxId ? $i->taxId : 0;
          $incomeAccountId = $i->incomeAccountId ? $i->incomeAccountId : 0;
          $expenseAccountId = $i->expenseAccountId ? $i->expenseAccountId : 0;
          $description="{\"taxId\":".$taxId.", \"price\":".$i->price.", \"incomeChartOfAccountId\":".$incomeAccountId.", \"expenseChartOfAccountId\":".$expenseAccountId."}";

           $collection->push(collect(['id' => $i->id, 'code'=> $i->name, 'description' => $description]));
        }
    
        return $collection;
    }
    
    public function getTaxes(){
        $tax = Tax::all();
        $collection=collect([]);
        foreach ($tax as $t) {
            $accountId = $t->accountId ? $t->accountId : '';
            $description="{\"rate\":".$t->defaultRate.", \"chartOfAccountId\":".$accountId."}";

           $collection->push(collect(['id' => $t->id, 'code'=> $t->abbreviation, 'description' =>  $description ]));
        }
    
    return $collection;
    }
    
    public function getItems(){

        $item = Item::all();
        $collection=collect([]);
        foreach ($item as $i) {
            $collection->push(collect(['id' => $i->id, 'code'=> $i->name, 'description' => $i->description]));
        }

    return $collection;
    }

    public function getGroups(){

        $group = AccountGroup::all();
        $collection=collect([]);
        foreach ($group as $g) {
            $collection->push(collect(['id' => 0, 'code'=> $g->id, 'description' => $g->name ]));
        }

    return $collection;
    }

    public function getSubGroups(){

        $type = AccountType::all();
        $collection=collect([]);
        foreach ($type as $t) {
            $collection->push(collect(['id' => 0, 'code'=> $t->id, 'description' => $t->name ]));
        }

    return $collection;
    }
    

}
