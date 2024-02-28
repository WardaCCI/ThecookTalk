<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDonoval extends Controller
{
    function wardia(){

        $data = "bonjour marzoudixxxx";
        return view('teste',["nom" => $data]);

    }
}
