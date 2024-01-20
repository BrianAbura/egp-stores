@extends('layout')
@section('title', 'eGP Stores | Inventory Item')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Item: <span style="color:navy">{{$item->product_name}}</span></h4>
                <div class="card-header-action">
                    <a href="" class="badge badge-success" data-toggle="modal"
                    data-target=".add-new-item-modal"><i class="fas fa-plus"></i> Restock</a>

                  </div>
              </div>

              <div class="card-body">
                      <div class="row">
                        <div class="col-3 b-r">
                          <strong class="text-muted">Item Description</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$item->product_description}}</h6>
                        </div>
                        <div class="col-3 b-r">
                            <strong class="text-muted">Supplier</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$item->supplier}}</h6>
                        </div>

                        <div class="col-2 b-r">
                            <strong class="text-muted">Receiver</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$item->receiver_name}}</h6>
                        </div>

                        <div class="col-sm-2 b-r">
                            <strong class="text-muted">Quantity</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$item->quantity}}</h6>
                        </div>

                        <div class="col-sm-2 b-r">
                            <strong class="text-muted">Date Received</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{date('d-m-Y', strtotime($item->date_received)) }}</h6>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                        <div class="col-3 b-r">
                          <strong class="text-muted">Last Restock Date</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">
                            @if (!empty($item->last_restock_date))
                                {{ date('d-m-Y H:i', strtotime($item->last_restock_date)) }}
                            @endif
                        </h6>
                        </div>
                        <div class="col-3 b-r">
                            <strong class="text-muted">Added By</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$item->supplier}}</h6>
                        </div>

                        <div class="col-sm-2 b-r">
                            <strong class="text-muted">Date Added</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{ date('d-m-Y H:i', strtotime($item->created_at)) }}</h6>
                        </div>
                      </div>
                      <hr/>

                      <p class="section-title">Item Transactions</p>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade add-new-item-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myLargeModalLabel">Restock Item - {{$item->product_name}} </h5>
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
                        <label for="quantity">Quantity</label>
                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                        @error('quantity')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                   <div class="form-group col-md-3">
                     <label for="receiver">Receiver</label>
                     <input type="text" class="form-control" name="receiver" id="receiver" value="{{ old('receiver') }}">
                     @error('receiver')
                     <div class="form-text text-danger">{{ $message }}</div>
                     @enderror
                   </div>
                   <div class="form-group col-md-3">
                     <label for="date_received">Restock Date</label>
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

