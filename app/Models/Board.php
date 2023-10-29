<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ticket;

class Board extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
      ];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'board_user');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
