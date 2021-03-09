<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
class ClientesController extends Controller
{   
    public function index(){
         //return view('clientes.todas.index', ['clientes' => Clientes::all()->where('user_id',auth()->id())]);
        return view('clientes.todas.index',['clientes' => Clientes::all()]);
    }
    public function clientes(){
    
        $clientes = Clientes::all();
        return view('nosotros', 
                    ['clientes' => $clientes]);
                    
    }
    public function store(Request $request)
    {
        $cliente = new Clientes();
            
        $cliente->user_id = auth()->id();
        $cliente->nombre = request('nombre');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/clientes', $file->getClientOriginalName());
                $cliente->image = $file->getClientOriginalName();
    }
        $cliente->save();
        return redirect('clientes/todas');
    }
    public function edit($id)
    {
        return view('clientes.todas.edit',['cliente' => Clientes::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->nombre = $request->get('nombre');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/clientes', $file->getClientOriginalName());
            $cliente->image = $file->getClientOriginalName();
    }
        $cliente->update(); 
        return redirect('clientes/todas');
    }

    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);
        unlink(public_path('img/clientes/'.$cliente->image));
        $cliente->delete();
        return redirect('clientes/todas');
    }
}
