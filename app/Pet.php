<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pet extends Model
{
    use Notifiable;
    //
    protected $fillable = ['nome','tipo','raca','cor','sexo','dataNascimento','observacoes'];

    public $timestamps = false;

    public function vacinas(){
        return $this->hasMany(Vacina::class);
    }

}
