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
                <h4>Edit System Users</h4>
              </div>

              <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="fullname">Fullname</label>
                          <input type="text" class="form-control" name="fullname" id="fullname" value="{{ $user->name }}">
                          @error('fullname')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="email_address">Email Address</label>
                          <input type="text" class="form-control" id="email_address" name="email_address" value="{{ $user->email }}">
                          @error('email_address')
                          <div class="form-text text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                          <div class="form-group col-md-3">
                            <label for="role">Role</label>
                            <select class="custom-select form-control" id="role" required name="role">

                                <option value="{{$user->role}}">{{$user->role}}</option>
                                @if ($user->role == "Admin")
                                <option value="Staff">Staff</option>
                                @else
                                <option value="Admin">Administrator</option>
                                @endif
                             </select>
                            @error('role')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                    </div>
                  <div class="text-right">
                    <button class="btn btn-success mr-1" type="submit">Update user</button>
                    <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
                  </div>
                </form>
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

