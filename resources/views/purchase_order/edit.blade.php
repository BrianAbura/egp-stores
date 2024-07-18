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
                <h4>Edit Purchase Order - #{{ $order['order']->id }} </h4>
                <div class="card-header-action">
                    <a href="{{ route('purchase_order.show', $order['order']->id) }}" class="btn btn-icon btn-sm btn-warning"><i data-feather="corner-up-left"></i></a>
                  </div>
              </div>

              <div class="card-body">
                <form action="{{ route('purchase_order.update', $order['order']->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="supplier">Supplier</label>
                            <select class="custom-select form-control" id="inputGroupSelect01" name="supplier">
                                <option value="{{ $order['order']->supplier->id }}">{{$order['order']->supplier->name }}</option>
                                @foreach ($suppliers as $supplier)
                                @if ($order['order']->supplier->id == $supplier->id)
                                    @continue
                                @endif
                                <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                                @endforeach
                             </select>
                             @error('supplier_name')
                             <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                          </div>

                          <div class="form-group col-md-2">
                            <label for="order_date">Order Date</label>
                            <input type="text" class="form-control datepicker" id="order_date" name="order_date" value="{{ $order['order']->order_date }}" >
                            @error('order_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group col-md-2">
                            <label for="expected_delivery_date">Expected Delivery Date</label>
                            <input type="text" class="form-control datepicker" id="expected_delivery_date" name="expected_delivery_date" value="{{ $order['order']->expected_delivery_date }}" >
                            @error('expected_delivery_date')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="form-group col-md-2">
                            <label for="delivery_status">Delivery Status</label>
                            <select class="custom-select form-control" id="delivery_status" required name="delivery_status">
                              @if ($order['order']->delivery_status == 0)
                                <option value="{{ $order['order']->delivery_status }}">Pending</option>
                                <option value="1">Delivered</option>
                              @else
                              <option value="{{ $order['order']->delivery_status }}">Delivered</option>
                                <option value="0">Pending</option>
                              @endif
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
                        @foreach ($order['order']->items as $item)
                        <div class="form-row item-row">
                            <div class="form-group col-md-3"  >
                                <label for="item_name">Item/Product Name</label>
                                <input type="text" class="form-control" name="item_name[]" id="item_name" value="{{ $item->item_name }}" required>
                              </div>
                              <div class="form-group col-md-3">
                                <label for="item_description">Item Description</label>
                                <textarea name="item_description[]" id="item_description" class="form-control" value="{{ $item->item_description }}" required>{{ $item->item_description }}</textarea>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="unit_price">Unit Price</label>
                                <input type="text" class="form-control" id="unit_price" name="unit_price[]" value="{{ $item->unit_price }}" required>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="quantity">Quantity</label>
                                <input type="number" min="1" class="form-control" id="quantity" name="quantity[]" value="{{ $item->quantity }}" required>
                              </div>
                              <div class="form-ds col-md-1 float-right">
                                <br>
                                <button class="btn btn-sm btn-danger removeRow" type="button"> <i class="fas fa-times-circle" title="Remove Item"></i> Remove</button>
                              </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success mr-1" type="submit">Update Purchase Order</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                      </div>
                </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Large modal -->

 </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/create_purchase.js') }}"></script>
@endsection
