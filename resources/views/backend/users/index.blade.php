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
                                <table class="table align-middle mb-0 bg-white" id="user-datatable" style="width:100%">
                                    <thead class="bg-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>

{{--                                <table class="table table-striped mb-2">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">No</th>--}}
{{--                                        <th scope="col">Name</th>--}}
{{--                                        <th scope="col">Email</th>--}}
{{--                                        <th scope="col">Role</th>--}}
{{--                                        <th scope="col">Action</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">{{ ++$i }}</th>--}}
{{--                                            <td>{{ $user->name }}</td>--}}
{{--                                            <td>{{ $user->email }}</td>--}}
{{--                                            <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    @can('user-edit')--}}
{{--                                                        <a href="{{ route('users.edit', $user->id) }}" class="edit btn btn-sm btn-outline-warning mr-2">--}}
{{--                                                            <i class="fas fa-edit"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endcan--}}
{{--                                                    @can('user-delete')--}}
{{--                                                        <a href="#" data-id="{{ $user->id }}" class="delete-btn btn btn-sm btn-outline-danger">--}}
{{--                                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                                        </a>--}}
{{--                                                    @endcan--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                {!! $users->render() !!}--}}
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
            $('#user-datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'roles', name: 'roles' },
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
                            url: "{{ route('delete-user') }}",
                            data: { id: id},
                            dataType: 'json',
                            success: function(res){
                                let table = $('#user-datatable').dataTable();
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


