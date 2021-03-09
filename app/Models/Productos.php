<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'slug','descriptions', 'extract', 'price', 'image', 'visible', 'categoria_id'];
    public function categoria(){
        return $this->belongsTo('App\Models\Categorias');
    }
}
