<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //Relaciones
    use HasFactory;

    protected $fillable = ['departamento_id', 'nombre'];
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
