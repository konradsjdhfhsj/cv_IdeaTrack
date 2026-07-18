# System Zarządzania Zgłoszeniami i Analizy Danych

Projekt stworzony w celach prezentacji umiejętności programistycznych oraz dobrych praktyk inżynierii oprogramowania. Aplikacja demonstruje znajomość zarządzania relacyjnymi bazami danych SQL, konfiguracji środowiskowej, bezpiecznego przechowywania sekretów oraz integracji z zewnętrznymi API (serwer SMTP oraz GitHub API).

## Kluczowe Funkcjonalności
* Automatyczne raportowanie błędów bezpośrednio do repozytorium GitHub poprzez API
* Moduł powiadomień e-mail oparty na protokole SMTP
* Relacyjna baza danych zoptymalizowana pod kątem wydajności

## Spis Treści
- [Wymagania wstępne](#wymagania-wstępne)
- [Baza danych SQL](#baza-danych-sql)
- [Konfiguracja pliku .env](#konfiguracja-pliku-env)
- [Generowanie GitHub Tokena](#generowanie-github-tokena)
- [Instrukcja uruchomienia](#instrukcja-uruchomienia)

---

## Wymagania wstępne
Przed uruchomieniem projektu upewnij się, że posiadasz zainstalowane w swoim środowisku lokalnym:
* System zarządzania bazą danych (np. MySQL / PostgreSQL)
* Narzędzie do importu baz danych (np. phpMyAdmin, DBeaver lub terminal SQL)
* Środowisko wykonawcze zgodne z technologią projektu

---

## Baza danych SQL
W katalogu `public/` znajduje się struktura wraz z testowymi danymi, niezbędna do prawidłowego działania aplikacji.

1. Pobierz plik bazy danych bezpośrednio z projektu: `public/szt.sql`
2. Utwórz nową, czystą bazę danych w swoim systemie.
3. Zaimportuj plik `szt.sql` do nowo utworzonej bazy. Jeśli preferujesz pracę w terminalu, użyj polecenia:
   ```bash
   mysql -u twoj_login -p nazwa_bazy < public/szt.sql
   ```

---

## Konfiguracja pliku `.env`
Projekt wykorzystuje architekturę zmiennych środowiskowych `.env` do bezpiecznego zarządzania konfiguracją. Stwórz plik o nazwie `.env` w głównym katalogu projektu i uzupełnij go swoimi danymi dostępowymi:

### 1. Połączenie z bazą danych
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nazwa_twojej_bazy
DB_USERNAME=twoj_login_bazy
DB_PASSWORD=twoje_haslo_bazy
```

### 2. Konfiguracja skrzynki e-mail (SMTP)
Wprowadź dane swojego serwera pocztowego (np. Mailtrap do testów lub Gmail), aby aplikacja mogła wysyłać powiadomienia:
```env
MAIL_MAILER=smtp
MAIL_HOST=://example.com
MAIL_PORT=587
MAIL_USERNAME=twoj_email@example.com
MAIL_PASSWORD=twoje_haslo_poczty
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=twoj_email@example.com
MAIL_FROM_NAME="System Monitoringu"
```

### 3. Integracja z GitHub API (Zgłaszanie błędów)
Ustawienia niezbędne do automatycznego tworzenia ticketów (Issues) w tym repozytorium w momencie wystąpienia wyjątków w aplikacji:
```env
GITHUB_ISSUE_TOKEN=twoj_osobisty_token_github
GITHUB_REPO_OWNER=twoj_login_na_githubie
GITHUB_REPO_NAME=nazwa_tego_repozytorium
```

---

## Generowanie GitHub Tokena
Aby aplikacja mogła bezpiecznie autoryzować się w API i tworzyć zgłoszenia błędów, musisz wygenerować klucz dostępu (Personal Access Token):

1. Zaloguj się na swoje konto GitHub.
2. Przejdź do: **Settings** -> **Developer settings** -> **Personal access tokens** -> **Fine-grained tokens**.
3. Kliknij **Generate new token**.
4. Wpisz nazwę tokenu (np. `Error Reporter Token`).
5. W sekcji **Repository access** wybierz *Only select repositories* i wskaż to konkretne repozytorium.
6. W sekcji **Permissions** kliknij **Repository permissions**, znajdź pozycję **Issues** i ustaw jej uprawnienia na **Read and write**.
7. Kliknij **Generate token**, skopiuj wygenerowany ciąg znaków i wklej go do pliku `.env` jako wartość `GITHUB_ISSUE_TOKEN`.

> ⚠️ **Bezpieczeństwo:** Plik `.env` zawiera poufne dane i klucze API. Zgodnie z dobrymi praktykami, został on wykluczony z systemu kontroli wersji i znajduje się w pliku `.gitignore`.

---

## Instrukcja uruchomienia
Po poprawnym zaimportowaniu bazy danych `szt.sql` oraz konfiguracji pliku `.env`, zainstaluj wymagane zależności menedżerem pakietów i uruchom lokalny serwer deweloperski.

