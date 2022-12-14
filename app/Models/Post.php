<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];

    /**
     * Get the user.
    */
    public function user ()
    {
        return $this->belongsTo ( User::class )->select( [ 'name', 'username' ] );
    }

    public function comments()
    {
        return $this->hasMany( Comment::class )->orderBy('created_at', 'DESC');
    }

    public function likes ()
    {
        return $this->hasMany( Like::class );
    }

    // Verifica si un usuario ya dio like a un post a traves de la relación likes()
    public function checkLike ( User $user )
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
