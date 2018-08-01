<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acomodacao;

class AcomodacaoController extends Controller
{
    public function acomodacaoEmJson(Acomodacao $acomodacao) {
        return response()->json($this->incluiLinksDasImagens($acomodacao));
    }

    public function acomodacaoEmHtml(Acomodacao $acomodacao) {
        return view('app', ["acomodacao" => $this->incluiLinksDasImagens($acomodacao)]);
    }

    private function incluiLinksDasImagens(Acomodacao $acomodacao) {
        $retorno = $acomodacao->toArray();

        for ($i = 1; $i <= 4; $i++) { 
            $retorno["image_$i"] = asset("images/$acomodacao->id/Image_$i.jpg");
        }

        return $retorno;
    }
}
