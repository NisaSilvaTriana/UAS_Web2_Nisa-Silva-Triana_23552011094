<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::latest('tanggal')->paginate(6);

        return view('agenda', compact('agendas'));
    }
}