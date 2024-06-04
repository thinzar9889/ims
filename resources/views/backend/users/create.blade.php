@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        {{-- @include('admin.layouts.alert-messages') --}}
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create New Admin</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                    </div>

                                    <div class="form-group">
                                        <label>Roles</label>
                                        <select name="roles[]" class="select-role" multiple="multiple" data-placeholder="Select Role" style="width: 100%;">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>

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

