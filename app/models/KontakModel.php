<?php

class KontakModel extends Model
{
    protected $table = "kontak";

    // Ambil semua pesan kontak
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $res = pg_query($this->db, $sql);

        $rows = [];
        while ($row = pg_fetch_assoc($res)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // Tambah data kontak
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (nama, email, subject, isi)
                VALUES ($1, $2, $3, $4)";
        return pg_query_params($this->db, $sql, $data);
    }

    // Hapus data
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = $1";
        return pg_query_params($this->db, $sql, [$id]);
    }

    // Cari berdasarkan ID
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = $1 LIMIT 1";
        $res = pg_query_params($this->db, $sql, [$id]);
        return $res ? pg_fetch_assoc($res) : null;
    }
}
