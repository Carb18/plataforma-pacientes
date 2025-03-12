<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //Relaciones

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
