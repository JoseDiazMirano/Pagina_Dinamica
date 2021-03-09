<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use App\Models\Publicofert;
class PublicofertController extends Controller
{ 
    public function index(){
        //return view('clientes.todas.index', ['clientes' => Clientes::all()->where('user_id',auth()->id())]);
        return view('ofertas.todas.index',['ofertas' => publicofert::all()]);
    }
    public function ofertas(){
        $ofertas = publicofert::all();
        $productos = Productos::all();
        $proveedores = Proveedores::all();
    
        return view('index', compact('ofertas' , 'productos','proveedores'));
                    
    }
    public function store(Request $request)
    {
        $oferta = new publicofert();
            
        $oferta->user_id = auth()->id();
        $oferta->titulo = request('titulo');
        $oferta->texto = request('texto');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/ofertas', $file->getClientOriginalName());
                $oferta->image = $file->getClientOriginalName();
    }
        $oferta->save();
        return redirect('ofertas/todas');
    }
    public function edit($id)
    {
        return view('ofertas.todas.edit',['oferta' => publicofert::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $oferta = publicofert::findOrFail($id);
        $oferta->titulo = request('titulo'); 
        $oferta->texto = request('texto');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/ofertas', $file->getClientOriginalName());
            $oferta->image = $file->getClientOriginalName();
    }
        $oferta->update(); 
        return redirect('ofertas/todas');
    }

    public function destroy($id)
    {
        $oferta = publicofert::findOrFail($id);
        unlink(public_path('img/ofertas/'.$oferta->image));
        $oferta->delete();
        return redirect('ofertas/todas');
    }
}
