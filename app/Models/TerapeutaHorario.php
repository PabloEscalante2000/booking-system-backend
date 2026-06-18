<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerapeutaHorario extends Model
{
    protected $fillable = ["terapeuta_id","dia","hora_inicio","hora_final","slot_duration","is_active","valido_desde","valido_hasta"];

    protected $casts = [
        'valido_desde'  => 'date',
        'valido_hasta'  => 'date',
        'is_active'     => 'boolean',
        'slot_duration' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "terapeuta_id");
    }
}
