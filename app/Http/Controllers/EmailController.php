<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmation;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function accept($id) {
        $reservation = Reservation::find($id);

        $reservation -> status = true;
        $reservation -> save();

        Mail::to('gonyemihaly@gmail.com')->send(new BookingConfirmation($id));

        Session::flash('emails', 'succes');

        return redirect() -> route('reservations.show', ['id' => $id]);

        
    }

    public function rejects(Request $request) {
        $id = $request -> id;
        $reason = $request -> reason;

        $reservation = Reservation::find($id);

        $reservation -> status = false;
        $reservation -> save();

        Mail::to('gonyemihaly@gmail.com')->send(new BookingConfirmation($id, $reason));

        Session::flash('emails', 'rejects');

        return redirect() -> route('reservations.show', ['id' => $id]);
    }
}
