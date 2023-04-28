// INSTALLATION 

** 
In the folder where we want to start the project write cmd in the path to open a command prompt with the folder path 
**

- composer create-project laravel/laravel folderProjectName

if red flag : 

cd folderProjectName 

- composer update --ignore-platform-reqs

or

- composer install --ignore-platform-reqs

// RUNNING SERVER 

** 

first you must be in the folderProjectName if you're not use :

- cd folderProjectName

**

to run the server :

- php artisan serve

then copy the port ( http://127.0.0.1:8000 ) and past it in chrome or whatever browser you use.

to stop the server simply use : Ctrl+C 


// CREATE CONTROLLER

- php artisan make:controller foldername/CONTROLLERNAME
// BLADE SYNTAX

<?php
$world = "Hi Adam";
echo $world;
?>

<!-- echo data in blade syntax  -->

{{ $world }}

<!-- if in php  -->

if($world) {

} else {

}

<!-- if in blade syntax  -->

@if()

@endif

<!-- foreach in blade syntax  -->

@foreach

@endforeach

// URL AND NAME ROUTE

**
url route for about page in contact.blade.php 
**

<h1>this is a contact page from controller</h1>
<a href="{{ url('/about')}}">about</a>

**
url route for about page in routes/web.php 
**

Route::get('/about', 'Index'); // url route 

**
name route for contact page in about.blade.php 
**

<h1>this is about page from controller</h1>
<a href="{{ route('contact.page')}}">contact</a>

**
name route for contact page in routes/web.php 
**

Route::get('/contact', 'ContactMethod')->name('contact.page'); // name route 

**
IT'S PREFERABLE TU USE NAME ROUTE THAN URL ROUTE BECAUSE IF YOU CHANGE THE ROUTE IN WEB.PHP

('/about-new-url') 

YOU'LL HAVE TO UPDATE IT IN YOUR BLADE.PHP FILE

<a href="{{ url('/about-new-url')}}">about</a>  

WITH THE URL METHODE, BUT IF YOU USE NAME METHODE YOU DON'T HAVE TO UPDATE YOUR BLADE.PHP FILE 
**

// MIDLEWARE 

create a new Middleware

- php artisan make:middleware MiddlewareName

in kernel.php -> protected $middlewareAliases :

'MiddlewareNameCall' => \App\Http\Middleware\MiddlewareName::class,

in MiddlewareName.php :

if ($request->MiddlewareNameCall <= 20) {
            return redirect('contact'); // redirect to contact page 
        }

in web.php :

Route::get('/about', 'Index')->name('about.page')->middleware('MiddlewareNameCall');


**
if : http://127.0.0.1:8000/about?check=21 /22 /23.... 
then you will have access to the about page.
 
but if : http://127.0.0.1:8000/about?check=20 /19 /18...
access will be denied and you'll be redirect to contact page 

Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('contact.page');
});
**

// BREEZE

to install breeze : 

composer require laravel/breeze --dev

**
I got a red flag when i wanted to download breeze and I couldn't resolve it by using

- composer update --ignore-platform-reqs

or

- composer install --ignore-platform-reqs

So I read the error message to find out a methode to fix this, the message was :  

Problem 1
    - league/mime-type-detection 1.11.0 requires ext-fileinfo * -> it is missing from your system. Install or enable PHP's fileinfo extension.
    - laravel/framework v10.7.1 requires league/flysystem ^3.8.0 -> satisfiable by league/flysystem[3.14.0].
    - league/flysystem 3.14.0 requires league/mime-type-detection ^1.0.0 -> satisfiable by league/mime-type-detection[1.11.0].
    - laravel/framework is locked to version v10.7.1 and an update of this package was not requested.

So I tarted to search the php.ini file and I found 4 txt (2 ini production and 2 ini development )

Then update the 4 files by enable extension=fileinfo (you just need to uncomment it by removing the ";" ) annnd ! It didn't work..

So I search trough stackoverflow an answer to why it didn't work and I found something interesting !

By using :

php --ini

in the command prompt we can get the path to our php.ini so I wanted to see if this will get me to one of the 4 files I've already updated later and I get this :

Configuration File (php.ini) Path:
Loaded Configuration File:         C:\Program Files\php\php.ini
Scan for additional .ini files in: (none)
Additional .ini files parsed:      (none)

So I've copy the C:\Program Files\php\php.ini and get it, open it annnd ! Bingo ! this was a new file so I tried to uncomment :

extension=fileinfo 

then Crtl+S annnd ! Failed ! I couldn't save the file so, I search why and it was because I needed to open the file as administrator so I closed it and try right click on it to open it as administrator buut ! the option "open as administrator" wasn't here... 

I thought I was going to loose my mind but didn't give up and finally rather than using notepade I tried to open the file with vsCode then update it and save it.

Thanks to God vscode pop up a message saying that this files need to be save as administrator and give me a beautifull button to do it so I clicked on it and VOILA !

Once the file succefully saved I tried again to use :

composer require laravel/breeze --dev

And it worked ! we finally did it ! 

**

So now we should use :

php artisan breeze:install

select : blade
select : yes or no
select : no 

now we must go to mysql and create a database 

then go to .env and update the default db name by the db you created

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 
DB_DATABASE=laravel // default db name 
DB_USERNAME=root
DB_PASSWORD= 

update : 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 // the default port when you use mysql, if you change it then you must update your new port here 
DB_DATABASE=website
DB_USERNAME=root
DB_PASSWORD= // by default mysql don't have password but if you have set a password then put it here 

Now go to config/database.php and apply the same change here : 

'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'website'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),

Now you can use :

php artisan migrate

And voila !

now you can use :

npm install 

npm run dev // you must also have : php artisan serve and phpMyAdmin running at the same time 

now go on the home page of php artisan serve

and click on register, create an account and voila ! and if you check in phpMyAdmin in the user table the data of the new account is all here !

Now creat an account on mailtrap then go to inbox and select Laravel+7 you will get something like that :

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=fbvfbffbfbff // example
MAIL_PASSWORD=afbfbfbfbfb4b / example
MAIL_ENCRYPTION=tls

copy and past it in your .env (ln 31 to 36)

Now go on the login page then click :

"forgot your password?" then "EMAIL PASSWORD RESET LINK"

Return on mailtrap and check your inbox if things goes well get the password reset mail.

Go to Models/User.php 

Uncomment use Illuminate\Contracts\Auth\MustVerifyEmail; 

or add it if it's not here 

add to class User : implements MustVerifyEmail

class User extends Authenticatable implements MustVerifyEmail

In web.php add 'verified' to the middleware of Route::get('/dashboard', function ()

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Now if you create a new account you will get a Verify Email address in your inbox on Mailtrap


// FIND ERROR WHEN NO ERROR MESSAGE POP UP 
On the top of the page : 

@dump($errors)

// TAKE A BACKUP

go to phpMyAdmin go to your db then click export/custom/If NOT EXISTS/export


// GENERATIN MIGRATIONS

php artisan make:model HomeSlide -m

then once the home_slides_table.php and Models/HomeSlide.php are set up you can use :

php artisan migrate








