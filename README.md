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

## Package installeren voor model en permission
-  composer require spatie/laravel-permission (De package die benodigde models voor role en permission bevat).
-  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"(het aanmaken van migration file voor permission en role tabel).
-  php artisan migrate
-  php artisan db:seed

  ## Swagger in laravel
  - composer require darkaonline/l5-swagger tymon/jwt-auth
  -  Voor de jwt configuratie moet er een bestand genereert worden met de volgende commando: php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
  -  Er moet nu een nieuwe jwt secret key aangemaakt worden, dit doe je met de commando: php artisan jwt:secret
  -  Er moet nu een configuratie file worden aangemaakt voor swagger, je gebruikt de commando: php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
  -  in de env file voeg je het volgende toe: L5_SWAGGER_CONST_HOST=http://project.test/api/v1
  -  boven de controller klas geven we het volgende mee: /**
 * @OA\Info(
 *    title="Event Land van ons",
 *    version="1.0.0",
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     securityScheme="bearerAuth",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )

 */
 - In de andere controllers die gemaakt worden zet je boven de method het volgende neer om dit op te nemen in je swagger documentatie:
   /**
 * @OA\Get (
 *      path="/api/event",
 *      operationId="showProject",
 *      tags={"Projects"},
 *      summary="Show project",
 *      description="Returns list of projects",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      )
 *     )
 */
Dit is wel afhankelijk wat voor request het is en kan het natuurlijk andere informatie bevatten
- Voeg de endpoints die je gemaakt heb in api.php
- Gebruik de commando php artisan l5-swagger:generate om alle belangrijke informatie voor je endpoints te updaten in swagger
- run de server van laravel en typ in je url balk achter localhost: /api/documentation
- Je kan nu de endpoints documenteren en testen via Swagger 
   

## workflow Git
1) $git commit\
   met een message met wat je exact hebt toegevoegd/verandert.
   Het is belangrijk dat er geen bugs in je code zitten!
2) $ git fetch\
Dit zorgt ervoor dat PHPStorm ook weet wat er op remote git locatie gebeurt.
3) $ git pull origin:main\
Nu heeft jouw locale repository alle veranderingen die online zijn toegevoegd.
Dit zorgt er op de lange termijn voor dat er minder merge conflicts komen.
4) Check of je emerge conflicts hebt en los deze op!
5) $git push\ 
naar correcte branch. De naam van deze branch is vaak de feature van wat je probeert toe te voegen
6) Als de hele feature is geïmplementeerd, kan je deze mergen met de main. Dit is handiger om op github zelf te doen!
