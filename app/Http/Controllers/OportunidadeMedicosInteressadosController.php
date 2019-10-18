<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class OportunidadeMedicosInteressadosController extends \App\Http\Controllers\Controller
{
    public function candidatarse(Request $request){
        $this->setClient();
        $user = $request->session()->get('apiUser');
        $idOportunidade = $request->query->GET('idOportunidade');
        $response = $this->client->request('GET', 
            '/oportunidades/candidatarse?idOportunidade=' . $idOportunidade . '&userId=' . $user->id);

        $jsonRetorno = json_decode($response->getBody());
        return $jsonRetorno;
    }
}