@extends('layouts.adminTemplate')
@section('admincontent')
<div class="content-wrapper">
   <section  class="content-header mt-5">
        <h1 class= "text-center">Add Or Manage Shows</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcinemaModal">
           Add Shows</button>

        <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">
<table border="1px" class="table table-bordered table-striped text-center">
  <thead >
    <tr>
      <th>Show ID</th>
      <th>Cinema</th>
      <th>Movie</th>
      <th>Ticket</th>
      <th>Show Date</th>
      <th>Show Start time</th>
      <th>Show End time</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($show as $sh)
  <tr>
<td>{{$sh->show_id}}</td>
<td>{{$sh->cinema_name}}</td>
<td>{{$sh->movie_title}}</td>
<td>{{$sh->ticketclass_title}}</td>


<td>{{$sh->show_date}}</td>
<td>{{$sh->show_starttime}}</td>
<td>{{$sh->show_endtime}}</td>
</tr>

  @endforeach
  </tbody>
</table>
      </div>
    </div>
   </div>

   <div class="modal fade" id="addcinemaModal" tabindex="-1" role="dialog" aria-labelledby="addcinemaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addcinemaModalLabel">Enter Show Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/insertshow"  >
          @csrf
      <div class="modal-body">

         <div class="form-group mb-3">
         <label for="">Show Date</label>
          <input class="form-control"type="date" name="s_date" id="">
         </div>

         <div class="form-group mb-3">
         <label for="">Show Start Time</label>
          <input class="form-control" name="s_starttime" type="time">
         </div>

         <div class="form-group mb-3">
         <label for="">Show End Time</label>
          <input class="form-control" name="s_endtime" type="time">
         </div>

         <div class="form-group mb-3">
         <label for="">Cinema</label>
         <select name="s_cinema" id=""class="form-control">
            <option value=""disabled selected>---select---</option>
            @foreach($cinema as $c)
            <option value="{{$c->cinema_id}}">{{$c->cinema_name}}</option>
            @endforeach
         </select>
         </div>
         <div class="form-group mb-3">
         <label for="">Movie</label>
         <select name="s_movie" id=""class="form-control">
            <option value=""disabled selected>---select---</option>
            @foreach($movie as $m)
            <option value="{{$m->movie_id}}">{{$m->movie_title}}</option>
            @endforeach
         </select>
          
         </div>
         <div class="form-group mb-3">
         <label for="">Ticket Class</label>
         <select name="s_ticket" id=""class="form-control">
            <option value=""disabled selected>---select---</option>
            @foreach($ticket as $t)
            <option value="{{$t->ticketclass_id}}">{{$t->ticketclass_title}}</option>
            @endforeach
         </select>
          
         </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
  
@endsection