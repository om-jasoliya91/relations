<?php
namespace App\Models;

use App\Models\Biography;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['author_name', 'email'];

    public function biography(): HasOne
    {
        return $this->hasOne(Biography::class,'author_id','id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
