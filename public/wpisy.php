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
    echo '<center><img src="' . htmlspecialchars($row['zdj']) . '" class="w-32 h-32 object-cover rounded-full border-4 border-green-300 shadow-lg mx-auto"></center>';
}
echo "</div>"; }?>