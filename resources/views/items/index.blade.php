@extends('layout')
@section('title', 'eGP Stores | Items In Store')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Items In Store</h4>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-border" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                           Order No.
                          </th>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Quantity In Store</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center h6"><a href="{{route('purchase_order.show', $item->purchase_order_id)}}"> {{$item->purchase_order_id}} </a></td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->item_description }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td></td>
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

