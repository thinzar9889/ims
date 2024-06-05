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
                                <h3 class="card-title">Edit Intern</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('interns.update', $intern->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value='{{ $intern->name }}'>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="birth_date">Birth Date</label>
                                        <input type="text" name="birth_date" class="form-control" id="birth_date" placeholder="Enter Birth Date"  value='{{ $intern->birth_date }}'>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="nrc">NRC</label>
                                        <input type="text" name="nrc" class="form-control" id="nrc" placeholder="Enter NRC"  value='{{ $intern->nrc }}'>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email"  value='{{ $intern->email }}'>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="text" name="password" class="form-control" id="password" placeholder="Enter Password"  value='{{ $intern->password }}'>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone"  value='{{ $intern->phone }}'>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="roll_no">Roll No</label>
                                        <input type="text" name="roll_no" class="form-control" id="roll_no" placeholder="Enter Roll No"  value='{{ $intern->roll_no }}'>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="degree">Degree</label>
                                        <input type="text" name="degree" class="form-control" id="degree" placeholder="Enter Degree"  value='{{ $intern->degree }}'>
                                    </div><br><br>

                                    <label>Specialization:</label>
                                      <select name="specialization"  id="specialization" value='{{ $intern->specialization}}'>
                                       <option value="ct" selected>CT</option>
                                       <option value="cs">CS</option></select>
                                       <br><br><br>

                                    <div class="form-group">
                                        <label for="class_project">Class Project</label>
                                        <textarea class="form-control" name="class_project" id="class_project" rows="3">{{ $intern->class_project }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="activity">Activity</label>
                                        <textarea class="form-control" name="activity" id="activity" rows="3">{{ $intern->activity }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="skill">Skill</label>
                                        <textarea class="form-control" name="skill" id="skill" rows="3">{{ $intern->skill }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="qualification">Qualification</label>
                                        <textarea class="form-control" name="qualification" id="qualification" rows="3">{{ $intern->qualification }}</textarea>
                                    </div><br><br>

                                    <label>Gender:</label>
                                      <select name="gender"  id="gender" value='{{ $intern->gender}}' >
                                       <option value="male" selected>Male</option>
                                       <option value="female">Female</option>
                                     </select> <br><br><br>


                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="3">{{ $intern->address }}</textarea>
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

