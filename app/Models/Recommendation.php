<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'recommendations',
    ];

    protected $casts = [
        'recommendations' => 'array',
    ];

    public function property()
    {
        return $this->belongsTo('App\Models\Property');
    }
}
