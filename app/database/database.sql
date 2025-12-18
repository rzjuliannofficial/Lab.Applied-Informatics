-- ==============================================================
-- 1. BERSIHKAN & PERSIAPKAN DATABASE
-- ==============================================================
DROP SCHEMA IF EXISTS public CASCADE;
CREATE SCHEMA public;

-- Ekstensi untuk UUID & Enkripsi Password
CREATE EXTENSION IF NOT EXISTS pgcrypto;

-- ==============================================================
-- 2. TIPE DATA ENUM
-- ==============================================================
CREATE TYPE public.member_jabatan AS ENUM ('ketua_lab', 'asisten_lab', 'member');
CREATE TYPE public.user_role AS ENUM ('admin', 'editor');

-- ==============================================================
-- 3. STRUKTUR TABEL (CREATE TABLE)
-- ==============================================================

-- A. Tabel Master: DOSEN
-- Menggunakan UUID (Tetap UUID karena bukan sequence angka)
CREATE TABLE public.dosen (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    nama character varying(255) NOT NULL,
    nip character varying(100),
    email character varying(255),
    foto_profil text,
    keahlian_text text,
    deskripsi text,
    jabatan public.member_jabatan,
    google_scholar text,
    researcher text,
    orcid text,
    CONSTRAINT dosen_pkey PRIMARY KEY (id)
);

-- B. Tabel Master: USERS (ID Reset -> 1)
CREATE TABLE public.users (
    id SERIAL NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    role public.user_role DEFAULT 'editor'::public.user_role NOT NULL,
    id_dosen uuid,
    CONSTRAINT users_pkey PRIMARY KEY (id),
    CONSTRAINT users_username_key UNIQUE (username)
);

-- C. Tabel Master: FASILITAS (ID Reset -> 1)
CREATE TABLE public.fasilitas (
    id_fasilitas SERIAL NOT NULL,
    nama_fasilitas character varying(255) NOT NULL,
    deskripsi text,
    kondisi character varying(50),
    foto text,
    CONSTRAINT fasilitas_pkey PRIMARY KEY (id_fasilitas)
);

-- D. Tabel Master: PRODUK (ID Reset -> 1)
CREATE TABLE public.produk (
    id SERIAL NOT NULL,
    nama_produk character varying(255) NOT NULL,
    deskripsi text,
    link_demo text,
    image text,
    kategori character varying(100),
    CONSTRAINT produk_pkey PRIMARY KEY (id)
);

-- E. Tabel Master: PARTNERS (ID Reset -> 1)
CREATE TABLE public.partners (
    id SERIAL NOT NULL,
    nama character varying(255) NOT NULL,
    logo text,
    website character varying(255),
    deskripsi text,
    kategori character varying(100),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT partners_pkey PRIMARY KEY (id)
);

-- F. Tabel Transaksi: KONTAK (ID Reset -> 1)
CREATE TABLE public.kontak (
    id SERIAL NOT NULL,
    nama character varying(100) NOT NULL,
    email character varying(150) NOT NULL,
    subject character varying(200) NOT NULL,
    isi text NOT NULL,
    tanggal timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT kontak_pkey PRIMARY KEY (id)
);

-- G. Tabel Konten: BERITA (ID Reset -> 1)
CREATE TABLE public.berita (
    id SERIAL NOT NULL,
    created_by uuid NOT NULL,
    judul character varying(255) NOT NULL,
    isi_berita text NOT NULL,
    tanggal date,
    gambar_utama text,
    kategori character varying(100),
    CONSTRAINT berita_pkey PRIMARY KEY (id)
);

-- H. Tabel Tri Dharma: AKTIVITAS DOSEN (ID Reset -> 1)
CREATE TABLE public.aktivitas_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    jenis_aktivitas character varying(255),
    tanggal date,
    deskripsi text,
    foto_url text,
    CONSTRAINT aktivitas_dosen_pkey PRIMARY KEY (id)
);

-- I. Tabel Tri Dharma: PUBLIKASI DOSEN (ID Reset -> 1)
CREATE TABLE public.publikasi_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    link_jurnal text,
    kategori character varying(100),
    deskripsi text,
    foto_url text,
    id_dosen_int integer,
    CONSTRAINT publikasi_dosen_pkey PRIMARY KEY (id)
);

-- J. Tabel Tri Dharma: RISET DOSEN (ID Reset -> 1)
CREATE TABLE public.riset_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    sumber_dana character varying(100),
    foto_url text,
    CONSTRAINT riset_dosen_pkey PRIMARY KEY (id)
);

-- K. Tabel Tri Dharma: PPM (ID Reset -> 1)
CREATE TABLE public.ppm (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun character varying(20),
    foto_url text,
    CONSTRAINT ppm_pkey PRIMARY KEY (id)
);

-- L. Tabel Tri Dharma: KEKAYAAN INTELEKTUAL (ID Reset -> 1)
CREATE TABLE public.kekayaan_intelektual (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    no_permohonan character varying(100),
    tahun character varying(20),
    foto_url text,
    CONSTRAINT kekayaan_intelektual_pkey PRIMARY KEY (id)
);

-- M. Tabel Pusat Media: GALERI (ID Reset -> 1)
CREATE TABLE public.galeri (
    id SERIAL NOT NULL,
    uploaded_by uuid NOT NULL,
    file_url text NOT NULL,
    caption character varying(255),
    id_berita integer,
    id_produk integer,
    id_fasilitas integer,
    tanggal_upload timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    kategori character varying(50),
    id_publikasi_dosen integer,
    id_aktivitas_dosen integer,
    id_ppm integer,
    id_riset_dosen integer,
    id_kekayaan_intelektual integer,
    CONSTRAINT galeri_pkey PRIMARY KEY (id)
);

-- ==============================================================
-- 4. INSERT DATA (ID Re-mapped starting from 1)
-- ==============================================================

-- 4.1 Data Dosen (UUID dipertahankan agar relasi aman)
INSERT INTO public.dosen (id, nama, nip, email, foto_profil, keahlian_text, deskripsi, jabatan, google_scholar, researcher, orcid) VALUES
('a0000000-0000-0000-0000-000000000006', 'M. Hasyim Ratsanjani, S.Kom., M.Kom.', '199302022021031002', 'hasyim.ratsanjani@polinema.ac.id', '/uploads/dosen/dosen_1764483374_ec096830a2.png', 'Information Extraction, Text Mining, Project Management, Social Media Analytics, Digital Image Processing', 'He received bachelor degree...', 'member', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000001', 'Yan Watequlis Syaifudin, S.T., M.MT., Ph.D.', '198101052005011005', 'yan.watequlis@polinema.ac.id', '/uploads/dosen/dosen_1764482269_543840b0dc.png', 'Cyber Security, AI, Network', 'Dosen Senior dan Peneliti...', 'ketua_lab', 'https://scholar.google.com/citations?user=H3IYHJUAAAAJ', 'https://www.researchgate.net/profile/Yan-Syaifudin', 'https://orcid.org/0000-0001-6582-3495'),
('a0000000-0000-0000-0000-000000000002', 'Pramana Yoga Saputra, S.Kom., M.MT.', '198305212006041003', 'pramana.yoga@polinema.ac.id', '/uploads/dosen/dosen_1765289948_2510da6057.png', 'Software Engineering, Mobile Dev', 'Koordinator pengembangan piranti lunak.', 'asisten_lab', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000007', 'Kadek Suarjuna Batubulan', '199103032019031003', 'kadek.suarjuna@polinema.ac.id', '/uploads/dosen/dosen_1765290051_c85d570902.png', 'Web Development, UI/UX', 'Spesialis antarmuka pengguna...', 'member', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000009', 'Retno Damayanti, S.Pd., M.Kom.', '198505052010122005', 'retno.damayanti@polinema.ac.id', '/uploads/dosen/dosen_1765290088_92a27fbac1.jpg', 'Education Technology, E-Learning', 'Pengembang media pembelajaran interaktif.', 'member', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000010', 'Triana Fatmawati, S.T., M.T.', '198706062012122006', 'triana.fatmawati@polinema.ac.id', '/uploads/dosen/dosen_1765290125_510fa22640.jpg', 'Network Security, Cryptography', 'Peneliti keamanan jaringan.', 'member', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000011', 'Yuri Ariyanto, S.Kom., M.Kom.', '198206272010121006', 'yuri.ariyanto@polinema.ac.id', '/uploads/dosen/dosen_1765290149_af0089edf3.png', 'Big Data, Data Analysis', 'Analis data berskala besar.', 'member', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000008', 'Noprianto, S.Kom., M.Eng.', '198904042018031004', 'noprianto@polinema.ac.id', '/uploads/dosen/dosen_1765290177_06715fc978.png', 'Internet Of Think, Computer Vision...', 'Fokus pada arsitektur cloud...', 'member', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000003', 'Mustika Mentari, S.Kom., M.Kom.', '198805042015042001', 'mustika.mentari@polinema.ac.id', '/uploads/dosen/dosen_1765290211_32b3e37393.png', 'Data Mining, DSS, AI', 'Peneliti aktif...', 'member', NULL, NULL, NULL),
('a0000000-0000-0000-0000-000000000004', 'Mochammad Afif Hendrawan, S.Kom.', '199001012019031001', 'afif.hendrawan@polinema.ac.id', '/uploads/dosen/dosen_1765290245_8338cd5bf9.jpg', 'Computer Vision, Image Processing', 'Fokus pada pengolahan citra digital.', 'member', NULL, NULL, NULL);

-- 4.2 Data Users (Reset ID 1..11)
INSERT INTO public.users (id, username, password, role, id_dosen) VALUES
(1, 'admin', '$2a$06$ppvUMlZUwv2CZ545KOCpFuVAgCtR7e2KaDeFtj/iJ17yKAz9HnYja', 'admin', 'a0000000-0000-0000-0000-000000000001'),
(2, 'pramana', '$2a$06$uRdGRIzsQsy3KLqjik70bOXIFFv1eU9954W9JH2Zk9LVAilb.LzIi', 'editor', 'a0000000-0000-0000-0000-000000000002'),
(3, 'mustika', '$2a$06$6OZJBzYgcyf0qUvb6mY2wuIgd6VVDObGsGA4INStjv.JAt5LFHp2.', 'editor', 'a0000000-0000-0000-0000-000000000003'),
(4, 'hasyim', '$2a$06$c.K9d6ck5QIe7TM55iJWJOVd3b.cWIDUyN7ImjKXmgcfTiSj4flmu', 'editor', 'a0000000-0000-0000-0000-000000000006'),
(5, 'kadek', '$2a$06$evkgyzYC5lz3EMSM.IHU0O9muqQdL6zfOANXKoEUtfY/gG06kk7Oa', 'editor', 'a0000000-0000-0000-0000-000000000007'),
(6, 'nopri', '$2a$06$VV7JQc9/K7yOC0yuSmiNO.0JRYJl/wMCTDsVfjXo1/t06WkeTymBC', 'editor', 'a0000000-0000-0000-0000-000000000008'),
(7, 'retno', '$2a$06$eSLwor3hLNSAnerc69.lMueLRIj/PQ6ToNzRWuT6Fnlae4SZGbbiW', 'editor', 'a0000000-0000-0000-0000-000000000009'),
(8, 'triana', '$2a$06$QhmLUkAw6TBFhQNT8BJBrOCmwURqhfItGEFnmo0jE27ohbFUwBMrm', 'editor', 'a0000000-0000-0000-0000-000000000010'),
(9, 'yuri', '$2a$06$QiwzDb0PzPgO48SrWWaaUO1RJRs0u1bVKR17hTUXPtU/cEWtjT79K', 'editor', 'a0000000-0000-0000-0000-000000000011'),
(10, 'chandra', '$2a$06$c56UE1pbJDgBd.zW5Ohqfuj1DZb04Tgpqqzi3vSbnazDbAfwwtFou', 'editor', NULL);

-- 4.3 Data Fasilitas (Reset ID 1..3)
INSERT INTO public.fasilitas (id_fasilitas, nama_fasilitas, deskripsi, kondisi, foto) VALUES
(1, 'Air Conditioner', 'Ada 3, bagian Lab sebelah barat semua ', 'baik', '/uploads/fasilitas/fasilitas_1765289400_cb04d75938.jpg'),
(2, 'Komputer', 'Komputer berjumlah 18 buah', 'baik', '/uploads/fasilitas/fasilitas_1765289558_ceae31380a.jpeg'),
(3, 'Meja Kerja', 'Total ada 16 meja kerja', 'baik', '/uploads/fasilitas/fasilitas_1765289797_f0264a0f03.jpg');

-- 4.4 Data Produk (Reset ID 1..6)
INSERT INTO public.produk (id, nama_produk, deskripsi, link_demo, image, kategori) VALUES
(1, 'AMATI', 'Automated Cyber Security Maturity Assessment...', '#', '/uploads/produk/amati.png', 'Security'),
(2, 'SEALS', 'Smart Adaptive Learning System...', '#', '/uploads/produk/seals.png', 'Education'),
(3, 'Agrilink Vocpro', 'Agricultural Vocational Professional Platform...', '#', '/uploads/produk/ijo-removebg-preview.png', 'Agriculture'),
(4, 'CrowdEquiChain', 'Blockchain-based Crowdfunding Platform...', '#', '/uploads/produk/logo_blockchain-1024x305.png', 'Blockchain'),
(5, 'OwnCloud Server', 'Private Cloud Storage Solution...', '#', '/uploads/produk/OwnCloud2-Logo.svg_-300x157.png', 'Cloud Storage'),
(6, 'Gitea', 'Self-hosted Git Service...', '#', '/uploads/produk/gitea-300x107-removebg-preview.png', 'DevOps');

-- 4.5 Data Partners (Reset ID 1..25)
INSERT INTO public.partners (id, nama, logo, website, deskripsi, kategori, created_at) VALUES
(1, 'Okayama University', '/uploads/partners/okayama.png', '#', 'Japan University', 'International Institutions', '2025-12-01 11:11:16'),
(2, 'DPUBM', '/uploads/partners/dpubm.png', '#', 'Public Works', 'Government Institutions', '2025-12-01 11:11:16'),
(3, 'Kota Batu', '/uploads/partners/batu.png', '#', 'City Government', 'Government Institutions', '2025-12-01 11:11:16'),
(4, 'BIN', '/uploads/partners/bin.png', '#', 'Intelligence Agency', 'Government Institutions', '2025-12-01 11:11:16'),
(5, 'Diskominfo Kota Batu', '/uploads/partners/diskominfo-batu.png', '#', 'Communication Office', 'Government Institutions', '2025-12-01 11:11:16'),
(6, 'Kominfo Jatim', '/uploads/partners/kominfo.png', '#', 'Regional Communication Office', 'Government Institutions', '2025-12-01 11:11:16'),
(7, 'ADS', '/uploads/partner/partner_1765290581_277df588de.png', 'https://www.google.com/', 'Technology Solutions', 'Industry Partner', '2025-12-01 11:11:16'),
(8, 'ARM Solusi', '/uploads/partner/partner_1765290672_11d2b34a80.jpg', 'https://www.google.com/', 'Software Development', 'Industry Partner', '2025-12-01 11:11:16'),
(9, 'Bumaji Sejantera', '/uploads/partner/partner_1765290755_fa4cbb77ca.png', 'https://www.google.com/', 'Agricultural Tech', 'Industry Partner', '2025-12-01 11:11:16'),
(10, 'DSG', '/uploads/partner/partner_1765290893_12a732e834.png', 'https://www.google.com/', 'Digital Solutions', 'Industry Partner', '2025-12-01 11:11:16'),
(11, 'PT Link Apisindo Media', '/uploads/partners/link.png', 'https://www.google.com/', 'Media & Tech', 'Industry Partner', '2025-12-01 11:11:16'),
(12, 'QuantumGrid', '/uploads/partners/quantum.png', 'https://www.google.com/', 'Cloud Services', 'Industry Partner', '2025-12-01 11:11:16'),
(13, 'Infonika Garasa', '/uploads/partner/partner_1765291227_de39f5bc2c.png', 'https://www.google.com/', 'IT Infrastructure', 'Industry Partner', '2025-12-01 11:11:16'),
(14, 'Utcero Indonesia', '/uploads/partner/partner_1765291364_7e48b1f615.jpg', 'https://www.google.com/', 'Tech Innovation', 'Industry Partner', '2025-12-01 11:11:16'),
(15, 'Sekawan Media', '/uploads/partner/partner_1765291400_b637b1c47e.png', 'https://www.google.com/', 'Digital Agency', 'Industry Partner', '2025-12-01 11:11:16'),
(16, 'Malang Creative Fusion', '/uploads/partner/partner_1765291451_2c5f0d15bc.png', 'https://www.google.com/', 'Creative Solutions', 'Industry Partner', '2025-12-01 11:11:16'),
(17, 'INSTIKI', '/uploads/partner/partner_1765291489_f018d3e568.png', 'https://www.google.com/', 'Technology Institute', 'Educational Institutions', '2025-12-01 11:11:16'),
(18, 'MCC', '/uploads/partner/partner_1765291870_145d85a67d.png', 'https://www.google.com/', 'Computing Center', 'Educational Institutions', '2025-12-01 11:11:16'),
(19, 'UNESA', '/uploads/partner/partner_1765291947_3fe4b6b5fd.png', 'https://www.google.com/', 'State University', 'Educational Institutions', '2025-12-01 11:11:16'),
(20, 'Politeknik Negeri Banyuwangi', '/uploads/partner/partner_1765292072_0b565b9a5c.png', 'https://www.google.com/', 'Polytechnic', 'Educational Institutions', '2025-12-01 11:11:16'),
(21, 'SMK Negeri 1', '/uploads/partner/partner_1765292125_dca63d406a.png', 'https://www.google.com/', 'Vocational School', 'Educational Institutions', '2025-12-01 11:11:16'),
(22, 'UIN Malang', '/uploads/partner/partner_1765292208_eae059b979.png', 'https://www.google.com/', 'Islamic University', 'Educational Institutions', '2025-12-01 11:11:16'),
(23, 'Politeknik Negeri Malang', '/uploads/partner/partner_1765292302_20ed21b965.png', 'https://www.google.com/', 'State Polytechnic', 'Educational Institutions', '2025-12-01 11:11:16'),
(24, 'ASTRAtech', '/uploads/partner/partner_1765292486_cf7a95e9e6.jpg', 'https://www.google.com/', 'Technical School', 'Educational Institutions', '2025-12-01 11:11:16'),
(25, 'Duke University', '/uploads/partner/partner_1765292625_11ce66560a.svg', 'https://www.google.com/', 'USA University', 'International Institutions', '2025-12-01 11:11:16');

-- 4.6 Data Berita (Reset ID 1..3)
INSERT INTO public.berita (id, created_by, judul, isi_berita, tanggal, gambar_utama, kategori) VALUES
(1, 'a0000000-0000-0000-0000-000000000001', 'Neve WordPress Theme Review...', 'WordPress themes in the official...', '1232-12-12', '/uploads/berita/berita_1764495622_951de4da8d.jpg', 'Future'),
(2, 'a0000000-0000-0000-0000-000000000001', 'Asesmen Lapangan Program Studi...', 'Pada hari Senin–Selasa...', '2025-11-11', NULL, 'Smartfarming, Teknologi'),
(3, 'a0000000-0000-0000-0000-000000000001', 'Implementasi Teknologi Smart Farming...', 'Implementasi Teknologi untuk Mendukung...', '2025-12-01', '/uploads/berita/berita_1764818185_d0afc2e48f.avif', 'Future');

-- 4.7 Data Kontak (Reset ID 1..3)
INSERT INTO public.kontak (id, nama, email, subject, isi, tanggal) VALUES
(1, 'Andi Saputra', 'andi@gmail.com', 'Permohonan Kerjasama', 'Saya ingin menjalin kerjasama...', '2025-12-04 14:27:17'),
(2, 'Budi Santoso', 'budi@yahoo.com', 'Pertanyaan Fasilitas', 'Apakah lab menyediakan fasilitas...', '2025-12-04 14:27:17'),
(3, 'Citra Dewi', 'citra@mail.com', 'Magang', 'Apakah Lab AI menerima mahasiswa...', '2025-12-04 14:27:17');

-- 4.8 Data PPM (Reset ID 1..3)
INSERT INTO public.ppm (id, id_dosen, judul, tahun, foto_url) VALUES
(1, 'a0000000-0000-0000-0000-000000000007', 'Sistem Informasi Manajemen Air Bersih', '2023', NULL),
(2, 'a0000000-0000-0000-0000-000000000001', 'Peningkatan Kualitas Pendidikan melalui E-Learning', '2023', NULL),
(3, 'a0000000-0000-0000-0000-000000000001', 'Optimalisasi Energi Terbarukan di Lingkungan Kampus', '2024', NULL);

-- 4.9 Data Riset (Reset ID 1..4)
INSERT INTO public.riset_dosen (id, id_dosen, judul, tahun, sumber_dana, foto_url) VALUES
(1, 'a0000000-0000-0000-0000-000000000001', 'Pengembangan Algoritma Machine Learning untuk Prediksi Cuaca', 2022, 'Kemdikbud', NULL),
(2, 'a0000000-0000-0000-0000-000000000010', 'Analisis Efektivitas Pembelajaran Online di Perguruan Tinggi', 2024, 'Hibah Internal', NULL),
(3, 'a0000000-0000-0000-0000-000000000011', 'Penerapan IoT untuk Monitoring Lingkungan Perkotaan', 2025, 'Mandiri', NULL),
(4, 'a0000000-0000-0000-0000-000000000011', 'Optimalisasi Big Data untuk Prediksi Tren Pendidikan', 2025, 'Kemdikbud', NULL);

-- 4.10 Data Publikasi (Reset ID 1..3)
INSERT INTO public.publikasi_dosen (id, id_dosen, judul, tahun, link_jurnal, kategori, deskripsi, foto_url) VALUES
(1, 'a0000000-0000-0000-0000-000000000002', 'Penerapan IoT pada Sistem Monitoring Lingkungan', 2024, 'https://example.com/iot-environment', 'Konferensi Nasional', 'Studi tentang penggunaan...', '/uploads/galeri_dosen/pubdosen_1764817660_3570e0070f.jpg'),
(2, 'a0000000-0000-0000-0000-000000000001', 'Analisis Machine Learning untuk Prediksi Cuaca', 2023, 'https://example.com/jurnal-cuaca-ml', 'Jurnal Internasional', 'Penelitian ini membahas...', '/uploads/galeri_dosen/pubdosen_1764817602_5cf1e37d38.png'),
(3, 'a0000000-0000-0000-0000-000000000004', 'Perancangan Sistem Informasi Akademik Berbasis Web', 2022, 'https://example.com/sia-web', 'Jurnal Nasional Terakreditasi', 'Pengembangan sistem informasi...', '/uploads/galeri_dosen/pubdosen_1764817524_7dcf41f5d5.jpg');

-- 4.11 Data Aktivitas (Reset ID 1..2)
INSERT INTO public.aktivitas_dosen (id, id_dosen, judul, jenis_aktivitas, tanggal, deskripsi, foto_url) VALUES
(1, 'a0000000-0000-0000-0000-000000000001', 'Workshop Penulisan Jurnal Internasional', 'Workshop', '2025-12-12', 'Workshop intensif...', NULL),
(2, 'a0000000-0000-0000-0000-000000000001', 'Pelatihan AI Nasional', 'Pelatihan', '2025-12-05', 'Pelatihan AI untuk meningkatkan...', '/uploads/galeri_dosen/aktdosen_1764818111_fcaf200b50.jpg');

-- 4.12 Data Kekayaan Intelektual (Reset ID 1..2)
INSERT INTO public.kekayaan_intelektual (id, id_dosen, judul, no_permohonan, tahun, foto_url) VALUES
(1, 'a0000000-0000-0000-0000-000000000006', 'Alat Deteksi Kualitas Air Otomatis', 'KI-002/2023', '2023', NULL),
(2, 'a0000000-0000-0000-0000-000000000002', 'Sistem Otomatisasi Laboratorium Kimia', 'KI-001/2024', '2024', NULL);

-- 4.13 Data Galeri (Foreign Keys telah disesuaikan manual ke ID baru)
INSERT INTO public.galeri (id, uploaded_by, file_url, caption, id_berita, id_produk, id_fasilitas, tanggal_upload, kategori, id_publikasi_dosen, id_aktivitas_dosen, id_ppm, id_riset_dosen, id_kekayaan_intelektual) VALUES
(1, 'a0000000-0000-0000-0000-000000000001', '/uploads/berita/berita_1764495622_951de4da8d.jpg', NULL, 1, NULL, NULL, '2025-11-30 16:40:22', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'a0000000-0000-0000-0000-000000000001', '/uploads/galeri_dosen/hki_1764579253_46a14c5b19.png', 'Kunjungan Industri ke Lab AI Polinema', NULL, NULL, NULL, '2025-12-01 15:54:13', 'Kekayaan Intelektual', NULL, NULL, NULL, NULL, 1),
(3, 'a0000000-0000-0000-0000-000000000001', '/uploads/fasilitas/fasilitas_1764495747_9d7d572b6c.png', 'Sekarang wis wayae', NULL, NULL, NULL, '2025-11-30 16:42:27', 'Produk', NULL, NULL, NULL, NULL, NULL),
(4, 'a0000000-0000-0000-0000-000000000001', '/uploads/galeri_dosen/pubdosen_1764817524_7dcf41f5d5.jpg', 'Perancangan Sistem Informasi Akademik', NULL, NULL, NULL, '2025-12-04 10:05:24', 'Publikasi Dosen', 3, NULL, NULL, NULL, NULL),
(5, 'a0000000-0000-0000-0000-000000000001', '/uploads/galeri_dosen/pubdosen_1764817602_5cf1e37d38.png', 'Analisis Machine Learning Cuaca', NULL, NULL, NULL, '2025-12-04 10:06:42', 'Publikasi Dosen', 2, NULL, NULL, NULL, NULL),
(6, 'a0000000-0000-0000-0000-000000000001', '/uploads/galeri_dosen/pubdosen_1764817660_3570e0070f.jpg', 'Penerapan IoT Monitoring', NULL, NULL, NULL, '2025-12-04 10:07:40', 'Publikasi Dosen', 1, NULL, NULL, NULL, NULL),
(7, 'a0000000-0000-0000-0000-000000000001', '/uploads/galeri_dosen/aktdosen_1764818111_fcaf200b50.jpg', 'Pelatihan AI Nasional', NULL, NULL, NULL, '2025-12-04 10:15:11', 'Aktivitas Dosen', NULL, 2, NULL, NULL, NULL),
(8, 'a0000000-0000-0000-0000-000000000001', '/uploads/galeri_dosen/aktdosen_1764818129_e52b34983d.jpg', 'Workshop Penulisan Jurnal', NULL, NULL, NULL, '2025-12-04 10:15:29', 'Aktivitas Dosen', NULL, 1, NULL, NULL, NULL),
(9, 'a0000000-0000-0000-0000-000000000001', '/uploads/produk/produk_1764835326_8410d6da5f.png', NULL, NULL, NULL, NULL, '2025-12-04 15:02:06', 'Produk', NULL, NULL, NULL, NULL, NULL),
(10, 'a0000000-0000-0000-0000-000000000001', '/uploads/fasilitas/fasilitas_1765289400_cb04d75938.jpg', NULL, NULL, NULL, 1, '2025-12-09 21:10:01', 'Fasilitas', NULL, NULL, NULL, NULL, NULL),
(11, 'a0000000-0000-0000-0000-000000000001', '/uploads/fasilitas/fasilitas_1765289558_ceae31380a.jpeg', NULL, NULL, NULL, 2, '2025-12-09 21:12:39', 'Fasilitas', NULL, NULL, NULL, NULL, NULL),
(12, 'a0000000-0000-0000-0000-000000000001', '/uploads/fasilitas/fasilitas_1765289797_f0264a0f03.jpg', NULL, NULL, NULL, 3, '2025-12-09 21:16:37', 'Fasilitas', NULL, NULL, NULL, NULL, NULL),
(13, 'a0000000-0000-0000-0000-000000000001', '/uploads/galeri_dosen/aktdosen_1764818087_381b4e8322.jpg', 'Nasional Teknologi Pendidikan', NULL, NULL, NULL, '2025-12-04 10:14:47', 'Aktivitas Dosen', NULL, NULL, NULL, NULL, NULL);

-- ==============================================================
-- 5. FOREIGN KEYS & RELASI
-- ==============================================================
ALTER TABLE ONLY public.aktivitas_dosen ADD CONSTRAINT aktivitas_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;
ALTER TABLE ONLY public.berita ADD CONSTRAINT berita_created_by_fkey FOREIGN KEY (created_by) REFERENCES public.dosen(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_akt_dosen FOREIGN KEY (id_aktivitas_dosen) REFERENCES public.aktivitas_dosen(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_berita FOREIGN KEY (id_berita) REFERENCES public.berita(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_fasilitas FOREIGN KEY (id_fasilitas) REFERENCES public.fasilitas(id_fasilitas) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_ki FOREIGN KEY (id_kekayaan_intelektual) REFERENCES public.kekayaan_intelektual(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_ppm FOREIGN KEY (id_ppm) REFERENCES public.ppm(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_produk FOREIGN KEY (id_produk) REFERENCES public.produk(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_pubdosen FOREIGN KEY (id_publikasi_dosen) REFERENCES public.publikasi_dosen(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_riset FOREIGN KEY (id_riset_dosen) REFERENCES public.riset_dosen(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.galeri ADD CONSTRAINT fk_galeri_uploaded_by_dosen FOREIGN KEY (uploaded_by) REFERENCES public.dosen(id) ON DELETE CASCADE;
ALTER TABLE ONLY public.users ADD CONSTRAINT fk_user_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.kekayaan_intelektual ADD CONSTRAINT kekayaan_intelektual_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;
ALTER TABLE ONLY public.ppm ADD CONSTRAINT ppm_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;
ALTER TABLE ONLY public.publikasi_dosen ADD CONSTRAINT publikasi_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL;
ALTER TABLE ONLY public.riset_dosen ADD CONSTRAINT riset_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;

-- ==============================================================
-- 6. RESET SEQUENCE (AUTO INCREMENT)
-- ==============================================================
SELECT setval('public.users_id_seq', (SELECT MAX(id) FROM public.users));
SELECT setval('public.berita_id_seq', (SELECT MAX(id) FROM public.berita));
SELECT setval('public.fasilitas_id_fasilitas_seq', (SELECT MAX(id_fasilitas) FROM public.fasilitas));
SELECT setval('public.produk_id_seq', (SELECT MAX(id) FROM public.produk));
SELECT setval('public.partners_id_seq', (SELECT MAX(id) FROM public.partners));
SELECT setval('public.kontak_id_seq', (SELECT MAX(id) FROM public.kontak));
SELECT setval('public.aktivitas_dosen_id_seq', (SELECT MAX(id) FROM public.aktivitas_dosen));
SELECT setval('public.publikasi_dosen_id_seq', (SELECT MAX(id) FROM public.publikasi_dosen));
SELECT setval('public.riset_dosen_id_seq', (SELECT MAX(id) FROM public.riset_dosen));
SELECT setval('public.ppm_id_seq', (SELECT MAX(id) FROM public.ppm));
SELECT setval('public.kekayaan_intelektual_id_seq', (SELECT MAX(id) FROM public.kekayaan_intelektual));
SELECT setval('public.galeri_id_seq', (SELECT MAX(id) FROM public.galeri));