@extends('admin.layouts.master')
@section('css')
  <!-- Internal Data table css -->
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
  <!--- Internal Sweet-Alert css-->
  <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">About US</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Show</span>
      </div>
    </div>
    <div class="action">
      <a class="add-to-cart btn btn-success" href="" type="button">Edit</a>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row row-sm">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body h-100">
          <div class="row row-sm ">
              @isset($about)
              @if($about->count() > 0)
              @foreach($about as $about)
            <div class=" col-xl-5 col-lg-12 col-md-12">
              <div class="preview-pic tab-content">
                <div class="tab-pane active" id="pic-1"><img src="{{asset('images/about').'/'.$about->image}}" alt="image"/></div>
              </div>
            </div>
            <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
              <h4>Body:</h4>
              <p class="product-description">{{$about->body}}</p>
            </div>
          </div>
          @endforeach
          @endif
          @endisset
        </div>
      </div>
    </div>
  </div>
  <!-- /row -->
  </div>
  <!-- Container closed -->
  </div>
  <!-- main-content closed -->
@endsection
@section('js')
  <!-- Internal Data tables -->
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
  <!--Internal  Datatable js -->
  <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
  <!--Internal  Sweet-Alert js-->
  <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
  <!-- Sweet-alert js  -->
  <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>

  <script>
    $(document).ready(function () {
      $('.delete').click(function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            let data = {
              "_token": "{{ csrf_token() }}",
              "id": id
            };
            $.ajax({
              type: "POST",
              url: '/dashboard/categories/delete/'+id,
              data: data,
              success: function (response) {
                swal("Deleted!", response.status, "success"),
                  location.reload();
              }
            });
          }
        });
      });
    });

  </script>
@endsection
