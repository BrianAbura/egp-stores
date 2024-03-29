<?php

namespace App\Http\Controllers;

use App\Models\purchase_order;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplier.index')->with('suppliers', Supplier::all());
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
                'supplier_name' => 'required',
                'contact_person' => 'required',
                'phone_number' => 'required', 'integer',
                'email_address' => 'required',
            ]
            );

        $supplier = new Supplier();
        $supplier->name = strip_tags($request->supplier_name);
        $supplier->contact_person = strip_tags($request->contact_person);
        $supplier->phone_number = strip_tags($request->phone_number);
        $supplier->email_address = strip_tags($request->email_address);
        $supplier->user_id = Auth::user()->id;
        $supplier->save();

        return back()->with('success', 'The supplier was added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        // $orders = purchase_order::with('supplier')->get($supplier->id);
        $orders = purchase_order::where('supplier_id', $supplier->id)->get();
        return view('supplier.show', ['orders' => $orders, 'supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'supplier_name' => 'required',
                'contact_person' => 'required',
                'phone_number' => 'required', 'integer',
                'email_address' => 'required',
            ]
            );

        $supplier = Supplier::findOrFail($id);
        $supplier->name = strip_tags($request->supplier_name);
        $supplier->contact_person = strip_tags($request->contact_person);
        $supplier->phone_number = strip_tags($request->phone_number);
        $supplier->email_address = strip_tags($request->email_address);
        $supplier->save();

        return back()->with('success', $supplier->name.' has been updted successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $orders = purchase_order::where('supplier_id', $supplier->id)->get();
        if(count($orders) === 0)
        {
            supplier::destroy($supplier->id);
            return redirect()->route('supplier.index')->with('success', 'Supplier successfully removed.');
        }
        else{
            return back()->with('error', $supplier->name.' has pending/delivered orders and cannot be removed from the suppliers list.');
        }

    }
}
