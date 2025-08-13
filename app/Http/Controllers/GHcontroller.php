<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GHcontroller extends Controller
{
    public function gh(){
        session_start();
if ($_POST) {
    $repo  = 'cv_IdeaTrack';
    $own   = 'konradsjdhfhsj';
    $token = '';

    $blad  = $_POST['tresc'] ?? '';
    $autor = $_SESSION['email'] ?? '';

    $url = "https://api.github.com/repos/{$own}/{$repo}/issues";

    $data = [
        'title' => $autor,
        'body'  => $blad
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Script');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: token {$token}",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status == 201) {
        echo "Zgloszenie zostalo przyjéte.";
    } else {
        echo "Błąd tworzenia bledu. Kod odpowiedzi: $status<br>";
        echo "Odpowiedź GitHuba: " . htmlspecialchars($response);
    }
}


    }
}
