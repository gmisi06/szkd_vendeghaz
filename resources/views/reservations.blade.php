@extends('layouts.main')

@section('content')

<table class="table-auto w-10/12 mx-auto">
    <thead class="bg-slate-700 h-12 text-white text-left">
        <tr>
            <th class="pl-2">
                Státusz
            </th>
            <th>
                Név
            </th>
            <th>
                Email-cím
            </th>
            <th>
                Érkezés
            </th>
            <th>
                Távozás
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-400">
    @forelse($reservations as $reservation)
        <x-reservation-card :reservation="$reservation">

        </x-reservation-card>
    @empty
        Nincsenek bejegyzések...
    @endforelse

    </tbody>
</table>

@endsection