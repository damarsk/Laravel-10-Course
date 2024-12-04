<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if(!Auth::check()) {
            return view('/login');
        }
        $posts = DB::table('posts')->whereNull('deleted_at')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,jpeg,mp4,mov|max:20480', // Max 20MB
        ]);

        // Proses file jika ada
        $file_path = null;
        $file_type = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_path = $file->store('uploads/posts', 'public');
            $file_type = $file->getClientOriginalExtension(); // Simpan tipe file
        }

        // Simpan data post
        DB::table('posts')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'file_path' => $file_path,
            'file_type' => $file_type,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('posts')->with('success', 'Post berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        // Ambil post berdasarkan ID
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return redirect('notfound');
        }

        return view('posts.show', ['post' => $post]);
    }

    public function edit(string $id)
    {
        // Ambil data post
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return redirect('notfound');
        }

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi Input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,jpeg,mp4,mov|max:20480', // Max 20MB
        ]);

        // Proses file jika ada
        $file_path = null;
        $file_type = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_path = $file->store('uploads/posts', 'public');
            $file_type = $file->getClientOriginalExtension();

            // Hapus file lama
            $old_post = DB::table('posts')->where('id', $id)->first();
            if ($old_post && $old_post->file_path) {
                Storage::disk('public')->delete($old_post->file_path);
            }
        }

        // Update data post
        DB::table('posts')->where('id', $id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'file_path' => $file_path ?? DB::raw('file_path'), // Tetap gunakan data lama jika tidak diupdate
            'file_type' => $file_type ?? DB::raw('file_type'), // Tetap gunakan data lama jika tidak diupdate
            'updated_at' => now(),
        ]);

        return redirect("posts/{$id}")->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Soft delete
        DB::table('posts')->where('id', $id)->update([
            'deleted_at' => now(),
        ]);

        return redirect('posts')->with('success', 'Post berhasil dihapus!');
    }

    public function trash()
    {
        // Ambil data yang sudah dihapus
        $posts = DB::table('posts')->whereNotNull('deleted_at')->get();

        return view('posts.trash', ['posts' => $posts]);
    }

    public function restore($id)
    {
        // Mengembalikan data yang dihapus
        DB::table('posts')->where('id', $id)->update([
            'deleted_at' => null,
        ]);

        return redirect('posts')->with('success', 'Post berhasil dikembalikan!');
    }

    public function permanentDelete($id)
    {
        // Hapus permanen data dan file terkait
        $post = DB::table('posts')->where('id', $id)->first();

        if ($post && $post->file_path) {
            Storage::disk('public')->delete($post->file_path);
        }

        DB::table('posts')->where('id', $id)->delete();

        return redirect('posts')->with('success', 'Post berhasil dihapus secara permanen!');
    }
}