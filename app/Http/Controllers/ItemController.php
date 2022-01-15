<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Item::all(), 200);
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
            $item = new Item([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'transTypeId' => $request->transTypeId,
                'expenseAccountId' => $request->expenseAccountId,
                'incomeAccountId' => $request->incomeAccountId,
                'taxId' => $request->taxId,
                'createdTimeStamp' => date('Y-m-d H:i:s'),
                'createdBy' => auth()->user()->id
            ]);
    
            if ($item->save()) return response()->json($item, 201);

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
        $item = Item::find($id);

        if(!$item) return response()->json(['message' => 'Item Not Found'], 404);

        return response()->json($item, 200);
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
            $item = Item::find($id);

            if (!$item) {
                return response()->json(['message' => 'Item Not Found'], 404);
            }

            $item->name = $request->name;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->transTypeId = $request->transTypeId;
            $item->expenseAccountId = $request->expenseAccountId;
            $item->incomeAccountId = $request->incomeAccountId;
            $item->taxId = $request->taxId;
            $item->modifiedBy = auth()->user()->id;
            $item->modifiedTimeStamp = date('Y-m-d H:i:s');

            if ($item->save()) {
                return response()->json($item, 200);
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
            $item = Item::find($id);

            if(!$item) return response()->json(['message' => 'Item Not Found'], 404);

            $item->delete();
        
            return response()->json(['message' => 'Successfully deleted Item.'], 200);
            //return response()->json(null, 204);
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
