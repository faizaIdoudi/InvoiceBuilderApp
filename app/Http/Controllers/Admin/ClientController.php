<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    function index(){
        $team = Client::orderBy('id','desc')->get();
        return inertia('Client/Index' ,compact('client'));
    }
}
