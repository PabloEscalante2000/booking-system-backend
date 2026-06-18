<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TerapeutaHorario;

#[Fillable(['name', 'email', 'password', 'imagen', 'precio', 'rol', 'is_active', 'especialidad'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'precio'            => 'decimal:2',
            'is_active'         => 'boolean',
        ];
    }

    public function terapeutaHorarios(){
        return $this->hasMany(TerapeutaHorario::class,"terapeuta_id");
    } 

    public function horariosExcepciones(){
        return $this->hasMany(HorarioExcepcion::class,"terapeuta_id");
    } 

    public function slotsViables(){
        return $this->hasMany(SlotsViable::class,"terapeuta_id");
    } 

    public function sesionsComoTerapeuta(){
        return $this->hasMany(Sesion::class,"terapeuta_id");
    }

    public function sesionsComoPaciente(){
        return $this->hasMany(Sesion::class,"paciente_id");
    }
}
