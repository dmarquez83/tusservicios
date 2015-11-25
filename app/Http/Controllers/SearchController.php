<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request) {

      $search = $request->get('search');

      $categorias = Categoria::search($search)->orderBy('created_at', 'DESC')->paginate(10);

      return view('solicitudes.index')->with('categorias', $categorias);
    }
}