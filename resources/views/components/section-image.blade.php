@props(['src', 'title'])

<section
        class="-mt-20 ml-auto mr-0 max-w-3xl relative"
    >
        <img class=" object-cover rounded drop-shadow-[3px_4.2px_4.2px_rgba(0,0,0,0.5)]" style="height: 450px" width="768" src="{{ $src }}" />
        <p class=" absolute right-0 bottom-0 mb-2 mr-4 pt-2 text-center italic text-white text-lg font-bold" style="text-shadow: 2px 1.5px 1.5px #000">{{ $title }}</p>
        <!--<img src="triangle.svg" class="w-20 fill-slate-200" />-->
        <svg height="141" width="141" style="transform: rotate(45deg)" class="absolute right-0 top-0 -mt-7 -mr-7 drop-shadow-[3px_4.2px_4.2px_rgba(0,0,0,0.8)]" xmlns="http://www.w3.org/2000/svg">
            <polygon points="70,1  1,70 140,70" class="fill-slate-700 stroke-slate-400 stroke-2" />
        </svg>
        <svg height="141" width="141" style="transform: rotate(-135deg)" class="absolute left-0 bottom-0 -ml-7 -mb-7 drop-shadow-[-3px_-4.2px_4.2px_rgba(0,0,0,0.8)]" xmlns="http://www.w3.org/2000/svg">
            <polygon points="70,1  1,70 140,70" class="fill-slate-700 stroke-slate-400 stroke-2" />
        </svg>
    </section>