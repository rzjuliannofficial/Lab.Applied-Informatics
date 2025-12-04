<?php
class PublikasiDosen extends Model {
    protected $table = "publikasi_dosen";

    public function getAll() 
    {
        $sql = "SELECT pd.*, d.nama AS nama_dosen
                FROM publikasi_dosen pd
                LEFT JOIN dosen d ON d.id = pd.id_dosen
                ORDER BY pd.id DESC";
        $res = pg_query($this->db, $sql);
        $rows = [];
        while ($row = pg_fetch_assoc($res)) $rows[] = $row;
        return $rows;
    }
    
    public function getByDosen($id)
    {
        $sql = "SELECT pd.*, d.nama AS nama_dosen
                FROM publikasi_dosen pd
                LEFT JOIN dosen d ON d.id = pd.id_dosen
                WHERE pd.id_dosen = $1
                ORDER BY pd.id DESC";
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

    public function createAndReturnId($params)
    {
        
        $sql = "INSERT INTO {$this->table} 
                (id_dosen, judul, deskripsi, tahun, link_jurnal, kategori, foto_url) 
                VALUES ($1,$2,$3,$4,$5,$6,$7)
                RETURNING id";
        $res = pg_query_params($this->db, $sql, $params);
        $row = pg_fetch_assoc($res);
        return $row['id'];
    }

    public function updatePublikasi($id, $params) {
        // Tambahkan parameter ke-7 untuk foto_url
        $sql = "UPDATE {$this->table} SET id_dosen=$1, judul=$2, deskripsi=$3, tahun=$4, link_jurnal=$5, kategori=$6, foto_url=$7 WHERE id=$8";
        return pg_query_params($this->db, $sql, array_merge($params, [$id]));
    }
    
    public function countAll()
    {
        $sql = "SELECT COUNT(*) AS total FROM {$this->table}";
        $res = pg_query($this->db, $sql);
        $row = pg_fetch_assoc($res);
        return $row ? intval($row['total']) : 0;
    }
    
    public function delete($id) {
        return pg_query_params($this->db, "DELETE FROM {$this->table} WHERE id=$1", [$id]);
    }
    
}
