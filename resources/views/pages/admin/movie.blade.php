<script src="https://code.jquery.com/jquery-3.7.1.js" 
integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

@extends('layouts.adminTemplate')
@section('admincontent')
<div class="content-wrapper">
    <section class="content-header mt-5">
        <h1 class= "text-center">Add Or Manage Movies</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmovieModal"> Add Movie</button>



        <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">
<table border="1px" class="table table-bordered table-striped text-center">
  <thead >
    <tr>
      <th>Sr.No</th>
      <th>Movie Title</th>
      <th>Movie Description</th>
      <th>Movie Image</th>
      <th>Movie Duration</th>
      <th>Movie Language</th>
      <th>Movie Release Date</th>
      <th>Movie Country</th>
      <th>Movie Genre</th>
      <th>Movie Trailer</th>
    </tr>
  </thead>
  <tbody>
   @foreach($movie as $mv)
   <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$mv->movie_title}}</td>
      <td>{{$mv->movie_description}}</td>
      <td><img src="{{asset('adminAssets/images/movie-image')}}/{{$mv->movie_image}}" alt="" width=40></td>
      <td>{{$mv->movie_duration}}</td>
      <td>{{$mv->movie_language}}</td>
      <td>{{$mv->movie_releasedate}}</td>
      <td>{{$mv->movie_country}}</td>
      <td>{{$mv->movie_genre}}</td>
      <td>{{$mv->movie_trailer}}</td>
      <td> <button type="button" name="btnedit" class="btn btn-primary btnedit" data-toggle="modal" data-target="#editmovie"
       value="{{$mv->movie_id}}">Edit</button></td>
    </tr>
   @endforeach
  </tbody>
</table>
      </div>
    </div>
   </div>
        <!-- Add Movie Modal -->
        <div class="modal fade" id="addmovieModal" tabindex="-1" role="dialog" aria-labelledby="addmovieLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addmovieModalLabel">Enter Movie Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/insertmovie"  method= "post" enctype="multipart/form-data" >
          @csrf
      <div class="modal-body">
       
         <div class="form-group mb-3">
         <label for="">Enter Movie Title</label>
          <input class="form-control"type="text" name="movie_title" id="">
         </div>
         
         <div class="form-group mb-3">
         <label for="">Enter Movie Description</label>
          <textarea class="form-control" name="movie_description"></textarea>
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Movie Image</label>
          <input type="file" name="movie_image" id="" class= "form-control">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter  Movie Duration</label>
          <input class="form-control" name="movie_duration" type="text">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter  Movie Language</label>
          <input class="form-control" name="movie_language" type="text">
         </div>
        
         <div class="form-group mb-3">
         <label for="">Enter  Movie Release Date</label>
          <input class="form-control" name="movie_releasedate" type="text">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter  Movie Country</label>
          <input class="form-control" name="movie_country" type="text">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter  Movie Genre</label>
          <input class="form-control" name="movie_genre" type="text">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter  Movie Trailer Link </label>
          <input class="form-control" name="movie_trailer" type="text">
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

  <!-- edit Movie Modal -->

  <div class="modal fade" id="editmovie" tabindex="-1" role="dialog"
   aria-labelledby="editmovieLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmovieModalLabel">Edit Movie Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/updmovie"  method= "post" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="edit_movie_id" id="edit_movie_id">
      <div class="modal-body">
       
         <div class="form-group mb-3">
         <label for="">Enter Movie Title</label>
          <input class="form-control"type="text" name="edit_movie_title" id="edit_movie_title">
         </div>
         
         <div class="form-group mb-3">
         <label for="">Enter Movie Description</label>
          <input class="form-control" name="edit_movie_description" type="text" id="edit_movie_description">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Movie Duration</label>
          <input class="form-control" name="edit_movie_duration" type="text" id="edit_movie_duration">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Movie Language</label>
          <input class="form-control" name="edit_movie_language" type="text" id="edit_movie_language">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Movie Release Date</label>
          <input class="form-control" name="edit_movie_releasedate" type="text" id="edit_movie_releasedate">
         </div>
         
         <div class="form-group mb-3">
         <label for="">Enter Movie Country</label>
          <input class="form-control" name="edit_movie_country" type="text" id="edit_movie_country">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Movie Genre</label>
          <input class="form-control" name="edit_movie_genre" type="text" id="edit_movie_genre">
         </div>

         <div class="form-group mb-3">
         <label for="">Enter Movie Trailer</label>
          <input class="form-control" name="edit_movie_trailer" type="text" id="edit_movie_trailer">
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
// alert('clicked');
var mv_id=$(this).val();
$.ajax({
  url:'/editmovie/'+mv_id,
  type:'get',
  success:function(data){
    console.log(data);
 $.each (data,function(k,v){
  $('#edit_movie_title').val(v['movie_title']);
  $('#edit_movie_description').val(v['movie_description']);
  $('#edit_movie_duration').val(v['movie_duration']);
  $('#edit_movie_language').val(v['movie_language']);
  $('#edit_movie_releasedate').val(v['movie_releasedate']);
  $('#edit_movie_country').val(v['movie_country']);
  $('#edit_movie_genre').val(v['movie_genre']);
  $('#edit_movie_trailer').val(v['movie_trailer']);
  $('#edit_movie_id').val(v['movie_id']);
  

 })
  }
})
  })
})
</script>