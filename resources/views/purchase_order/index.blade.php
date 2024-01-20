@extends('layout')
@section('title', 'eGP Stores | Suppliers')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Purchaase Orders</h4>

                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                    data-target=".add-new-supplier"><i class="fas fa-user-plus"></i> Add New</a>
                  </div>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-border" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Supplier Name</th>
                        <th>Contact Person</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($suppliers as $supplier)
                        @php
                            $cnt = $loop->iteration;
                        @endphp
                            <tr class="h6">
                                <td>{{ $cnt }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->contact_person }}</td>
                                <td>{{ $supplier->phone_number }}</td>
                                <td>{{ $supplier->email_address }}</td>
                                <td> <a href="{{route('supplier.show', $supplier->id)}}" class="btn btn-primary btn-sm"> <i class="fas fa-search"></i> View</a></td>
                            </tr> --}}
                        {{-- @endforeach --}}
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
   <div class="modal fade add-new-supplier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
        <form action="{{ route('supplier.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="supplier_name">Supplier Name</label>
                  <input type="text" class="form-control" name="supplier_name" id="supplier_name" value="{{ old('supplier_name') }}">
                  @error('supplier_name')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                  <label for="contact_person">Contract Person</label>
                  <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ old('contact_person') }}" >
                  @error('contact_person')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Format: 2567...">
                    @error('phone_number')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group col-md-3">
                    <label for="email_address">Email Address</label>
                    <input type="email" class="form-control" id="email_address" name="email_address" value="{{ old('email_address') }}">
                    @error('email_address')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
          <div class="text-right">
            <button class="btn btn-success mr-1" type="submit">Add Supplier</button>
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

