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
                <h4>Purchase Orders</h4>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-border" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                            Order ID
                          </th>
                        <th>Supplier Name</th>
                        <th>Order Date</th>
                        <th>Expected Delivery Date</th>
                        <th>Delivery Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="text-center">{{ $order->id }}</td>
                                <td class="text-md"> <a href="{{route('supplier.show', $order->supplier->id)}}"> <strong>{{ $order->supplier->name }}</strong> </a></td>
                                <td>{{ date('d-m-Y', strtotime($order->order_date)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($order->expected_delivery_date)) }}</td>
                                <td>
                                    @if ($order->delivery_status == 0)
                                        <div class="badge badge-warning">Pending</div>
                                    @else
                                        <div class="badge badge-success">Delivered</div>
                                    @endif
                                </td>
                                <td> <a href="{{route('purchase_order.show', $order->id)}}" class="btn btn-primary btn-sm"> <i class="fas fa-search"></i> Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 </div>
@endsection

