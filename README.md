
## This is a step-by-step guide on how to create a Zoho CRM form that can handle deals and accounts using Vue.js and Inertia Laravel. It covers the following topics:

- Setting up the project environment and installing the required dependencies
- Creating the database tables and models for deals and accounts
- Creating the routes, controllers and views for the form
- Adding validation, error handling and success messages to the form
- Testing the form functionality and submitting data to Zoho CRM


Using Vue.js components and Inertia Laravel to build a dynamic and responsive form that can interact with Zoho CRM API. The features include validation, error handling, loading indicators, and success messages. The installation requires cloning the repository, installing the dependencies, setting up the environment variables, and running the migrations.

> *This repository contains a simple crud built using laravel 8,asciisd/zoho, inertiajs and Vue 3.*

### The web CRM platform using Vue.js and Laravel as a backend

## [Video](https://youtu.be/TV7IOOljZ64)

## Dev Stack:

-   Application Server [laravel 8](https://laravel.com/docs/8.x/readme)
-   Frontend [Laravel Jetstream](https://jetstream.laravel.com/3.x/introduction.html)
-   Zoho CRM integration [asciisd_zoho](https://github.com/asciisd/zoho)

To create a deal and account in Zoho CRM using the Zoho CRM API. The form should contain `**all**` the required fields to create these records and the records **must be** linked to each other. Additionally, an automatic token refresh mechanism **must be** implemented to allow creation of records from the form at any time.

## Requirements

-   Get yourself a [Zoho CRM account](https://www.zoho.com/crm/).
-   [Register your application](https://www.zoho.com/crm/developer/docs/api/register-client.html)
-   PHP = ^7.3
-   Laravel = ^8.0

#### Then, follow the next steps:

1.  Go to [Zoho CRM Developer Console](https://accounts.zoho.com/developerconsole).
2.  ADD CLIENT `Server-based Applications`.
3.  Enter Client Name `Any name you want`
4.  Enter Homepage URL `your base home url`
5.  Enter Authorized Redirect URIs `config('app.url') . /zoho/oauth2callback` or **.env**  `[ZOHO_REDIRECT_URI]`
6.  Go to your project location on terminal and enter
    
    ```shell
    php artisan zoho:authentication
    ```
    
7.  Copy the generated link and past it in the browser to complete the oAuth process.

**Now Zoho CRM is ready to use.**

## Installation:

- [Installing Jetstream](https://jetstream.laravel.com/3.x/introduction.html)
- [GitHub - asciisd_zoho Zoho package for Laravel](https://github.com/asciisd/zoho)

```sh
composer i
npm i
php artisan migrate

```

- .env reqired:

```ini
APP_URL=[YOU_URL_HERE]

ZOHO_ACCOUNTS_URL=https://accounts.zoho.eu
ZOHO_API_BASE_URL=www.zohoapis.eu

ZOHO_CLIENT_ID=[ZOHO_CLIENT_ID]
ZOHO_CLIENT_SECRET=[ZOHO_CLIENT_SECRET]
ZOHO_REDIRECT_URI=[ZOHO_REDIRECT_URI]
ZOHO_CURRENT_USER_EMAIL=[YOU_URL_HERE]/zoho/oauth2callback

```

### The forms created using Vue.js and Laravel as a backend. It will include the following features:

-   [x]  Ability to create a deal and account in Zoho CRM
-   [x]  Linking of the deal and account records in Zoho CRM
-   [x]  Automatic token refresh mechanism for uninterrupted creation of records

###  The form also include the following functionality:

-   [x]  Validation of all form fields to ensure that valid values are entered
-   [x]  Display of error messages if an invalid value is entered
-   [x]  Display of a success message if the records are successfully created
-   [x]  Display of an error message if the records fail to be created
-   [x]  Use of Vue.js to create a dynamic and responsive user interface
-   [x]  A submit button to create the deal and account records in Zoho CRM

## The backend implemented using Laravel and include the following:

-   [x]  Integration with the Zoho CRM API for creating deals and accounts
-   [x]  Implementation of the automatic token refresh mechanism  
-   [x]  Creation of the necessary routes and controllers to handle form submissions

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

