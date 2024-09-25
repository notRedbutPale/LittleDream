<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Allow mass assignment of these fields
    protected $fillable = ['body', 'user_id', 'parent_id'];

    // Comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Comment can have many reactions
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    // Comment can have many replies
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
