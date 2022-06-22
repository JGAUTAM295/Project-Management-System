@extends('backend.layout.master')
@section('pagetitle', 'Project Add')

@section('head')
<!-- Select2 -->
<link rel="stylesheet" href="{{ URL::asset('css/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
  .select2-container--default .select2-selection--multiple {
    background-color: transparent!important;
    border: 1px solid #6c757d!important;
    color: #fff!important;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3f6791!important;
    border-color: #3f6791!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #fff!important;
}
input.select2-search__field::placeholder {
    color: #fff!important;
}
</style>
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Add Project <a href="{{ route('projects') }}"><button class="btn btn-primary">Back</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
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
              <h3 class="card-title">Add Project Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('storeProject') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Project Name  <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Project Description  <span class="text-danger">*</span></label>
                            <textarea id="inputDescription" class="form-control" rows="4" name="description" required></textarea>
                        </div>

                        <div class="form-group">
                          <label for="inputProjectLeader">Project Skills <span class="text-danger">*</span></label>
                          <select id="inputProjectLeader" class="form-control select2" name="proj_skill_id[]" multiple="multiple" data-placeholder="Select one" style="width: 100%;">
                          @if($tags->isNotEmpty())
                          @foreach($tags as $tag)
                          <option value="{{$tag->id ?? ''}}">{{ucwords($tag->title ?? '')}}</option>
                          @endforeach
                          @endif
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Project Duration  <span class="text-danger">*</span></label>
                            <input type="number" id="inputEstimatedDuration" class="form-control" name="duration" required>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="inputClientCompany">Client Reference </label>
                            <textarea id="inputClientCompany" class="form-control" rows="4" name="client_reference"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputProjectLeader">Project URL <span class="text-danger">*</span></label>
                            <input type="url" id="inputProjectLeader" class="form-control" name="proj_url" required>
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select" name="status">
                                <option selected disabled>Select one</option>
                                <option value="1">On Hold</option>
                                <option value="2">Canceled</option>
                                <option value="3">Start</option>
                                <option value="4">Working</option>
                                <option value="5">Success</option>
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
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')
<!-- Select2 -->
<script src="{{ URL::asset('css/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  })
</script>
@endsection