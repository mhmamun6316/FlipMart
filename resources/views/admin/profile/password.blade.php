@extends('layouts.admin_master')
@section('admin-content')
     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel m-4">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMaMa</a>
          <span class="breadcrumb-item active">Update Password</span>
        </nav>
  
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-4 ">
                    @include('admin.profile.inc.sidebar')
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card">
                          <div class="card-body">
                              <form action="{{ route('change.password.store') }}" method="POST">
                                  @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Old Password</label>
                                      <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="old password">
                                      @error('old_password')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
      
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">New Password</label>
                                      <input type="password" name="new_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="new password">
                                      @error('new_password')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
      
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Confirm Password</label>
                                      <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Re-Type Passowrd">
                                      @error('password_confirmation')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                
                                  <div class="form-group">
                                      <button type="submit" class="btn btn-danger">Change Password</button>
                                  </div>
                              </form>
                          </div>
                    </div>
                  </div>
          </div><!-- row -->
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->
@endsection

