<?php
// koneksi.php - Menggunakan konfigurasi dari JadwalKuliah.php

/** Fungsi untuk mendapatkan satu instance koneksi PostgreSQL */
function get_pg_connection(): PgSql\Connection {
    static $conn = null;
    if ($conn instanceof PgSql\Connection) {
        return $conn;
    }

    // Konfigurasi koneksi dari file JadwalKuliah.php
    $host   = 'localhost';
    $port   = '5432';
    $dbname = 'lab_ai_polinema'; 
    $user   = 'postgres';
    $pass   = '';
    
    $connStr = "host=$host port=$port dbname=$dbname user=$user password=$pass options='--client_encoding=UTF8'";
    $conn = @pg_connect($connStr);

    if (!$conn) {
        throw new RuntimeException("Koneksi PostgreSQL gagal. Periksa host/port/db/user/pass & ekstensi pgsql.");
    }
    return $conn;
}

/** Helper untuk query AMAN (dengan parameter). Gunakan untuk INSERT, UPDATE, DELETE. */
function qparams(string $sql, array $params) {
    $conn = get_pg_connection();
    $res = @pg_query_params($conn, $sql, $params);
    if ($res === false) {
        throw new RuntimeException("Query gagal: " . pg_last_error($conn));
    }
    return $res;
}

/** Helper untuk query SEDERHANA. Gunakan untuk SELECT. */
function q(string $sql) {
    $conn = get_pg_connection();
    $res = @pg_query($conn, $sql);
    if ($res === false) {
        throw new RuntimeException("Query gagal: " . pg_last_error($conn));
    }
    return $res;
}

?>