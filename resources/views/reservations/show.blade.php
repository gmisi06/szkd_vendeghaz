@extends('layouts.main')

@section('content')

@if (Session::get('emails') === 'succes')
    <x-toast text="Sikeresen elfogadva!" />
@elseif (Session::get('emails') === 'rejects')
    <x-toast text="Sikeresen elutasítva!" />
@endif

<h1 class="text-center text-slate-800 text-4xl mb-5 font-bold" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">A foglalás részletei</h1>
<div class="grid grid-cols-2 mx-auto p-5 w-3/6 bg-white rounded divide-x-2 divide-slate-300 shadow">
    <div class="grid pr-5">
        <label class="pt-3 text-lg font-semibold " for="name">Név</label>
        <div class="ml-5">{{ $reservation -> name }}</div>

        <label class="pt-5  text-lg font-semibold " for="email">Email</label>
        <div class="ml-5">{{ $reservation -> email }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="countOfPersons">Személyek száma</label>
        <div class="ml-5">{{ $reservation -> countOfPersons }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="arrival">Érkezés</label>
        <div class="ml-5">{{ \Carbon\Carbon::parse($reservation->arrival)->format('Y. m. d.') }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="leave">Távozás</label>
        <div class="ml-5">{{ \Carbon\Carbon::parse($reservation->leave)->format('Y. m. d.') }}</div>
        
        <label class="pt-5  text-lg font-semibold " for="comment">Megjegyzés <span class="text-slate-500 font-normal italic">(opcionális)</span></label>
        <div class="ml-5">@if( $reservation -> comment === null) Nincs megjegyzés... @else {{ $reservation -> comment }} @endif</div> 
    </div>
    <div class="pl-5 pt-10">
        <div class="shadow rounded-lg">
            <p class="text-lg font-semibold text-center bg-slate-800 text-white p-1 rounded-t-lg">Fizetendő</p>
            <p class="text-center text-2xl font-bold bg-slate-100 text-slate-800 p-3 rounded-b-lg">{{ number_format($price, 0, ',', '.') }} Ft</p>
        </div>
    </div>
</div>
<div class="flex justify-center gap-10">
    @if($reservation -> status === null || $reservation -> status)
    <button data-modal-target="static-modal-rejects" data-modal-toggle="static-modal-rejects" class="hover:bg-red-600 rounded p-2 mt-5 w-24 bg-red-700 text-white font-bold uppercase text-center" type="button">
        Elutasít
    </button>
    @endif
    @if($reservation -> status === null || !$reservation -> status)
    <button data-modal-target="static-modal-accept" data-modal-toggle="static-modal-accept" class="hover:bg-green-600 rounded p-2 mt-5 w-24 bg-green-700 text-white font-bold uppercase text-center " type="button">
        Elfogad
    </button>
    @endif
</div>
<div class="flex justify-center gap-10">
    <a href="{{ route('reservation.index') }}" class="hover:bg-slate-600 rounded p-2 mt-5 w-24 bg-slate-700 text-white font-bold uppercase text-center">Vissza</a>
</div>



<div id="static-modal-accept" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden bg-slate-800/75 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Foglalás elfogadása
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal-accept">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Bezárás</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Visszaigazolás küldése a/az {{ $reservation -> email }} e-mail címre a foglalás elfogadásáról.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a data-modal-hide="static-modal-accept" href="{{ route('accept', ['id' => $reservation -> id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Küldés</a>
                <button data-modal-hide="static-modal-accept" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Mégse</button>
            </div>
        </div>
    </div>
</div>

<div id="static-modal-rejects" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden bg-slate-800/75 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Foglalás elutasítása
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal-rejects">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Bezárás</span>
                </button>
            </div>
            <form action="{{ route('rejects') }}" method="POST">
                @csrf

                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Visszaigazolás küldése a/az {{ $reservation -> email }} e-mail címre a foglalás elutasításáról.
                    </p>
                    <h1 class="text-lg font-semibold text-slate-800">Indok:</h1>
                    <textarea class="w-full rounded border-2 border-slate-400" name="reason">

                    </textarea>
                    <input type="hidden" name="id" value="{{ $reservation -> id }}">
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" data-modal-hide="static-modal-rejects" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Küldés</a>
                    <button data-modal-hide="static-modal-rejects" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Mégse</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection