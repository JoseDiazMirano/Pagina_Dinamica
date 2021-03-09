<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveProductoRequest;
use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function index(Request $request){ 
        if($request){
            $query = trim($request->get('search'));
            $productos = Productos::where('name','LIKE','%'. $query.'%')
            ->orderBy('id','asc')
            ->simplePaginate(5);
            return view('producto.index',['productos' => $productos , 'search' => $query]);
        }
    }

    public function create(){
        $categorias = Categorias::orderBy('id' , 'desc')->pluck('name', 'id');
        return view('producto.create', compact('categorias'));
    }

    public function store(SaveProductoRequest $request){

        $producto = new Productos();
            
        $producto->categoria_id  = $request->get('categoria_id');
        $producto->name          = request('name');
        $producto->slug          = Str::slug($request->get('name'));
        $producto->descriptions  = request('descriptions');
        $producto->extract       = request('extract');
        $producto->price         = request('price');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
                $producto->image = $file->getClientOriginalName();
        $producto->visible       = request('visible') ? 1 : 0;
    }
        $producto->save();
        return redirect('producto/');
    } 
    public function edit($id)
    {
        return view('producto.edit',['producto' => Productos::findOrFail($id)]);
    } 

    public function update(Request $request,$id)
    {
        $producto = Productos::findOrFail($id);

        $producto->categoria_id  = auth()->id();
        $producto->name          = $request->get('name');
        $producto->slug          = Str::slug($request->get('name'));
        $producto->descriptions  = $request->get('descriptions');
        $producto->extract       = $request->get('extract');
        $producto->price         = $request->get('price');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
                $producto->image = $file->getClientOriginalName();
            }
        $producto->visible       = $request->get('visible') ? 1 : 0;
        $producto->update(); 
        return redirect('producto/');
    }
    public function destroy($id){
        $producto = Productos::find($id);
        unlink(public_path('img/productos/'.$producto->image));
        $producto->delete();
        return redirect('producto/');
    }
}

