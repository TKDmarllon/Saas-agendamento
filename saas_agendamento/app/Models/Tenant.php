<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'banner',
        'primary_color',
        'secondary_color',
        'plan'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}