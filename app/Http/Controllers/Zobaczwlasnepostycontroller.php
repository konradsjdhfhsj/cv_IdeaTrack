<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Zobaczwlasnepostycontroller extends Controller
{
    public function zobaczwlasneposty(){
        session_start();
        $conn = mysqli_connect('localhost', 'root', '', 'szt');
        $q = $conn->prepare("SELECT * FROM projekt WHERE autor = ?");
        $q->bind_param("s", $q);
        $q->execute();

        $result = $q->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo $row['nazwa'];
                echo $row['opis'];
                echo $row['autor'];
                echo $row['zdj'];
            }
        } else {
            echo "Nie ma zadnych twoich projektuw";
        }
    }
}
