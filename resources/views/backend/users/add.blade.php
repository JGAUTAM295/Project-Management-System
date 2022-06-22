@extends('backend.layout.master')
@section('pagetitle', 'User Add')

@section('head')

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Add User <a href="{{ route('users') }}"><button class="btn btn-primary">Back</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add User Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Name  <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword">Password <span class="text-danger">*</span></label>
                            <input type="password" id="inputPassword" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="inputProjectLeader">User Role <span class="text-danger">*</span></label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        </div>

                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
                        <label for="inputEmail">Email  <span class="text-danger">*</span></label>
                        <input type="email" id="inputEmail" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="inputCPassword">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" id="inputCPassword" class="form-control" name="confirm-password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control custom-select" name="status">
                            <option selected disabled>Select one</option>
                            <option value="1">Active</option>
                            <option value="2">Deactive</option>
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
          <input type="submit" value="Create new user" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')

@endsection