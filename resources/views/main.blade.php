<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front panel adminstracyjny</title>
</head>
<body>
    <header><?php require_once('czas.php');?></header>
    <nav>
        <input type="button" value="Profil" id="profil">
        <input type="button" value="Projekty" id="projekty">
        <input type="button" value="Dodaj wpis na forum" id="forum">
        <input type="button" value="wyloguj sie" id="wyloguj">
    </nav>
    <main>
        <div id="profil">
            <?php require_once('czas.php'); ?>
            <form action="/edytujprofil" method="post" enctype="multipart/form-data">
                <input type="file" name="avatar">
                <input type="text" name="nazwa" value="<?php /* nazwa_z _sesji */ ?>">
            </form>
        </div>

        <div id="projekty">
            <form action="/dodajprojekt" method="post">
                <input type="text" name="" placeholder="Podaj nazwe projektu">
            </form>
        </div>

        <div id="forum">

        </div>
    </main>
    <footer></footer>
</body>
</html>