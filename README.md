# AcmePodcast

A no-nonsense, simple website for your podcast that provides an RSS feed which you can add to various podcast catching services such as iTunes.

### Prerequisites

* docker-compose (https://docs.docker.com/compose/install/)
* ssh access to the server you wish to install this application on.

### Installing

First, build and run the containers using the below commands

`$ docker-compose up`

Then run the database migrations

`$ docker exec -it acmepodcast_fpm_1 bash`
`$ php bin/console doctrine:database:create`
`$ php bin/console doctrine:migrations:migrate`
`$ php bin/console fos:user:create # answer all three questions` 


## Running the tests

`$ docker exec -it acmepodcast_fpm_1 bash`

`$ php vendor/bin/phpunit`

## Built With

* docker
* docker-compose
* php7.1
* sqlite3
* symfony4
* easy_admin
* fos_bundle
* bootstrap

## Versioning

Currently using [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/rossboswell/acmepodcast/tags). 

## License

Haven't decided yet