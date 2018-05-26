<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function company(){
    	return view('companies.show');
    }

    public function projects(){
    	return view('projects.show');
    }
}
