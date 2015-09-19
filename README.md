# Candidate Registration - ZOD Interview

Task: Model the process for a canidates registration.

## Installation

Copy `.env.example` to `.env` and update the configuration as you need

```
git clone git@github.com:StyxOfDynamite/zod-interview.git
cd zod-interview
cp .env.example .env
#edit .env to contain valid database credentials
composer update
php artisan migrate

```

## Progress

* Initial databse creation.
* Candiate details registration.
* Server-side validation.
* Password hashing.
* Candidate removal.
* Session storage in database.
* Candidate details edit.

## Todo

* Add sector(s) to registration form
* Add country and selection region to registration form
* Add file upload for resume / c.v
