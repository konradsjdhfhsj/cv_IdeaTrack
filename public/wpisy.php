<?php
    $conn = mysqli_connect('localhost', 'root', '', 'szt');
    $query = "SELECT * FROM wpis";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()){
       echo "<div class='max-w-md mx-auto bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-lg shadow-md p-6 mb-6'>";
echo "<h1 class='text-xl font-bold text-green-800 mb-2'>" . htmlspecialchars($row['wpis']) . "</h1>";
echo "<h3 class='text-green-700 mb-1'>" . htmlspecialchars($row['autor']) . "</h3>";
echo "<p class='text-green-600 text-sm mb-4'>" . htmlspecialchars($row['data']) . "</p>";

if (!empty($row['zdj'])) {
echo '<img src="' . htmlspecialchars($row['zdj']) . '" class="w-24 h-24 sm:w-28 sm:h-28 object-cover rounded-xl border border-gray-200 shadow-md" />';
}
echo "</div>"; }?>