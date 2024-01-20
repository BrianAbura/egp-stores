@extends('layout')
@section('title', 'eGP Stores | Supplier')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 style="color:navy">{{$supplier->name}}</h4>
                <div class="card-header-action">
                    <a href="" class="badge badge-secondary" data-toggle="modal"
                    data-target=".edit-supplier"><i class="fas fa-edit"></i> Edit</a>

                    <a href="" class="badge badge-danger" data-toggle="modal"
                    data-target=".edit-supplier"><i class="fas fa-trash-alt"></i> Delete</a>

                  </div>
              </div>
              <div class="card-body">
                      <div class="row">
                        <div class="col-3 b-r">
                          <strong class="text-muted">Contact Person</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$supplier->contact_person}}</h6>
                        </div>
                        <div class="col-3 b-r">
                            <strong class="text-muted">Phone Number</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$supplier->phone_number}}</h6>
                        </div>

                        <div class="col-2 b-r">
                            <strong class="text-muted">Email Address</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{$supplier->email_address}}</h6>
                        </div>

                        <div class="col-sm-2 b-r">
                            <strong class="text-muted">Date Added</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{date('d-m-Y H:i', strtotime($supplier->created_at)) }}</h6>
                        </div>

                        <div class="col-sm-2 b-r">
                            <strong class="text-muted">Date Updated</strong>
                          <br>
                          <h6 class="mt-2" style="color:navy">{{date('d-m-Y H:i', strtotime($supplier->updated_at)) }}</h6>
                        </div>
                      </div>
                      <br/>
                      <hr/>

                      {{-- <p class="section-title">supplier Transactions</p>
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
                      </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade edit-supplier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myLargeModalLabel">Add New Supplier</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="card-body">
             <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="form-row">
                     <div class="form-group col-md-3">
                       <label for="supplier_name">Supplier Name</label>
                       <input type="text" class="form-control" name="supplier_name" id="supplier_name" value="{{ $supplier->name }}">
                       @error('supplier_name')
                       <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                     </div>
                     <div class="form-group col-md-3">
                       <label for="contact_person">Contract Person</label>
                       <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $supplier->contact_person }}" >
                       @error('contact_person')
                       <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                     </div>
                     <div class="form-group col-md-3">
                         <label for="phone_number">Phone Number</label>
                         <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $supplier->phone_number }}" placeholder="Format: 2567...">
                         @error('phone_number')
                         <div class="form-text text-danger">{{ $message }}</div>
                         @enderror
                       </div>
                       <div class="form-group col-md-3">
                         <label for="email_address">Email Address</label>
                         <input type="email" class="form-control" id="email_address" name="email_address" value="{{ $supplier->email_address }}">
                         @error('email_address')
                         <div class="form-text text-danger">{{ $message }}</div>
                         @enderror
                       </div>
                 </div>
               <div class="text-right">
                 <button class="btn btn-success mr-1" type="submit">Update</button>
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

