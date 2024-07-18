@extends('layout')
@section('title', 'eGP Stores | Issue Items')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Issue Item to User</h4>
              </div>

              <div class="card-body">
                <form action="{{ route('items.store_issued_items') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="item_name">Item Name</label>
                          <select class="form-control" name="item_name" id="item_name" value="{{ old('item_name') }}">
                            <option value="">Select Item</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{$item->item_name}} ({{$item->quantity}})</option>
                            @endforeach
                        </select>
                          @error('item_name')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-2">
                          <label for="quantity">Quantity</label>
                          <input type="text" class="form-control InputAmount" min="0" id="quantity" name="quantity" value="{{ old('quantity') }}" >
                          @error('quantity')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="receiver">Receiver</label>
                            <input type="text" class="form-control" id="receiver" name="receiver" value="{{ old('receiver') }}">
                            @error('receiver')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group col-md-3">
                            <label for="issued_by">Issued By</label>
                            <input type="text" class="form-control" id="issued_by" name="issued_by" value="{{ old('issued_by') }}">
                            @error('issued_by')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div><br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                          <label for="issue_date">Date Issued</label>
                          <input type="text" class="form-control datepicker" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" >
                          @error('issue_date')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="for_return_option">Item For Return</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="for_return_option" value="1" id="exampleRadios1">
                              <label class="form-check-label" for="exampleRadios1">
                                Yes
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="for_return_option"  value="0" id="exampleRadios2">
                              <label class="form-check-label" for="exampleRadios2">
                               No
                              </label>
                            </div>
                            @error('for_return_option')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                        <div class="text-left">
                            <br>
                            <a href="{{route('items.issued')}}" class="btn btn-danger">Cancel</a>
                          </div>

                        <div class="text-right">
                            <button class="btn btn-success mr-1" type="submit">Issue Item</button>
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

