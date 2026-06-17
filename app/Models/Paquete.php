<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $fillable = ["notas","num_sesiones","precio_total"];

    public function sesions(){
        return $this->hasMany(Sesion::class,"paquete_id");
    }

    public function pagos(){
        return $this->hasMany(Pago::class,"paquete_id");
    }
}
