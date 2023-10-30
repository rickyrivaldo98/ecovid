# CodeIgniter 4 + TailwindCSS App

## Prerequirements:
Donwload and install `Composer-Setup.exe` Windows Installer :
https://getcomposer.org/download/

Donwload and install `Node.js ` Windows Installer LTS :
https://nodejs.org/en/download

## Intsallation & Setup

1. Install `Composer`:

    ```shell
    > composer install
    ```
1. Install `NPM` for Laravel Mix:

    ```shell
    > npm install
    ```
1. Copy env file to `.env` -> setup base_url() and database config:

    ```php
    //environment
    CI_ENVIRONMENT = development
    //app
    app.baseURL = 'http://localhost:8080/'
    //database
    database.default.hostname = 127.0.0.1
    database.default.database = miraidevs_covid19
    database.default.username = root
    database.default.password = 
    database.default.DBDriver = MySQLi
    database.default.DBPrefix =
    database.default.port = 3306
    ```
1. Create DB on mySQL called `miraidevs_covid19`, and run CI Migration from terminal

    ```shell
    > php spark migrate --all
    ```
    ```php
    //notes for migration file locations:
    \vendor\myth\auth\src\Database\Migrations,
    \app\Database\Migrations
    ```
1. Run CI App & TailwindCSS

    ```shell
    > php spark serve
    ```
    ```shell
    #new terminal
    > npx mix watch
    ```
   
