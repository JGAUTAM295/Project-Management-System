@extends('backend.layout.master')
@section('pagetitle', 'UserRole Add')

@section('head')

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Add UserRole <a href="{{ route('usersRole') }}"><button class="btn btn-primary">Back</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">UserRole Add</li>
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
              <h3 class="card-title">Add UserRole Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('storeUserRole') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Name  <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status  <span class="text-danger">*</span></label>
                            <select id="inputStatus" class="form-control custom-select" name="status">
                            <option selected disabled>Select one</option>
                            <option value="1">Active</option>
                            <option value="2">Deactive</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputProjectLeader">Permission <span class="text-danger">*</span></label>
                        <table class="table table-striped">
                        <thead>
                          <th scope="col" width="1%">
                          <th scope="col" width="20%">Name</th>
                          <th scope="col" width="1%">Guard</th>
                        </thead>
                        @foreach($permission as $value)
                        <tr>
                            <td>
                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class='permission'>
                            </td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->guard_name }}</td>
                        </tr>
                        @endforeach
                      </table>
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
          <input type="submit" value="Create new userrole" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')

@endsection