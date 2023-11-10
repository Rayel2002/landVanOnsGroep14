# Dusk testing

Begin met dusk installeren

$ composer require --dev laravel/dusk
$ php artisan dusk:install

Je kan je testen runnen door het volgende commando te runnen:

$ php artisan dusk

indien je problemen krijgt met de foutmelding 'Cannot use laravel/dusk's latest version v7.11.3 as it requires ext-zip * which is missing from your platform.' 
ga dan naar je php.ini pagina en verwijder de eerste semicolon bij de regel extension=zip
dus van ;extension=zip -> extension=zip

Daarnaast wil je ook een andere database gebruiken, zodat je tests 
niet je eigen database gebruiken en test cases in de db toevoegen.

Het makkelijkst is deze video te volgen:
https://youtu.be/7s6NY74m1pA?list=PLe30vg_FG4OTxWw8xdgpI6xEvlEdUSw7u
