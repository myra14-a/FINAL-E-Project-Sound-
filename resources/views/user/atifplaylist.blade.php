@extends('user.layout')
@section('content')
@php
$singer = 'Atif Aslam'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Darasal', 'darasal.jpg', 'Darasal'],
    ['Dil Diyan Gallan', 'dil diya galla.jpg', 'Dil Diyan Gallan'],
    ['Tere Sang Yara', 'tere sang yara.jpg', 'Rustom - Tere Sang'],
    ['Aadat', 'aadat.jpg', 'Aadat'],
    ['Tajdar E Haram', 'tajdare haram.jpg', 'Coke Studio Season 8 Tajdar'],
    ['Woh Lamhe', 'wo lamhe.jpg', 'wo lamhe'],
    ['Hona Tha Pyaar', 'hona tha pyar.jpg', 'Hona tha pyaar'],
    ['O Meri Laila', 'o meri laila.jpg', 'o meri laila'],
    ['Dil Meri Na Sune', 'dil meri na sunai.jpg', 'dil  meri  na'],
    ['Jeene Laga Hoon', 'jene laga ho.jpg', 'Jeena Laga Hoon'],
    ['Pheli Nazar Mein', 'pheli nazar mai.jpg', 'pheli nazar'],
    ['Piya O Re Piya', 'piya o piya.jpg', 'Atif Aslam, Shreya Ghoshal - Piya'],
    ['Dekhte Dekhte', 'dekhte dekhte.jpg', 'dekhte dekhte'],
    ['Tu Chahiye', 'tu chahiye.jpg', 'Tu Chahiye'],
];
@endphp
@include('user.partials.singer-playlist')
@include('user.partials.track-player')
@endsection
