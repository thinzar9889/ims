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
                            <form action="{{ route('companies.update', $company->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value='{{ $company->name }}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="3">{{ $company->address }}</textarea>
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

