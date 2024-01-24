<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\purchase_order;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = purchase_order::with('supplier')->get();
        return view('purchase_order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase_order.create')->with('suppliers', Supplier::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'supplier' => 'required',
                'order_date' => 'required'
            ]);

            /**
             * delivery_status - 0 (pending), 1 (delivered)
             */

            $order = new purchase_order();
            $order->supplier_id = strip_tags($request->supplier);
            $order->order_date = strip_tags($request->order_date);
            $order->expected_delivery_date = strip_tags($request->expected_delivery_date);
            $order->delivery_status = strip_tags($request->delivery_status);
            $order->actual_delivery_date = strip_tags($request->actual_delivery_date);
            $order->received_by = strip_tags($request->received_by);
            $order->user_id = Auth::user()->id;
            $order->save();

            $order_id = $order->id;

            // Process the submitted data, including the dynamically added rows
            $itemNames = $request->input('item_name');
            $ItemDescs = $request->input('item_description');
            $ItemPrices = $request->input('unit_price');
            $itemQtys = $request->input('quantity');

             // Loop through the items
            foreach($itemNames as $key => $item_name){
                $item_descriptions = $ItemDescs[$key];
                $unit_price = $ItemPrices[$key];
                $quantity = $itemQtys[$key];

            // Save the items to the Products table
                $product = new product();
                $product->purchase_order_id = $order_id;
                $product->item_name = $item_name;
                $product->item_description = $item_descriptions;
                $product->unit_price = $unit_price;
                $product->quantity = $quantity;
                $product->save();
            }
            return back()->with('success', 'The Purchase Order has been added successfully.');
        }
        catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing this request. Please check the form and try again.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($purchase_order)
    {
        $order = purchase_order::with('items')->find($purchase_order);
        return view('purchase_order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($purchase_order)
    {
        $order = purchase_order::with('items')->find($purchase_order);
        return view('purchase_order.edit', ['order' => compact('order'), 'suppliers' => Supplier::all() ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $order_id)
    {
        $order = purchase_order::find($order_id);
        $order->supplier_id = strip_tags($request->supplier);
        $order->order_date = strip_tags($request->order_date);
        $order->expected_delivery_date = strip_tags($request->expected_delivery_date);
        $order->delivery_status = strip_tags($request->delivery_status);
        $order->actual_delivery_date = strip_tags($request->actual_delivery_date);
        $order->received_by = strip_tags($request->received_by);
        $order->save();

        // Process the newly submitted data, including the dynamically added rows
        $itemNames = $request->input('item_name');
        $ItemDescs = $request->input('item_description');
        $ItemPrices = $request->input('unit_price');
        $itemQtys = $request->input('quantity');

        if (empty($itemNames)) {
            //return ()->with('error', 'The Purchase Order cannot be saved without the order items. Please add order items and resubmit.');
            return redirect()->route('purchase_order.edit', $order_id)
            ->with('error', 'The Purchase Order cannot be saved without the order items. Please include the items and resubmit.');
        }
         // Delete the items first
         product::where('purchase_order_id', $order_id)->delete();

         // Loop through the new items
        foreach($itemNames as $key => $item_name){
            $item_descriptions = $ItemDescs[$key];
            $unit_price = $ItemPrices[$key];
            $quantity = $itemQtys[$key];

        // Save the items to the Products table
            $product = new product();
            $product->purchase_order_id = $order_id;
            $product->item_name = $item_name;
            $product->item_description = $item_descriptions;
            $product->unit_price = $unit_price;
            $product->quantity = $quantity;
            $product->save();
        }
        return redirect()->route('purchase_order.show', $order_id)->with('success', 'The Purchase Order has been updated successfully.');
    }

    public function confirm_delivery(Request $request, $order_id)
    {
        $request->validate([
            'actual_delivery_date' => 'required',
            'received_by' => 'required'
        ]);

        $order = purchase_order::find($order_id);
        $order->delivery_status = 1;
        $order->actual_delivery_date = strip_tags($request->actual_delivery_date);
        $order->received_by = strip_tags($request->received_by);
        $order->save();

        return back()->with('success', 'Delivery confirmed, and product list updated successfully.');
    }

    public function destroy($order_id)
    {
        // Delete the items first then the purchase Order - Only when not delivered
        product::where('purchase_order_id', $order_id)->delete();
        purchase_order::destroy($order_id);
        return redirect()->route('purchase_order.index')->with('success', 'Purchase Order deleted successfully');
    }
}
