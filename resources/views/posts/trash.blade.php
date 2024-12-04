<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'Home - Damar\'s Blog')

@section('content')
<section class="content">
    <h1>
        <a href="{{ url('posts') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </h1>
    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <pre class="card-text" style="font-family: Arial, Helvetica, sans-serif">{{ $post->content }}</pre>
            <p class="card-text"><small class="text-body-secondary">Last updated at {{ date('d M Y H:i', strtotime($post->updated_at)) }}</small></p>
            <div class="d-flex">
                <form class="me-2" method="POST" action='{{ url("posts/restore/$post->id") }}'>
                    @method('PATCH')
                    @csrf
                    <button id="confirmBtn" type="submit" class="btn btn-warning">Restore</button>
                </form>
                <form action='{{ url("posts/$post->id/permanent-delete") }}' method="post">
                    @method('DELETE')
                    @csrf
                    <button id="confirmBtn" type="submit" class="btn btn-danger">Delete Permanent</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection