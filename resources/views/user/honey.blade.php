@extends('user.layout')
@section('content')
@php
$singer = 'Honey Singh'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Jatt Mehkma', 'jat mehkma.jpg', 'Jatt Mehkma'],
    ['Laal Pari', 'laal pari.jpg', 'LAAL PARI'],
    ['Blue Eyes', 'blue eyes.jpg', 'Blue Eyes'],
    ['Bonita', 'bonita.jpg', 'Bonita'],
    ['Lungi Dance', 'lungi dance.jpg', 'Lungi Dance'],
    ['Millionaire', 'MILLIONAIRE.jpg', 'MILLIONARE'],
    ['Love Doose', 'love doose.jpg', 'LOVE DOSE'],
    ['Payal', 'payal.jpg', 'PAYAL'],
    ['Casa Tupka Anthemo', 'Casa Tupka Anthemo.jpg', 'Casa Tupka'],
    ['Rooh', 'rooh.jpg', 'ROOH'],
];
@endphp
@include('user.partials.singer-playlist')
@include('user.partials.track-player')
@endsection
