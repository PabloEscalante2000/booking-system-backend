<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioExcepciones extends Model
{
    protected $fillable = ["terapeuta_id","expiration_date","razon","tipo","valido_desde","valido_hasta"];

    public function user(){
        return $this->belongsTo(User::class, "terapeuta_id");
    }
}
