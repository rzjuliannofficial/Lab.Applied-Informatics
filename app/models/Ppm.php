<?php

class Ppm extends Model
{
    protected $table = "ppm";

    public function getAll()
    {
        $sql = "SELECT p.*, d.nama AS nama_dosen
                FROM ppm p
                JOIN dosen d ON d.id = p.id_dosen
                ORDER BY p.id DESC";

        $res = pg_query($this->db, $sql);

        $rows = [];
        while ($row = pg_fetch_assoc($res)) $rows[] = $row;

        return $rows;
    }

public function getByDosen($id)
    {
        $sql = "SELECT p.*, d.nama AS nama_dosen
                FROM ppm p
                JOIN dosen d ON d.id = p.id_dosen
                WHERE p.id_dosen = $1
                ORDER BY p.id DESC";

        $res = pg_query_params($this->db, $sql, [$id]);

        $rows = [];
        while ($row = pg_fetch_assoc($res)) $rows[] = $row;

        return $rows;
    }
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = $1";
        $res = pg_query_params($this->db, $sql, [$id]);

        return $res ? pg_fetch_assoc($res) : null;
    }

    public function create($params)
    {
        $sql = "INSERT INTO {$this->table}
                (id_dosen, judul, tahun)
                VALUES ($1, $2, $3)";

        return pg_query_params($this->db, $sql, $params);
    }
    public function createAndReturnId($params) {
        $sql = "INSERT INTO {$this->table} (id_dosen, judul, tahun, foto_url) VALUES ($1,$2,$3,$4) RETURNING id";
        $res = pg_query_params($this->db, $sql, $params);
        $row = pg_fetch_assoc($res);
        return $row['id'];
    }

    public function updatePpm($id, $params) {
        $sql = "UPDATE {$this->table} SET id_dosen=$1, judul=$2, tahun=$3, foto_url=$4 WHERE id=$5";
        return pg_query_params($this->db, $sql, array_merge($params, [$id]));
    }

    public function delete($id)
    {
        return pg_query_params($this->db,
            "DELETE FROM {$this->table} WHERE id=$1", [$id]
        );
    }
}