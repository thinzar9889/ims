@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table align-middle mb-0 bg-white" id="internship-datatable" style="width:100%">
                                    <thead class="bg-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Intern</th>
                                        <th>Supervisor</th>
                                        <th>Company</th>
                                        <th>Duration</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>

{{--                                <table class="table table-striped mb-2">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">No</th>--}}
{{--                                        <th scope="col">Name</th>--}}
{{--                                        <th scope="col">Position</th>--}}
{{--                                        <th scope="col">Action</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($supervisors as $supervisor)--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">{{ ++$i }}</th>--}}
{{--                                            <td>{{ $supervisor->supervisor_name }}</td>--}}
{{--                                            <td>{{ $supervisor->position }}</td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    @can('supervisor-edit')--}}
{{--                                                        <a href="{{ route('supervisors.edit', $supervisor->id) }}" class="edit btn btn-sm btn-outline-warning mr-2">--}}
{{--                                                            <i class="fas fa-edit"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endcan--}}
{{--                                                    @can('supervisor-delete')--}}
{{--                                                        <a href="#" data-id="{{ $supervisor->id }}" class="delete-btn btn btn-sm btn-outline-danger">--}}
{{--                                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endcan--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                {!! $supervisors->render() !!}--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>
</div>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready( function () {
            @if (session('success'))
                Swal.fire({
                    title: "{{ session('success') }}",
                    icon: "success"
                });
            @endif
            $('#internship-datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('internships.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                   
                    { data: 'intern_id', name: 'intern_id' },
                    { data: 'supervisor_id', name: 'supervisor_id' },
                    { data: 'company_id', name: 'company_id' },
                    { data: 'duration', name: 'duration' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action', orderable: false },
                ]
            });

            $(document).on('click', '.delete-btn', function (e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                Swal.fire({
                    title: "Are you sure want to delete?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"POST",
                            url: "{{ route('delete-internship') }}",
                            data: { id: id},
                            dataType: 'json',
                            success: function(res){
                                let table = $('#internship-datatable').dataTable();
                                table.fnDraw(false);
                                Swal.fire({
                                    title: "Deleted!",
                                    icon: "success"
                                });
                                // setTimeout(function() {
                                //     window.location.reload();
                                // }, 3000); // Delay in milliseconds
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection


