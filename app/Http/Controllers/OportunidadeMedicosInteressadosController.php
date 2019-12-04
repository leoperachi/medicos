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

        try{
            $response = $this->client->request('POST', 'oportunidades/candidatarse', [
                'form_params' => [
                    'idOportunidade' => $idOportunidade,
                    'userId' => $user->id
                ]
            ]);
        }catch(\Exception $ex){
            throw $ex;
        }
        
        $jsonRetorno = json_decode($response->getBody());
        return $jsonRetorno;
    }

    public function descandidatarse(Request $request){
        $this->setClient();
        $user = $request->session()->get('apiUser');
        $idOportunidade = $request->query->GET('idOportunidade');

        try{
            $response = $this->client->request('POST', 'oportunidades/descandidatarse', [
                'form_params' => [
                    'idOportunidade' => $idOportunidade,
                    'userId' => $user->id
                ]
            ]);
        }catch(\Exception $ex){
            throw $ex;
        }
        
        $jsonRetorno = json_decode($response->getBody());
        return $jsonRetorno;
    }
}