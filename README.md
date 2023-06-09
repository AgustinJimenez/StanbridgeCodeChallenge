# StanbridgeCodeChallenge

- the vue app inside the folder "basic_attendance_roster_frontend"
- the laravel app inside the folder "basic_attendance_roster_backend"

- the vue app should work already in local with the .env.local file, in any case we just need to change the api url

```shell
cd basic_attendance_roster_frontend
yarn
yarn dev
```

- we need to set the laravel project .env file, we can just copy the .env.example in this case

```shell
cd basic_attendance_roster_backend
composer install
cp .env.example .env
```

- in the backend project we need to run the migrations and the seeds, to generate the students data and at least a course with id=1 (the frontend contains course-id = 1 in the api calls in order to work)

```shell
    php artisan migrate
    php artisan db:seed
```

- and both should work in local with the standard serve command

```shell
php artisan serve
```
