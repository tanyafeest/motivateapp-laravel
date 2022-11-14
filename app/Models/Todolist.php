<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'message',
        'chat',
        'social',
        'email'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'message' => 'boolean',
        'chat' => 'boolean',
        'social' => 'boolean',
        'email' => 'boolean',
    ];

    use HasFactory;
}
