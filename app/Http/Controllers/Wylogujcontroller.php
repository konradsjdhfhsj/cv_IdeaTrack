<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Wylogujcontroller extends Controller
{
    public function wyloguj(){
        if($_POST){
            //session_destroy();
            return redirect('/panel');
        }
    }
}
