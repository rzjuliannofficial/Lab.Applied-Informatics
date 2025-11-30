<?php

class Galeri extends Model {
    protected $table = "galeri";

    /**
     * Ambil semua galeri dengan data lengkap (untuk dashboard)
     */
    public function getAll()
    {
        $sql = "SELECT 
                    g.*,
                    d.nama AS nama_uploader,
                    pl.judul  AS judul_penelitian,
                    kl.judul  AS judul_kegiatan,
                    publ.judul AS judul_publikasi_lab,
                    b.judul   AS judul_berita,
                    pr.nama_produk,
                    f.nama_fasilitas
                FROM galeri g
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                LEFT JOIN penelitian_lab pl ON pl.id = g.id_penelitian
                LEFT JOIN kegiatan_lab   kl ON kl.id = g.id_kegiatan_lab
                LEFT JOIN publikasi_lab  publ ON publ.id = g.id_publikasi_lab
                LEFT JOIN berita         b ON b.id = g.id_berita
                LEFT JOIN produk         pr ON pr.id = g.id_produk
                LEFT JOIN fasilitas      f ON f.id_fasilitas = g.id_fasilitas
                ORDER BY g.id DESC";

        return $this->fetchAll($sql);
    }

    /**
     * Ambil galeri berdasarkan kategori publikasi lab
     */
    public function getByPublikasiLab()
    {
        $sql = "SELECT 
                    g.id,
                    g.file_url,
                    g.caption,
                    g.tanggal_upload,
                    pl.judul,
                    d.nama AS uploaded_by,
                    'Publikasi Lab' AS category
                FROM galeri g
                LEFT JOIN publikasi_lab pl ON pl.id = g.id_publikasi_lab
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                WHERE g.id_publikasi_lab IS NOT NULL
                ORDER BY g.tanggal_upload DESC";
        
        return $this->fetchAll($sql);
    }

    /**
     * Ambil galeri berdasarkan kategori berita
     */
    public function getByBerita()
    {
        $sql = "SELECT 
                    g.id,
                    g.file_url,
                    g.caption,
                    g.tanggal_upload,
                    b.judul,
                    d.nama AS uploaded_by,
                    'Berita' AS category
                FROM galeri g
                LEFT JOIN berita b ON b.id = g.id_berita
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                WHERE g.id_berita IS NOT NULL
                ORDER BY g.tanggal_upload DESC";
        
        return $this->fetchAll($sql);
    }

    /**
     * Ambil galeri berdasarkan kategori produk
     */
    public function getByProduk()
    {
        $sql = "SELECT 
                    g.id,
                    g.file_url,
                    g.caption,
                    g.tanggal_upload,
                    pr.nama_produk AS judul,
                    d.nama AS uploaded_by,
                    'Produk' AS category
                FROM galeri g
                LEFT JOIN produk pr ON pr.id = g.id_produk
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                WHERE g.id_produk IS NOT NULL
                ORDER BY g.tanggal_upload DESC";
        
        return $this->fetchAll($sql);
    }

    /**
     * Ambil galeri berdasarkan kategori fasilitas
     */
    public function getByFasilitas()
    {
        $sql = "SELECT 
                    g.id,
                    g.file_url,
                    g.caption,
                    g.tanggal_upload,
                    f.nama_fasilitas AS judul,
                    d.nama AS uploaded_by,
                    'Fasilitas' AS category
                FROM galeri g
                LEFT JOIN fasilitas f ON f.id_fasilitas = g.id_fasilitas
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                WHERE g.id_fasilitas IS NOT NULL
                ORDER BY g.tanggal_upload DESC";
        
        return $this->fetchAll($sql);
    }

    /**
     * Ambil galeri berdasarkan kategori penelitian lab
     */
    public function getByPenelitianLab()
    {
        $sql = "SELECT 
                    g.id,
                    g.file_url,
                    g.caption,
                    g.tanggal_upload,
                    pl.judul,
                    d.nama AS uploaded_by,
                    'Penelitian Lab' AS category
                FROM galeri g
                LEFT JOIN penelitian_lab pl ON pl.id = g.id_penelitian
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                WHERE g.id_penelitian IS NOT NULL
                ORDER BY g.tanggal_upload DESC";
        
        return $this->fetchAll($sql);
    }

    /**
     * Ambil galeri berdasarkan kategori kegiatan lab
     */
    public function getByKegiatanLab()
    {
        $sql = "SELECT 
                    g.id,
                    g.file_url,
                    g.caption,
                    g.tanggal_upload,
                    kl.judul,
                    d.nama AS uploaded_by,
                    'Kegiatan Lab' AS category
                FROM galeri g
                LEFT JOIN kegiatan_lab kl ON kl.id = g.id_kegiatan_lab
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                WHERE g.id_kegiatan_lab IS NOT NULL
                ORDER BY g.tanggal_upload DESC";
        
        return $this->fetchAll($sql);
    }

    /**
     * Helper function untuk fetch all dengan query custom
     */
    private function fetchAll($sql)
    {
        $res = pg_query($this->db, $sql);
        if (!$res) {
            echo "SQL ERROR: " . pg_last_error($this->db);
            return [];
        }
        
        $rows = [];
        while ($row = pg_fetch_assoc($res)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id=$1";
        $res = pg_query_params($this->db, $sql, [$id]);
        return $res ? pg_fetch_assoc($res) : null;
    }

    public function create($data)
    {
        // data: [uploaded_by, file_url, caption, id_penelitian, id_kegiatan_lab, id_publikasi_lab, id_berita, id_produk, id_fasilitas]
        $sql = "INSERT INTO {$this->table}
                (uploaded_by, file_url, caption, id_penelitian, id_kegiatan_lab, id_publikasi_lab, id_berita, id_produk, id_fasilitas)
                VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9)";
        return pg_query_params($this->db, $sql, $data);
    }

    public function updateCaption($id, $caption)
    {
        $sql = "UPDATE {$this->table} SET caption=$1 WHERE id=$2";
        return pg_query_params($this->db, $sql, [$caption, $id]);
    }

    public function delete($id)
    {
        // Hanya hapus record galeri, BUKAN file fisiknya,
        // karena file masih dipakai di fitur asal (produk/fasilitas/berita dst).
        return pg_query_params($this->db,
            "DELETE FROM {$this->table} WHERE id=$1",
            [$id]
        );
    }
}
