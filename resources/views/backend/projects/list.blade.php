@extends('backend.layout.master')
@section('pagetitle', 'Project List')

@section('head')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Projects <a href="{{ route('addProject') }}"><button class="btn btn-primary">Add Project</button></a></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p class="mb-0">{{ $message }}</p>
          </div>
          @endif
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped mt-3">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Skill(s)</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($projects)
                    @foreach($projects as $project)
                  <tr>
                    <td>{{ucwords($project->title) ?? ''}}</td>
                    <td>{{ucwords($project->duration) ?? ''}}</td>
                    <td>{{App\Models\Project::getSkillsname($project->proj_skill_id) ?? '-'}}</td>
                    <td>{{$project->proj_url ?? ''}}</td>
                    <td class="project-state"><span class="badge badge-success">{{$project->status ?? ''}}</span></td>
                    <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="{{route('viewProject', ['slug' => $project->slug])}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('editProject', ['id' => $project->id]) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <form method="POST" action="{{ route('deleteProject', $project->id) }}" style="display: inline-block;">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fas fa-trash"></i>Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="6">No Data Found!</td>
                  </tr>
                  @endif
                  

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
@endsection

@section('footerscript')
<!-- DataTables  & Plugins -->
<script src="{{ URL::asset('css/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this project?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection