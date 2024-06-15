<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FeriasRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FeriasRepository $feriasRepository)
    {
        $this->middleware('auth');
        $this->feriasRepository = $feriasRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = auth()->user();
        $ferias = $this->feriasRepository->minhasSolicitacoes();
        $diasTrabalhados = 365;
        $faltasInjustificadas = 0;
        $diasParaFerias = 0;
        $dataLimiteFerias = $usuario->created_at->addYear();

        if ($diasTrabalhados < 365) {
            $diasParaFerias = 0;
        }
        if ($faltasInjustificadas <= 5) {
            $diasParaFerias = 30;
        } elseif ($faltasInjustificadas <= 14) {
            $diasParaFerias = 24;
        } elseif ($faltasInjustificadas <= 23) {
            $diasParaFerias = 18;
        } elseif ($faltasInjustificadas <= 32) {
            $diasParaFerias = 12;
        } else {
            $diasParaFerias = 0;
        }

        return view('inicial', compact('ferias', 'diasParaFerias', 'dataLimiteFerias'));
    }
}
