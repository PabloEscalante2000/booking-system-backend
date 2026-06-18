<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioExcepcion extends Model
{
    protected $fillable = ["terapeuta_id","expiration_date","razon","tipo","valido_desde","valido_hasta"];

    protected $casts = [
        'expiration_date' => 'date',
        'valido_desde'    => 'date',
        'valido_hasta'    => 'date',
    ];

    public function user(){
        return $this->belongsTo(User::class, "terapeuta_id");
    }
}
