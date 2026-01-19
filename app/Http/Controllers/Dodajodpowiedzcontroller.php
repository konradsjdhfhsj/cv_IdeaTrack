<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dodajodpowiedzcontroller extends Controller
{
    public function doajodpowiedz(){
        if($_POST){
            $conn = mysqli_connect('127.0.0.1', "root", "", "szt");

            $idw = $_POST['idw'] ?? "";
            $autor = $_POST['email'] ?? "";
            $odp = $_POST['odp'] ?? ""; 

            $q = $conn->prepare("INSERT INTO wpis(komentarz, autorkom, id_w)VALUES(?, ? ,?)"); 
            $q->bind_param("sss", $odp, $autor, $idw);
            if($q->execute()){
                return redirect('/main');
            }mysqli_close($conn);
        }
    }
}
