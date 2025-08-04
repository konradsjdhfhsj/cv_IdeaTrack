<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logowaniecontroller extends Controller
{
    public function logowanie(){
   session_start();
$conn = mysqli_connect('localhost', 'root', '', 'szt');

$email = $_POST['email'] ?? '';
$haslo = $_POST['haslo'] ?? '';

$log = $conn->prepare('SELECT * FROM osoby WHERE email = ?');
$log->bind_param("s", $email);
$log->execute();

$wynik = $log->get_result();
if($wynik->num_rows > 0){
    $row = $wynik->fetch_assoc();

    // tu dopiero sprawdzasz hasło:
    if (password_verify($haslo, $row['haslo'])) {
        $_SESSION['email'] = $email;
        echo "Zalogowano pomyślnie";
        return redirect('/main');
    } else {
        echo "Błędne hasło";
    }
} else {
    echo "Nie znaleziono użytkownika o takim mailu";
}
mysqli_close($conn);

    }
}
