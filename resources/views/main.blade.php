<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front panel administracyjny</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/main.js')
    @vite('resources/js/projekty.js')
</head>
<body class="bg-green-50 min-h-screen font-sans">
<?php session_start() ?>
    <header class="bg-green-600 text-white p-4 shadow-md">
        <?php require_once('czas.php');?>

        <?php /*Do edycji poprawa headera beje*/?>
    </header>

    <!--navbar-->
    <nav class="bg-green-500 text-white flex gap-4 p-4 justify-center shadow">
        <button id="btn-profil" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition">Profil</button>
        <button id="btn-projekty" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition">Projekty</button>
        <button id="btn-forum" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-lg transition">Dodaj wpis na forum</button>
        <button id="wyloguj" class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-lg transition">Wyloguj się</button>
    </nav>
    <!--opcje strony-->
    <main class="p-6">
        <div id="profil" style="display:none;" class="bg-white p-6 rounded-xl shadow-lg max-w-xl mx-auto">
            <center><form action="/edytujprofil" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <label class="block">
                    <span class="text-gray-700">Zmień nazwę</span>
                    <input type="email" name="nazwa" value="<?php echo $_SESSION['email']; ?>" class="mt-1 w-full p-2 border border-gray-300 rounded-lg">
                    <?php require_once('avat.php'); ?>
                </label>
                <label class="block">
                    <span class="text-gray-700">Zmień avatar</span>
                    <input type="file" name="avatar" id="avatarInput" class="mt-1 w-full">
                </label>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Zapisz</button>
            </form></center>
        </div>

        <div id="projekty" style="display:none;" class="bg-white p-6 rounded-xl shadow-lg max-w-xl mx-auto">
            
<section id="projekty" class="p-6 bg-green-50 rounded-xl shadow">
    <h2 class="text-2xl font-semibold text-green-800 mb-4">Projekty</h2>

    <div class="flex gap-4 mb-6">
        <button id="zobacz" class="px-4 py-2 bg-green-200 hover:bg-green-300 text-green-900 rounded-lg">
            Zobacz twoje projekty
        </button>
        <button id="dodaj" class="px-4 py-2 bg-green-200 hover:bg-green-300 text-green-900 rounded-lg">
            Dodaj własny projekt
        </button>
    </div>

    <!-- Lista projektów -->
    <div id="twojeprojekty" class="bg-green-100 p-4 rounded-lg">
        <?php require_once('projekty.php') ?>
    </div>

    <!-- Formularz dodawania projektu -->
    <div id="formularzprojektu" class="bg-green-100 p-4 rounded-lg hidden">
        <form action="/dodajprojekt" method="post" class="flex flex-col gap-3">
            @csrf
            <input type="text" name="nazwaprojektu" id="nazwaprojektu"
                   placeholder="Podaj nazwę projektu"
                   class="p-2 rounded-md border border-green-300" required>

            <input type="text" name="opisprojektu" id="opisprojektu"
                   placeholder="Podaj opis projektu"
                   class="p-2 rounded-md border border-green-300" required>

            <input type="submit" value="Wyślij"
                   class="cursor-pointer p-2 bg-green-300 hover:bg-green-400 text-green-900 rounded-md">
        </form>
    </div>
</section>
 </div>

        <div id="forum" style="display:block;" class="bg-white p-6 rounded-xl shadow-lg max-w-xl mx-auto">
            <form action="/dodajwpis" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="wpis">
                <input type="file" name="zdj">
                <input type="submit" value="Dodaj wpis">
            </form>
        </div>
        <?php require_once('wpisy.php') ?>
    </main>
    <!--stopka-->
    <footer class="text-center text-gray-500 p-4">&copy; 2025</footer>
</body>
</html>
