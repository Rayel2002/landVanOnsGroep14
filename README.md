# landVanOnsGroep14

# Eerste opstart van het project
Als je dit programma voor de eerste keer opstart, nadat 
je het project hebt gecloned, run dan: 

$ cd event-landvanons-api\
$ composer install

Kopiëer je '.env.example' bestand en hernoem dit naar '.env'. 

Maak een nieuw schema aan in je database manager (voor mij is 
dit MySQL workbench, maar dat kan voor jullie ook anders zijn).

In je .env bestand moet je de naam van je DB_DATABASE veranderen
naar hoe je je nieuwe schema hebt genoemd. Verder moet je 
je DB_PASSWORD ook veranderen naar het wachtwoord dat je gebruikt voor
MySQL. 

Nu kan je de volgende commando's runnen:

$ php artisan migrate\
$ php artisan serve

en zou je project het moeten doen.

## workflow Git

1) $ git fetch\
Dit zorgt ervoor dat PHPStorm ook weet wat er op remote git locatie gebeurt.
2) $ git pull origin:main\
Nu heeft jouw locale repository alle veranderingen die online zijn toegevoegd.
Dit zorgt er op de lange termijn voor dat er minder merge conflicts komen.
3) $git commit\ 
met een message met wat je exact hebt toegevoegd/verandert.
Het is belangrijk dat er geen bugs in je code zitten!
4) $git push\ 
naar correcte branch. De naam van deze branch is vaak de feature van wat je probeert toe te voegen
5) Als de hele feature is geïmplementeerd, kan je deze mergen met de main. Dit is handiger om op github zelf te doen!