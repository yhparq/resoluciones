<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResolucionPdf extends Model
{
    use HasFactory;

    // protected $table = 'resolucionespdf';

    protected $fillable = [
        'numero_resolucion',
        'nombre_resolucion',
        'anio',
        'file_path'
    ];
}
