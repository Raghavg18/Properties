<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'title',
        'description',
        'price',
        'address',
    ];

    public function recommendations()
    {
        return $this->hasOne(\App\Models\PropertyRecommendation::class);
    }
}
