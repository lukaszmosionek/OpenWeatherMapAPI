Instalacja projektu:


Preferowana wersja php 8.3.2
Zainstalowany composer: https://getcomposer.org/download/


 - Wpisz w konsole: git clone https://github.com/lukaszmosionek/rekrutacja-temp-warsaw.git
 - Wpisz w konsole: cd rekrutacja-temp-warsaw
 - Wpisz w konsole: composer install
 - Skopiuj plik .env.example do .env i uzupełnij w nim sekcje bazy danych
 - Wpisz w konsole: php artisan migrate --seed
 - Wpisz w konsole: php artisan key:generate
 - Wpisz w konsole: php artisan serve
 - Wpisz w przeglądarke adres http://127.0.0.1:8000
