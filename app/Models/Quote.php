<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category',
        'quote',
        'author'
    ];

    /**
     * Scope a query to only include confidence quotes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeConfidence($query)
    {
        $query->where('category', 'Confidence');
    }

    /**
     * Scope a query to only include potential quotes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopePotential($query)
    {
        $query->where('category', 'Potential');
    }

    /**
     * Scope a query to only include determination quotes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeDetermination($query)
    {
        $query->where('category', 'Determination');
    }

    /**
     * Scope a query to only include resilience quotes.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeResilience($query)
    {
        $query->where('category', 'Resilience');
    }

    /**
     * Truncate the quote
     * 
     * @return string
     */
    public function truncate()
    {
        return Str::limit($this->quote, 30, "...");
    }
}
