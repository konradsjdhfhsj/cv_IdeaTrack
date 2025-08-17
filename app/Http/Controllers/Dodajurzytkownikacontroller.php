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
            $q = $conn->prepare("INSERT INTO projekt(czlonek, id_p)VALUES(?, ?)");
            $q->bind_param("si", $user, $id);
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


