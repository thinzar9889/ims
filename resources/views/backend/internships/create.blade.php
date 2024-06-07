@extends('backend.layouts.app')
@section('content')




<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Internship Form</h1>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Internship</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="{{ route('internships.store') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Intern Name</label>
                  <select class="form-control select2" name="intern_id" id="intern_id" style="width: 100%;">
                  @foreach( $interns as $id=> $name )
                    <option value="{{ $id }}">{{ $name }}</option>
                  @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
               
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Supervisor Name</label>
                  <select class="form-control select2" name="supervisor_id" id="supervisor_id" style="width: 100%;">
                    @foreach($supervisors as $supervisor)
                        <option name="supervisor_id" value="{{$supervisor->id}}">{{$supervisor->name}}</option>
                    @endforeach
                 </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Company Name</label>
                  <select name="company_id" class="form-control" id="company_id" style="width: 100%;" >
                      @foreach($companies as $company)
                        <option name="company_id" value="{{$company->id}}">{{$company->name}}</option>
                      @endforeach
                  </select>

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Duration</label>
                  <input type="text" class="form-control select2" name="duration" id="duration" style="width: 100%;" placeholder="Enter Time">
                </div>
                <!-- /.form-group -->
              </div>
          </div>
              <!-- /.col -->
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control select2" name="description" id="description" style="width: 100%;" placeholder="Enter Description">
                </div>
             <!-- /.form-group -->
              </div>
          </div>
        </div>
        </div>
        </div>
    <div class="card-footer ">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>       
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
            $('.select-role').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endsection