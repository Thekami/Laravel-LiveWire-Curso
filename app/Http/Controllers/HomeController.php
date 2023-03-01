<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function propiedades(){
        return view('propiedades');
    }

    public function actions(){
        return view('actions');
    }

    public function magicActions(){
        return view('magic-actions');
    }

    public function componentesAnidados(){
        return view('componentesAnidados');
    }

}
