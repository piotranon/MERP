# MERP

Uruchomienie

wejdz do folderu

composer install

skopiuj plik .env.example do pliku .env

utworz konto l:merp h:merpmerp, bazę danych merp, w bazie danych mysql pod adresem 127.0.0.1:3306 lub zmien konfigurację w pliku.env

uruchom migracje php artisan migrate --seed
uruchom aplikacjie php artisan serve --port=8000

aplikacja uruchamia sie pod adresem 127.0.0.1:8000

domyslna strona od eventów 127.0.0.1:8000/companyEvents
tworzenie eventów 127.0.0.1:8000/companyEvents/create

// przy tworzeniu eventow nie dziala cos z zapisem zdjecia
// przyciski szare dostepne by bylo tylko jako admin ale nie zdazylem z czasem

// sciezki do rejestracji sa utworzone
PS D:\Github\MERP> php artisan route:list
+--------+-----------+---------------------------------------------+-----------------------+---------------------------------------------------------------------------+------------+
| Domain | Method | URI | Name | Action | Middleware |
+--------+-----------+---------------------------------------------+-----------------------+---------------------------------------------------------------------------+------------+
| | GET|HEAD | / | | Closure | web |
| | GET|HEAD | api/companyEvents | companyEvents.index | App\Http\Controllers\CompanyEventController@index | api |
| | POST | api/companyEvents | companyEvents.store | App\Http\Controllers\CompanyEventController@store | api |
| | POST | api/companyEvents/unsign/{registrationCode} | | App\Http\Controllers\CompanyEventRegistationController@removeRegistration | api |
| | POST | api/companyEvents/{companyEventId}/register | | App\Http\Controllers\CompanyEventRegistationController@register | api |
| | GET|HEAD | api/companyEvents/{companyEvent} | companyEvents.show | App\Http\Controllers\CompanyEventController@show | api |
| | PUT|PATCH | api/companyEvents/{companyEvent} | companyEvents.update | App\Http\Controllers\CompanyEventController@update | api |
| | DELETE | api/companyEvents/{companyEvent} | companyEvents.destroy | App\Http\Controllers\CompanyEventController@destroy | api |
| | GET|HEAD | api/user | | Closure | api |
| | | | | | auth:api |
| | GET|HEAD | companyEvents | companyEvents.index | App\Http\Controllers\CompanyEventController@index | web |
| | POST | companyEvents | companyEvents.store | App\Http\Controllers\CompanyEventController@store | web |
| | GET|HEAD | companyEvents/create | companyEvents.create | App\Http\Controllers\CompanyEventController@create | web |
| | PUT|PATCH | companyEvents/{companyEvent} | companyEvents.update | App\Http\Controllers\CompanyEventController@update | web |
| | DELETE | companyEvents/{companyEvent} | companyEvents.destroy | App\Http\Controllers\CompanyEventController@destroy | web |
| | GET|HEAD | companyEvents/{companyEvent}/edit | companyEvents.edit | App\Http\Controllers\CompanyEventController@edit | web |
+--------+-----------+---------------------------------------------+-----------------------+---------------------------------------------------------------------------+------------+
