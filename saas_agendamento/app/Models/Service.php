<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\BelongsToTenant;

class Service extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'name',
        'price',
        'duration'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}