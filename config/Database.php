<?php

class Database
{
    private static $conn;

    public static function connect()
    {
        if (!self::$conn) {

            $host = 'localhost';
            $dbname = 'Ai_database';
            // $dbname = 'lab_ai_polinema';
            $user = 'postgres';
            $pass = '123';

            self::$conn = pg_connect("host=$host port=5432 dbname=$dbname user=$user password=$pass");

            if (!self::$conn) {
                die("Gagal connect ke PostgreSQL");
            }
        }

        return self::$conn;
    }
}