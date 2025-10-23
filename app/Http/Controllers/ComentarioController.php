<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ComentarioController extends Controller
{
   
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r->validate(['publicacao_id'=>'required','comentario'=>'required']);
        $uid = Session::get('usuario_id');
        if(!$uid) return redirect()->back()->withErrors('Faça login');
         Comentario::create(['publicacao_id'=>$r->publicacao_id,'usuario_id'=>$uid,'comentario'=>$r->comentario]);
            return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        $uid = Session::get('usuario_id');
         if(!$uid || $comentario->usuario_id != $uid) return redirect()->back()->withErrors('não autorizado');
      $r->validate(['comentario'=>'required']);
    $comentario->update(['comentario'=>$r->comentario]);
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $uid = Session::get('usuario_id');
       if(!$uid || $comentario->usuario_id != $uid) return redirect()->back()->withErrors('não autorizado');
      $comentario->delete();
         return redirect()->back();
    }
}
