<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $isAdmin = Auth::user()->user_type == User::TYPE_ADMIN ? true : false;
        // $message = null;

        // if($isAdmin) {
        //     $message = 'Olá, és administrador';
        // }

        // return view('dashboard.home', compact('message'));

        return view ('dashboard.home')->with('message_admin', 'Conta de Administrador');

    }

    // Middleweare de user autenticado. Pode estar aqui ou nas rotas.
    public function __construct() {
        $this->middleware(['auth']);
    }
}
