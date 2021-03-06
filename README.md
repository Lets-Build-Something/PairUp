PairUp app
==========
[![Build Status](https://travis-ci.org/Lets-Build-Something/PairUp.svg?branch=master)](https://travis-ci.org/Lets-Build-Something/PairUp)
[![Build Status](https://scrutinizer-ci.com/g/Lets-Build-Something/PairUp/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Lets-Build-Something/PairUp/build-status/master)

Introduction
------------

This app is a shared repo for an as-yet unfinished web application to help programmers find other programmers willing to teach a technical skill, or to collaborate on interesting projects. Users can either skills-swap in pairs, or learn from one and pay it forward to another. It will be written in PHP using the Laravel framework.

Programmers in the system will have a profile where they can rate their skill set in various areas, and which will aid other programmers searching for specific skill requirements.

General notes
-------------

All PHP dependencies have been kept local, so there are minimal assumptions about the machine upon which this application is installed.

The repository has been called PairUp just as a working title, and this may change.

Installation instructions
-------------------------

Get the repo and switch to the new directory:

    git clone git@github.com:Lets-Build-Something/PairUp.git
    cd PairUp

Install Composer:

    curl -sS https://getcomposer.org/installer | php

Get dependencies:

    php composer.phar install

In a development version only, set the environment variables:

    cp .env.example .env

Then set encryption keys inside the app:

    php artisan key:generate

Now grab a copy of Selenium server. I imagine the latest from here would be fine:

    http://selenium-release.storage.googleapis.com/index.html

Here's a quick link to one that worked for me (30M in size):

    wget http://selenium-release.storage.googleapis.com/2.47/selenium-server-standalone-2.47.0.jar

To run the Selenium tests, you'll need cURL installed. On Ubuntu, you can do this, if you don't have it already:

    sudo apt-get install php5-curl

We'll need a database, so run these commands as the root MySQL user, choosing a strong password
for non-development environments:

    CREATE DATABASE pairup DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
    CREATE USER 'pairup'@'localhost' IDENTIFIED BY '(random password)';
    GRANT ALL PRIVILEGES ON pairup.* TO 'pairup'@'localhost';
    FLUSH PRIVILEGES;

Next, let's add the database credentials to the `.env` file:

    DB_HOST=localhost
    DB_DATABASE=pairup
    DB_USERNAME=pairup
    DB_PASSWORD=(random password)

You'll need to restart `artisan serve` to re-read these credentials. Alternatively if you're using Apache, you can use these in your vhost, and then do a graceful reload:

    SetEnv DB_HOST (ipaddress)
    SetEnv DB_DATABASE pairup
    SetEnv DB_USERNAME pairup
    SetEnv DB_PASSWORD (random password)

Now let's set up the migrations and check they're ready to run:

    php artisan migrate:install
    php artisan migrate:status

That should result in something similar to the following:

    +------+------------------------------------------------+
    | Ran? | Migration                                      |
    +------+------------------------------------------------+
    | N    | 2014_10_12_000000_create_users_table           |
    | N    | 2014_10_12_100000_create_password_resets_table |
    +------+------------------------------------------------+

If it does, you should be able to run them:

    php artisan migrate --seed

You should now be able to register a user account, and log in and out.

Testing
-------

On a spare console, fire up Selenium using the following. You'll need Java installed on your system:

    java -jar selenium-server-standalone-2.47.0.jar

On another spare console, fire up an instance of the app (uses localhost:8000)

    php artisan serve

Or of course, create an Apache vhost on localhost:8000 (the default Laravel URL).

To run the tests, just run this shortcut:

    ./phpunit

Asset Compilation
-----------------

You'll need to run the following commands to install bower components that allow gulp to compile scss and js assets.

    bower install jquery -save
    bower install bootstrap -save
    bower install bootstrap-sass -save

Now just run gulp with the following command to complile assets that are used by views

    gulp

