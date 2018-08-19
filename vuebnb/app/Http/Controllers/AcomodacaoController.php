<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acomodacao;
use Illuminate\Support\Facades\Auth;

class AcomodacaoController extends Controller
{
    public function acomodacaoEmJson(Acomodacao $acomodacao)
    {
        return response()->json($this->incluiLinksDasImagens($acomodacao));
    }

    public function acomodacaoEmHtml(Acomodacao $acomodacao, Request $request)
    {
        $dados = $this->incluiLinksDasImagens($acomodacao);
        return view('app', ["dados" => $this->adicionaMetadados($dados, $request)]);
    }

    public function listagemEmJson() {
        return response()->json(['acomodacoes' => collect($this->listaAcomodacoes())]);
    }

    public function listagemEmHtml(Request $request)
    {
        $dados = collect(['acomodacoes' => $this->listaAcomodacoes()]);
        $dados = $this->adicionaMetadados($dados, $request);

        return view('app', ["dados" => $dados]);
    }

    private function listaAcomodacoes() {
        $dados = Acomodacao::all(['id', 'address', 'title', 'price_per_night']);
        $dados->transform(function ($acomodacao) {
            $acomodacao->thumb = asset("images/$acomodacao->id/Image_1_thumb.jpg");
            return $acomodacao;
        });

        return $dados->toArray();
    }

    private function incluiLinksDasImagens(Acomodacao $acomodacao)
    {
        $retorno = $acomodacao->toArray();

        for ($i = 1; $i <= 4; $i++) {
            $retorno["image_$i"] = asset("images/$acomodacao->id/Image_$i.jpg");
        }

        return collect(['acomodacao' => $retorno]);
    }

    private function adicionaMetadados($collection, $request)
    {
        $isUsuarioLogado = Auth::check();
        $saved = $isUsuarioLogado ? Auth::user()->saved : [];

        return $collection->merge([
            'path' => $request->getPathInfo(),
            'auth' => $isUsuarioLogado,
            'saved' => $saved
        ]);
    }
}
