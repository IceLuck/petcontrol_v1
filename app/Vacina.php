<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vacina extends Model
{
    use Notifiable;
    //
    protected $fillable = ['tipo','rotulo','dataAplicacao','dataProximaAplicacao','pet_id'];

    public $timestamps = false;

    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
