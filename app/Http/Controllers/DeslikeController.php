<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deslike;
use App\Models\Like;
use App\Models\Publicacao;
use Illuminate\Support\Facades\Session;

class DeslikeController extends Controller
{
     public function toggle(Request $r, Publicacao $publicacao){
     $uid = Session::get('usuario_id');
    if(!$uid) return response()->json(['error'=>'login'],401);
     $exists = Deslike::where('usuario_id',$uid)->where('publicacao_id',
     $publicacao->id)->first();
    if($exists) { $exists->delete(); }
     else { Like::where('usuario_id',$uid)->where('publicacao_id',
         $publicacao->id)->delete();
         Deslike::create(['usuario_id'=>$uid,'publicacao_id'=>$publicacao->id]); }
            return response()->json([ 'likes'=>Like::where('publicacao_id',
         $publicacao->id)->count(), 'deslikes'=>Deslike::where('publicacao_id',
         $publicacao->id)->count() ]);
    }

}
