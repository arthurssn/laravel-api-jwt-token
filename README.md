<p align="center">Laravel API With JWT Auth</p>

## About this Project

This is a CRUD API project with JWT authentication. It is a project to demonstrate the functionality of this tool. It is a project with relationships between users, categories and posts, with query optimization in these relationships.


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

Finally run this command and test the application using Postman.

~~~
php artisan serve
~~~

# How to test this application in Postman?

After executing the previous command, it will generate the following user: 

name | email | password
:----- | :---------------: |-----------:
admin | admin@gmail.com | mypassword

Then in postman go to the following URL:

(POST) http://127.0.0.1:8000/api/login/

And on the body (raw) paste this
~~~
{
    "email" : "admin@gmail.com",
    "password" : "mypassword"
}
~~~

Then you will get the following output:

~~~
{
    "status": "success",
    "authorization": {
        "token": "XXXX",
        "type": "bearer"
    }
}
~~~

Now, in all requests, paste the token in the authorization tab. Don't forget to set the bearer token.

Have fun :)