<?php 

class Partners extends Model
{
    protected $table = 'partners';
    
    public function getAll() {
        $sql = "SELECT * FROM partners";
        $result = pg_query($this->db, $sql);
        $rows = [];
        while ($row = pg_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id=$id";
        $result = pg_query($this->db, $sql);
        return $result ? pg_fetch_assoc($result) : null; 
    }

    public function getByKategori($kategori) {
        $sql = "SELECT * FROM partners WHERE kategori = $kategori";
        $result = pg_query($this->db, $sql);
        $rows = [];
        while ($row = pg_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} 
        (nama, logo, website, deskripsi, kategori) 
        VALUES ($1, $2, $3, $4, $5)";

        return pg_query_params($this->db, $sql, [
            $data['nama'],
            $data['logo'] ?? null,
            $data['website'] ?? null,
            $data['deskripsi'] ?? null,
            $data['kategori']
        ]);
    }

    public function update($id, $data) {
        $sql = "SELECT * FROM partners WHERE id = $id";
        $old_result = pg_query($this->db, $sql);
        $old_data = [];
        while ($row = pg_fetch_assoc($old_result)) {
            $old_data[] = $row;
        }

        $sql = "UPDATE {$this->table} 
            SET nama = $1, 
                logo = $2, 
                website = $3, 
                deskripsi = $4, 
                kategori = $5
            WHERE id = $id";
        $parameters = [
            $data['nama'] ?? $old_data['nama'],
            $data['logo'] ?? $old_data['logo'],
            $data['website'] ?? $old_data['website'],
            $data['deskripsi'] ?? $old_data['deskripsi'],
            $data['kategori'] ?? $old_data['kategori'],
        ];

        return pg_query_params($this->db, $sql, $parameters);
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id=$id";
        return pg_query($this->db, $sql); 
    }

    public function countAll()
    {
        $sql = "SELECT COUNT(id) AS total FROM {$this->table}";
        $res = pg_query($this->db, $sql);
        if ($res !== false) {
            $row = pg_fetch_assoc($res);
            return (int) $row['total'];
        }
        return 0;
    }
}
?>