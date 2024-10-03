<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie_items = DB::select('select * from movies');

        $cinema=DB::select('select * from cinemas where cinema_status="Active"');
        $movie=DB::select('select * from movies ');
        $shows=DB::select('select * from shows ');
        $ticket=DB::select('select * from ticketclasses ');
        $user=DB::select('select * from users ');
      
        return view('pages.home.showmovie', compact('movie_items','cinema','movie','ticket','shows','user'));
    }

    public function movie_details($id){
        $data = DB::select('select * from movies where movie_id  = "'.$id.'"');
        return $data;
    }
    public function addbooking(Request $request){
        $b_id=uniqid();
        $bookdate=$request->b_date;
        $seatnum=$request->b_seat;
        $status=$request->b_status;
        $cinema_id=$request->b_cinema;
        $movie_id=$request->b_movie;
        $ticket_id=$request->b_ticket;
        // $user=$request->b_user;

       DB::select("INSERT INTO `bookings`(`booking_id`, `movie_id`,  `booking_status`, `seat_number`, `booking_date` ) 
       VALUES ('".$b_id."','".$movie_id."','','".$status."','".$seatnum."','".$bookdate."')");

return redirect()->back();

    }

   


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
