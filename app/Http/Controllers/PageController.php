<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        return view('reservations.create', ['formData' => $formData]);
    }

    public function confirm(Request $request)
    {   

        $count = Reservation::all()
            ->where('email', $request -> input('email'))
            ->whereNull('status')
            ->count();

        $request->merge(['count' => $count]);

        $validated = $request -> validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'countOfPersons' => 'required|integer|max:6|min:1',
                'arrival' => 'required|date',
                'leave' => 'required|date|after:arrival',
                'comment' => '',
                'count' => 'required|integer|max:3'
            ],
            [
                'name.required' => 'A név megadása kötelező!',
                'email.required' => 'Az E-mail cím megadása kötelező!',
                'email.email' => 'Helytelen E-mail cím formátum!',
                'countOfPersons.required' => 'A személyek számának megadása kötelező',
                'countOfPersons.integer' => 'A személyek számának egész számnak kell lennie!',
                'countOfPersons.max' => 'Maximum 6 személynek foglalhtó!',
                'countOfPersons.min' => 'Minimum 1 személynek foglalhtó!',
                'arrival.required' => 'Az érkezés időpontjának megadása kötelező!',
                'leave.required' => 'A távozás időpontjának megadása kötelező!',
                'leave.after' => 'A távozás dátuma későbbi kell legyen, mint az érkezés dátuma!',
                'count' => 'Maximum 3 függőben lévő foglalása lehet egy E-mail címen!'
            ]
        );


        $price = null;

        if ($request->input('arrival') !== null && $request->input('leave') !== null) {
            $arrival = Carbon::parse($request->input('arrival'));
            $leave = Carbon::parse($request->input('leave'));

            $daysDifference = $arrival->diffInDays($leave);

            $price = $validated['countOfPersons'] * (7000 + ($daysDifference - 1 ) * 6000);
        }

        $reservation = Reservation::make($validated);

        return view('reservations.confirm', ['reservation' => $reservation, 'price' => $price]);
    }

    public function store(Request $request)
    {
        
        $reservationData = json_decode($request->reservation, true);
        Reservation::create($reservationData);

        return view('reservations.store');
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
        $reservations = Reservation::all()->sortBy('arrival');

        return view('reservations.index', ['reservations' => $reservations]);
    }

    public function show($id) {
        $reservation = Reservation::find($id);
        
        $arrival = Carbon::parse($reservation -> arrival);
        $leave = Carbon::parse($reservation -> leave);
        $daysDifference = $arrival->diffInDays($leave);
        $price = ($reservation -> countOfPersons) * (7000 + ($daysDifference - 1 ) * 6000);

        $reservation -> new = false;

        $reservation -> save();

        return view('reservations.show', ['reservation' => $reservation, 'price' => $price] );
    }

    public function information()
    {
        return view('information');
    }
}
