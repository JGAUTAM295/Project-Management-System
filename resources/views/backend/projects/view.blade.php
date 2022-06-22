@extends('backend.layout.master')
@section('pagetitle', 'Project View')

@section('head')
<!-- toastr -->
<link rel="stylesheet" href="{{ URL::asset('css/plugins/toastr/toastr.min.css') }}">
<style>
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
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ucwords($project->title) ?? ''}}  <span class="description">Created - {{date('d F, Y H:i', strtotime($project->created_at))}}</span></h3>   
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Project Skills</span>
                      <span class="info-box-number text-center text-muted mb-0">{{App\Models\Project::getSkillsname($project->proj_skill_id) ?? '-'}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Project Duration</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$project->duration ?? '-'}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Project URL</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$project->proj_url ?? '-'}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4 class="mt-2">Recent Activity</h4>
                  <hr>
                    @if($reviews->isNotEmpty())
                     @foreach($reviews as $review)
                      <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ URL::asset('css/dist/img/avatar2.png') }}" alt="user image">
                        <span class="username">
                          <a href="#" class="text-white mb-2">{{App\Models\Review::getUser($review->userid) ?? '-'}}</a>
                        </span>
                        <span class="description">Shared publicly - {{date('d F, Y H:i A', strtotime($review->created_at))}}  {{date('d F Y h:i:s A')}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>{{$review->review}}</p>
                </div>
                @endforeach
                {!! $reviews->links('pagination::bootstrap-4') !!}
                @else
                <h5>No reviews found!</h5>
                @endif
                <div class="row">
                  <div class="col-12">
                  <hr>
                  <h5 class="mt-2">Add Review</h5>
                  <hr>
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
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ucwords($project->title) ?? ''}}</h3>
              <p class="text-muted">{{ucfirst($project->description) ?? ''}}</p>
              <br>
              <div class="text-muted">
              <h5 class="mt-5 text-muted">Client Reference</h5>
              <p class="text-muted">{{ucfirst($project->client_reference) ?? ''}}</p>
              
              </div>

              <!-- <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div> -->
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')
<!-- Toastr -->
<script src="{{ URL::asset('css/plugins/toastr/toastr.min.js') }}"></script>

<script>
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