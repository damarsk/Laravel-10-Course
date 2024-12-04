@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article class="blog-post mt-4">
    <!-- Judul Postingan -->
    <h2 class="display-5 mb-3">{{ $post->title }}</h2>

    <!-- Gambar Postingan -->
    <div class="text-center mb-4">
        <img src="{{ asset('storage/' . $post->file_path) }}" alt="Media" class="img-fluid" style="max-height: 400px; object-fit: cover;">
    </div>

    <!-- Tanggal Postingan -->
    <p class="blog-post-meta text-muted mb-4">
        Diposting pada {{ date("d M Y H:i", strtotime($post->created_at)) }}
    </p>

    <!-- Isi Konten Postingan -->
    <div class="content">
        <p>{{ $post->content }}</p>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-4">
        <a href="{{ url('posts') }}" class="btn btn-primary">Kembali</a>
    </div>
</article>
@endsection
