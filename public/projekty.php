<?php

use PhpParser\Node\Stmt\Else_;

    $conn = mysqli_connect('localhost', 'root', '', 'szt');

    $query = $conn->prepare("SELECT * FROM projekt WHERE (autor = ? OR czlonek = ?)");
    $query->bind_param("ss", $_SESSION['email'], $_SESSION['email']);
    $query->execute();
    $result = $query->get_result();
   while ($row = $result->fetch_assoc()) {
echo '<div class="bg-gray-100 border border-gray-300 rounded-lg p-4 shadow-sm mb-4">';
echo '<p class="text-sm text-gray-500 font-semibold">Autor:</p>';
echo '<p class="mb-2 text-gray-800">'.htmlspecialchars($row['autor']).'</p>';

echo '<p class="text-sm text-gray-500 font-semibold">Nazwa:</p>';
echo '<p class="mb-2 text-gray-800 font-medium">'.htmlspecialchars($row['nazwa']).'</p>';

echo '<p class="text-sm text-gray-500 font-semibold">Opis:</p>';
echo '<p class="mb-4 text-gray-700">'.htmlspecialchars($row['opis']).'</p>';

// CSRF token w Laravelu
$csrf = csrf_token();

echo '<form action="/dodajurzytkownika" method="post" class="bg-green-50 p-3 rounded-lg border border-green-200">';
echo '<input type="hidden" name="_token" value="'.$csrf.'">';
echo '<label class="block mb-2 text-sm text-gray-700 font-medium">Dodaj użytkownika</label>';
echo '<input type="email" name="email" placeholder="Adres e-mail" required 
        class="w-full px-3 py-2 border border-gray-300 rounded-lg mb-3 focus:outline-none focus:ring-2 focus:ring-green-400">';
echo '<input type="hidden" name="id" value="'.($row['id'] ?? '').'">';
echo '<button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">Dodaj</button>';
echo '</form>';


echo '<form action="/dodakomentarz" method="post" class="bg-green-50 p-3 rounded-lg border border-green-200">';
echo '<input type="hidden" name="_token" value="'.$csrf.'">';
echo '<label class="block mb-2 text-sm text-gray-700 font-medium">Dodaj Komentarz</label>';
echo '<input type="text" name="komentarz" placeholder="Dodaj komentarz" required 
        class="w-full px-3 py-2 border border-gray-300 rounded-lg mb-3 focus:outline-none focus:ring-2 focus:ring-green-400">';
echo '<input type="hidden" name="id" value="'.($row['id'] ?? '').'">';
echo '<button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">Dodaj</button>';
echo '</form>';


echo '<div class="mt-4">';
echo '<p class="text-sm text-gray-500 font-semibold">Członkowie:</p>';
$pyt = $conn->prepare("SELECT * FROM projekt WHERE id_p = ?");
$pyt->bind_param("i", $row['id']);
$pyt->execute();
$wynik = $pyt->get_result();
if ($wynik->num_rows > 0) {
    echo '<ul class="list-disc list-inside text-gray-800">';
    while ($t = $wynik->fetch_assoc()) {
        echo '<li>'.htmlspecialchars($t['czlonek']).'</li>';
    }
    echo '</ul>';
} else {
    echo '<p class="text-gray-400 italic">Brak członków</p>';
}
echo '</div>';

echo '</div>';




echo '<div class="mt-4">';
echo '<p class="text-sm text-gray-500 font-semibold">Komentarze:</p>';
$pyt = $conn->prepare("SELECT * FROM projekt WHERE id_p = ?");
$pyt->bind_param("i", $row['id']);
$pyt->execute();
$wynik = $pyt->get_result();
if ($wynik->num_rows > 0) {
    echo '<ul class="list-disc list-inside text-gray-800">';
    while ($t = $wynik->fetch_assoc()) {
        echo '<li>'.$t['autor'] ?? ''."-".htmlspecialchars($t['komentarz']) ?? ''.'</li>';
    }
    echo '</ul>';
} else {
    echo '<p class="text-gray-400 italic">Brak komentarzy</p>';
}
echo '</div>';

echo '</div>';
echo "<br>"."<br>"."<br>";
}


?>