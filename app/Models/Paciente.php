<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //Relaciones
    use HasFactory;

    protected $table = 'paciente';
    protected $fillable = [
        'tipo_documento_id',
        'numero_documento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'genero_id',
        'departamento_id',
        'municipio_id',
    ];

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
