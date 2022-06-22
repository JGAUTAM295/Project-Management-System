@extends('backend.layout.master')
@section('pagetitle', 'UserRole Edit')

@section('head')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>UserRole Detail <a href="{{ route('usersRole') }}"><button class="btn btn-primary">Back</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">UserRole Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
          @endif
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit {{ ucwords($role->title) ?? ''}} UserRole Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('updateUserRole', ['id' => $role->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $role->id ?? '' }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Name  <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" class="form-control" name="name" value="{{ $role->name ?? ''}}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status  <span class="text-danger">*</span></label>
                            <select id="inputStatus" class="form-control custom-select" name="status">
                            <option selected disabled>Select one</option>
                            <option value="1" @if($role->status == '1') selected @endif>Active</option>
                            <option value="2" @if($role->status == '2') selected @endif>Deactive</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">

                    <div class="form-group">
                      <label for="permissions" class="form-label">Assign Permissions <span class="text-danger">*</span></label>
                      <table class="table table-striped">
                        <thead>
                          <th scope="col" width="1%">
                          <th scope="col" width="20%">Name</th>
                          <th scope="col" width="1%">Guard</th>
                        </thead>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" 
                                name="permission[{{ $permission->name }}]"
                                value="{{ $permission->name }}"
                                class='permission'
                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
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
          <input type="submit" value="Update userrole" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')
<script>
  
</script>
@endsection