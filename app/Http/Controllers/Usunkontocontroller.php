<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Email;

class Usunkontocontroller extends Controller
{
    public function usun(){
        session_start();
        $conn = mysqli_connect('localhost', 'root', '', 'szt');
        $query =$conn->prepare("DELETE FROM osoby WHERE email = ?");
        $query->bind_param("s", $_SESSION['email']);
        if($query->execute()){
            return redirect('/panel');
        }
    }
}
