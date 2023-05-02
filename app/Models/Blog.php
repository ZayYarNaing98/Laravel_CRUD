<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
