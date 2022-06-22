@extends('backend.layout.master')
@section('pagetitle', 'Permission Edit')

@section('head')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Permission Detail <a href="{{ route('users') }}"><button class="btn btn-primary">Back</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Permission Edit</li>
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
              <h3 class="card-title">Edit {{ ucwords($permission->name) ?? ''}} Permission Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('updatePermission', ['id' => $permission->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$permission->id}}">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputName">Name  <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" class="form-control" name="name" value="{{$permission->name ?? ''}}" required>
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
          <input type="submit" value="Update permission" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')

@endsection