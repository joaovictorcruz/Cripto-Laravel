<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CriptomoedaController extends Controller
{
    // link ou endereço da API
    private $urlApi = 'http://127.0.0.1:8001/api/cripto/';

    public function index() {
        $response = Http::get($this->urlApi);
        $data = $response->json();
        return view('criptomoeda.index', ['criptos' => $data['data'] ?? [], 'message' => $data['message'] ?? '']);
    }
    public function store(Request $request) {
        Http::post($this->urlApi, $request->only('sigla', 'nome', 'valor'));
        return redirect()->route('criptomoedas.index');
    }

    public function create() {
        return view('criptomoeda.create');
    }
}
