@extends('backend.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mt-3">
{{--                            @include('admin.layouts.alert-messages')--}}
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Create New Role</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('roles.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                        </div>
                                        <label class="form-label" for="permission">Permissions</label>
                                        <div class="row">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-3 col-6">
                                                    <div class="form-check mb-4">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" id="p-checkbox-{{ $permission->id }}" />
                                                        <label class="form-check-label" for="p-checkbox-{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
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
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
