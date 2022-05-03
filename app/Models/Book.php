<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'author_name', 'summary'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
}
