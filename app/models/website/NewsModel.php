<?php
class NewsModel extends Model {
    private $conn;
    
    public function __construct()
    {
        $this->conn = Database::connect();
    }

    /**
     * Ambil berita terbaru dengan limit (untuk Homepage)
     */
    public function fetchLatestNews() {
        $sql = "SELECT 
                    b.id, 
                    b.judul, 
                    b.isi_berita, 
                    b.tanggal, 
                    b.gambar_utama,
                    b.kategori,
                    d.nama AS nama_pembuat,
                    d.jabatan AS jabatan_penulis
                FROM 
                    public.berita b
                JOIN 
                    public.dosen d ON b.created_by = d.id 
                ORDER BY b.tanggal DESC 
                LIMIT 3";

        $result = pg_query($this->conn, $sql);

        if (!$result) return [];

        $data = [];
        while ($row = pg_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Ambil SEMUA berita (untuk Halaman News Index)
     */
    public function fetchAllNews() {
        $sql = "SELECT 
                    b.id, 
                    b.judul, 
                    b.isi_berita, 
                    b.tanggal, 
                    b.gambar_utama,
                    b.kategori,
                    d.nama AS nama_pembuat
                FROM 
                    public.berita b
                JOIN 
                    public.dosen d ON b.created_by = d.id 
                ORDER BY b.tanggal DESC";

        $result = pg_query($this->conn, $sql);
        if (!$result) return [];

        $data = [];
        while ($row = pg_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Ambil detail SATU berita berdasarkan ID
     */
    public function fetchNewsById($id) {
        $sql = "SELECT 
                    b.*, 
                    d.nama AS nama_pembuat,
                    d.foto_profil AS foto_penulis,
                    d.jabatan AS jabatan_penulis
                FROM 
                    public.berita b
                JOIN 
                    public.dosen d ON b.created_by = d.id 
                WHERE b.id = $1";

        $result = pg_query_params($this->conn, $sql, [$id]);

        if (!$result) return null;

        return pg_fetch_assoc($result);
    }
}