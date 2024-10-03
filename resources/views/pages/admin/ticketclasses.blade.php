<script src="https://code.jquery.com/jquery-3.7.1.js"
integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

@extends('layouts.adminTemplate')
@section('admincontent')
<div class="content-wrapper">
    <section class="content-header mt-5">
        <h1>Add & Manage Ticket Classes</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addticketclassesModal">
           Add Ticket Class</button>

        <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">
<table border="1px" class="table table-bordered table-striped text-center">
  <thead >
    <tr>
      <th>Sr.No</th>
      <th>Ticket Class Title</th>
      <th>Ticket Class Description</th>
      <th>Ticket Class Price</th>
    </tr>
  </thead>
  <tbody>
   @foreach($ticketclasses as $tc)
   <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$tc->ticketclass_title}}</td>
      <td>{{$tc->ticketclass_description}}</td>
      <td>{{$tc->ticketclass_price}}</td>
      <td> <button type="button" name="btnedit" class="btn btn-primary btnedit" data-toggle="modal" data-target="#editticketclassesModal" value="{{$tc->ticketclass_id}}">Edit</button></td>
    </tr>
   @endforeach
  </tbody>
</table>
      </div>
    </div>
   </div>









        <!-- Add Ticket Classes Modal -->
        <div class="modal fade" id="addticketclassesModal" tabindex="-1" role="dialog" aria-labelledby="addticketclassesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addticketclassesModalLabel">Enter Ticket Class Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/insertticketclasses"  method= "post">
          @csrf
      <div class="modal-body">

         <div class="form-group mb-3">
         <label for="">Enter Ticket Class Title</label>
          <input class="form-control"type="text" name="ticketclasses_title" id="">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Ticket Class Description</label>
          <input class="form-control" name="ticketclasses_description" type="text">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Ticket Class Price</label>
          <input class="form-control" name="ticketclasses_price" type="text">
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

  <!-- edit Ticket Classes  Modal -->

  <div class="modal fade" id="editticketclassesModal" tabindex="-1" role="dialog" aria-labelledby="editticketclassesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editticketclassesModalLabel">Edit Cinema Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/updticketclasses"  method="post">
          @csrf
          <input type="hidden" name="edit_ticketclasses_id" id="edit_ticketclasses_id">
      <div class="modal-body">

         <div class="form-group mb-3">
         <label for="">Enter Ticket Class Title</label>
          <input class="form-control"type="text" name="edit_ticketclasses_title" id="edit_ticketclasses_title">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Ticket Class Description</label>
          <input class="form-control" name="edit_ticketclasses_description" type="text" id="edit_ticketclasses_description">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Ticket Class Price</label>
          <input class="form-control" name="edit_ticketclasses_price" type="text" id="edit_ticketclasses_price">
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

    </section>
  
@endsection

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
  $('.btnedit').on('click',function(){
var tc_id=$(this).val();
$.ajax({
  url:'/editticketclasses/'+tc_id,
  type:'get',
  success:function(data){
    console.log(data);
 $.each (data,function(k,v){
  $('#edit_ticketclasses_title').val(v['ticketclass_title']);
  $('#edit_ticketclasses_description').val(v['ticketclass_description']);
  $('#edit_ticketclasses_price').val(v['ticketclass_price']);
  $('#edit_ticketclasses_id').val(v['ticketclass_id']);


 })
  }
})
  })
})
</script>