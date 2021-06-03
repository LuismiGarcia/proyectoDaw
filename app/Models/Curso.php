<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'id_nivel',
        'id_tipo',
        'id_profesor',
        'nombre',
        'resumen',

    ];

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,'cursos_alumnos','id_curso','id_alumno');
    }
}
