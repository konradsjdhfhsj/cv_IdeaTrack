<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dodajprojektcontroller extends Controller
{
    public function dodajprojekt(){
        if($_POST){
         session_start();
         $conn = mysqli_connect('localhost', 'root', '', 'szt');

         $nazwaprojektu = $_POST['nazwaprojektu'] ?? '';
         $opisprojektu = $_POST['opisprojektu'] ?? '';

         $query = $conn->prepare('INSERT INTO projekt(nazwa, opis, autor)VALUES(?, ?, ?)');
         $query->bind_param("sss", $nazwaprojektu, $opisprojektu, $_SESSION['email']);
            if($query->execute()){
                return redirect('/main');
            }
        } mysqli_close($conn);
    }
}
