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
* Candidate profile.
* File upload for resume / c.v.
* Download candidate c.v / resume.
* Session storage in database.
* CSRF mitigation via encrypted cookie.

## Todo
* Add sector(s) to registration form.
* Add salary expectation to registration form.
* Updates to candidate

## Proposed Enhancements
* Candidates search / filter
* Expose RESTful API to enable dynamic form elements via Ajax
* Store multiple versions of user C.V / Resume