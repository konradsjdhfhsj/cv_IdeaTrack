<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dodajurzytkownikacontroller extends Controller
{
    public function dodajurzytkownika(){
        if($_POST){
            $conn = mysqli_connect('localhost', 'root', '', 'szt');
            $user = $_POST['user'] ?? '';
            $id = $_POST['id'] ?? '';
            $q = $conn->prepare("INSERT INTO projekt(czlonek, id_p)VALUES(?, ?)");
            $q->bind_param("si", $user, $id);
            if($q->execute()){
                return redirect('/main');
            }
        }mysqli_close($conn);
    }
}
