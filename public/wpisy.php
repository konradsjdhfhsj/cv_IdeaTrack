<?php
    $conn = mysqli_connect('localhost', 'root', '', 'szt');
    $query = "SELECT * FROM wpis WHERE autor <> ''AND wpis <> ''AND tresc <> ''AND autor IS NOT NULL AND wpis IS NOT NULL AND tresc IS NOT NULL ORDER BY data DESC";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()){
       echo "<div class='max-w-md mx-auto bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-lg shadow-md p-6 mb-6'>";
echo "<h1 class='text-xl font-bold text-green-800 mb-2'>" . htmlspecialchars($row['wpis']) . "</h1>";
echo "<h3 class='text-green-700 mb-1'>" . htmlspecialchars($row['autor']) . "</h3>";
echo "<p class='text-green-600 text-sm mb-4'>" . htmlspecialchars($row['data']) . "</p>";
echo"<b>".$row['tresc']."</b>";
if (!empty($row['zdj'])) {
echo '<img src="' . htmlspecialchars($row['zdj']) . '" class="w-24 h-24 sm:w-28 sm:h-28 object-cover rounded-xl border border-gray-200 shadow-md" />';
}

echo '<form action="/dodajodpowiedz" method="post">';
echo '<input type="hidden" name="_token" value="'.$csrf.'">';
echo '<input type="hidden" name="idw" value="' . $row['id'] . '">';
echo '<input type="hidden" name="email" value="' . $_SESSION['email'] . '">';
echo '<input type="text" name="odp" placeholder="Wpisz odpowiedź:">';
echo '<input type="submit" value="Dodaj odpowiedz:">';
echo '</form>';

echo '<p class="text-sm text-gray-500 font-semibold">Odpowiedzi:</p>';
$pyt = $conn->prepare("SELECT odp, id_w, autorodp FROM wpis WHERE id_w = ? AND odp <> '' AND odp IS NOT NULL");
$pyt->bind_param("i", $row['id']);
$pyt->execute();
$wynik = $pyt->get_result();
if ($wynik->num_rows > 0) {
    echo '<ul class="list-disc list-inside text-gray-800">';
    while ($t = $wynik->fetch_assoc()) {
        echo '<li>' . "<b>" . $t['autorodp']. "</b>" ." - ". $t['odp'] . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p class="text-gray-400 italic">Brak Odpowiedzi</p>';
}

echo "</div>"; }?>