<p align="center">Laravel API With JWT Auth</p>


## How to install this project

After cloning the project, you need to install the dependencies

~~~
cd laravel-api-jwt-token
composer install
~~~

Then rename .env.example as .env and provide correct database details.  

Now you need to generate the application key using the following command:

~~~
php artisan jwt:secret
~~~

Then you must migrate the application to db using the following command:

~~~
php artisan migrate
~~~

After that you need to run the seeds


~~~
php artisan db:seed
~~~
