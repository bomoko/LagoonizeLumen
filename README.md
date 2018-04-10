# Lagoonize Lumen

So you want to run [lumen](https://lumen.laravel.com/) on [Amazee.io's] latest and greatest platform Lagoon? Well, you've come to the right place.

What this repo provides are sane default Lagoon and docker settings for Lumen based projects. The idea is that you should be able to copy the files provided into a bog standard Lumen installation, make a handful of changes, and your Lumen app will be Lagoon ready.

## Prerequisites

If you're going to be using Lagoon, it's fair to assume some familiarity with the system, and with Amazee.io more generally.

We're not covering anything that's not _specifically_ about getting a Lumen installation running on Lagoon.

If you don't have a background, we hereby introduce you to the documentation.

[Lagoon Documentation.](http://lagoon.readthedocs.io/en/latest/)

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


## Database configuration

Lagoon set environment variables for the Database connections automatically.
We need to make Lumen aware of these settings. This means, specifically, overriding the Database settings. 

If we take a look at the Dockerfile for the mariadb image you'll see the [DB connection environment variables](https://github.com/amazeeio/lagoon/blob/master/images/mariadb/Dockerfile#L22) being specified. By default these are:

* MARIADB_DATABASE=lagoon
* MARIADB_USER=lagoon
* MARIADB_PASSWORD=lagoon

Pretty clear what the credentials are that we need to configure. 


