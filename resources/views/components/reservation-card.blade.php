

<tr class=" h-14 relative font-semibold @if( $reservation->new ) bg-green-200 @else bg-slate-300 @endif">
    @if( $reservation->new )
        <td class="pl-2 text-green-800 font-bold relative"> Új <div class="animate-ping origin-top absolute top-1/2 left-0 translate-y-1/2 -mt-2 -ml-5 h-2 w-2 bg-green-800 rounded"></div></td>
    @else
        @if ($reservation -> status === null)
            <td class="pl-2 text-amber-700 font-bold relative"> Függőben <div class="animate-ping origin-top absolute top-1/2 left-0 translate-y-1/2 -mt-2 -ml-5 h-2 w-2 bg-amber-800 rounded"></div></td>
        @elseif ($reservation -> status)
            <td class="pl-2 text-green-700 font-bold"> Elfogadva </td>
        @else
            <td class="pl-2 text-red-700 font-bold"> Elutasítva </td>
        @endif
    @endif
    <td>{{ $reservation -> name }}</td>
    <td>{{ $reservation -> email }}</td>
    <td>{{ \Carbon\Carbon::parse($reservation -> arrival)->format('Y. m. d.') }}</td>
    <td>{{ \Carbon\Carbon::parse($reservation -> leave)->format('Y. m. d.') }}</td>
    <td><a class="bg-slate-800 text-white uppercase rounded py-2 px-3 hover:bg-slate-600" href="{{ route('reservations.show', ['id' => $reservation -> id]) }}">Részletek</a></td>
</tr>