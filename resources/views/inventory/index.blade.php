@extends('layout')
@section('title', 'eGP Stores | Inventory')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Items Received</h4>

                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                    data-target=".add-new-item-modal"><i class="fas fa-plus"></i> Add New Item</a>
                  </div>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover text-large table-border" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Supplier</th>
                        <th>Receiver</th>
                        <th>Date Received</th>
                        <th>Last Restock Date</th>
                        {{-- <th>Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($inventory as $item)
                        @php
                            $cnt = $loop->iteration;
                        @endphp
                            <tr class="h6">
                                <td>{{ $cnt }}</td>
                                <td> <a href="{{route('inventory.show', $item->id)}}">{{ $item->product_name }}</a></td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->supplier }}</td>
                                <td>{{ $item->receiver_name }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->date_received)) }}</td>
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

    <!-- Large modal -->
   <div class="modal fade add-new-item-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="myLargeModalLabel">Add Item to Store</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        <div class="card-body">
        <form action="{{ route('inventory.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="item_name">Item Name</label>
                  <input type="text" class="form-control" name="item_name" id="item_name" value="{{ old('item_name') }}" required>
                  @error('item_name')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="item_description">Item Description</label>
                  <textarea name="item_description" id="item_description" class="form-control" value="{{ old('item_description') }}"></textarea>
                  @error('item_description')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                  <label for="supplier">Supplier/Vendor</label>
                  <input type="text" class="form-control" id="supplier" name="supplier" value="{{ old('supplier') }}">
                  @error('supplier')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-2">
                  <label for="quantity">Quantity</label>
                  <input type="number" min="1" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                  @error('quantity')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="receiver">Receiver</label>
                <input type="text" class="form-control" name="receiver" id="receiver" value="{{ old('receiver') }}">
                @error('receiver')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="date_received">Date Received</label>
                <input type="text" class="form-control datepicker" name="date_received" id="date_received" value="{{ old('date_received') }}">
                @error('date_received')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>
          <div class="text-right">
            <button class="btn btn-success mr-1" type="submit">Add Item</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
          </div>
        </form>
        </div>
       </div>
     </div>
   </div>
 </div>
 </div>


@endsection

