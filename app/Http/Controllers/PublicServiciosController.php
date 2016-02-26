<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicServiciosController extends Controller
{
    public function index()
    {

        $servicios = Servicios::all();

        return view('modulos.servicios.public.index')->with('servicios', $servicios);

    }
}
