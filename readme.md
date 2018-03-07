## A Platform for teachers and students
Intension of this is to build a platform for the tuition community to find teachers and potential students.

## Software prerequests
1. composer
2. Laravel 5.5+
3. mysql server 14.0 +
4. php 7.1 +

## Setting up

1. Start the mysql server and create a database (eg: in mysql terminal :- "create database tuiPlat")
2. Create a database user and assign all ther rights on the database (eg: in mysql terminal :- "CREATE USER 'tuiPlatUser'@'localhost' IDENTIFIED BY 'password';"
"GRANT ALL PRIVILEGES ON 'tuiPlat' . * TO 'tuiPlatUser'@'localhost';"
3. Go to the project directory and open the .env file. (Warning : If you are using a windows system. There won't be a .env file. But there will be a .env.example file. To create a .env file open the command prompt in the project directory. Copy paste following. "copy /y .env.example .env"
4. Open the .env file in a text editor and in the .env file replace the APP_NAME=Laravel with APP_NAME=Tuition likewise, Replace
DB_DATABASE=tuiPlat
DB_USERNAME=tuiPlatUser
DB_PASSWORD='password given to the user'

5. To enable password reset mail sending fill the following lines in the environment file properly.
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME='your email address'
MAIL_PASSWORD='your email password'
MAIL_ENCRYPTION=ssl 

Some times mails won't diliver until you allow low security apps in you email settings. (Google how to do this)

6. Now save and close the .env file.
7. Open a command prompt/command line in the project directory and type following commands in order.
8. "composer install" :- This will install all the dipendencies of the project.
9. "php artisan migrate" :- This will do the database migrations to create the tables. This will fail if you haven't propery set up the database parameters in the .env
10. "php artisan serve" :- Start the development server.
11. Open the browser and redirect to the 127.0.0.1:8000 
12. Test the functionalities.
13. Enjoy.


## Please consider this project was created just to learn Laravel framework.
## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
