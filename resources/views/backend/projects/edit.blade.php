@extends('backend.layout.master')
@section('pagetitle', 'Project Edit')

@section('head')
<!-- Select2 -->
<link rel="stylesheet" href="{{ URL::asset('css/plugins/select2/css/select2.min.css') }}">
<!-- toastr -->
<link rel="stylesheet" href="{{ URL::asset('css/plugins/toastr/toastr.min.css') }}">

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
.user-block .description {
  color: #d1d7dd!important;
}
</style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Project Detail <a href="{{ route('projects') }}"><button class="btn btn-primary">Back</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    

    <!-- Main content -->
    <section class="content mb-4">
      <div class="row">
        <div class="col-md-12">
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
          {{ session('status') }}
        </div>
    @endif
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit {{ ucwords($project->title) ?? ''}} Project Details</h3>
            </div>
            <div class="card-body">
            <form action="{{ route('updateProject', ['id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="proj_id" value="{{ $project->id ?? ''}}">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" id="inputName" class="form-control" name="title" value="{{$project->title ?? ''}}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="description">{{$project->description ?? ''}}</textarea>
              </div>
              @php $selected = explode(",", $project->proj_skill_id) @endphp
              <div class="form-group">
                <label for="inputProjectLeader">Project Skills <span class="text-danger">*</span></label>
                <select id="inputProjectLeader" class="form-control select2" name="proj_skill_id[]" multiple="multiple" data-placeholder="Select one" style="width: 100%;">
                @if($tags->isNotEmpty())
                @foreach($tags as $tag)
                  <option value="{{$tag->id ?? ''}}" {{ (in_array($tag->id, $selected)) ? 'selected' : '' }}>{{ucwords($tag->title ?? '')}}</option>
                @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Project Duration  <span class="text-danger">*</span></label>
                <input type="number" id="inputEstimatedDuration" class="form-control" name="duration" value="{{$project->duration ?? ''}}">
              </div>

                <div class="form-group">
                    <label for="inputClientCompany">Client Reference </label>
                    <textarea id="inputClientCompany" class="form-control" rows="4" name="client_reference">{{$project->client_reference ?? ''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="inputProjectLeader">Project URL <span class="text-danger">*</span></label>
                    <input type="url" id="inputProjectLeader" class="form-control" name="proj_url" value="{{$project->proj_url ?? ''}}">
                </div>

                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control custom-select" name="status">
                        <option selected disabled>Select one</option>
                        <option value="1" @if($project->status == 'On Hold') selected @endif>On Hold</option>
                        <option value="2" @if($project->status == 'Canceled') selected @endif>Canceled</option>
                        <option value="3" @if($project->status == 'Start') selected @endif>Start</option>
                        <option value="4" @if($project->status == 'Working') selected @endif>Working</option>
                        <option value="5" @if($project->status == 'Success') selected @endif>Success</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Update" class="btn btn-success float-right">
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Reviews</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </form>
            </div>
            <div class="card-body p-4">
                @if($reviews->isNotEmpty())
                @foreach($reviews as $review)
                <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ URL::asset('css/dist/img/avatar2.png') }}" alt="user image">
                        <span class="username">
                          <a href="#" class="text-white mb-2">{{App\Models\Review::getUser($review->userid) ?? '-'}}</a>
                        </span>
                        <span class="description">Shared publicly - {{date('d F, Y H:i A', strtotime($review->created_at))}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>{{$review->review}}</p>
                </div>
                @endforeach
                {!! $reviews->links('pagination::bootstrap-4') !!}
                @endif
                <div class="row">
                  <div class="col-12">
                      <form id="reviewForm" class="mt-3" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <textarea id="inputprojreview" class="form-control" rows="4" name="review" placeholder="Enter review here..."></textarea>
                          </div>
                          <a href="#" class="btn btn-secondary">Cancel</a>
                          <input id="reviewFormsubmit" type="submit" value="Send" class="btn btn-success float-right">
                      </form>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')
<!-- Select2 -->
<script src="{{ URL::asset('css/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ URL::asset('css/plugins/toastr/toastr.min.js') }}"></script>

<script>
  $(function () {
  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  })
    $('#reviewFormsubmit').on('click', function(e) {
       e.preventDefault(); 
       var message = $('#inputprojreview').val();
       var projid = {{$project->id}};
       $.ajax({
           type: "POST",
           url: '{{route("storeReview")}}',
           data: {message:message, projid:projid},
           headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function( response ) 
        {
              
               if(response.status != '')
               {
                toastr.success(response.data);
                $("#reviewForm")[0].reset();
                var pageID = $(".pjmt").attr('id');
                //$('#'+pageID).load(window.location.href + '#'+pageID);
                setTimeout(function () {
                  window.location.reload();
                }, 1000);
               }
               else
               {
                toastr.error('Review Not Submitted Successfully!')
               }
           }
       });
   });
</script>
@endsection