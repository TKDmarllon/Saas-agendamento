<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\BelongsToTenant;

class Client extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'name',
        'phone',
        'email'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}