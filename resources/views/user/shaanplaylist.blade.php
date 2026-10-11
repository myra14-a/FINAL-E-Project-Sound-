@extends('user.layout')
@section('content')
@php
$singer = 'Shaan'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Dil Leke', 'dil leke.jpg', 'dil leke'],
    ['Wo Ladki Hain Kahan', 'wo ladki h kaha.jpg', 'wo lrki h kaha'],
    ['Bum Bum Bole', 'bum bum.jpg', 'bum bum bolai'],
    ['Dastaan', 'dastan.jpg', 'Dastaan-E'],
    ['Mein Hoon Don', 'mai ho don.jpg', 'main Hu don'],
    ['Dus Bahane', 'dus bahane.jpg', 'dus bahane'],
    ['Aao Milo Chalo', 'aoo milo chale.jpg', 'Aao Milo Chale'],
    ['Behti Hawa Sa Tha Woh', 'behti hawa.jpg', 'Behti Hawa'],
    ['Chaar Kadam', 'char kadam.jpg', 'chaar kadam'],
    ['My Dil Goes Mmmm', 'my dil goes.jpg', 'my dil goes hmm'],
    ['Hey Shona', 'hey sona.jpg', 'hey shona'],
    ['Chand Sifarish', 'chand sifarish.jpg', 'Chand Sifarish'],
    ['Wo Pheli Baar', 'wo pheli baar.jpg', 'Shaan Who Pehli'],
    ['Aaj Unse Milna', 'aaj unse.jpg', 'Aaj Unse Milna'],
];
@endphp
@include('user.partials.singer-playlist')
@include('user.partials.track-player')
@endsection
