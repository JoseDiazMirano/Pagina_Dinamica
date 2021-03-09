<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = ['name' , 'slug','descripcion'];
    
    public function productos(){
        return $this->hasMany('App\Models\Productos');
    }
}
