<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class admincontroller extends Controller
{
    public function index()
    {   
        if (Auth::user()->role == "Admin") {
            return view('pages.admin.dashboard');
        }
        else if (Auth::user()->role == "User") {
            return view('pages.home.welcome');
        }
    
    }

    public function addcinema()
    {
        $cinema = DB::select('select * from cinemas');
        return view('pages.admin.cinema', compact('cinema'));

    }

    public function insertcinema(Request $request)
    {
        $id = uniqid();
        $cinema_name = $request->cinema_name;
        $cinema_address = $request->cinema_address;
        $cinema_contact = $request->cinema_contact;
        $cinemaimagename = time() . '.' . $request->cinema_image->extension();

        $request->cinema_image->move(public_path('adminAssets/images/cinema-image'), $cinemaimagename);

        DB::select("INSERT INTO `cinemas`(`cinema_id`, `cinema_name`,`cinema_address`, `cinema_contact`, `cinema_image`,`cinema_status`)
        VALUES ('" . $id . "','" . $cinema_name . "','" . $cinema_address . "','" . $cinema_contact . "','" . $cinemaimagename . "','Active')");

        return redirect()->back();

    }
    public function editcinema($id)
    {
        $data = DB::select('select * from cinemas  where cinema_id ="' . $id . '"');
        return $data;
    }

    public function updcinema(Request $request)
    {
        $cin_id = $request->edit_cinema_id;
        $cin_name = $request->edit_cinema_name;
        $cin_address = $request->edit_cinema_address;
        $cin_contact = $request->edit_cinema_contact;
        $cin_staus = $request->edit_cinema_status;
        DB::select("UPDATE `cinemas` SET `cinema_name`='" . $cin_name . "',`cinema_address`='" . $cin_address . "', `cinema_contact`='" . $cin_contact . "',`cinema_status`='" . $cin_staus . "' WHERE `cinema_id`='" . $cin_id . "'");
// return $cin_id;
        return redirect()->back();
    }

    public function insertmovie(Request $request)
    {
        $id = uniqid();
        $movie_title = $request->movie_title;
        $movie_description = $request->movie_description;
        $movieimagename = time() . '.' . $request->movie_image->extension();
        $request->movie_image->move(public_path('adminAssets/images/movie-image'), $movieimagename);
        $movie_duration = $request->movie_duration;
        $movie_language = $request->movie_language;
        $movie_releasedate = $request->movie_releasedate;
        $movie_country = $request->movie_country;
        $movie_genre = $request->movie_genre;
        $movie_trailer = $request->movie_trailer;

        DB::select("INSERT INTO `movies`(`movie_id`, `movie_title`,`movie_description`,`movie_image`, `movie_duration`, `movie_language`,`movie_releasedate`,`movie_country`,`movie_genre`,`movie_trailer`)
        VALUES ('" . $id . "','" . $movie_title . "','" . $movie_description . "','" . $movieimagename . "','" . $movie_duration . "','" . $movie_language . "','" . $movie_releasedate . "','" . $movie_country . "','" . $movie_genre . "','" . $movie_trailer . "')");

        return redirect()->back();

    }

    public function editmovie($id)
    {
        $data = DB::select('select * from movies  where movie_id ="' . $id . '"');
        return $data;
    }
    public function updmovie(Request $request)
    {
        $mov_id = $request->edit_movie_id;
        $mov_title = $request->edit_movie_title;
        $mov_description = $request->edit_movie_description;
        $mov_duration = $request->edit_movie_duration;
        $mov_language = $request->edit_movie_language;
        $mov_releasedate = $request->edit_movie_releasedate;
        $mov_country = $request->edit_movie_country;
        $mov_genre = $request->edit_movie_genre;
        $mov_trailer = $request->edit_movie_trailer;
        DB::select("UPDATE `movies` SET `movie_title`='" . $mov_title . "',`movie_description`='" . $mov_description . "',`movie_duration`='" . $mov_duration . "',`movie_language`='" . $mov_language . "',`movie_releasedate`='" . $mov_releasedate . "',`movie_country`='" . $mov_country . "',`movie_genre`='" . $mov_genre . "',`movie_trailer`='" . $mov_trailer . "'
       WHERE `movie_id`='" . $mov_id . "'");
    //    return $data;
        return redirect()->back();
    }

    public function addmovie()
    {
        $movie = DB::select('select * from movies');
        return view('pages.admin.movie', compact('movie'));
    }

    public function addshow()
    {
        $cinema=DB::select('select * from cinemas where cinema_status="Active"');
        $movie=DB::select('select * from movies ');
        $ticket=DB::select('select * from ticketclasses ');
        $show=DB::select('SELECT show_id,show_date,show_starttime,show_endtime,cinemas.cinema_name,movies.movie_title,ticketclasses.ticketclass_title
        FROM `shows`
        JOIN cinemas
        ON shows.cinema_id=cinemas.cinema_id
        JOIN movies
        ON shows.movie_id=movies.movie_id
        JOIN ticketclasses
        on shows.ticketclass_id=ticketclasses.ticketclass_id;');



        return view('pages.admin.show',compact('cinema','movie','ticket','show'));
    }
    public function insertshow(Request $request){
        $s_id=uniqid();
        $showdate=$request->s_date;
        $starttime=$request->s_starttime;
        $endtime=$request->s_endtime;
        $cinema_id=$request->s_cinema;
        $movie_id=$request->s_movie;
        $ticket_id=$request->s_ticket;
        DB::select("INSERT INTO `shows`(`show_id`, `show_date`, `show_starttime`, `show_endtime`, `cinema_id`, 
        `movie_id`, `ticketclass_id`) 
        VALUES ('".$s_id."','".$showdate."','".$starttime."','".$endtime."','".$cinema_id."','".$movie_id."','".$ticket_id."')");

         return redirect()->back();
    }

    public function addticketclasses()
    {
        $ticketclasses = DB::select('select * from ticketclasses');
        return view('pages.admin.ticketclasses', compact('ticketclasses'));
    }

    public function insertticketclasses(Request $request)
    {
        $id = uniqid();
        $ticketclasses_title = $request->ticketclasses_title;
        $ticketclasses_description = $request->ticketclasses_description;
        $ticketclasses_price = $request->ticketclasses_price;
        
        DB::select("INSERT INTO `ticketclasses` (`ticketclass_id`, `ticketclass_title`,`ticketclass_description`, `ticketclass_price`)
        VALUES ('" . $id . "','" . $ticketclasses_title . "','" . $ticketclasses_description . "','" . $ticketclasses_price . "')");

        return redirect()->back();

    }
    public function editticketclasses($id)
    {
        $data = DB::select('select * from ticketclasses  where ticketclass_id ="' . $id . '"');
        return $data;
    }

    public function updticketclasses(Request $request)
    {
        $tc_id = $request->edit_ticketclasses_id;
        $tc_title = $request->edit_ticketclasses_title;
        $tc_description = $request->edit_ticketclasses_description;
        $tc_price = $request->edit_ticketclasses_price;
        DB::select("UPDATE `ticketclasses` SET `ticketclass_title`='" . $tc_title . "',`ticketclass_description`='" . $tc_description . "', `ticketclass_price`='" . $tc_price . "' WHERE `ticketclass_id`='" . $tc_id . "'");

        return redirect()->back();
    }

    
    public function addreview()
    {
        $user=DB::select('select * from users where role ="User"');
        $movie=DB::select('select * from movies');
        $review=DB::select('SELECT review_id,users.name,movies.movie_title,review,rating,review_date
        FROM `reviews`
        JOIN users
        ON reviews.user_id=users.id
        JOIN movies
        ON reviews.movie_id=movies.movie_id;');

        return view('pages.admin.review',compact('user','movie','review'));
    }


    public function addbooking()
    {
        $movie=DB::select('select * from movies');
        $user=DB::select('select * from users where role ="User"');
        $shows=DB::select('select * from shows');
        $booking=DB::select('SELECT booking_id,movies.movie_title,users.name,shows.show_id,booking_status,seat_number,booking_date
        FROM `bookings`
        JOIN movies
        ON bookings.movie_id=movies.movie_id
        JOIN users
        ON bookings.user_id=users.id
        JOIN shows
        ON bookings.show_id=shows.show_id;');

        return view('pages.admin.booking',compact('movie','user','shows','booking'));
    }

    public function insertbooking(Request $request){
        $book_id=uniqid();
        $mov_id=$request->b_movie;
        $user_id=$request->b_user;
        $show_id=$request->b_show;
        $book_status=$request->b_status;
        $seat_number=$request->b_seat;
        $book_date=$request->b_date;
        DB::select("INSERT INTO `bookings`(`booking_id`, `movie_id`, `user_id`, `show_id`, `booking_status`, 
        `seat_number`, `booking_date`) 
        VALUES ('".$book_id."','".$mov_id."','".$user_id."','".$show_id."','".$book_status."','".$seat_number."','".$book_date."')");

         return redirect()->back();
    }
}


