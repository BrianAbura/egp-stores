@extends('layout')
@section('title', 'eGP Stores | Items Returned')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Items Returned</h4>
                <div class="card-header-action">
                    <a href="{{route('items.return_items')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-file-download"></i> Record Items Returned</a>
                  </div>
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
                            <th>Issued to</th>
                            <th>Quantity Returned</th>
                            <th>Return Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum = 0;
                            @endphp
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center h6"><a href="{{route('purchase_order.show', $item->item_details->purchase_order_id)}}"> {{$item->item_details->purchase_order_id}} </a></td>
                                    <td>{{ $item->item_details->item_name }}</td>
                                    <td>{{ $item->receiver }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->return_date)) }}</td>
                                </tr>
                                @php
                                $sum += $item->quantity;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="table-default"></td>
                                <td class="text-right"><b>Total:</b></td>
                                <td class="text-left"> <b>{{number_format($sum)}}</b> </td>
                            </tr>
                        </tfoot>
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

