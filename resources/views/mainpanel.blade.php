<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>szt - panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 via-teal-100 to-blue-100 min-h-screen flex flex-col items-center pt-10 font-sans">
    <div class="mb-6 space-x-4">
        <button id="btnRej" class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">Rejestracja</button>
        <button id="btnLog" class="px-6 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">Logowanie</button>
    </div>

    <!-- REJESTRACJA -->
    <div id="rejBox" class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8">
        <h2 class="text-2xl font-semibold text-center text-teal-700 mb-6">Rejestracja</h2>
        <form action="/rejestracja" method="post" class="space-y-4">
            @csrf
            <input type="text" name="imie" placeholder="Podaj imię" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            <input type="text" name="nazwisko" placeholder="Podaj nazwisko" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            <input type="number" name="wiek" placeholder="Podaj wiek" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            <input type="email" name="email" placeholder="Podaj email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            <input type="password" name="haslo" placeholder="Podaj hasło" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 rounded-lg">Zarejestruj się</button>
        </form>
    </div>

    <!-- LOGOWANIE -->
    <div id="logBox" class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 hidden">
        <h2 class="text-2xl font-semibold text-center text-teal-700 mb-6">Logowanie</h2>
        <form action="/logowanie" method="post" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Podaj email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            <input type="password" name="haslo" placeholder="Podaj hasło" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-teal-500">
            <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 rounded-lg">Zaloguj się</button>
        </form>
    </div>

<footer class="mt-10 w-full max-w-md bg-teal-600 bg-opacity-80 text-white text-center py-3 rounded-2xl shadow-xl">
    <?php require_once('czas.php'); ?>
</footer>

<script>
    const btnRej = document.getElementById('btnRej');
    const btnLog = document.getElementById('btnLog');
    const rejBox = document.getElementById('rejBox');
    const logBox = document.getElementById('logBox');

    btnRej.addEventListener('click', () => {
        rejBox.classList.remove('hidden');
        logBox.classList.add('hidden');
    });

    btnLog.addEventListener('click', () => {
        logBox.classList.remove('hidden');
        rejBox.classList.add('hidden');
    });
</script>

</body>
</html>
