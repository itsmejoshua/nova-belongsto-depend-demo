## System requirements

-   nodejs 14.15 LTS
-   php 7.4
-   MySQL

## Install Nova Belongsto Depend Demo

    git clone git@github.com:orlyapps/nova-belongsto-depend-demo.git nova-belongsto-depend-demo
    cd ./nova-belongsto-depend-demo
    cp .env.example .env
    php artisan key:generate
    composer install
    npm install
    npm run dev

    CREATE DATABASE nova_belongsto_depend_demo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

    php artisan migrate --seed
