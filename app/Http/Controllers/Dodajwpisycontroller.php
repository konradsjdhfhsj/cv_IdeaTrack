<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dodajwpisycontroller extends Controller
{
    public function dodajwpisy(){
        if($_POST){
            session_start();
            $conn = mysqli_connect('localhost', 'root', '', 'szt');
            $wpis = $_POST['wpis'] ?? '';
            $tresc = $_POST['tresc'] ?? '';
            $folder = "avatary/";
            date_default_timezone_set('Europe/Berlin');
            $data = date("Y-m-d H:i:s");
            $zdj = null;
            if(!empty($_FILES['zdj']['tmp_name'])){
                $nazwa = $_FILES['zdj']['tmp_name'] ?? '';
                $org = $_FILES['zdj']['name'] ?? '';
                $zapis = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $org);
                $sciezka = $folder . $zapis;
                if(move_uploaded_file($nazwa, $sciezka)){
                $zdj = $sciezka;}}   
            $stmt = $conn->prepare("INSERT INTO wpis(wpis, tresc, zdj, autor, data)VALUES(?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $wpis, $tresc, $zdj, $_SESSION['email'], $data);
            if($stmt->execute()){
                return redirect('/main');
            }
            mysqli_close($conn);
        }
    }
}
