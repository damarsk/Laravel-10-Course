@extends('layouts.app')

@section('title', 'Home - Damar\'s Blog')

@section('content')
<style>
    .card {
        display: flex;
        flex-direction: column;
    }
    .card-body {
        flex-grow: 1; /* Pastikan card-body menyesuaikan ketinggian */
    }
    .content-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Batasi hanya 3 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .media {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
    }
</style>

<section class="content mt-3">
    <h5>Halo👋, {{ auth()->user()->level }}</h5>
    @if (auth()->user()->level == 'admin')
    <h1>
        <a href="{{ url('posts/create') }}" class="btn btn-success btn-sm">Buat Postingan</a>
        <a href="{{ url('posts/trash') }}" class="btn btn-danger btn-sm">Tempat Sampah</a>
    </h1>
    @endif

    <div class="row">
        @foreach ($posts as $index => $post)
        <div class="col-md-6 col-12 mt-2">
            <div class="card mb-3" style="height: 100%;">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $post->file_path) }}" alt="Media" class="media">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-truncate" style="max-width: 100%;">{{ $post->title }}</h5>
                    <pre class="card-text text-truncate content-clamp" style="font-family: Arial, Helvetica, sans-serif; white-space: normal;">{{ $post->content }}</pre>
                    <p class="card-text"><small class="text-body-secondary">Last updated at {{ date('d M Y H:i', strtotime($post->updated_at)) }}</small></p>
                    <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Baca Selengkapnya</a>
                    @if (auth()->user()->level == 'admin')
                    <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">Edit</a>
                    @endif
                </div>
            </div>
        </div>

        @if (($index + 1) % 2 == 0)
    </div>
    <div class="row"> <!-- Tutup dan buka baris baru setiap 2 elemen -->
        @endif
        @endforeach
    </div>
</section>
@endsection
