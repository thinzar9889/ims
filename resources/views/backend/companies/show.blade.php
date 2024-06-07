@extends('backend.layouts.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">Companies Page</div>
                        <div class="card-body">
                            <p class="card-text">Name : {{ $company->name }}</p>
                            <p class="card-text">Username : {{ $company->username }}</p>
                            <p class="card-text">Email : {{ $company->email }}</p>
                            <p class="card-text">Phone : {{ $company->phone }}</p>
                            <p class="card-text">Address : {{ $company->address }}</p>
                            <p class="card-text">Website : {{ $company->website }}</p>
                            <p class="card-text">Description : {{ $company->description }}</p>
                        </div>
                        </hr>
                </div>
            </div>
    </div>
</div>
@endsection


