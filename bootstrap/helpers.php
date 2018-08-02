<?php

function get_db_config()
{
    if (getenv('IS_IN_HEROKU')) {
        $url = parse_url(getenv("DATABASE_URL"));

        return $db_config = [
            'connection' => 'pgsql',
            'host' => $url["host"],
            'database'  => substr($url["path"], 1),
            'username'  => $url["user"],
            'password'  => $url["pass"],
        ];
    } else {
        return $db_config = [
            'connection' => env('DB_CONNECTION', 'pgsql'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 5432),
            'database'  => env('DB_DATABASE', 'larablog'),
            'username'  => env('DB_USERNAME', 'homestead'),
            'password'  => env('DB_PASSWORD', 'secret'),
        ];
    }
}