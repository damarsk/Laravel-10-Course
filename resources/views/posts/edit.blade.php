@extends('layouts.app')

@section('title', 'Edit Postingan')

@section('content')
    <a href="{{ url('posts') }}" class="btn btn-secondary btn-sm mt-2">Kembali</a>
    <div class="mt-3">
        <h1>Edit Postingan</h1>
        
        <!-- Form Edit -->
        <form method="POST" action="{{ url("posts/$post->id") }}" class="form-control mb-3">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Isi Konten</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
            </div>
            
            <!-- Wrapper for buttons di luar kedua form -->
            <div class="d-flex gap-2">
                <div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </form>

        <!-- Form Delete (terpisah) -->
        <div>
                <form method="POST" action="{{ url("posts/$post->id") }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
        </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
@endsection