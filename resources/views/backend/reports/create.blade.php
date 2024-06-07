@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
<div class="card-body">
     <div class="col-sm-12 col-md-6">
         <div id="example1_filter" class="dataTables_filter">
         </div>
     </div>
 </div>

       <form action="{{ route('reports.store') }}" method="post">
        @csrf

        <label>Intern Name:</label></br>
          <select name="intern_id" id="intern_id" class="form-control">
            @foreach($interns as $id => $intern)
                <option value="{{ $id }}">{{$intern->name}}</option>
            @endforeach
          </select><br>

        <div> 
            <label>Roll No:</label>
            <select name="roll_no" id="roll_no" class="form-control">
            @foreach($interns as $id => $intern)
                <option value="{{ $id }}">{{$intern->roll_no}}</option>
            @endforeach
          </select><br>


         <label>Month:</label>
         <select name="month"  id="month" >
         <option value="may" selected>May</option>
         <option value="june" selected>June</option>
         <option value="july">July</option></select>
         <br><br><br>

                    
         <label>Week:</label>
         <select name="week"  id="week" >
         <option value="first week" selected>First Week</option>
         <option value="second week" selected>Second Week</option>
         <option value="third week">Third Week</option></select>
         <br><br><br> 

                   
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
                    <td class="col-sm-10 "><textarea class="form-control" id="first_description" rows="3"></textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Tuesday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="second_description" rows="3"></textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Wednesday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="third_description" rows="3"></textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Thursday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="fourth_description" rows="3"></textarea></td>
                </tr>
                <tr class="odd">
                <td ><label>Friday</label></td>
                    <td class="col-sm-10 "><textarea class="form-control" id="fifth_description" rows="3"></textarea></td>
                </tr>
            </tbody>
            </table>
        </div>
        </div><br><br>

        <label for="comment">Comment For Improvement:</label></br>
        <textarea class="form-control" id="comment" rows="7"></textarea><br><br>

        <label for="reflection">What was learned during the Week.</label></br>
        <textarea class="form-control" id="reflection" rows="7"></textarea>
        <br><input type="submit" value="Save" class="btn btn-success"><br><br><br>
    
    </form>

</div>
</section>
</div>
<div>   

@endsection