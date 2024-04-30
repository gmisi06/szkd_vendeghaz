<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SzKD Vendégház</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Great+Vibes&family=Roboto+Slab&display=swap" rel="stylesheet">
    <style>

    
</style>
</head>
<body class="grid min-h-screen bg-gradient-to-r from-slate-200 to-fuchsia-100">
    
        <nav style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" class="relative sticky top-0 flex items-center drop-shadow-[0_4.2px_4.2px_rgba(0,0,0,0.5)] h-16 bg-slate-800 z-50">
            
            <div class="flex justify-around items-center w-3/6 mx-auto text-white font-semibold text-2xl tracking-wider" style="text-shadow: 2px 1.5px 1.5px #000 ">
                    <a href="{{route('home')}}" class="hover:text-slate-300">Főoldal</a>
                    <a href="{{route('gallery')}}" class="hover:text-slate-300">Galéria</a>
                    <a href="{{route('reservation.create')}}" class="hover:text-slate-300">Foglalás</a>
                    <a href="" class="hover:text-slate-300">Elérhetőség</a>
            </div>
            
            @auth
                <div class="rounded-3xl flex absolute items-center right-0 gap-6 px-4 mr-2 h-5/6 bg-white text-black font-semibold text-xl tracking-wider" style="box-shadow: inset 0 0 5px #000;">
                    <a href="{{route('reservation.index')}}">Foglalások</a>
                    <form class="" action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button>Kilépés</button>
                    </form>
                </div>
            @endauth
            

</nav>
    <main class="my-10">
        @yield('content')
    </main>

    <footer class="mt-auto text-center text-white bg-slate-800 py-5 border-t-2 border-slate-500" style="z-index: 1">
        <p class="">Szent Kozma és Damján Vendégház</p>
        <p>8353 Zalaszántó, Fő utca 20.</p>
    <footer>
</body>
</html>