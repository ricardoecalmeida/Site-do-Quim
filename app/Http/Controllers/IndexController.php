<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    // Função principal que retorna a view e o retorno do array associativo
    public function index()
    {
        $info = $this->getInfoCesae(); // Variável info vai buscar o retorno do array associativo (cesaeInfo)
        return view('main.home', compact('info')); // Retorna a view e a info
    }

    // Função acessória
    private function getInfoCesae()
    {
        // Array associativo com informação do Cesae
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
        ];
        return $cesaeInfo;
    }
}
