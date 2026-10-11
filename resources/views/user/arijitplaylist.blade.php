@extends('user.layout')
@section('content')
@php
$singer = 'Arijit Singh'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Agar Tum Saath Ho', 'agr tum sath ho.jpg', 'Agar Tum Saath Ho'],
    ['Sitaare', 'sitare.jpg', 'Sitaare'],
    ['Darkhast', 'darkhast.png', 'Arijit Singh - Darkhaast'],
    ['Gehra Huwa', 'gehra huwa.jpg', 'Gehra Hua'],
    ['Humdard', 'humdard.jpg', 'Humdard'],
    ['Ilahi', 'ilahi.jpg', 'Ilahi song'],
    ['Keseriya', 'keserya.jpg', 'Kesariya'],
    ['Sanam Re', 'sanam re.jpg', 'Sanam Re'],
    ['Satranga', 'satranga.jpg', 'Satranga'],
    ['Sooraj Dooba Hain', 'soraj dooba h.jpg', 'SOORAJ DOOBA'],
    ['Rabta', 'rabta.jpg', 'Arijit Singh - Raabta'],
    ['Tujhe Kitna Chane Lage Hum', 'tujhe kitna chane lagai.jpg', 'Tujhe kitna'],
    ['Chaleya', 'chaleya.jpg', 'Chaleya'],
];
@endphp
@include('user.partials.singer-playlist')
@include('user.partials.track-player')
@endsection
