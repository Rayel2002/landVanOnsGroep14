# landVanOnsGroep14

Als je dit programma voor de eerste keer opstart, nadat 
je het project hebt gecloned, run dan: 

$ composer install

Kopiëer je '.env.example' bestand en hernoem dit naar '.env'. 

Maak een nieuw schema aan in je database manager (voor mij is 
dit MySQL workbench, maar dat kan voor jullie ook anders zijn).

In je .env bestand moet je de naam van je DB_DATABASE veranderen
naar hoe je je nieuwe schema hebt genoemd. Verder moet je 
je DB_PASSWORD ook veranderen naar het wachtwoord dat je gebruikt voor
MySQL. 

Nu kan je de volgende commando's runnen:

$ php artisan migrate
$ php artisan serve

en zou je project het moeten doen.