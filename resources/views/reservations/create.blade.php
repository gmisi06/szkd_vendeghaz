@extends('layouts.main')

@section('content')

<div class="">
    <form action="{{ route('reservations.confirm') }}" method="POST"
    class="grid p-10 mx-auto min-w-96 w-3/6"
    >
        @csrf
        <label class="pt-3 ml-5 text-lg font-semibold " for="name">Név</label>
        <input class="w-full rounded h-12 border-2 border-slate-400 p-3" type="string" name="name" value="{{ old('name', $formData['name'] ?? '') }}">
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <label class="pt-3 ml-5 text-lg font-semibold " for="email">Email</label>
        <input class="rounded h-12 border-2 border-slate-400 p-3" type="string" name="email"  value="{{ old('email', $formData['email'] ?? '') }}">
        @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <label class="pt-3 ml-5 text-lg font-semibold " for="countOfPersons">Személyek száma</label>
        <input class="rounded h-12 border-2 border-slate-400" type="number" name="countOfPersons" value="{{ old('countOfPersons', $formData['countOfPersons'] ?? '') }}">
        @error('countOfPersons')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        
        <label class="pt-3 ml-5 text-lg font-semibold " for="arrival">Érkezés</label>
        <input class="rounded h-12 border-2 border-slate-400" type="date" name="arrival" value="{{ old('arrival', $formData['arrival'] ?? '') }}">
        @error('arrival')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        
        <label class="pt-3 ml-5 text-lg font-semibold " for="leave">Távozás</label>
        <input class="rounded h-12 border-2 border-slate-400" type="date" name="leave" value="{{ old('leave', $formData['leave'] ?? '') }}">
        @error('leave')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        @error('date')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        
        <label class="pt-3 ml-5 text-lg font-semibold " for="comment">Megjegyzés <span class="text-slate-500 font-normal italic">(opcionális)</span></label>
        <textarea class="rounded min-h-12 border-2 border-slate-400" name="comment">{{ old('comment', $formData['comment'] ?? '') }}</textarea>
        
        @error('count')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <button class="mx-auto hover:bg-slate-600 rounded p-2 mt-5 w-24 bg-slate-700 text-white font-bold uppercase" type="submit">Tovább</button>
    </form>
</div>

@endsection