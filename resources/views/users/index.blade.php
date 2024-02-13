@extends('layout')
@section('title', 'eGP Stores | Users')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>System Users</h4>

                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                    data-target=".add-new-user"><i class="fas fa-user-plus"></i> Add New user</a>
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
                        <th>Fullname</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Date Added</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @php
                            $cnt = $loop->iteration;
                        @endphp
                            <tr class="h6">
                                <td>{{ $cnt }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                <td> <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm"> <i class="fas fa-pen"></i> Edit</a></td>
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
   <div class="modal fade add-new-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="myLargeModalLabel">Add New user</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        <div class="card-body">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="fullname">Fullname</label>
                  <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname') }}">
                  @error('fullname')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-3">
                  <label for="email_address">Email Address</label>
                  <input type="text" class="form-control" id="email_address" name="email_address" value="{{ old('email_address') }}" >
                  @error('email_address')
                  <div class="form-text text-danger">{{ $message }}</div>
                  @enderror
                </div>
                  <div class="form-group col-md-3">
                    <label for="role">Role</label>
                    <select class="custom-select form-control" id="role" required name="role">
                        <option value="Staff">Staff</option>
                        <option value="Admin">Administrator</option>
                     </select>
                    @error('role')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
          <div class="text-right">
            <button class="btn btn-success mr-1" type="submit">Add user</button>
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

