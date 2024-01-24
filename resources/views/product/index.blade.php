@extends('layout')
@section('title', 'eGP Stores | Products_Items')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Products/Items</h4>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-border" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                           Order No.
                          </th>
                        <th>Item/Product Name</th>
                        <th>Item Description</th>
                        <th>Quantity</th>
                        <th>Delivery Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{ $products }}
                        @foreach ($products as $item)
                            <tr>
                                <td class="text-center">{{ $item->purchase_order_id }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_description }}</td>
                                <td>{{ $item->item_description }}</td>
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

