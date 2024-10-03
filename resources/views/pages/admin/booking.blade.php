@extends('layouts.adminTemplate')
@section('admincontent')
<div class="content-wrapper">
    <section class="content-header mt-5">
        <h1>Manage Booking</h1>
        <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">
<table border="1px" class="table table-bordered table-striped text-center">
  <thead >
    <tr>
      <th>Booking ID</th>
      <th>Movie</th>
      <th>User</th>
      <th>Show Id</th>
      <th>Booking Status</th>
      <th>Seat Number</th>
      <th>Booking Date</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($booking as $bk)
  <tr>
<td>{{$bk->booking_id}}</td>
<td>{{$bk->movie_title}}</td>
<td>{{$bk->name}}</td>
<td>{{$bk->show_id}}</td>

<td>{{$bk->booking_status}}</td>
<td>{{$bk->seat_number}}</td>
<td>{{$bk->booking_date}}</td>
</tr>

  @endforeach
  </tbody>
</table>
      </div>
    </div>
   </div>
    </section>
  
@endsection