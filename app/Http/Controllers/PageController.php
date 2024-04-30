<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function gallery()
    {
        return view('gallery');
    }

    public function home()
    {
        return view('welcome');
    }

    public function create()
    {

        $formData = Session::get('form_data');

        return view('reservation', ['formData' => $formData]);
    }

    public function confirm(Request $request)
    {
        $validated = $request -> validate(
            [
                'name' => 'required',
                'email' => 'required',
                'countOfPersons' => 'required|max:6|min:1',
                'arrival' => 'required|date',
                'leave' => 'required|date',
                'comment' => '',
            ],
        );

        $price = 7000 + ($validated['countOfPersons'] - 1 ) * 6000;

        $reservation = Reservation::make($validated);

        return view('confirm', ['reservation' => $reservation, 'price' => $price]);
    }

    public function store(Request $request)
    {
        $reservation = $request -> reservation;
        
        $reservationData = json_decode($request->reservation, true);
        Reservation::create($reservationData);

        return view('succes');
    }

    public function back(Request $request)
    {
        $reservation = $request->input('reservation');

        $reservation = json_decode($request->input('reservation'), true);



        Session::flash('form_data', $reservation);

        return redirect() -> route('reservation.create');
    }

    public function index()
    {
        $reservations = Reservation::all()->sortByDesc('arrival');

        return view('reservations', ['reservations' => $reservations]);
    }
}
