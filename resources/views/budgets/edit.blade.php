@extends('layout')
@section('title', 'eGP Stores | Budget Expenses')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Budget Expenditure</h4>
              </div>
              <div class="card-body">
                <form action="{{route('budgets.update', $budget->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="budget_description">Description</label>
                          <textarea type="text" class="form-control" name="budget_description" id="budget_description">{{ $budget->description }}</textarea>
                          @error('budget_description')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-2">
                          <label for="amount">Amount</label>
                          <input type="text" class="form-control" id="amount" name="amount" value="{{ $budget->amount }}" >
                          @error('amount')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone_number">Allocated to:</label>
                            <input type="text" class="form-control" id="allocated_to" name="allocated_to" value="{{ $budget->allocated_to }}">
                            @error('phone_number')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="period">Period</label>
                            <select class="custom-select form-control" id="budget_period" name="budget_period">
                                <option value="{{ $budget->budget_period }}">{{ $budget->budget_period }}</option>
                                <option value="Q1 (Jul - Sept)">Q1 (Jul - Sept)</option>
                                <option value="Q2 (Oct - Dec)">Q2 (Oct - Dec)</option>
                                <option value="Q3 (Jan - Mar)">Q3 (Jan - Mar)</option>
                                <option value="Q4 (Apr - Jun)">Q4 (Apr - Jun)</option>
                             </select>
                            @error('period')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="date_submitted">Date Submitted</label>
                          <input type="text" class="form-control datepicker" id="date_submitted" name="date_submitted" value="{{ $budget->date_submitted }}" >
                          @error('date_submitted')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="payment_status">Payment Status</label>
                          <select class="custom-select form-control" id="payment_status" name="payment_status" required>
                            <option value="{{$budget->status}}">{{$budget->status}}</option>
                            @if ($budget->status == "Pending")
                            <option value="Completed">Completed</option>
                            @else
                            <option value="Pending">Pending</option>
                            @endif
                         </select>
                          @error('payment_status')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group col-md-3 payment_date_div">
                            <label for="payment_date">Payment Date</label>
                            <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" value="{{$budget->payment_date}}">
                            @error('payment_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                  <div class="text-right">
                    <button class="btn btn-success mr-1" type="submit">Update Record</button>
                     <a href="{{route('budgets.index')}}" class="btn btn-danger" rel="noopener noreferrer">Cancel</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
// Capture Actual Delivery and person
$(document).ready(function() {
    if($('#payment_status').val() == "Pending"){
        $('.payment_date_div').hide();
    }
    else{
        $('.payment_date_div').show();
    }

    $('#payment_status').change(function() {
        var selectedValue = $(this).val();
        if (selectedValue == "Completed") {
            $('.payment_date_div').show();
        } else {
            $('.payment_date_div').hide();
        }
    });
});
 </script>
@endsection

