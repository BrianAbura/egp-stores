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
                <h4>Add New Budget Expenditure</h4>
              </div>

              <div class="card-body">
                <form action="{{route('budgets.store')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="budget_description">Description</label>
                          <textarea type="text" class="form-control" name="budget_description" id="budget_description">{{ old('budget_description') }}</textarea>
                          @error('budget_description')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-2">
                          <label for="amount">Amount</label>
                          <input type="text" class="form-control InputAmount" id="amount" name="amount" value="{{ old('amount') }}" >
                          @error('amount')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="phone_number">Allocated to:</label>
                            <input type="text" class="form-control" id="allocated_to" name="allocated_to" value="{{ old('allocated_to') }}">
                            @error('phone_number')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="budget_period">Period</label>
                            <select class="custom-select form-control" id="budget_period" name="budget_period">
                                <option value="">Choose...</option>
                                <option value="Q1 (Jul - Sept)">Q1 (Jul - Sept)</option>
                                <option value="Q2 (Oct - Dec)">Q2 (Oct - Dec)</option>
                                <option value="Q3 (Jan - Mar)">Q3 (Jan - Mar)</option>
                                <option value="Q4 (Apr - Jun)">Q4 (Apr - Jun)</option>
                             </select>
                            @error('budget_period')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="date_submitted">Date Submitted</label>
                          <input type="text" class="form-control datepicker" id="date_submitted" name="date_submitted" value="{{ old('date_submitted') }}" >
                          @error('date_submitted')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="payment_status">Payment Status</label>
                          <select class="custom-select form-control" id="payment_status" name="payment_status">
                            <option value="">Choose...</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                         </select>
                          @error('payment_status')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-3 payment_date_div">
                            <label for="payment_date">Payment Date</label>
                            <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" >
                            @error('payment_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                  <div class="text-right">
                    <button class="btn btn-success mr-1" type="submit">Add</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
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
    $('.payment_date_div').hide();

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

