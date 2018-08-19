<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function salvaAcomodacoes()
    {
        $id = Input::get('id');
        $usuario = Auth::user();
        $acomodacoesSalvas = $usuario->saved;
        
        $indice = array_search($id, $acomodacoesSalvas);
        if($indice === false) {
            array_push($acomodacoesSalvas, $id);
        } else {
            array_splice($acomodacoesSalvas, $indice, 1);
        }

        $usuario->saved = $acomodacoesSalvas;
        $usuario->save();

        return response()->json();
    }
}
