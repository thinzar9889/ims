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
                                <h3 class="card-title">Edit Report</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('reports.update', $report->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="card-body">
                                <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter">
                                </div>
                                </div>
                                </div>

        <div> 
            <label>Intern Name:</label>
            <input type="text" name="intern_id" id="intern_id" class="form-control" placeholder="Enter Intern Name" value='{{ $report->intern_id }}'>
        </div><br>

        <div> 
            <label>Roll No:</label>
            <input type="text" name="roll_no" id="roll_no" class="form-control" placeholder="Enter Roll No" value='{{ $report->roll_no }}'>
        </div><br><br><br>

         <label>Month:</label>
         <select name="month"  id="month" value='{{ $report->month }}' >
         <option value="may" selected>May</option>
         <option value="june" selected>June</option>
         <option value="july">July</option></select>
         <br><br><br>

                    
         <label>Week:</label>
         <select name="week"  id="week" value='{{ $report->week }}' >
         <option value="first week" selected>First Week</option>
         <option value="second week" selected>Second Week</option>
         <option value="third week">Third Week</option></select>
         <br><br><br> 

                    <form action="{{ route('reports.store') }}" method="post">
                    
                    <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                <tr>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" class="col-sm-12" >Date</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Description</th>
                </tr>
                </thead>
                <tbody>
               
                <tr class="odd">
                    <td><label>Monday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="first_description" rows="3">{{ $report->first_description }}</textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Tuesday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="second_description" rows="3">{{ $report->second_description }}</textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Wednesday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="third_description" rows="3">{{ $report->third_description }}</textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Thursday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="fourth_description" rows="3">{{ $report->fourth_description }}</textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Friday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="fifth_description" rows="3">{{ $report->fifth_description }}</textarea></td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
        <label>Comment For Improvement</label></br>
        <textarea class="form-control" id="comment" rows="7">{{ $report->comment }}</textarea>
        <br><input type="submit" value="Save" class="btn btn-success">



        <label>What was learned during the Week.</label></br>
        <textarea class="form-control" id="reflection" rows="7">{{ $report->reflection }}</textarea>
        <br><input type="submit" value="Save" class="btn btn-success">
        
        
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

