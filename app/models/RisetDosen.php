<?php

class RisetDosen extends Model
{
    protected $table = "riset_dosen";

    public function getAll()
    {
        $sql = "SELECT r.*, d.nama AS nama_dosen
                FROM riset_dosen r
                JOIN dosen d ON d.id = r.id_dosen
                ORDER BY r.id DESC";

        $res = pg_query($this->db, $sql);
        $rows = [];
        while ($row = pg_fetch_assoc($res)) $rows[] = $row;

        return $rows;
    }

    public function getByDosen($id)
    {
        $sql = "SELECT r.*, d.nama AS nama_dosen
                FROM riset_dosen r
                JOIN dosen d ON d.id = r.id_dosen
                WHERE r.id_dosen = $1
                ORDER BY r.id DESC";

        $res = pg_query_params($this->db, $sql, [$id]);
        $rows = [];
        while ($row = pg_fetch_assoc($res)) $rows[] = $row;

        return $rows;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id=$1";
        $res = pg_query_params($this->db, $sql, [$id]);

        return $res ? pg_fetch_assoc($res) : null;
    }

    public function create($params)
    {
        $sql = "INSERT INTO {$this->table}
                (id_dosen, judul, tahun, sumber_dana)
                VALUES ($1,$2,$3,$4)";

        return pg_query_params($this->db, $sql, $params);
    }
    public function createAndReturnId($params) {
        $sql = "INSERT INTO {$this->table} (id_dosen, judul, tahun, sumber_dana, foto_url)
        VALUES ($1,$2,$3,$4,$5)
        RETURNING id";
        $res = pg_query_params($this->db, $sql, $params);
        $row = pg_fetch_assoc($res);
        return $row['id'];
    }

    public function updateRiset($id, $params) {
        $sql = "UPDATE {$this->table} SET id_dosen=$1, judul=$2, tahun=$3, sumber_dana=$4, foto_url=$5 WHERE id=$6";
        return pg_query_params($this->db, $sql, array_merge($params, [$id]));
    }

    public function delete($id)
    {
        return pg_query_params($this->db, 
            "DELETE FROM {$this->table} WHERE id=$1",
            [$id]
        );
    }
}