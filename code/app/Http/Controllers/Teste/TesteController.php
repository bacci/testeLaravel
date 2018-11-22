<?php

namespace App\Http\Controllers\Teste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index($name = null)
    {
    	return view('teste.teste', ['name' => $name]);
    }

    public function database(Request $request)
    {
   		return response()->json(['action' => $request->action]);
    }
}