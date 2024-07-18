<?php

namespace App\Http\Controllers;

use App\Models\item_transaction;
use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function index()
    {
        $items = items::with('product')->get();
        return view('items.index', ['items' => $items]);
    }

    // Issued Items
    public function issued()
    {
        $items = item_transaction::where('transaction_type', 'Issue')
        ->with('item_details')
        ->get();
        return view('items.items_issued', ['items' => $items]);
    }

    public function issue_items()
    {
        $items = items::where('quantity', '<>', 0)->get();
        return view('items.issue_items', ['items' => $items]);
    }

    public function store_issued_items(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required',
            'receiver' => 'required|string',
            'issued_by' => 'required|string',
            'issue_date' => 'required',
            'for_return_option' => 'required'
        ]);

        $item = items::find($request->item_name);
        $quantity_issued = str_replace(',','', $request->quantity);
        if($quantity_issued > $item->quantity)
        {
            return back()->with('error', 'You are trying to issue more than the available quantity on this item.');
        }
        else
        {
            //Add the transaction
            $trans = new item_transaction();
            $trans->items_id = $item->id;
            $trans->quantity = $quantity_issued;
            $trans->receiver = $request->receiver;
            $trans->issued_by = $request->issued_by;
            $trans->user_id = Auth::user()->id;
            $trans->transaction_type = "Issue";
            $trans->for_return = $request->for_return_option;
            $trans->issue_date = $request->issue_date;
            $trans->save();

            //Reduce the items quantity with issued quantity
            $item->quantity = ($item->quantity - $quantity_issued);
            $item->save();

            return back()->with('success', 'The item has been successfully issued to '.$request->receiver);
        }
    }

    // Returned Items
    public function returned()
    {
        $items = item_transaction::where('transaction_type', 'Return')
                ->with('item_details')
                ->get();
        return view('items.items_returned', ['items' => $items]);
    }

    public function return_items()
    {
        $issuedItems = item_transaction::where('transaction_type', 'Issue')
                ->whereNull('return_date')
                ->where('for_return', 1)
                ->get();
        $return_items = [];
        foreach($issuedItems as $issuedItem)
        {
            $item = items::find($issuedItem->items_id);
            $issuedQuantity = $issuedItem->quantity;
            $returnedQuantity = item_transaction::where('transaction_type', 'Return')
                ->where('issue_id', $issuedItem->id)
                ->sum('quantity');

            $balance = $issuedQuantity - $returnedQuantity;
            if($balance == 0){
                continue;
            }
            $return_items[] = [
                'items_id' => $issuedItem->items_id,
                'issue_id' => $issuedItem->id,
                'quantity' => $balance,
                'receiver' => $issuedItem->receiver,
                'item_name' => $item->item_name
            ];
        }
        return view('items.return_items', ['return_items' => $return_items] );
    }

    public function store_returned_items(Request $request)
    {
        $request->validate([
            'quantity_returned' => 'required',
            'return_date' => 'required'
        ]);

        $query_trans = item_transaction::find($request->issue_id);
        $item = items::find($query_trans->items_id);
        $quantity_returned = str_replace(',','', $request->quantity_returned);

        if($quantity_returned > $query_trans->quantity)
        {
            return back()->with('error', 'You are trying to return more items than what was issued out.');
        }
        else
        {
            //Add the Transaction
            $trans = new item_transaction();
            $trans->items_id = $item->id;
            $trans->quantity = $quantity_returned;
            $trans->receiver = $query_trans->receiver;
            $trans->issued_by = $query_trans->issued_by;
            $trans->user_id = Auth::user()->id;
            $trans->transaction_type = "Return";
            $trans->issue_id = $request->issue_id;
            $trans->for_return = 0;
            $trans->issue_date = $query_trans->issue_date;
            $trans->return_date = $request->return_date;
            $trans->save();

            //Increase the items quantity with returned items
            $item->quantity = ($item->quantity + $quantity_returned);
            $item->save();

            return back()->with('success', 'The item(s) return record has been captured successfully.');
        }
    }

}
