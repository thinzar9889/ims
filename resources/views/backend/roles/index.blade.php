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
                                    <table class="table align-middle mb-0 bg-white" id="role-datatable" style="width:100%">
                                        <thead class="bg-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Permissions</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                    </table>
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
            $('#role-datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'permissions', name: 'permissions' },
                    { data: 'action', name: 'action', orderable: false },
                ],
                columnDefs: [
                    { width: '150px', targets: 1 },
                    { width: '600px', targets: 2 },
                ],
            });

            $(document).on('click', '.delete-btn', function (e) {
                e.preventDefault();
                let id = $(this).data('id');
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
                            url: "{{ route('delete-role') }}",
                            data: { id: id},
                            dataType: 'json',
                            success: function(res){
                                let table = $('#role-datatable').dataTable();
                                table.fnDraw(false);
                                Swal.fire({
                                    title: "Deleted!",
                                    icon: "success"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection


