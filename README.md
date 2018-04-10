# Lagoonize Lumen

So you want to run [lumen](https://lumen.laravel.com/) on [Amazee.io's](http://amazee.io) latest and greatest platform Lagoon? Well, you've come to the right place.

What this repo provides are sane default Lagoon and docker settings for Lumen based projects. The idea is that you should be able to copy the files provided into a bog standard Lumen installation, make a handful of changes, and your Lumen app will be Lagoon ready.

## Prerequisites

If you're going to be using Lagoon, it's fair to assume some familiarity with the system, and with Amazee.io more generally.
We're not covering anything that's not _specifically_ about getting a Lumen installation running on Lagoon.

If you don't have a background, we hereby introduce you to the documentation.

[Lagoon Documentation.](http://lagoon.readthedocs.io/en/latest/)


Further, we assume that you've [installed Lumen](https://lumen.laravel.com/docs/5.6/installation) in the usual way.


## Overview

Our setup instantiates impmements the following containers
* cli
  * This container builds our installation as well as offering a point from which to run any command line calls (we run artisan from here).
* nginx
  * Our web server
* php
  * Runs php-fpm
* mariadb
  * Our relational database


## Project configuration

The first thing you'll want to do is copy the files in this repo's `./src/` directory into the root of your Lumen installation (*_do not forget the dotfiles_*).

There are a few places where you'll need to customize the Docker and Lagoon setups. Specifically, you'll want to put your project name and local dev URLs into the .lagoon.yml and docker-compose.yml files.

Open up the files and search for the TODOs. It should be self-explanatory.

Don't stress though, there's not that much of this TODO.


## Database configuration

Lagoon set environment variables for the Database connections automatically.
We need to make Lumen aware of these settings. This means, specifically, overriding the Database settings. 

If we take a look at the Dockerfile for the mariadb image you'll see the [DB connection environment variables](https://github.com/amazeeio/lagoon/blob/master/images/mariadb-drupal/Dockerfile#L4) being specified. By default these are:

* MARIADB_DATABASE=drupal
* MARIADB_USER=drupal
* MARIADB_PASSWORD=drupal

Pretty clear what the credentials are that we need to configure. This is, however, customizable _if_ you wish to mess with environment variables. 

Your .env will therefore contain the following

```
AMAZEEIO_DB_HOST=mariadb 
AMAZEEIO_DB_PORT=3306
AMAZEEIO_DB_DATABASE=drupal
AMAZEEIO_DB_USERNAME=drupal
AMAZEEIO_DB_PASSWORD=drupal
```

You might wonder what's with all the _Drupal_? Well, Amazee is one of the premier Drupal shops, and a lot of the tooling is built around Drupal. We'll get around to building Lumen specific images soon enough though.

### Attribution

This setup is mostly a rip off of the [Amazeeio Wordpress example](https://github.com/amazeeio/wordpress-example). Thanks, chaps.
