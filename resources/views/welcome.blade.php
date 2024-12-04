@extends('layouts.app')
@section('title', 'Damar')
<style>
    .hero {
        height: 80vh;
    }

    .headHero {
        animation: bounce 1s infinite alternate;
    }

    @keyframes bounce {
        0% {
            transform: translateY(0px);
            /* Posisi normal */
        }

        100% {
            transform: translateY(-10px);
        }
    }
</style>
@section('content')
<div class="container d-flex justify-content-between flex-column">
    <section>
        <div class="hero d-flex justify-content-center align-items-center">
            <h1 class="headHero">Selamat Datang</h1>
        </div>
    </section>
</div>
@endsection