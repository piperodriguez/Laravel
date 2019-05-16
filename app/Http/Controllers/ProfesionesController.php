<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesionesController extends Controller
{
   	public function index()
   	{
   		$titulo = "esta variable se esta enviando desde el controlador de profesiones omes";

   		return view('profesiones')->with([
   			'titulo' => $titulo
   		]);
   	}
}
