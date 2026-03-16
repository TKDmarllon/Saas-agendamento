<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\BelongsToTenant;

class Appointment extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'service_id',
        'professional_id',
        'client_id',
        'start_time',
        'status'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}