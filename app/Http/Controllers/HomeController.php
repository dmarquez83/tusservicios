<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
   /* public function __construct() {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

       $categories = \App\Models\Categoria::take(5)
           ->get();

       return   view('home.index')->with([
           'categories' => $categories
       ]);
    }

    public function dashboradUser()
    {
      return   view('dashborad.tableusuario');
    }

    public function dashboradAdmin()
    {
      return   view('dashborad.tableadmin');
    }

}
