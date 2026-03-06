<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Genres;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BooksController extends Controller
{
public function index(Request $request)
{
    $search = $request->search;

    $books = Books::with(['author','genre'])
        ->when($search, function($query) use ($search){
            $query->where('judul','like','%'.$search.'%');
        })
        ->get();

    return view('books.index', compact('books'));
}
    public function create(){
        $genres = Genres::all();
        $authors = Authors::all();
        return view('books.create', compact('genres','authors'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            "judul"=> "required|max:255",
            "sinopsis"=> "required",
            "tahun_terbit"=> "required",
            "image"=> "required|image|mimes:jpg,jpeg,png|max:2048",
            "genre_id"=> "required",
            "author_id"=> "required"
        ]);

        $imagePath = $request->file('image')->store('books','public');

        $validated['image'] = $imagePath;

        Books::create($validated);

        return redirect()->route('books.index')->with('success','Berhasil menambahkan data');
    }

    public function detail($id){
        $detail = Books::findOrFail($id);
        return view('books.detail', compact('detail'));
    }

    public function destroy($id){
        $delete = Books::findOrFail($id);

        if($delete->image && Storage::disk('public')->exists($delete->image)){
            Storage::disk('public')->delete($delete->image);
        }

        $delete->delete();

        return redirect()->route('books.index')->with('success','Berhasil menghapus data');
    }

    public function edit($id){
        $book = Books::findOrFail($id);
        $genres = Genres::all();
        $authors = Authors::all();

        return view('books.edit', compact('book','genres','authors'));
    }

    public function update(Request $request, $id){

        $book = Books::findOrFail($id);

        $validated = $request->validate([
            'judul'=> 'required',
            'sinopsis'=> 'required',
            'tahun_terbit'=> 'required',
            'genre_id'=> 'required',
            'author_id'=> 'required',
            'image'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if($request->hasFile('image')){

            // Hapus gambar lama
            if($book->image && Storage::disk('public')->exists($book->image)){
                Storage::disk('public')->delete($book->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('books', 'public');
            $validated['image'] = $imagePath;
        }

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Berhasil update data');
    }
}