@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Company</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('internships.update', $internship->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Intern Name</label>
                                    <select class="form-control select2" name="intern_id" id="intern_id" style="width: 100%;" value='{{ $internship->intern_id}}'>
                                    @foreach($interns as $intern)
                                        <option name="intern_id" value="{{$intern->id}}">{{$intern->name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
               
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                        <label>Supervisor Name</label>
                                        <select class="form-control select2" name="supervisor_id" id="supervisor_id" style="width: 100%;" value='{{ $internship->supervisor_id }}'>
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
                                    <select name="company_id" class="form-control" id="company_id" style="width: 100%;" value='{{ $internship->company_id }}'>
                                    @foreach($companies as $company)
                                        <option name="company_id" value="{{$company->id}}">{{$company->name}}</option>
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
                                            <label>Duration</label>
                                            <input type="text" class="form-control select2" name="duration" id="duration" style="width: 100%;" value='{{ $internship->duration }}' placeholder="Enter Time">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                    </div>
                                        <!-- /.col -->
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control select2" name="description" id="description" style="width: 100%;" value='{{ $internship->description }}' placeholder="Enter Description">
                                            </div>
                                        <div>
                                            <!-- /.form-group -->
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div> 
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        {{-- Form Start Here --}}
    </div>
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

