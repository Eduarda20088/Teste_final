<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all(); 
        return view('empresas.index', compact('empresas')); 
    }
        
    
    public function create()
    {
        return view('empresas.create'); 
    }

    
    public function store(Request $request)
    {
        $r->validate(['nome'=>'required']);
        $logo = null;
        if($r->hasFile('logo')) $logo = 'storage/'.$r->file('logo')->store('anexos','public');
        Empresa::create(['nome'=>$r->nome,'cnpj'=>$r->cnpj,'descricao'=>$r->descricao,'logo'=>$logo]);
        return redirect()->route('empresas.index');

    }

    
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        $r->validate(['nome'=>'required']);
        if($r->hasFile('logo')) $empresa->logo = 'storage/'.$r->file('logo')->store('anexos','public');
        $empresa->update($r->only(['nome','cnpj','descricao','logo']));
        return redirect()->route('empresas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete(); return
        redirect()->route('empresas.index');
    }
}
