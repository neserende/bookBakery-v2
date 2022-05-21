<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'book_id', 'body', 'chapter_no'];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
