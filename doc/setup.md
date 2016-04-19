# Setup

## Vagrant

- copy `.env.example` in `util/laravel` to `.env`
- change database credentials in `.env`, for `at15/lnmp7` it's `root:vagrant`
- run `util/artisan key:generate` to generate random string
- run `util/database/create.sh` to create `bform` database
- run `util/artisan migrate --seed`
