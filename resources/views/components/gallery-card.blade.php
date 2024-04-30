<div>
<div class="flex-none relative m-5 drop-shadow-[3px_4.2px_4.2px_rgba(0,0,0,0.8)] w-80 h-64 select-none">
<div class="absolute inset-0 h-full w-full z-0 flex justify-center items-center">
            <span class="w-5 h-5 rounded-2xl animate-ping bg-black"></span>
        </div>
        <img src={{$src}} class="z-10 absolute w-full h-full object-cover rounded"/>
        <div class="z-20 absolute inset-0 h-full w-full flex justify-center items-center opacity-0 hover:opacity-100 bg-black bg-opacity-75 ease-in-out duration-300 rounded">
            <p class="z-20 text-center text-slate-100 text-xl font-semibold tracking-wide">
                {{$title}}
            </p>
        </div>
    </div>
</div>