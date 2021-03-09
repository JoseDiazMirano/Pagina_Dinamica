<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $categorias = Categorias::all();
        $productos = Productos::all();
                
        return view('categorias', compact('categorias' , 'productos'));
        
    }

    public function show($slug){
        
        $producto = Productos::where('slug', $slug)->first();
        return view('product-details', compact('producto'));

        
    }
    public function searchCategory($slug){
        $categorias = Categorias::where('slug' , $slug)->pluck('id')->all();
        $productos = Productos::where('categoria_id',$categorias)
                    ->orderBY('id', 'DESC')
                    ->simplePaginate(6);
        return view('productos', compact('categorias' , 'productos')); 
    }
}
