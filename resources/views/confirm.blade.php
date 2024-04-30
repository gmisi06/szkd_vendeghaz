@extends('layouts.main')

@section('content')

<h1 class="text-center text-4xl mb-5 font-bold" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Adatok ellenőrzése</h1>
<div class="grid grid-cols-2 mx-auto p-5 w-3/6 bg-white rounded divide-x-2 divide-slate-300">
    <div class="grid pr-5">
        <label class="pt-3 text-lg font-semibold " for="name">Név</label>
        <div class="ml-5">{{ $reservation -> name }}</div>

        <label class="pt-5  text-lg font-semibold " for="email">Email</label>
        <div class="ml-5">{{ $reservation -> email }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="countOfPersons">Személyek száma</label>
        <div class="ml-5">{{ $reservation -> countOfPersons }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="arrival">Érkezés</label>
        <div class="ml-5">{{ $reservation -> arrival }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="leave">Távozás</label>
        <div class="ml-5">{{ $reservation -> leave }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="comment">Megjegyzés <span class="text-slate-500 font-normal italic">(opcionális)</span></label>
        <div class="ml-5">@if( $reservation -> comment === null) Nincs megjegyzés... @else {{ $reservation -> comment }} @endif</div> 
    </div>
    <div class="pl-5">
    <label class="pt-3  text-lg font-semibold " for="name">Ár</label>
    <p class="text-center">{{ $price }} Ft</p>
    </div>
</div>
<div class="flex justify-center gap-10">

<form action="{{ route('reservations.back') }}" method="post" id="backForm">
    @csrf
    <input type="hidden" name="reservation" value="{{ $reservation }}">
    <button type="submit" class="hover:bg-slate-600 rounded p-2 mt-5 w-24 bg-slate-700 text-white font-bold uppercase text-center">Vissza</button>
</form>
<form action="{{ route('reservations.store') }}" method="POST">
    @csrf

    <input type="hidden" name="reservation" value="{{ $reservation }}">
    <button type="submit" class="hover:bg-slate-600 rounded p-2 mt-5 w-24 bg-slate-700 text-white font-bold uppercase text-center">Elküld</button>
</form>

</div>

@endsection