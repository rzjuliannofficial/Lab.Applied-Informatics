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
                    b.judul   AS judul_berita,
                    pr.nama_produk,
                    f.nama_fasilitas,
                    pd.judul AS judul_pub_dosen,
                    ad.judul AS judul_akt_dosen,
                    ppm.judul AS judul_ppm,
                    rd.judul AS judul_riset,
                    ki.judul AS judul_ki
                FROM galeri g
                LEFT JOIN dosen d ON d.id = g.uploaded_by
                LEFT JOIN berita         b ON b.id = g.id_berita
                LEFT JOIN produk         pr ON pr.id = g.id_produk
                LEFT JOIN fasilitas      f ON f.id_fasilitas = g.id_fasilitas
                -- Join ke tabel baru
                LEFT JOIN publikasi_dosen pd ON pd.id = g.id_publikasi_dosen
                LEFT JOIN aktivitas_dosen ad ON ad.id = g.id_aktivitas_dosen
                LEFT JOIN ppm             ppm ON ppm.id = g.id_ppm
                LEFT JOIN riset_dosen     rd ON rd.id = g.id_riset_dosen
                LEFT JOIN kekayaan_intelektual ki ON ki.id = g.id_kekayaan_intelektual
                ORDER BY g.id DESC";

        return $this->fetchAll($sql);
    }

    // --- METHOD KHUSUS FETCH PER KATEGORI BARU ---

    public function getByPublikasiDosen() {
        $sql = "SELECT g.id, g.file_url, g.caption, g.tanggal_upload, pd.judul, d.nama AS uploaded_by, 'Publikasi Dosen' AS category
                FROM galeri g JOIN publikasi_dosen pd ON pd.id = g.id_publikasi_dosen
                LEFT JOIN dosen d ON d.id = g.uploaded_by ORDER BY g.tanggal_upload DESC";
        return $this->fetchAll($sql);
    }

    public function getByAktivitasDosen() {
        $sql = "SELECT g.id, g.file_url, g.caption, g.tanggal_upload, ad.judul, d.nama AS uploaded_by, 'Aktivitas Dosen' AS category
                FROM galeri g JOIN aktivitas_dosen ad ON ad.id = g.id_aktivitas_dosen
                LEFT JOIN dosen d ON d.id = g.uploaded_by ORDER BY g.tanggal_upload DESC";
        return $this->fetchAll($sql);
    }

    public function getByPpm() {
        $sql = "SELECT g.id, g.file_url, g.caption, g.tanggal_upload, ppm.judul, d.nama AS uploaded_by, 'PPM' AS category
                FROM galeri g JOIN ppm ON ppm.id = g.id_ppm
                LEFT JOIN dosen d ON d.id = g.uploaded_by ORDER BY g.tanggal_upload DESC";
        return $this->fetchAll($sql);
    }

    public function getByRiset() {
        $sql = "SELECT g.id, g.file_url, g.caption, g.tanggal_upload, rd.judul, d.nama AS uploaded_by, 'Riset' AS category
                FROM galeri g JOIN riset_dosen rd ON rd.id = g.id_riset_dosen
                LEFT JOIN dosen d ON d.id = g.uploaded_by ORDER BY g.tanggal_upload DESC";
        return $this->fetchAll($sql);
    }

    public function getByKI() {
        $sql = "SELECT g.id, g.file_url, g.caption, g.tanggal_upload, ki.judul, d.nama AS uploaded_by, 'HKI' AS category
                FROM galeri g JOIN kekayaan_intelektual ki ON ki.id = g.id_kekayaan_intelektual
                LEFT JOIN dosen d ON d.id = g.uploaded_by ORDER BY g.tanggal_upload DESC";
        return $this->fetchAll($sql);
    }

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
        // data: [uploaded_by, file_url, caption, id_berita, id_produk, id_fasilitas, 
        //        id_publikasi_dosen, id_aktivitas_dosen, id_ppm, id_riset_dosen, 
        //        id_kekayaan_intelektual, kategori]
        $sql = "INSERT INTO {$this->table}
                (uploaded_by, file_url, caption, id_berita, id_produk, id_fasilitas, 
                 id_publikasi_dosen, id_aktivitas_dosen, id_ppm, id_riset_dosen, 
                 id_kekayaan_intelektual, kategori)
                VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12)";
        return pg_query_params($this->db, $sql, $data);
    }

    public function updateCaption($id, $caption, $kategori = null)
    {
        $sql = "UPDATE {$this->table} SET caption=$1, kategori=$2 WHERE id=$3";
        return pg_query_params($this->db, $sql, [$caption, $kategori, $id]);
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
