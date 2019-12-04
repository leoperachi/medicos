<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class DisponibilidadeController extends \App\Http\Controllers\Controller
{
    public function salvar(Request $request){
        $this->setClient();
        $r = $request['dataForm'];
        $formParams = [
            'idoportunidade_tipo' => $r['cmbTipo'],
            'idmedico_especialidade' => $r['cmbEspecialidade'],
            'data_inicio_especifica' => $r['txtDtInicio'],
            'data_termino_especifica' => $r['txtDtFinal'],
            'hora_inicio' => $r['txtHrInicio'],
            'hora_termino' => $r['txtHrFinal'],
            'diaSemana' => $r['cmbDiaSemana'],
            'nomeMedico' => $request->session()->get('user')
        ];

        try{
            $response = $this->client->request('POST', 'disponibilidades/salvar', [
                'form_params' => $formParams
            ]);
        }catch(\Exception $ex){
            throw $ex;
        }

        return json_decode($response->getBody());
    }   
}