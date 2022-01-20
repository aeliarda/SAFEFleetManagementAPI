Run the application:
    1. Open command prompt and enter the following:
        1.1 cd <project folder with the full path e.g. C:\Users\username\Documents\GitHub\SAFEAccountingAPI>
        1.3 code .
    2. In the VS Code 
        2.1 Open New Terminal
        2.2 Enter the the following:
            2.2.1 composer install
            2.2.2 php artisan serve
    3. Open new browser and enter the url generated from the Terminal
        3.1 Example URL is http://127.0.0.1:8000

----------------------------------------------------Quick Basic Commands------------------------------------------------------------
composer create-project laravel/laravel <appname>
php artisan make:model <modelname>
php artisan make:contrller <modelname>
php artisan make:model <modelname> -mcr
php artisan make:migration <filename.php>
php artisan make:migration create_<tablename_to_create>_table --create=tablename
php artisan make:migration create_<tablename_to_update>_table --table=tablename
php artisan migrate
php artisan migrate:rollback
composer dump-autoload
php artisan migrate --path=/database/migrations/filname.php
php artisan migrate:fresh
php artisan migrate:refresh --path=database/migrations/filename.php
php artisan migrate:rollback  --path=/database/migrations/filname.php
or
Read the articles from -> https://newbedev.com/laravel-create-migration-file-in-specific-folder
-------------------------------------------------------More Quick Commands------------------------------------------------------------
php artisan migrate:rollback : This rolls back the last batch of migrations.
php artisan migrate:reset : This rolls back all your applications migrations.
php artisan migrate:refresh : This rolls back all your migrations and execute the migrate command. Its like recreating your entire database.
php artisan migrate:fresh : This drops all the tables and executes the migrate command again.
or
Read the articles from -> https://dev.to/roxie/adding-and-removing-columns-from-existing-tables-using-laravel-migrations-389g
                          https://newbedev.com/safely-remove-migration-in-laravel
----------------------------------------------------Video Tutorials-----------------------------------------------------------------

Fix Migration error:
    https://www.youtube.com/watch?v=pgjDxQ65y8M

Install laravel:
    https://www.youtube.com/watch?v=H3uRXvwXz1o
        1. Download and install xampp:
           1.1 https://www.apachefriends.org/download.html
           1.2 https://dinocajic.medium.com/add-xampp-php-to-environment-variables-in-windows-10-af20a765b0ce
        2. Install the composer
            1.1 https://getcomposer.org/download/
        3. Run the application:
            1. Open command prompt and enter the following:
                1.1 cd <project folder with the full path e.g. C:\Users\username\Documents\GitHub\SAFEAccountingAPI>
                1.3 code .
            2. In the VS Code 
                2.1 Open New Terminal
                2.2 Enter the the following:
                    2.2.1 composer install
                    2.2.2 php artisan serve
            3. Open new browser and enter the url generated from the Terminal
                3.1 Example URL is http://127.0.0.1:8000
        
    https://www.youtube.com/watch?v=MT-GJQIY3EU
    https://www.youtube.com/watch?v=NdL-sbjIaOI

Laravel general Tutorial
    https://www.youtube.com/watch?v=EU7PRmCpx-0
    https://www.youtube.com/watch?v=MFh0Fd7BsjE

Laravel Auth:
    https://www.youtube.com/watch?v=R3Hec0_U2Cs
    https://www.youtube.com/watch?v=DAXOWbug5JQ
    https://www.youtube.com/watch?v=MT-GJQIY3EU or https://webmobtuts.com/backend-development/laravel-8-sanctum-authentication-for-spa-and-mobile-apis/
        Sanctum: https://laravel.com/docs/8.x/sanctum#installation
                 1. composer require laravel/sanctum
                 2. php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
                 3. php artisan migrate
                 4. In the app/Http/Kernel.php, make sure the following is updated:
                    'api' => [
                            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, 'throttle:api',
                            \Illuminate\Routing\Middleware\SubstituteBindings::class,
                        ],
                5. In the app/models/User.php, make sure the following are updated:
                    use Laravel\Sanctum\HasApiTokens;
                    class User extends Authenticatable
                    {
                        use HasApiTokens, HasFactory, Notifiable;
                    }
Laravel socialite:
    https://dev.to/techtoolindia/laravel-socialite-facebook-login-5cae
    https://techvblogs.com/blog/social-login-laravel-socialite

Laravel for API:
    https://www.youtube.com/watch?v=MT-GJQIY3EU
    https://www.youtube.com/watch?v=09Pi0sJ5-fE
    https://www.youtube.com/watch?v=xvqPEEpRBJ4

Laravel Code First Approach:
    https://www.youtube.com/watch?v=l8m0rYR7W8w

Laravel Repository Pattern:
    https://www.youtube.com/watch?v=JYztQM80xfc

Connect to mysql:
    https://lavalite.org/blog/connecting-your-laravel-project-to-mysql-database

Laravel call Stored Procedure:
    https://onlinewebtutorblog.com/call-mysql-stored-procedure-in-laravel-8-tutorial/

Create Transaction:
    https://www.youtube.com/watch?v=JYztQM80xfc
    https://stackoverflow.com/questions/22906844/laravel-using-try-catch-with-dbtransaction
    https://www.youtube.com/watch?v=09Pi0sJ5-fE

Best Practices or Code Review: 
    https://www.youtube.com/watch?v=JYztQM80xfc
    https://www.youtube.com/watch?v=q08X7a5VfhE
    https://www.youtube.com/watch?v=93ZhGkFIwbA
    https://www.youtube.com/watch?v=sukS7QOBpK0
    https://www.youtube.com/watch?v=_z9nzEUgro4

Laravel 8 JetStream Review - Authentication Scaffolding:
    https://www.youtube.com/watch?v=BZFavPxP2xc
    https://www.youtube.com/watch?v=pyOcSEkG4Q0

Deployment:
    https://www.youtube.com/watch?v=6g8G3YQtQt4
    https://www.youtube.com/watch?v=PRee1h4SFoI
    https://www.youtube.com/watch?v=W2fQFbkEQo0
    https://www.youtube.com/watch?v=dG55U27oSb4
    https://www.youtube.com/watch?v=X4KElZcUi-g
    https://www.youtube.com/watch?v=UN7S4zd8h-k
    https://www.youtube.com/watch?v=bMFRZZXSvRs
    https://www.youtube.com/watch?v=6g8G3YQtQt4

-----------------------------------------------Socialite Login----------------------------------
    https://dev.to/techtoolindia/how-to-login-with-google-in-laravel-8-2d1i
    https://www.itsolutionstuff.com/post/laravel-8-socialite-login-with-google-account-exampleexample.html
    https://techvblogs.com/blog/social-login-laravel-socialite

facebook:
    https://stackoverflow.com/questions/44764212/how-should-i-deal-with-the-facebook-app-privacy-policy-url-in-developers-page
------------------------------------------------Docker------------------------------------------
What is docker and why?:
    https://www.youtube.com/watch?v=3c-iBn73dDE
    https://www.youtube.com/watch?v=i7ABlHngi1Q
    https://www.youtube.com/watch?v=F1DbBZCYtaA

Laravel docker:
    https://www.youtube.com/watch?v=PDaGJ397Ing
    https://www.youtube.com/watch?v=rXP74Mkgp6E
    https://www.youtube.com/watch?v=PDaGJ397Ing
    
Install docker:
    Download -> https://docs.docker.com/desktop/windows/install/

-----------------------------------------------Photoshop----------------------------------------
Photoshop Tutorial:
    https://www.youtube.com/watch?v=Y2ve0XwpVVw

--------------------------------------------------Collections-----------------------------------
https://www.youtube.com/watch?v=dozV3-hYoaY&list=PLpzy7FIRqpGCCm3pJHtDKYHlHJclb9V9m&index=1
