<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    
    //Relaciones
    public function municipios(){
        return $this->hasMany(Municipio::class);
    }

}
