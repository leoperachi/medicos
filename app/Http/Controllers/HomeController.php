<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class HomeController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $especialidades = $this->getEspecialidades();
        $token = $request->session()->get('auth')->access_token;
        $user = $request->session()->get('apiUser');

        $disponibilidades = $this->getMinhasDisponibilidades($token, $user);
        $oportunidades = $this->getOportunidades();

        return view('home')
            ->with('disponibilidades', $disponibilidades)
            ->with('oportunidades', $oportunidades)
            ->with('especialidades', $especialidades);
    }

    private function getMinhasDisponibilidades($token, $user)
    {
        $this->setClient();

        $response = $this->client->request('GET', 'minhasDisponiblidades?usr=' . $user->id);
        $jsonRetorno = json_decode($response->getBody());

        return $jsonRetorno;
    }

    private function getEspecialidades()
    {
        $this->setClient();

        try
        {
            $response = $this->client->get('especialidades');
            return json_decode($response->getBody());
        } catch(\Exception $e) {
            throw $e;
        }
    }

    private function getOportunidades()
    {
        $this->setClient();

        try
        {
            $response = $this->client->get('oportunidades/listar');
            $obj = json_decode($response->getBody());
            return $obj;
        } catch(\Exception $e) {
            throw $e;
        }
    }
}