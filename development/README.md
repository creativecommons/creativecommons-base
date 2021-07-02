# Development

This folder contains files that are useful when developing `creativecommons-base`.

## Prerequisites

Make sure you have installed Docker and `docker-compose` for your operating system prior to following these instructions.

## Docker compose

The Docker compose file will start a few required or related services:

- a database server (MySQL or MariaDB)
- a WordPress server
- WordPress CLI - for managing the WordPress instance
- phpMyAdmin - for managing the database


## Environment variables

There are several environment variables required to run the `docker-compose` command. Copy the `.env.example` to `.env` and override the variables if needed. The defaults should work fine.


## Changing database

The `.env` file should contain a variable called `DATABASE` that is used to choose which database to use for development (mysql or mariadb).

If you change the value of the `DATABASE` variable at any time during development, you will need to remove the old database volume in order to prevent errors. After removing the volume you need to rebuild the docker image with `docker-compose up --build -d`.
