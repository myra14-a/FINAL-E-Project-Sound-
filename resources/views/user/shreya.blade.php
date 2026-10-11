@extends('user.layout')
@section('content')
@php
$singer = 'Shreya Ghoshal'; $tagline = 'her most loved songs in one smooth player.';
$tracks = [
    ['Hasi', 'hasi.jpg', 'Hasi Ban Gaye'],
    ['Guli Mata', 'gulli mata.jpg', 'Guli Mata'],
    ['Saathiya', 'saathiya.jpg', 'Sathiya'],
    ['Deewani Mastani', 'dewani.jpg', 'Deewani Mastani'],
    ['Pal Pal Har Pal', 'pal pal har pal.jpg', 'Pal Pal Har Pal'],
    ['O bekhabar', 'bekhbar.jpg', 'O Bekhabar'],
    ['Yimmy Yimmy', 'yimmy.jpg', 'Yimmy Yimmy'],
    ['Manwa lage', 'manwa lagai.jpg', 'Manwa laage'],
    ['BESOS', 'BESOS.jpg', 'BESOS'],
];
@endphp
@include('user.partials.singer-playlist')
@include('user.partials.track-player')
@endsection
