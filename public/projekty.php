<?php
    $conn = mysqli_connect('localhost', 'root', '', 'szt');

    $query = $conn->prepare("SELECT * FROM projekt WHERE autor = ?");
    $query->bind_param("s", $_SESSION['email']);
    $query->execute();
    $result = $query->get_result();
    while($row = $result->fetch_assoc()){
echo '<div class="p-4 mb-4 bg-gray-100 rounded-xl shadow hover:shadow-md transition">
    <h2 class="text-xl font-semibold text-gray-800 mb-1">'.htmlspecialchars($row["nazwa"]).'</h2>
    <p class="text-gray-600 mb-2">'.htmlspecialchars($row["opis"]).'</p>
    <b class="text-gray-700">'.htmlspecialchars($row["autor"]).'</b>
    
    </div>';}
?>