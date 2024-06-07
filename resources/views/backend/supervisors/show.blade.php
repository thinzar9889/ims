@extends('backend.layouts.app')
@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
        <div class="container-fluid">
          <div class="card-header">
            <div class="center">
                <h4>Supervisors Details</h4>
          </div>
        </div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped mb-1">
                        <tr>
                            <td><h4 class="card-title">Name :</td>
                            <td> {{ $supervisors->name }}</h4></td>
                        </tr>
                        <tr>
                            <td class="card-text">Email : </td>
                            <td>{{ $supervisors->email }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Password : </td>
                            <td> {{ $supervisors->password }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Phone : </td>
                            <td> {{ $supervisors->phone }}</td>
                        </tr>
                        <tr>
                            <td class="card-text">Position : </td>
                            <td>{{ $supervisors->position }} </td>
                        </tr>
                        <tr>
                            <td class="card-text">Address : </td>
                            <td> {{ $supervisors->address }}</td>
                        </tr>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</section>
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