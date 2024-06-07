@extends('backend.layouts.app')
@section('content')
 
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
              
<div class="card">
  <div class="card-header">Show Page</div>
  <div class="card-body">
   <div class="card-body">
    <p class="card-text">Intern Name: {{ $interns->name }}</p>
    <p class="card-text">Birth Date: {{ $interns->birth_date }}</p>
    <p class="card-text">NRC: {{ $interns->nrc }}</p>
    <p class="card-text">Email: {{ $interns->email }}</p>
    <p class="card-text">Password: {{ $interns->password }}</p>
    <p class="card-text">Phone: {{ $interns->phone }}</p>
    <p class="card-text">Roll No: {{ $interns->roll_no }}</p>
    <p class="card-text">Degree: {{ $interns->degree }}</p>
    <p class="card-text">Specialization: {{ $interns->specialization }}</p>
    <p class="card-text">Class Project: {{ $interns->class_project }}</p>
    <p class="card-text">Activity: {{ $interns->activity }}</p>
    <p class="card-text">Skill: {{ $interns->skill }}</p>
    <p class="card-text">Qualification: {{ $interns->qualification }}</p>
    <p class="card-text">Gender: {{ $interns->gender }}</p>
    <p class="card-text">Address: {{ $interns->address }}</p>
    </hr>
  </div>
</div>
</div>
</div>


</div>
</section>
</div>
</div>

@endsection