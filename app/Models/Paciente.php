<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //Relaciones

    public function tipoDocumento()
{
    return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
}

public function genero()
{
    return $this->belongsTo(Genero::class);
}

public function departamento()
{
    return $this->belongsTo(Departamento::class);
}

public function municipio()
{
    return $this->belongsTo(Municipio::class);
}
}
