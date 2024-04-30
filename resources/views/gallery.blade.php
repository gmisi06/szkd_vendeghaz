@extends('layouts.main')

@section('content')


<h1 class="text-center text-5xl font-black text-slate-700 pt-10 pb-5 italic" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;; text-shadow: 2px 1.5px 1.5px #fff">A Vendégház, és belső tere</h1>
<div class="mx-auto flex flex-wrap w-fit max-w-screen-2xl justify-center ">

    <x-gallery-card src="img/epulet_elokep.jpg" title="Épület" />
    <x-gallery-card src="img/epulet2_elokep.jpg" title="Épület" />
    <x-gallery-card src="img/konyha_elokep.jpg" title="Konyha"/>
    <x-gallery-card src="img/konyha2_elokep.jpg" title="Konyha"/>
    <x-gallery-card src="img/folyoso_elokep.jpg" title="Folyosó" />
    <x-gallery-card src="img/szoba1_elokep.jpg" title="Szoba" />
    <x-gallery-card src="img/szoba2_elokep.jpg" title="Szoba" />
    <x-gallery-card src="img/furdo_elokep.jpg" title="Fürdő" />
    <x-gallery-card src="img/mosdo_elokep.jpg" title="Mosdó" />
    <x-gallery-card src="img/wc_elokep.jpg" title="WC" />
</div>
<h1 class="text-center text-5xl text-slate-700 font-black pt-10 pb-5 italic" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-shadow: 2px 1.5px 1.5px #fff">A Vendégház udvara</h1>
<div class="mx-auto flex flex-wrap w-fit max-w-screen-2xl justify-center ">

    <x-gallery-card src="img/udvar_elokep.jpg" title="Épület" />
    <x-gallery-card src="img/udvar2_elokep.jpg" title="Épület" />
    <x-gallery-card src="img/udvar3_elokep.jpg" title="Konyha"/>
</div>

@endsection