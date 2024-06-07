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
                                <h3 class="card-title">Create New Supervisor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('supervisors.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ isset($user) ? $user->profile->name : old('name') }}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ isset($user) ? $user->profile->email : old('email') }}" placeholder="Enter Email">
                                        @if($errors->has('email'))
                                            <div class="alert alert-warning" role="alert">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ isset($user) ? $user->profile->password : old('password') }}" required autocomplete="new-password" placeholder="Enter Password">
                                        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="tel" name="phone" value="{{ isset($user) ? $user->profile->phone : old('phone') }}" class="form-control" id="phone" placeholder="Enter Phone">
                                        @error('phone')
                                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="position">Position</label>
                                        <input type="text" name="position" class="form-control" id="position" value="{{ isset($user) ? $user->profile->position : old('position') }}" placeholder="Enter Position">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{ isset($user) ? $user->profile->address : old('address') }}" rows="3" placeholder="Enter Address">
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

