<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dodajurzytkownikacontroller extends Controller
{
    public function dodajurzytkownika(){
        if($_POST){
            $conn = mysqli_connect('127.0.0.1', 'root', '', 'szt');
            $user = $_POST['email'] ?? '';
            $id = $_POST['id'] ?? '';

            $q = $conn->prepare("SELECT * FROM osoby WHERE email = ?");
            $q->bind_param("s", $user);
            $q->execute();

            $r = $q->get_result();

            if($r -> num_rows >0){
            $q = $conn->prepare("INSERT INTO projekt(id_p, czlonek)VALUES(?, ?)");
            $q->bind_param("is", $id, $user);
            if($q->execute()){
                return redirect('/main');
            } else {
                echo"Nie udalo sie";
            }
        } else {
            echo"Niestety nie istnieje taki urzytkownik";
        }
        mysqli_close($conn);
            }
        }
        

           
    }


