@extends('backend.layout.master')
@section('pagetitle', 'Project Edit')

@section('head')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>User Detail <a href="{{ route('users') }}"><button class="btn btn-primary">Back</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">User Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit {{ ucwords($user->title) ?? ''}} User Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('updateUser', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$user->id ?? ''}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Name  <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" class="form-control" name="name" value="{{ $user->name ?? ''}}" required>
                            @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputPassword">Password <span class="text-danger">*</span></label>
                            <input type="password" id="inputPassword" class="form-control" name="password">
                        </div>
                     
                        <div class="form-group">
                            <label for="inputProjectLeader">User Role <span class="text-danger">*</span></label>
                            <select class="form-control" name="roles" required>
                              <option value="">Select User role</option>
                              @foreach($roles as $role)
                              <option value="{{ $role->name }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }}>{{ $role->name }}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('role'))
                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
                        <label for="inputEmail">Email  <span class="text-danger">*</span></label>
                        <input type="email" id="inputEmail" class="form-control" name="email" value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="inputCPassword">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" id="inputCPassword" class="form-control" name="confirm-password">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control custom-select" name="status">
                            <option selected disabled>Select one</option>
                            <option value="1" @if($user->status == '1') selected @endif>Active</option>
                            <option value="2" @if($user->status == '2') selected @endif>Deactive</option>
                        </select>
                    </div>

                    </div>
                </div> 
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Update user" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
@endsection

@section('footerscript')

@endsection