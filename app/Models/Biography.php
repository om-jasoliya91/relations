<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'bio_text', 'website'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}