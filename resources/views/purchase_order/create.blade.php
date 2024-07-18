@extends('layout')
@section('title', 'eGP Stores | Purchase Orders')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Add New Purchase Order</h4>
              </div>

              <div class="card-body">
                <form action="{{ route('purchase_order.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="supplier">Supplier</label>
                            <select class="custom-select form-control" id="inputGroupSelect01" name="supplier">
                                <option value="">Choose...</option>
                                @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                                @endforeach
                             </select>
                             @error('supplier_name')
                             <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                          </div>

                          <div class="form-group col-md-2">
                            <label for="order_date">Order Date</label>
                            <input type="text" class="form-control datepicker" id="order_date" name="order_date" value="{{ old('order_date') }}" >
                            @error('order_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group col-md-2">
                            <label for="expected_delivery_date">Expected Delivery Date</label>
                            <input type="text" class="form-control datepicker" id="expected_delivery_date" name="expected_delivery_date" value="{{ old('expected_delivery_date') }}" >
                            @error('expected_delivery_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group col-md-2">
                            <label for="delivery_status">Delivery Status</label>
                            <select class="custom-select form-control" id="delivery_status" required name="delivery_status">
                                <option value="0">Pending</option>
                                <option value="1">Delivered</option>
                             </select>
                             @error('delivery_status')
                             <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                          </div>

                          <div class="form-group col-md-2" id="actual_delivery_date_div">
                            <label for="actual_delivery_date">Actual Delivery Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control datepicker" id="actual_delivery_date" name="actual_delivery_date" value="{{ old('actual_delivery_date') }}" >
                          </div>

                          <div class="form-group col-md-3" id="received_by_div">
                            <label for="received_by">Received By <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="received_by" name="received_by" value="{{ old('received_by') }}">
                          </div>
                    </div>
                    <br/>
                    <h6 class="mb-4" style="color:navy">Order Items* <button type="button"  class="btn btn-primary btn-sm" id="addRow">Add more items</button></h6>
                    <div id="items-container">

                        <div class="form-row item-row">
                            <div class="form-group col-md-3"  >
                                <label for="item_name">Item/Product Name</label>
                                <input type="text" class="form-control" name="item_name[]" id="item_name" value="{{ old('item_name') }}" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label for="item_description">Item Description</label>
                                <textarea name="item_description[]" id="item_description" class="form-control" value="{{ old('item_description') }}" required></textarea>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="unit_price">Unit Price</label>
                                <input type="text" class="form-control InputAmount" id="unit_price" name="unit_price[]" value="{{ old('unit_price') }}" required>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="quantity">Quantity</label>
                                <input type="text" min="1" class="form-control InputAmount" id="quantity" name="quantity[]" value="{{ old('quantity') }}" required>
                              </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success mr-1" type="submit">Add Purchase Order</button>
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
<script src="{{ asset('assets/js/create_purchase.js') }}"></script>
@endsection

