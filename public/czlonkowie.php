<?php
    $conn = mysqli_connect('localhost', 'root', '', 'szt');

    $id = $_POST['id'] ?? '';
    $wys = $conn->prepare("SELECT * FROM projekt WHERE autor = ? AND id = ?");
    $wys->bind_param("si", $_SESSION['email'], $id);
    $wys->execute();
    $wynik = $wys->get_result();
    while($tab = $wynik->fetch_assoc()){
        echo $tab['czlonek']. "<br>";
    }
?>