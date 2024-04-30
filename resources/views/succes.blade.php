@extends('layouts.main')

@section('content')
<div class="text-center" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <h1 class="text-4xl font-bold text-slate-800 mt-10">Foglalása sikeresen elküldve!</h1>
    <p class="mx-auto text-xl mt-5 w-8/12">A foglalása a rendszerbe került, amint a valamelyik kollégánk elfogadja a foglalását, emailben értesítjük Önt!
    </p>

    <p class="text-center mt-20">Visszairányítás a főoldalra <span id="counter">15</span> másodperc múlva.</p>
</div>

<script>
        var count = 15; // A kezdeti érték 15 másodperc
        var counterElement = document.getElementById('counter');
        
        // Számláló működése
        var countdown = setInterval(function() {
            count--;
            counterElement.textContent = count; // Számláló értékének beállítása
            
            // Ha a számláló eléri a 0-t, átirányítás
            if (count <= 0) {
                clearInterval(countdown);
                window.location.href = "/";
            }
        }, 1000); // 1000ms = 1 másodperc
    </script>
@endsection