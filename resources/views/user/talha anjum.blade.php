@extends('user.layout')
@section('content')
@php
$singer = 'Talha Anjum'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Karachi Chal', 'karachi chal.jpg', 'KARACHI CHAL'],
    ['Sabar', 'sabar.jpg', 'SABAR'],
    ['Afsanay', 'AFSANAY.jpg', 'AFSANAY'],
    ['Gumaan', 'GUMAAN.jpg', 'GUMAAN'],
    ['4AM In Karachi', '4am karachi.jpg', '4AM in Karachi'],
    ['Downers At Dusk', 'downers at dusk.jpg', 'Downers At Dusk'],
    ['Heartbreak Kid', 'Heartbreak Kid.jpg', 'Talha Anjum - Heartbreak'],
    ['Departure Lane', 'departure lane.jpg', 'Talha Anjum - Departure'],
    ['Ye Duniya', 'duniya.jpg', 'Coke Studio  Season 14  Ye Dunya'],
    ['Phir Milenge', 'phr milenge.jpg', 'Coke Studio  Season 14  Phir Milenge'],
];
@endphp
@include('user.partials.singer-playlist')
@include('user.partials.track-player')
@endsection
