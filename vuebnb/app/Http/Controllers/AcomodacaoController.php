<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acomodacao;

class AcomodacaoController extends Controller
{
    public function acomodacaoEmJson(Acomodacao $acomodacao) {
        $retorno = $acomodacao->toArray();

        for ($i = 1; $i <= 4; $i++) { 
            $retorno["imagem$i"] = asset("imagens/$acomodacao->id/Image_$i.jpg");
        }
            
        return response()->json($retorno);
    }
}
