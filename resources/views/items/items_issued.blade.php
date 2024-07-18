@extends('layout')
@section('title', 'eGP Stores | Items')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Items Issued</h4>

                <div class="card-header-action">
                    <a href="{{route('items.issue_items')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-user-check"></i> Issue Item to User</a>
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
                        <th>Issued By</th>
                        <th>Quantity</th>
                        <th>Receiver</th>
                        <th>Issue Date</th>
                        <th>To be Returned</th>
                      </tr>
                    </thead>
                    <tbody>@php
                        $sum = 0;
                    @endphp
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center h6"><a href="{{route('purchase_order.show', $item->item_details->purchase_order_id)}}"> {{$item->item_details->purchase_order_id}} </a></td>
                                <td>{{ $item->item_details->item_name }}</td>
                                <td>{{ $item->issued_by }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->receiver }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->issue_date)) }}</td>
                                <td>
                                    @if ($item->for_return == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
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

