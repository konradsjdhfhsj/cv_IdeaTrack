<?php

namespace App\Http\Controllers;

use App\Models\Osoby;
use App\Mail\Mailpowitalny;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Exists;

class Rejestracjacontroller extends Controller
{
public function rejestracja()
{
    $conn = mysqli_connect('localhost', 'root', '', 'szt');
    $imie = $_POST['imie'] ?? '';
    $nazwisko = $_POST['nazwisko'] ?? '';
    $wiek = $_POST['wiek'] ?? '';
    $email = $_POST['email'] ?? '';
    $avatar = 'def.png';
    $haslo = password_hash($_POST['haslo'] ?? '', PASSWORD_DEFAULT);

    $spr = $conn->prepare("SELECT * FROM osoby WHERE email = ?");
    $spr->bind_param('s', $email);
    $spr->execute();
    $wynik = $spr->get_result();
        if($wynik->num_rows>0){
            echo "Niestety taki mail juz istnieje";
        } else {
                Mail::to($email)->send(new Mailpowitalny());
               $stmt = $conn->prepare('INSERT INTO osoby(imie, nazwisko, wiek, email, haslo, avatar)VALUES(?, ?, ?, ?, ?, ?)');
                $stmt->bind_param('ssisss', $imie, $nazwisko, $wiek, $email, $haslo, $avatar);
                if($stmt->execute()){
                return redirect('/panel');
                } 
        }
//mysqli_close($conn);
}

}
