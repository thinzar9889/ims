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
                                <table class="table align-middle mb-0 bg-white" id="intern-datatable" style="width:100%">
                                    <thead class="bg-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Intern Name</th>
                                    
                                        <th>Email</th>
                                        
                                        <th>Phone</th>
                                       
                                       
                                        <th>Specialization</th>
                                        <th>Class Project</th>
                                        <th>Activity</th>
                                        <th>Skill</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>

{{--                                <table class="table table-striped mb-2">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">No</th>--}}
{{--                                        <th scope="col">Intern Name</th>--}}
{{--                                        <th scope="col">Birth Date</th>--}}
{{--                                        <th scope="col">NRC</th>--}}
{{--                                        <th scope="col">Email</th>--}}
{{--                                        <th scope="col">Password</th>--}}
{{--                                        <th scope="col">Phone</th>--}}
{{--                                        <th scope="col">Roll No</th>--}}
{{--                                        <th scope="col">Degree</th>--}}
{{--                                        <th scope="col">Specialization</th>--}}
{{--                                        <th scope="col">Class Project</th>--}}
{{--                                        <th scope="col">Activity</th>--}}
{{--                                        <th scope="col">Skill</th>--}}
{{--                                        <th scope="col">Qualification</th>--}}
{{--                                        <th scope="col">Gender</th>--}}
{{--                                        <th scope="col">Address</th>--}}
{{--                                        <th scope="col">Action</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($companies as $company)--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">{{ ++$i }}</th>--}}
{{--                                            <td>{{ $company->name }}</td>--}}
{{--                                            <td>{{ $company->address }}</td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    @can('company-edit')--}}
{{--                                                        <a href="{{ route('companies.edit', $company->id) }}" class="edit btn btn-sm btn-outline-warning mr-2">--}}
{{--                                                            <i class="fas fa-edit"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endcan--}}
{{--                                                    @can('company-delete')--}}
{{--                                                        <a href="#" data-id="{{ $company->id }}" class="delete-btn btn btn-sm btn-outline-danger">--}}
{{--                                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endcan--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                {!! $companies->render() !!}--}}
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
            $('#intern-datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('interns.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'address', name: 'address' },
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
                            url: "{{ route('delete-intern') }}",
                            data: { id: id},
                            dataType: 'json',
                            success: function(res){
                                let table = $('#intern-datatable').dataTable();
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


