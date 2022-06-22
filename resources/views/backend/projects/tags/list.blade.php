@extends('backend.layout.master')
@section('pagetitle', 'Tag List')

@section('head')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/toastr/toastr.min.css') }}">
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tag</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Tag</li>
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
            <p>{{ $message }}</p>
          </div>
          @endif
          </div>
        <div class="col-6">
            <div class="card">
              <div class="card-body">
              <form id="tagForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="editid" id="inputID" value="">
                <div class="form-group">
                    <label for="inputName">Title <span class="text-danger">*</span></label>
                    <input type="text" id="inputName" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control custom-select" name="status">
                        <option selected disabled>Select one</option>
                        <option value="1">Active</option>
                        <option value="2">Deactive</option>
                    </select>
                </div>
                <div class="row">
                  <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Submit" class="btn btn-success float-right submitbtn">
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
          <div class="col-6">
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
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($tags->isNotEmpty())
                    @foreach($tags as $tag)
                  <tr>
                    <td>{{ucwords($tag->title) ?? ''}}</td>
                    <td>{{$tag->slug ?? ''}}</td>
                    <td class="project-state"><span class="badge badge-success">{{$tag->status ?? ''}}</span></td>
                    <td class="project-actions">
                          <!-- <a class="btn btn-info btn-sm" href="{{ route('editTag', ['id' => $tag->id]) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a> -->
                          <button class="btn btn-info btn-sm editTag" id="{{$tag->id}}"> <i class="fas fa-pencil-alt"></i> Edit</button>
                          <form method="POST" action="{{ route('deleteTag', $tag->id) }}" style="display: inline-block;">
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
<script src="{{ URL::asset('css/plugins/toastr/toastr.min.js') }}"></script>

<script type="text/javascript">

//Store Tag
  $('#tagForm').on('submit', function(e) {
    e.preventDefault();
    var title = $('#inputName').val();
    var status = $('#inputStatus').val();
    var tagID = $('#inputID').val();

    if(tagID !='')
    {
      $.ajax({
          type: "POST",
          url: '{{route("updateTag")}}',
          data: {id:tagID, title:title, status:status},
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(response)
          {
            console.log(response);
               if(response.status == '200')
               {
                toastr.success(response.data);
                $("#tagForm")[0].reset();
                var pageID = $(".pjmt").attr('id');
                //$("body").load(window.location.href + '#'+pageID);
                setTimeout(function () {
                  window.location.reload();
                }, 1500)
                
               }
               else
               {
                if(response.data !='')
                {
                  toastr.error(response.data);
                }
                else
                {
                  toastr.error('Tag Not Updated Successfully!');
                }
                
               }
           }
      });
    }
    else
    {
      console.log("Tag IDs:-  "+ tagID);
      $.ajax({
          type: "POST",
          url: '{{route("storeTag")}}',
          data: {title:title, status:status},
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function( response ) 
          {
            if(response.status == '200')
            {
            toastr.success(response.data);
            $("#tagForm")[0].reset();
            var pageID = $(".pjmt").attr('id');
            //$("body").load(window.location.href + '#'+pageID);
            setTimeout(function () {
              window.location.reload();
            }, 1000)
            
            }
            else
            {
            if(response.data !='')
            {
              toastr.error(response.data);
            }
            else
            {
              toastr.error('Tag Not Submitted Successfully!');
            }
            
            }
          }
      });
    }
  });

   //Edit Tag

  $('.editTag').click(function(e) {
    e.preventDefault();

      $.ajax({
          type: "POST",
          url: '{{route("editTag")}}',
          data: {id:$(this).attr('id')},
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(response) 
          {
            console.log(response);
            if(response.status == '200')
            {
              $("#inputID").val(response.data.id);
              $("#inputName").val(response.data.title);
              $("select#inputStatus").val(response.data.status);
              $(".submitbtn").val('update');

            }
            else
            {
              if(response.data !='')
              {
                toastr.error(response.data);
              }
              else
              {
                toastr.error('Tag Not Found!');
              }
            }
          }
      });
  });

   //Delete Tag

  $('.show_confirm').click(function(e) {

    var form =  $(this).closest("form");
    var name = $(this).data("name");

    e.preventDefault();
    swal({
        title: `Are you sure you want to delete this tag?`,
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
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
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