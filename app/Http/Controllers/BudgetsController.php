<?php

namespace App\Http\Controllers;

use App\Models\budgets;
use Illuminate\Http\Request;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('budgets.index')->with('budgets', budgets::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budgets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'budget_description' => 'required',
            'amount' => 'required',
            'allocated_to' => 'required',
            'budget_period' => 'required',
            'date_submitted' => 'required',
            'payment_status' => 'required'
        ]);

        if($request->payment_status == "Pending"){
            $payment_date = null;
        }
        else{
            $payment_date = $request->payment_date;
        }
        $budget = new budgets();
        $budget->description = strip_tags($request->budget_description);
        $budget->amount = strip_tags(str_replace(',','', $request->amount));
        $budget->budget_period = strip_tags($request->budget_period);
        $budget->allocated_to = strip_tags($request->allocated_to);
        $budget->date_submitted = strip_tags($request->date_submitted);
        $budget->payment_date = $payment_date;
        $budget->status = strip_tags($request->payment_status);
        $budget->save();

        return back()->with('success', 'The budget expenditure has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(budgets $budgets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($budgets)
    {
        $id = budgets::find($budgets);
        return view('budgets.edit', ['budget' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $budget_id)
    {
        $request->validate([
            'budget_description' => 'required',
            'amount' => 'required',
            'allocated_to' => 'required',
            'budget_period' => 'required',
            'date_submitted' => 'required',
            'payment_status' => 'required'
        ]);
        if($request->payment_status == "Pending"){
            $payment_date = null;
        }
        else{
            $payment_date = $request->payment_date;
        }

        $budget = budgets::find($budget_id);
        $budget->description = strip_tags($request->budget_description);
        $budget->amount = strip_tags(str_replace(',','', $request->amount));
        $budget->budget_period = strip_tags($request->budget_period);
        $budget->allocated_to = strip_tags($request->allocated_to);
        $budget->date_submitted = strip_tags($request->date_submitted);
        $budget->payment_date = $payment_date;
        $budget->status = strip_tags($request->payment_status);
        $budget->save();

        return redirect()->route('budgets.edit', $budget_id)->with('success', 'The budget expenditure has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($budget_id)
    {
        budgets::destroy($budget_id);
        return redirect()->route('budgets.index')->with('success', 'Budget Expenditure entry deleted successfully.');
    }
}
