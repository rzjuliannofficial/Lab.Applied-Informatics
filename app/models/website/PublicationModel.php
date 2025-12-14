<?php

class PublicationModel extends Model
{
    private $conn;

    public function __construct(){
        $this->conn = Database::connect();
    }

    public function FetchPublication(){
        $sql = " SELECT pd.*, d.nama AS nama_dosen
                FROM publikasi_dosen pd
                LEFT JOIN dosen d ON d.id = pd.id_dosen
                ORDER BY pd.id DESC limit 3";

        $result = pg_query($this->conn, $sql);

        if (!$result) {
            echo "SQL ERROR: " . pg_last_error($this->conn);
            return [];
        }

        $data = [];

        while ($row = pg_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}