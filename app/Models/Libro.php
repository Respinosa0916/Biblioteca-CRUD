<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'ano_publicacion', 'id_categoria'];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
