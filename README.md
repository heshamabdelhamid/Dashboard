_Description_

> this project is to Create Dashboard with these features

 1 - Apply this design: https://github.com/colorlibhq/AdminLTE
 2 - Create DB structure (users of the systems, categories modules, and news module)
 3 - create User management module (list/add/edit/delete) -> when creating a user send email to that user with his/her account. The types of users  will be (Supedadmin, data entry)
 4- Create Categories management Module (list/add/edit/delete)
 5- Create a News management Module using categories (list/ad/edit/delete).

_Requirments_

-   php ( can be downloaded from [https://www.php.net/](https://www.php.net/) )
-   Composer( can be downloaded from [https://getcomposer.org/](https://getcomposer.org/))

_How To Run It_

-   open cmd or git bash or your favourite terminal and clone the project by running
-   `git clone https://github.com/heshamabdelhamid/Dashboard.git`
-   change directory to the project and run the following commands
-   `composer install`
-   `cp .env.example .env`
-   `php artisan key:generate`
-   create you database and add the credentials to the .env
-   replace -->
-   mail configuration

-   MAIL_MAILER=smtp
-   MAIL_HOST=smtp.mailtrap.io
-   MAIL_PORT=2525
-   MAIL_USERNAME=
-   MAIL_PASSWORD=
-   MAIL_ENCRYPTION=null
-   MAIL_FROM_ADDRESS=
-   MAIL_FROM_NAME="${APP_NAME}"

-   `php artisan migrate --seed`
-   `php artisan serve`
-   you can access the admin panel by typing _/http://127.0.0.1:8000_

> email and password for admin panel are
> Super_admin@app.com | 12345678

_Technologies Used_

-   laravel 
-   LTE Admin panel https://github.com/colorlibhq/AdminLTE
