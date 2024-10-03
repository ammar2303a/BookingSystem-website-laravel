@extends('layouts.adminTemplate')
@section('admincontent')
<div class="content-wrapper">
    <section class="content-header mt-5">
        <h1>Manage Reviews</h1>
        <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">
<table border="1px" class="table table-bordered table-striped text-center">
  <thead >
    <tr>
      <th>Review ID</th>
      <th>User</th>
      <th>Movie</th>
      <th>Review</th>
      <th>Rating</th>
      <th>Review Date</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($review as $rv)
  <tr>
<td>{{$rv->review_id}}</td>
<td>{{$rv->name}}</td>
<td>{{$rv->movie_title}}</td>

<td>{{$rv->review}}</td>
<td>{{$rv->rating}}</td>
<td>{{$rv->review_date}}</td>
</tr>

  @endforeach
  </tbody>
</table>
      </div>
    </div>
   </div>
    </section>
  
@endsection