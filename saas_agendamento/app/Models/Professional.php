<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\BelongsToTenant;

class Professional extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'name',
        'photo',
        'bio'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}