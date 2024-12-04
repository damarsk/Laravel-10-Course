@extends('layouts.app')

@section('title', 'Buat Postingan Baru')

@section('content')
    <a href="{{ url('posts') }}" class="btn btn-secondary btn-sm mt-2 ms-2">Kembali</a>
    <div class="container mt-3">
        <h1>Buat Postingan Baru</h1>
        <form method="POST" action="{{ route('posts.store') }}" class="form-control" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Isi Konten</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Posting</button>
        </form>
    </div>
    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
@endsection
