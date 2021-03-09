<?php

namespace App\Http\Controllers;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProveedoresController extends Controller
{
    public function index(){
        $proveedores['proveedores']=Proveedores::all();
        return view('proveedores.index',$proveedores);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);
        $proveedore = new Proveedores();
            
        $proveedore->user_id = auth()->id();
        $proveedore->name = request('name');
            if($request->hasFile('image')){
                $file = $request->image;
                $file->move(public_path(). '/img/proveedore', $file->getClientOriginalName());
                $proveedore->image = $file->getClientOriginalName();
    }
        $proveedore->save();
        return redirect('proveedores');
    }

    
    public function edit($id)
    {
        return view('proveedores.edit',['proveedore' => Proveedores::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $proveedore = Proveedores::findOrFail($id);
        $proveedore->name = request('name');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move(public_path(). '/img/proveedore', $file->getClientOriginalName());
            $proveedore->image = $file->getClientOriginalName();
    }
        $proveedore->update(); 
        return redirect('proveedores');
    }
    public function destroy($id)
    {
        
        $proveedore = Proveedores::findOrFail($id);
        unlink(public_path('img/proveedore/'.$proveedore->image));
        $proveedore->delete();
        return redirect('proveedores');



        
    }
}
