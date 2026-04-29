<?php

namespace App\Http\Controllers;

use App\Models\Category; // Import Model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori dengan total produk.
     */
    public function index()
    {
        // Menggunakan withCount('products') untuk menghitung jumlah relasi secara otomatis 
        $categories = Category::withCount('products')->get();
        
        return view('category.index', compact('categories'));
    }

    /**
     * Menampilkan form untuk menambah kategori baru.
     * Hanya admin yang bisa akses
     */
    public function create()
    {
        Gate::authorize('create', Category::class);
        return view('category.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     * Hanya admin yang bisa simpan
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Category::class);

        // Validasi input nama agar wajib diisi dan unik 
        $request->validate([
            'name' => 'required|unique:category,name|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit kategori.
     * Hanya admin yang bisa akses
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        Gate::authorize('update', $category);
        return view('category.edit', compact('category'));
    }

    /**
     * Memperbarui data kategori di database.
     * Hanya admin yang bisa update
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        Gate::authorize('update', $category);

        $request->validate([
            'name' => 'required|unique:category,name,' . $id . '|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category berhasil diperbarui!');
    }

    /**
     * Menghapus kategori dari database.
     * Hanya admin yang bisa hapus
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        Gate::authorize('delete', $category);
        
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category berhasil dihapus!');
    }

    /**
     * Metode show biasanya tidak digunakan untuk CRUD kategori sederhana.
     */
    public function show(string $id)
    {
        return redirect()->route('category.index');
    }
}