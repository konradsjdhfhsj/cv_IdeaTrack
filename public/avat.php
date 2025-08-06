<?php
$conn = mysqli_connect('localhost', 'root', '', 'szt');
$query = "SELECT * FROM osoby WHERE email = '" . $conn->real_escape_string($_SESSION['email']) . "'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
echo '<center><img src="'.htmlspecialchars($row['avatar']).'" class="mt-4 w-32 h-32 object-cover rounded-full border-4 border-gray-300 shadow-lg" ></center>';
