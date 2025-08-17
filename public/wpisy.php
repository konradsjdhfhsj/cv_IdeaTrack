<?php
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'szt');
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

echo '
<form action="/dodajodpowiedz" method="post" class="space-y-3 bg-white p-4 rounded-2xl shadow-md">
<input type="hidden" name="_token" value="'.$csrf.'">
<input type="hidden" name="idw" value="' . $row['id'] . '">
<input type="hidden" name="email" value="' . $_SESSION['email'] . '">
    <div>
        <input type="text" name="odp" placeholder="Wpisz odpowiedź..." class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div>
    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition">Dodaj odpowiedź
    </button>
    </div>
</form>
';


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