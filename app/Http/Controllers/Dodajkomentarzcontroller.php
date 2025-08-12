<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dodajkomentarzcontroller extends Controller
{
    public function dodajkomentarz(){
        session_start();
        if($_POST){
            $conn = mysqli_connect('localhost', 'root', '', 'szt');
            $komentarz = $_POST['komentarz'] ?? '';

            $id = $_POST['id'] ?? '';
            $q = $conn->prepare("INSERT INTO projekt(komentarz, autorkom, id_p)VALUES(?, ?, ?)");
            $q->bind_param("ssi", $komentarz ,$_SESSION['email'], $id);
            if($q->execute()){
                return redirect('/main');
            } else {
                echo"Nie udalo sie";
            }
        }mysqli_close($conn);
    }
}
