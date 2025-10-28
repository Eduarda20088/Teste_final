<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
  public function index() { 
    $empresas = Empresa::paginate(15); 
    return view('empresas.index', compact('empresas')); 
 }
  public function create() { 
    return view('empresas.create'); 
 }
  public function store(Request $request) {
    $data = $request->validate([ 'nome'=>'required|string|max:100','cnpj'=>'nullable|string|max:20|unique:empresas,cnpj','descricao'=>'nullable|string','logo'=>'nullable|image|max:4096' ]);
    if ($request->hasFile('logo')) { 
        $data['logo'] = $request->file('logo')->store('empresas','public'); 
    }
    Empresa::create($data);
    return redirect()->route('empresas.index')->with('success','Empresa criada.');
  }
   public function show(Empresa $empresa) { 
    return view('empresas.show', compact('empresa')); 
 }
   public function edit(Empresa $empresa) { 
    return view('empresas.edit', compact('empresa')); 
}
   public function update(Request $request, Empresa $empresa) {
    $data = $request->validate([ 'nome'=>'required|string|max:100','cnpj'=>"nullable|string|max:20|unique:empresas,cnpj,{$empresa->id}",'descricao'=>'nullable|string','logo'=>'nullable|image|max:4096' ]);
    if ($request->hasFile('logo')) { 
        if ($empresa->logo) Storage::disk('public')->delete($empresa->logo); $data['logo']= $request->file('logo')->store('empresas','public'); 
    }
    $empresa->update($data);
    return redirect()->route('empresas.show',$empresa)->with('success','Empresa atualizada.');
  }
   public function destroy(Empresa $empresa) { 
    if ($empresa->logo) Storage::disk('public')->delete($empresa->logo);
    $empresa->delete(); return redirect()->route('empresas.index')->with('success','Empresa deletada.'); 
}
}