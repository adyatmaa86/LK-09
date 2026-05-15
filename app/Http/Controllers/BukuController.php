<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $query = Buku::query();
        $search = session('buku_search');
        $category = session('buku_category');

        $query->when($search, function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('title', 'like', '%' . $search . '%')
                    ->orWhere('author', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%');
            });
        });

        $query->when($category && $category != 'Semua Kategori', function ($q) use ($category) {
            $q->where('category', $category);
        });

        $bukus = $query->latest()->paginate(8);

        return view('buku.index', compact('bukus'));
    }

    public function search(Request $request)
    {
        session([
            'buku_search' => $request->search,
            'buku_category' => $request->category
        ]);

        return redirect()->route('buku.index');
    }

    public function clearSearch()
    {
        session()->forget(['buku_search', 'buku_category']);
        return redirect()->route('buku.index');
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max' => [
                'string' => ':attribute tidak boleh lebih dari :max karakter.',
                'file' => ':attribute tidak boleh lebih dari :max kilobyte.',
            ],
            'integer' => ':attribute harus berupa angka.',
            'image' => ':attribute harus berupa file gambar.',
            'mimes' => ':attribute harus berformat :values.',
        ], [
            'title' => 'Judul buku',
            'author' => 'Penulis',
            'publisher' => 'Penerbit',
            'year' => 'Tahun terbit',
            'category' => 'Kategori',
            'description' => 'Deskripsi',
            'cover' => 'Sampul buku',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Buku::create($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max' => [
                'string' => ':attribute tidak boleh lebih dari :max karakter.',
                'file' => ':attribute tidak boleh lebih dari :max kilobyte.',
            ],
            'integer' => ':attribute harus berupa angka.',
            'image' => ':attribute harus berupa file gambar.',
            'mimes' => ':attribute harus berformat :values.',
        ], [
            'title' => 'Judul buku',
            'author' => 'Penulis',
            'publisher' => 'Penerbit',
            'year' => 'Tahun terbit',
            'category' => 'Kategori',
            'description' => 'Deskripsi',
            'cover' => 'Sampul buku',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            if ($buku->cover) {
                Storage::disk('public')->delete($buku->cover);
            }
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $buku->update($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        if ($buku->cover) {
            Storage::disk('public')->delete($buku->cover);
        }
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
