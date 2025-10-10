<?php
namespace App\Models;

use App\Models\Biography;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['author_name', 'email'];

    public function biography()
    {
        return $this->hasOne(Biography::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
