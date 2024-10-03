<script src="https://code.jquery.com/jquery-3.7.1.js"
integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.adminTemplate')
@section('admincontent')
<div class="content-wrapper">
   <section  class="content-header mt-5">
        <h1 class= "text-center">Add Or Manage Cinemas</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcinemaModal">
           Add Cinema</button>

        <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">
<table border="1px" class="table table-bordered table-striped text-center">
  <thead >
    <tr>
      <th>Sr.No</th>
      <th>Cinema Name</th>
      <th>Cinema Address</th>
      <th>Cinema Contact No</th>
      <th>Status</th>
      <th>Cinema Image</th>
      <th>Cinema Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($cinema as $c)
   <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$c->cinema_name}}</td>
      <td>{{$c->cinema_address}}</td>
      <td>{{$c->cinema_contact}}</td>
      @if($c->cinema_status=="Active")
      <td style="color:green;">{{$c->cinema_status}}</td>
      @else
      <td style="color:red;">{{$c->cinema_status}}</td>
      @endif
      <td><img src="{{asset('adminAssets/images/cinema-image')}}/{{$c->cinema_image}}" alt="" width=40></td>
      <td> <button type="button"  name="btnedit" class="btn btn-primary btnedit" data-toggle="modal" data-target="#editcinemaModal" value="{{$c->cinema_id}}">Edit</button></td>
    </tr>
   @endforeach
  </tbody>
</table>
      </div>
    </div>
   </div>









        <!-- Add Cinema Modal -->
        <div class="modal fade" id="addcinemaModal" tabindex="-1" role="dialog" aria-labelledby="addcinemaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addcinemaModalLabel">Enter Cinema Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/insertcinema"  method= "post" enctype="multipart/form-data" >
          @csrf
      <div class="modal-body">

         <div class="form-group mb-3">
         <label for="">Enter Cinema Name</label>
          <input class="form-control"type="text" name="cinema_name" id="">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Cinema Address</label>
          <input class="form-control" name="cinema_address" type="text">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Cinema Contact No</label>
          <input class="form-control" name="cinema_contact" type="text">
         </div>
         <div class="form-group mb-3">
         <label for=""> Cinema status</label>
          <input class="form-control" name="cinema_status" type="text">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Cinema Image</label>
          <input type="file" name="cinema_image" id="" class= "form-control">
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
  <!-- edit Cinema Modal -->

  <div class="modal fade" id="editcinemaModal" tabindex="-1" role="dialog" aria-labelledby="editcinemaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editcinemaModalLabel">Edit Cinema Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/updcinema"  method="post" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="edit_cinema_id" id="edit_cinema_id">
      <div class="modal-body">

         <div class="form-group mb-3">
         <label for="">Enter Cinema Name</label>
          <input class="form-control"type="text" name="edit_cinema_name" id="edit_cinema_name">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Cinema Address</label>
          <input class="form-control" name="edit_cinema_address" type="text" id="edit_cinema_address">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Cinema Contact No</label>
          <input class="form-control" name="edit_cinema_contact" type="text" id="edit_cinema_contact">
         </div>
         <div class="form-group mb-3">
         <label for=""> Cinema status</label>
         <select name="edit_cinema_status" id="edit_category_status">
          <option value="Active">Active</option>
          <option value="InActive">InActive</option>
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
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
  $('.btnedit').on('click',function(){
// alert('clicked');
var cin_id=$(this).val();
$.ajax({
  url:'/editcinema/'+cin_id,
  type:'get',
  success:function(data){
    console.log(data);
 $.each (data,function(k,v){
  $('#edit_cinema_name').val(v['cinema_name']);
  $('#edit_cinema_address').val(v['cinema_address']);
  $('#edit_cinema_contact').val(v['cinema_contact']);
  $('#edit_cinema_status').val(v['cinema_status']);
  $('#edit_cinema_id').val(v['cinema_id']);


 })
  }
})
  })
})
</script>
