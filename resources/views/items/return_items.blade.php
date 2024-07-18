@extends('layout')
@section('title', 'eGP Stores | Record Items Returned')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Record Items Returned</h4>
              </div>

              <div class="card-body">
                <form action="{{ route('items.store_returned_items') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="item_name">Items Issued</label>
                          <select class="form-control" name="issue_id" id="issue_id" required>
                            <option value="">Select Item</option>
                            @foreach ($return_items as $return_item)
                                <option value="{{ $return_item['issue_id'] }}">{{$return_item['item_name']}} ({{$return_item['quantity']}}) - {{ $return_item['receiver'] }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="quantity_returned">Quantity Returned</label>
                          <input type="text" class="form-control InputAmount" min="0" id="quantity_returned" name="quantity_returned" value="{{ old('quantity_returned') }}" >
                          @error('quantity_returned')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="return_date">Date Returned</label>
                            <input type="text" class="form-control datepicker" id="return_date" name="return_date" value="{{ old('return_date') }}" >
                            @error('return_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div><br>
                        <div class="text-left">
                            <br>
                            <a href="{{route('items.returned')}}" class="btn btn-danger">Cancel</a>
                          </div>

                        <div class="text-right">
                            <button class="btn btn-success mr-1" type="submit">Add Record</button>
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
@endsection

