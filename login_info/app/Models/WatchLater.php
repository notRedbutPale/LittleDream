<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchLater extends Model
{
    use HasFactory;

    protected $table = 'watchlater'; // Specify the correct table name
    protected $fillable = ['user_id', 'item_id', 'item_type'];
    
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

}


