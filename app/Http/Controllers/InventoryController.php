<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventory.index')->with('inventory', Inventory::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'item_name' => 'required',
                'item_description' => 'required',
                'supplier' => 'required',
                'quantity' => 'required|integer|min:1',
                'receiver' => 'required',
                'date_received' => 'required'
            ]
        );

        $inventory = new Inventory();
        $inventory->product_name = strip_tags($request->item_name);
        $inventory->product_description = strip_tags($request->item_description);
        $inventory->quantity = strip_tags($request->quantity);
        $inventory->supplier = strip_tags($request->supplier);
        $inventory->receiver_name = strip_tags($request->receiver);
        $inventory->date_received = strip_tags($request->date_received);
        $inventory->user_id = Auth::user()->id;
        $inventory->save();

        return back()->with('success', 'The item has been added to the store successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return view('inventory.show')->with('item', $inventory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
