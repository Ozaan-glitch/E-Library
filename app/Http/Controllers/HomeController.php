<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Jika nama table berbeda dari 'books', tambahkan:
    // protected $table = 'nama_table';

    // Jika ingin mass assignment
    // protected $fillable = ['title', 'author_id', 'genre_id', 'cover'];

    // Relasi ke Author
    public function author() {
        return $this->belongsTo(Author::class);
    }

    // Relasi ke Genre
    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}