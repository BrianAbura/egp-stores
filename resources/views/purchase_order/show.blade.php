@extends('layout')
@section('title', 'eGP Stores | Purchase Orders')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
              <div class="row">
                <div class="col-lg-12">
                  <div class="invoice-title">
                    <h4>Purchase Order
                    </h4>
                    <div class="card-header-action">
                        @if ($order->delivery_status == 0)
                        <span class="badge badge-warning">Pending</span>
                        @else
                        <span class="badge badge-success">Delivered</span>
                        @endif
                      </div>

                    <div class="invoice-number">Order #{{ $order->id }} </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-md-right">
                      <address>
                        <strong>Supplier:</strong><br>
                        <h6 style="color:navy" class="text-uppercase">{{ $order->supplier->name }}</h6>
                        {{ $order->supplier->phone_number }}<br>
                        {{ $order->supplier->email_address }}<br>
                      </address>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-md-left">
                      <address>
                        <strong>Order Date:</strong><br>
                        {{ date('d F Y', strtotime($order->order_date) ) }} <br><br>
                        <strong>Expected Delivery Date:</strong><br>
                        {{ date('d F Y', strtotime($order->expected_delivery_date) ) }}
                      </address>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="section-title">Order Summary</div>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-border table-md">
                      <tr>
                        <th data-width="40">#</th>
                        <th>Item</th>
                        <th class="">Description</th>
                        <th class="text-center">Price (UGX)</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Totals</th>
                      </tr>
                      @php
                          $sum = 0;
                      @endphp
                      @foreach ($order->items as $item)
                        @php
                        $cnt = $loop->iteration;
                        @endphp
                        <tr>
                            <td> {{ $cnt }} </td>
                            <td> {{ $item->item_name }} </td>
                            <td> {{ $item->item_description }} </td>
                            <td class="text-center"> {{ number_format($item->unit_price) }} </td>
                            <td class="text-center"> {{ number_format($item->quantity_in_stock) }} </td>
                            <td class="text-right"> {{ number_format($item->quantity_in_stock * $item->unit_price) }} </td>
                        </tr>
                        @php
                            $sum += ($item->quantity_in_stock * $item->unit_price)
                        @endphp
                      @endforeach
                    </table>
                  </div>
                  <div class="row mt-4">
                    <div class="col-lg-12 text-right">
                      <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Total</div>
                        <div class="invoice-detail-value invoice-detail-value-lg">UGX {{number_format($sum)}} </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                @if ($order->delivery_status == 0 )
                <div class="float-lg-left mb-lg-0 mb-3">
                    <button class="btn btn-success btn-icon icon-left"  data-toggle="modal" data-target="#updateDeliveryStatus"><i class="fas fa-check"></i> Update Delivery</button>
                    <a href="{{ route('purchase_order.edit', $order->id) }}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-edit"></i> Edit Order</a>
                    <button class="btn btn-danger btn-icon icon-left" data-toggle="modal" data-target="#deleteOrder"><i class="fas fa-trash-alt"></i> Delete</button>
                  </div>
                @endif

              <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
            </div>
          </div>
      </div>
    </section>
            <!-- Update Delivery -->
            <div class="modal fade" id="updateDeliveryStatus" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Update Delivery</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  You are confirming that the items in this purchase order have been delivered.
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('purchase_order.confirm_delivery', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="delivery_status" id="delivery_status" value="1">
                        <button type="submit" class="btn btn-success">Confirm Delivery</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
          {{-- Delete order --}}
          <div class="modal fade" id="deleteOrder" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Purchase Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this Purchase Order? <br><br> <b>Note:</b> This action cannot be reversed.
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <form action="{{ route('purchase_order.destroy', $order->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Confirm Delete</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </form>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

