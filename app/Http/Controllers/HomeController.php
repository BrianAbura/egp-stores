<?php

namespace App\Http\Controllers;

use App\Models\item_transaction;
use App\Models\items;
use App\Models\purchase_order;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::count();
        $orders_pending = purchase_order::where('delivery_status', 0)->count();
        $orders_delivered = purchase_order::where('delivery_status', 1)->count();
        $all_items = items::sum('quantity');
        $items_issued = item_transaction::where('transaction_type', 'Issue')->sum('quantity');
        $items_returned = item_transaction::where('transaction_type', 'Return')->sum('quantity');

        return view('home', [
            'supplier_count' => $suppliers,
            'orders_pending_count' => $orders_pending,
            'orders_delivered_count' => $orders_delivered,
            'all_items' => $all_items,
            'items_issued' => $items_issued,
            'items_returned' => $items_returned
            ]);
    }
}
