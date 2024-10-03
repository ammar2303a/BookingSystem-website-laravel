<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<style>
    .imagebox img{
        height: 400px;
        width: 100%;
    }
</style>
@extends('layouts.hometemplate')

<section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('homeassets/img/bg/money-heiset.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="title">Our <span>Movie</span></h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Movie</li>
                            
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="movie-area movie-bg" data-background="{{asset('homeassets/img/bg/movie_bg.jpg')}}">

                <div class="container">
                    
                    <div class="row align-items-end mb-60">
                        <div class="col-lg-6">
                            
                            <div class="section-title text-center text-lg-left">
                                <span class="sub-title">BOOK NOW</span>
                                <h2 class="title">New Release Movies</h2>
                            </div>

                        </div>

                        <!-- <div class="col-lg-6">
                            <div class="movie-page-meta">
                                <div class="tr-movie-menu-active text-center">
                                    <button class="active" data-filter="*">Animation</button>
                                    <button class="" data-filter=".cat-one">Movies</button>
                                    <button class="" data-filter=".cat-two">Romantic</button>
                                </div>
                                <form action="#" class="movie-filter-form">
                                    <select class="custom-select">
                                        <option selected>English</option>
                                        <option value="1">Blueray</option>
                                        <option value="2">4k Movie</option>
                                        <option value="3">Hd Movie</option>
                                    </select>
                                </form>
                            </div>
                        </div> -->
                    </div>
                    @foreach($movie_items as $m_items)
                    <div class="row tr-movie-active">

                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">

                            <div class="movie-item movie-item-three mb-50">

                                <div class="movie-poster">

                                    <img src="{{asset('adminAssets/images/movie-image')}}/{{$m_items->movie_image}}" alt="">
                                    <ul class="overlay-btn">
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li><button type="button" class="btn btnmovie" data-toggle="modal" data-target="#exampleModal" value="{{$m_items->movie_id}}">Movie Details</button></li>
                                        <!-- <button type="button" class="btn btnmovie" data-toggle="modal" data-target="#exampleModal" value="{{$m_items->movie_id}}">Movie Details</button> -->
                                    </ul>
                                </div>
                               
                                <div class="movie-content">
                                    <div class="top">
                                        <h5 class="title"><a href="movie-details.html">{{ $m_items->movie_title}}</a></h5>
                                        <span class="date">{{$m_items->movie_releasedate}}</span>
                                    </div>
                                    <div class="bottom">
                                        <ul>
                                            <li>
                                                <span class="duration"><i class="far fa-clock"></i>{{ $m_items->movie_duration}}</span>
                                                <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                            </li>
                                        </ul>
                                     
                                    </div>
                               
                                  
                                </div>
                            </div>
                        
                        </div>
                    </div> 
                                 @endforeach  
                        
<!-- Modal -->

@foreach($movie_items as $m_items)
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel" style="color:black;">Movie Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="movieid" id="movieid">
      <div class="modal-body"  >
      <h5  style="color:black;" class="text-center">Movie Name</h5>
        <p style="color:black;" class="text-center" id="title">{{$m_items->movie_title}}</p>
      </div>
      <div class="imagebox"><img src="{{asset('adminAssets/images/movie-image')}}/{{$m_items->movie_image}}" alt=""></div>
       <br>
      <h5 style="color:black;"class="text-center">Movie description </h5>
       <p style="color:black;"class="text-center"id="description">{{$m_items->movie_description}}</p>
      
       <h5  style="color:black;"class="text-center">Movie Duration</h5>
       <p style="color:black;"class="text-center">{{$m_items->movie_duration}}</p>
        <h5  style="color:black;"class="text-center">Movie Language</h5>
       <p style="color:black;"class="text-center">{{$m_items->movie_language}}</p>
       
       <br> <h5  style="color:black;"class="text-center">Country</h5>
       <p style="color:black;"class="text-center">{{$m_items->movie_country}}</p>
       <br> <h5  style="color:black;"class="text-center">Movie Genre</h5>
       <p style="color:black;" class="text-center">{{$m_items->movie_genre}}</p>
      <div class="modal-footer">
       <div>
     
       </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbookingModal">
           Book Now</button>
      </div>
    </div>
  </div>
</div>   
@endforeach                        
 </section>

 <!--book now modal-->

 <div class="modal fade" id="addbookingModal" tabindex="-1" role="dialog" aria-labelledby="addbookingLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addbookingModalLabel">Enter Show Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/insertbooking"  >
          @csrf
      <div class="modal-body">

         <div class="form-group mb-3">
         <label for="">Booking Date</label>
          <input class="form-control"type="date" name="b_date" id="">
         </div>

         <div class="form-group mb-3">
         <label for="">Booking Status</label>
          <input class="form-control" name="b_status" value="booked">
         </div>

         <div class="form-group mb-3">
         <label for="">Seat Number</label>
          <input class="form-control" name="b_seat" type="text">
         </div>


        

         <div class="form-group mb-3">
         <label for="">user name</label>
         <select name="b_user" id=""class="form-control">
            <option value=""disabled selected>---select---</option>
            @foreach($user as $u)
            <option value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
         </select>
         </div>


         <div class="form-group mb-3">
         <label for="">Cinema</label>
         <select name="b_cinema" id=""class="form-control">
            <option value=""disabled selected>---select---</option>
            @foreach($cinema as $c)
            <option value="{{$c->cinema_id}}">{{$c->cinema_name}}</option>
            @endforeach
         </select>
         </div>
         <div class="form-group mb-3">
         <label for="">Movie</label>
         <select name="b_movie" id=""class="form-control">
            <option value=""disabled selected>---select---</option>
            @foreach($movie as $m)
            <option value="{{$m->movie_id}}">{{$m->movie_title}}</option>
            @endforeach
         </select>
         </div>

         <div class="form-group mb-3">
         <label for="">Shows</label>
         <select name="b_show" id=""class="form-control">
            <option value=""disabled selected>---select---</option>
            @foreach($shows as $sh)
            <option value="{{$sh->show_id}}">{{$sh->show_starttime}}</option>
            @endforeach
         </select>
         </div>

         <div class="form-group mb-3">
         <label for="">Ticket Class</label>
         <select name="b_ticket" id=""class="form-control">
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
  

 



 @section('hometemplate')
@endsection





<script>
$(document).ready(function(){
    $(".btnmovie").on("click",function(){
       var mov_id = $(this).val();
    //    alert(mov_id);
       $.ajax({
        url: '/moviedetail/'+ mov_id,
        method: 'GET',
        success: function(data){
             console.log(data); 
             $.each (data,function(k,v){
  $('#title').val(v['movie_title']);
  $('#movieid').val(v['movie_id']);


//   $('#edit_movie_description').val(v['movie_description']);
//   $('#edit_movie_duration').val(v['movie_duration']);
//   $('#edit_movie_language').val(v['movie_language']);
//   $('#edit_movie_releasedate').val(v['movie_releasedate']);
//   $('#edit_movie_country').val(v['movie_country']);
//   $('#edit_movie_genre').val(v['movie_genre']);
//   $('#edit_movie_trailer').val(v['movie_trailer']);
//   $('#edit_movie_id').val(v['movie_id']);
  

 })   
  
            
        }
       })
    })
})
</script>