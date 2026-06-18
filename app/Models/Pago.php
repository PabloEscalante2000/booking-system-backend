<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ["sesion_id", "paquete_id", "monto", "estado", "fecha_pago"];

    protected $casts = [
        'fecha_pago' => 'date',
        'monto'      => 'decimal:2',
    ];

    public function sesion() {
        return $this->belongsTo(Sesion::class,"sesion_id");
    }

    public function paquete(){
        return $this->belongsTo(Paquete::class,"paquete_id");
    }
}
