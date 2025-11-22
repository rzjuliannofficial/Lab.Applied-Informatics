-- Hapus objek lama (Untuk memastikan skrip bersih saat dijalankan)
DROP TABLE IF EXISTS public.aktivitas_dosen, public.kekayaan_intelektual, public.publikasi_lab, public.kegiatan_lab, public.penelitian_lab, public.publikasi_dosen, public.ppm, public.riset_dosen, public.berita, public.galeri, public.produk, public.fasilitas, public.users, public.dosen CASCADE;
DROP TYPE IF EXISTS public.user_role;
DROP EXTENSION IF EXISTS pgcrypto;

--- 1. EKSTENSI & TIPE KHUSUS (Dari Skema 1)
CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;

CREATE TYPE public.user_role AS ENUM (
    'admin',
    'editor'
);

--- 2. PEMBUATAN TABEL DOSEN (Menambahkan keahlian_text dari Skema 2)
CREATE TABLE public.dosen (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    nama character varying(255) NOT NULL,
    nip character varying(100),
    email character varying(255),
    foto_profil text,
    -- Kolom tambahan dari databaselagi.sql
    keahlian_text text,
    CONSTRAINT dosen_pkey PRIMARY KEY (id)
);

--- 3. PEMBUATAN TABEL USERS (ID SERIAL, Role ENUM, id_dosen NOT NULL)
CREATE TABLE public.users (
    id SERIAL NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    role public.user_role DEFAULT 'editor'::public.user_role NOT NULL,
    id_dosen uuid NOT NULL, -- Diubah menjadi NOT NULL
    email CHARACTER varying(255) UNIQUE,
    CONSTRAINT users_pkey PRIMARY KEY (id),
    CONSTRAINT users_username_key UNIQUE (username),
    CONSTRAINT fk_user_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

--- 4. TABEL-TABEL UTAMA LAINNYA (ID diubah menjadi SERIAL)

-- Aktivitas Dosen
CREATE TABLE public.aktivitas_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    jenis_aktivitas character varying(255),
    tanggal date,
    deskripsi text,
    CONSTRAINT aktivitas_dosen_pkey PRIMARY KEY (id),
    CONSTRAINT aktivitas_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Kekayaan Intelektual
CREATE TABLE public.kekayaan_intelektual (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    no_permohonan character varying(100),
    tahun character varying(20),
    CONSTRAINT kekayaan_intelektual_pkey PRIMARY KEY (id),
    CONSTRAINT kekayaan_intelektual_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);


ALTER TABLE public.publikasi_dosen
ADD COLUMN deskripsi text;
-- insert

-- Publikasi Lab
CREATE TABLE public.publikasi_lab (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    file_dokumen text,
    kategori character varying(100),
    CONSTRAINT publikasi_lab_pkey PRIMARY KEY (id),
    CONSTRAINT publikasi_lab_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL
);

-- Kegiatan Lab
CREATE TABLE public.kegiatan_lab (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    tanggal_kegiatan date,
    file_dokumentasi text,
    CONSTRAINT kegiatan_lab_pkey PRIMARY KEY (id),
    CONSTRAINT kegiatan_lab_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Penelitian Lab
CREATE TABLE public.penelitian_lab (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    status character varying(20),
    CONSTRAINT penelitian_lab_pkey PRIMARY KEY (id),
    CONSTRAINT penelitian_lab_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Publikasi Dosen
CREATE TABLE public.publikasi_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    tahun integer,
    link_jurnal text,
    kategori character varying(100),
    CONSTRAINT publikasi_dosen_pkey PRIMARY KEY (id),
    CONSTRAINT publikasi_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL
);

-- PPM (Pengabdian Kepada Masyarakat)
CREATE TABLE public.ppm (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    CONSTRAINT ppm_pkey PRIMARY KEY (id),
    CONSTRAINT ppm_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Riset Dosen
CREATE TABLE public.riset_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    sumber_dana character varying(100),
    CONSTRAINT riset_dosen_pkey PRIMARY KEY (id),
    CONSTRAINT riset_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Berita
CREATE TABLE public.berita (
    id SERIAL NOT NULL,
    created_by uuid NOT NULL,
    judul character varying(255) NOT NULL,
    isi_berita text NOT NULL,
    tanggal date,
    gambar_utama text,
    CONSTRAINT berita_pkey PRIMARY KEY (id),
    CONSTRAINT berita_created_by_fkey FOREIGN KEY (created_by) REFERENCES public.dosen(id) ON DELETE SET NULL
);

-- Fasilitas
CREATE TABLE public.fasilitas (
    id_fasilitas SERIAL NOT NULL,
    nama_fasilitas character varying(255) NOT NULL,
    deskripsi text,
    kondisi character varying(50),
    foto text,
    CONSTRAINT fasilitas_pkey PRIMARY KEY (id_fasilitas)
);

-- Produk
CREATE TABLE public.produk (
    id SERIAL NOT NULL,
    nama_produk character varying(255) NOT NULL,
    deskripsi text,
    link_demo text,
    image text,
    kategori character varying(100),
    CONSTRAINT produk_pkey PRIMARY KEY (id)
);

-- Galeri
CREATE TABLE public.galeri (
    id SERIAL NOT NULL,
    uploaded_by uuid NOT NULL,
    file_url text NOT NULL,
    caption character varying(255),
    id_penelitian integer,
    id_kegiatan_lab integer,
    id_publikasi_lab integer,
    id_berita integer,
    id_produk integer,
    id_fasilitas integer,
    CONSTRAINT galeri_pkey PRIMARY KEY (id),
    CONSTRAINT fk_galeri_uploaded_by_dosen FOREIGN KEY (uploaded_by) REFERENCES public.dosen(id) ON DELETE CASCADE,
    CONSTRAINT fk_galeri_penelitian FOREIGN KEY (id_penelitian) REFERENCES public.penelitian_lab(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_kegiatan_lab FOREIGN KEY (id_kegiatan_lab) REFERENCES public.kegiatan_lab(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_publikasi_lab FOREIGN KEY (id_publikasi_lab) REFERENCES public.publikasi_lab(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_berita FOREIGN KEY (id_berita) REFERENCES public.berita(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_produk FOREIGN KEY (id_produk) REFERENCES public.produk(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_fasilitas FOREIGN KEY (id_fasilitas) REFERENCES public.fasilitas(id_fasilitas) ON DELETE SET NULL
);



DELETE FROM public.galeri;
DELETE FROM public.publikasi_lab;
DELETE FROM public.publikasi_dosen;
DELETE FROM public.penelitian_lab;
DELETE FROM public.riset_dosen;
DELETE FROM public.kekayaan_intelektual;
DELETE FROM public.ppm;
DELETE FROM public.aktivitas_dosen;
DELETE FROM public.users;
DELETE FROM public.dosen;
DELETE FROM public.fasilitas;
DELETE FROM public.produk;
DELETE FROM public.berita;
DELETE FROM public.kegiatan_lab;


--- 1. INSERT DOSEN DAN USERS
------------------------------------------------------
INSERT INTO public.dosen (id, nama, nip, email, foto_profil, keahlian_text) VALUES
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', 'Dr. Rina Saraswati', '1975102001', 'rina.sarah@lab.id', '/img/dosen_rina.jpg', 'Deep Learning, NLP, Data Visualization'),
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', 'Ir. Joni Iskandar, M.Sc.', '1980051502', 'joni.iskan@lab.id', '/img/dosen_joni.jpg', 'IoT, Embedded Systems, Network Security'),
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', 'Dr. Kevin Sanjaya', '1988110103', 'kevin.san@lab.id', '/img/dosen_kevin.jpg', 'Web Development, Cloud Computing, Database System'),
('e4d7f193-488e-770f-b14d-3829574f6e78', 'Prof. Mira Lestari', '1965030804', 'mira.les@lab.id', '/img/dosen_mira.jpg', 'Robotics, Computer Vision, AI Ethics'),
('f5e872a4-599f-8817-c25e-493a68577f89', 'Naufal Rizky, S.T., M.T.', '1992072505', 'naufal.rizky@lab.id', '/img/dosen_naufal.jpg', 'Software Engineering, Mobile Apps, UX/UI Design'),
('a6f983b5-6a07-9928-d367-5a4b7968879a', 'Sonia Dewi, S.Kom., M.Kom.', '1990041206', 'sonia.d@lab.id', '/img/dosen_sonia.jpg', 'Big Data, Parallel Processing, Machine Learning Optimization');

INSERT INTO public.users (username, password, role, id_dosen) VALUES
('rina.admin', '123', 'admin', 'b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e'),
('joni.editor', '123', 'editor', 'c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f'),
('kevin.editor', '123', 'editor', 'd3c6e082-377d-6f9e-a03c-27184f3e5d67'),
('mira.admin', '123', 'admin', 'e4d7f193-488e-770f-b14d-3829574f6e78'),
('naufal.editor', '123', 'editor', 'f5e872a4-599f-8817-c25e-493a68577f89'),
('sonia.editor', '123', 'editor', 'a6f983b5-6a07-9928-d367-5a4b7968879a');


--- 2. INSERT AKTIVITAS DOSEN DAN PPM
------------------------------------------------------
INSERT INTO public.aktivitas_dosen (id_dosen, judul, jenis_aktivitas, tanggal, deskripsi) VALUES
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', 'Keynote Speaker: Data Science Summit', 'Seminar', '2025-10-15', 'Membawakan materi tentang kemajuan NLP di Indonesia.'),
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', 'Pelatihan Instalasi IoT Devices', 'Workshop', '2025-11-01', 'Pelatihan pemasangan sensor dan aktuator berbasis ESP32.'),
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', 'Menguji Keamanan Web Aplikasi Lab', 'Audit', '2025-09-20', 'Pengecekan rutin celah keamanan pada sistem informasi lab.'),
('e4d7f193-488e-770f-b14d-3829574f6e78', 'Reviewer Jurnal Internasional Robotika', 'Juri/Reviewer', '2025-08-05', 'Mereview 5 artikel ilmiah di bidang kontrol robot.'),
('f5e872a4-599f-8817-c25e-493a68577f89', 'Sosialisasi Standar Coding Modern', 'Sosialisasi', '2025-07-10', 'Memberikan edukasi tentang Clean Code dan Design Pattern.'),
('a6f983b5-6a07-9928-d367-5a4b7968879a', 'Lomba Data Mining Antar Mahasiswa', 'Lomba', '2025-06-25', 'Menyelenggarakan kompetisi pengolahan big data.');

INSERT INTO public.ppm (id_dosen, judul, tahun) VALUES
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', 'Pelatihan Dasar Pengolahan Data untuk Guru SMA', '2024'),
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', 'Instalasi Jaringan Internet Gratis di Area Pedalaman', '2023'),
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', 'Workshop Pembuatan Website Portofolio untuk Pelajar SMK', '2024'),
('e4d7f193-488e-770f-b14d-3829574f6e78', 'Edukasi Etika AI kepada Masyarakat Umum', '2025'),
('f5e872a4-599f-8817-c25e-493a68577f89', 'Pendampingan Pengembangan Aplikasi UMKM Lokal', '2023'),
('a6f983b5-6a07-9928-d367-5a4b7968879a', 'Sosialisasi Pentingnya Keamanan Data Pribadi', '2024');

--- 3. INSERT KEGIATAN LAB, FASILITAS, PRODUK, BERITA (Data Sumber Galeri)
-------------------------------------------------------------------------
INSERT INTO public.kegiatan_lab (id_dosen, judul, deskripsi, tanggal_kegiatan, file_dokumentasi) VALUES
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', 'Pelatihan Keamanan Web Dasar', 'Pelatihan untuk mengidentifikasi kerentanan XSS dan SQL Injection.', '2025-05-18', '/dok/keg_keamanan_web.pdf'), -- ID 1
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', 'Diskusi Proyek Akhir Deep Learning', 'Sesi presentasi dan kritik untuk proyek deep learning mahasiswa.', '2025-05-10', '/dok/keg_dl_proyek.pdf'),
('e4d7f193-488e-770f-b14d-3829574f6e78', 'Uji Coba Robot Pemindah Barang', 'Menguji algoritma gerak robot lengan di lingkungan lab.', '2025-04-25', '/dok/keg_robot_uji.pdf'),
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', 'Pemasangan Sensor Suhu Baru', 'Pekerjaan teknis pemasangan sensor suhu di server room.', '2025-03-01', '/dok/keg_sensor_pasang.pdf'),
('f5e872a4-599f-8817-c25e-493a68577f89', 'Sesi Brainstorming Aplikasi Mobile', 'Sesi untuk merancang fitur baru pada aplikasi lab.', '2025-02-15', '/dok/keg_mobile_apps.pdf'),
('a6f983b5-6a07-9928-d367-5a4b7968879a', 'Workshop Pengantar Data Mining', 'Pengenalan teknik data mining dasar menggunakan Python.', '2025-01-20', '/dok/keg_data_mining.pdf');

INSERT INTO public.fasilitas (nama_fasilitas, deskripsi, kondisi, foto) VALUES
('Server DL NVIDIA A100', 'Server komputasi intensif untuk Deep Learning, dilengkapi GPU NVIDIA A100.', 'Sangat Baik', '/img/fasilitas/server_a100.jpg'), -- ID 1
('Robot Lengan 6 Axis', 'Robot industri kecil dengan 6 derajat kebebasan untuk eksperimen robotika.', 'Baik', '/img/fasilitas/robot_lengan.jpg'),
('Lab Komputer Client', 'Ruangan lab dengan 30 unit PC spesifikasi tinggi untuk praktikum.', 'Baik', '/img/fasilitas/lab_client.jpg'),
('Drone Pengawas Otomatis', 'Drone dengan kamera resolusi tinggi untuk riset computer vision dan monitoring.', 'Perlu Kalibrasi', '/img/fasilitas/drone_oto.jpg'),
('Perangkat IoT Kit Lengkap', 'Set lengkap mikrokontroler, sensor, dan aktuator untuk pengembangan IoT.', 'Sangat Baik', '/img/fasilitas/iot_kit.jpg'),
('Ruang Diskusi Proyek', 'Ruangan kecil dengan fasilitas display dan whiteboard interaktif.', 'Baik', '/img/fasilitas/ruang_diskusi.jpg');

INSERT INTO public.berita (created_by, judul, isi_berita, tanggal, gambar_utama) VALUES
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', 'Lab AI Meraih Hibah Riset Rp 500 Juta', 'Dr. Rina Saraswati berhasil mendapatkan hibah besar untuk riset stunting.', '2025-11-15', '/img/berita/hibah_rina.jpg'),
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', 'Kolaborasi Lab dan Industri dalam Keamanan Cloud', 'Lab AI bekerja sama dengan TechCorp untuk pengamanan infrastruktur cloud.', '2025-11-01', '/img/berita/kolab_cloud.jpg'),
('e4d7f193-488e-770f-b14d-3829574f6e78', 'Robot Lengan Lab AI Dipamerkan di I-Tech Expo', 'Prototipe robot Prof. Mira menarik perhatian pengunjung di pameran teknologi.', '2025-10-20', '/img/berita/expo_robot.jpg'), -- ID 3
('f5e872a4-599f-8817-c25e-493a68577f89', 'Workshop UX/UI Sukses Diikuti Ratusan Peserta', 'Workshop yang diselenggarakan oleh Naufal Rizky mendapat antusiasme tinggi.', '2025-09-05', '/img/berita/workshop_ux.jpg'),
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', 'Peluncuran Jurnal IoT Baru oleh Dosen Lab', 'Ir. Joni Iskandar meluncurkan jurnal yang fokus pada teknologi LoRaWAN.', '2025-08-10', '/img/berita/jurnal_iot.jpg'),
('a6f983b5-6a07-9928-d367-5a4b7968879a', 'Seminar Big Data Menarik Minat Mahasiswa Pascasarjana', 'Sonia Dewi mengisi seminar tentang optimasi Machine Learning pada Big Data.', '2025-07-25', '/img/berita/seminar_bigdata.jpg');

INSERT INTO public.produk (nama_produk, deskripsi, link_demo, image, kategori) VALUES
('App Penterjemah Isyarat', 'Aplikasi mobile berbasis AI untuk menterjemahkan bahasa isyarat Indonesia ke teks.', 'http://demo.isyarat.app', '/img/produk/app_isyarat.jpg', 'Aplikasi Mobile'), -- ID 1
('Sistem Smart Home Lab', 'Prototipe sistem kendali rumah pintar berbasis IoT menggunakan platform lokal.', 'http://demo.smarthome.lab', '/img/produk/smarthome_proto.jpg', 'IoT'),
('Web Monitoring Energi', 'Dashboard web untuk memonitor konsumsi daya listrik server dan fasilitas lab.', 'http://monitor.energi.lab', '/img/produk/web_energi.jpg', 'Sistem Informasi'),
('Modul Pelatihan BERT', 'Modul siap pakai untuk pelatihan model Natural Language Processing (BERT).', 'http://modul.bert.lab', '/img/produk/modul_bert.jpg', 'Software Tool'),
('E-Learning Dashboard UX', 'Desain User Experience (UX) dan User Interface (UI) untuk platform e-learning kampus.', 'http://ux.elearn.lab', '/img/produk/ux_elearn.jpg', 'Desain Sistem'),
('Dataset Cuaca Kota A', 'Kumpulan data historis cuaca yang telah di-*cleaning* dan siap untuk analisis Big Data.', 'http://data.cuaca.lab', '/img/produk/data_cuaca.jpg', 'Dataset');

INSERT INTO public.penelitian_lab (id_dosen, judul, deskripsi, status) VALUES
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', 'Sistem Penterjemah Bahasa Isyarat Real-Time', 'Penelitian terapan menggunakan model visi komputer untuk menterjemahkan bahasa isyarat.', 'Ongoing'),
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', 'Prototipe Smart Home Berbasis Open-Source', 'Pembuatan model rumah pintar dengan perangkat keras dan lunak terbuka.', 'Completed'), -- ID 2
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', 'Perbandingan Performa Database NoSQL vs SQL', 'Eksperimen kecepatan dan skalabilitas pada berbagai jenis database.', 'Ongoing'),
('e4d7f193-488e-770f-b14d-3829574f6e78', 'Pengembangan Swarm Robotics untuk Pencarian Korban', 'Penelitian tim robot kecil yang bekerja sama dalam operasi SAR.', 'Planned'),
('f5e872a4-599f-8817-c25e-493a68577f89', 'Optimasi User Experience pada Dashboard Penelitian', 'Riset untuk meningkatkan kegunaan dashboard monitoring proyek penelitian.', 'Completed'),
('a6f983b5-6a07-9928-d367-5a4b7968879a', 'Analisis Data Historis untuk Prediksi Beban Listrik Kampus', 'Penggunaan algoritma *forecasting* pada data konsumsi listrik tahunan.', 'Ongoing');

INSERT INTO public.publikasi_lab (id_dosen, judul, deskripsi, file_dokumen, kategori) VALUES
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', 'Laporan Kemajuan Riset Stunting Triwulan I', 'Laporan ini mencakup tahap awal pengumpulan dan pembersihan data serta perencanaan model AI untuk memprediksi stunting.', '/dok/lap_stunting_tri1.pdf', 'Laporan Kemajuan'), -- ID 1
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', 'Spesifikasi Teknis Jaringan Sensor Kebakaran', 'Dokumen ini berisi detail teknis, skema, dan *bill of materials* untuk jaringan sensor api yang diimplementasikan di lab.', '/dok/spec_sensor_api.pdf', 'Dokumentasi Teknis'),
('e4d7f193-488e-770f-b14d-3829574f6e78', 'Panduan Pengoperasian Robot Lengan Pemilah', 'Dokumen panduan keselamatan dan operasional lengkap untuk robot pemilah sampah yang digunakan dalam riset Prof. Mira.', '/dok/panduan_robot_pemilah.pdf', 'Panduan Operasional'),
('f5e872a4-599f-8817-c25e-493a68577f89', 'Laporan Evaluasi UX Dashboard Penelitian', 'Laporan hasil evaluasi *usability* dan rekomendasi perbaikan untuk antarmuka dashboard monitoring riset lab.', '/dok/laporan_ux_riset.pdf', 'Laporan Evaluasi'),
('a6f983b5-6a07-9928-d367-5a4b7968879a', 'Modul Implementasi Spark SQL', 'Modul pelatihan internal yang fokus pada penggunaan Spark SQL untuk manipulasi dan analisis data besar.', '/dok/modul_spark_sql.pdf', 'Modul Pelatihan'),
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', 'Standar Keamanan Data Riset di Cloud', 'Dokumen kebijakan dan prosedur wajib untuk mengamankan data-data penelitian di lingkungan komputasi *cloud*.', '/dok/standar_cloud_riset.pdf', 'Prosedur Keamanan');

--- 4. INSERT GALERI (Kunci Asing sudah merujuk ID yang ada)
--------------------------------------------------------------
INSERT INTO public.galeri (uploaded_by, file_url, caption, id_penelitian, id_kegiatan_lab, id_publikasi_lab, id_berita, id_produk, id_fasilitas) VALUES
-- Relasi ke Kegiatan Lab (ID 1)
('d3c6e082-377d-6f9e-a03c-27184f3e5d67', '/galeri/foto_keg_web.jpg', 'Foto sesi praktikum keamanan web.', NULL, 1, NULL, NULL, NULL, NULL),
-- Relasi ke Fasilitas (ID 1)
('b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e', '/galeri/foto_server_a100.jpg', 'Tampak Server A100 di ruang server Lab AI.', NULL, NULL, NULL, NULL, NULL, 1),
-- Relasi ke Penelitian Lab (ID 2)
('c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f', '/galeri/foto_smarthome_2.jpg', 'Prototipe Smart Home sedang diuji coba.', 2, NULL, NULL, NULL, NULL, NULL),
-- Relasi ke Berita (ID 3)
('e4d7f193-488e-770f-b14d-3829574f6e78', '/galeri/foto_robot_pameran.jpg', 'Prof. Mira dan Robot Lengan di I-Tech Expo.', NULL, NULL, NULL, 3, NULL, NULL),
-- Relasi ke Produk (ID 1)
('f5e872a4-599f-8817-c25e-493a68577f89', '/galeri/screenshot_app_isyarat.png', 'Screenshot tampilan Aplikasi Penterjemah Isyarat.', NULL, NULL, NULL, NULL, 1, NULL),
-- Relasi ke Publikasi Lab (ID 1)
('a6f983b5-6a07-9928-d367-5a4b7968879a', '/galeri/cover_lap_riset.jpg', 'Sampul Laporan Riset Tahunan Lab AI 2024.', NULL, NULL, 1, NULL, NULL, NULL);


UPDATE public.dosen SET deskripsi = 'Kepala Laboratorium AI. Fokus penelitian utama pada Natural Language Processing, Deep Learning untuk klasifikasi, serta visualisasi data tingkat lanjut.'
WHERE id = 'b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e'; -- Dr. Rina Saraswati

UPDATE public.dosen SET deskripsi = 'Ahli dalam sistem tertanam dan Internet of Things (IoT). Berpengalaman dalam perancangan jaringan sensor nirkabel dan pengamanan sistem jaringan.'
WHERE id = 'c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f'; -- Ir. Joni Iskandar, M.Sc.

UPDATE public.dosen SET deskripsi = 'Spesialis dalam pengembangan aplikasi web skala besar, manajemen database modern, dan implementasi infrastruktur Cloud Computing.'
WHERE id = 'd3c6e082-377d-6f9e-a03c-27184f3e5d67'; -- Dr. Kevin Sanjaya

UPDATE public.dosen SET deskripsi = 'Peneliti senior di bidang Robotika dan Visi Komputer. Minat khusus meliputi AI Ethics dan pengembangan algoritma navigasi otonom.'
WHERE id = 'e4d7f193-488e-770f-b14d-3829574f6e78'; -- Prof. Mira Lestari

UPDATE public.dosen SET deskripsi = 'Fokus pada Software Engineering dan pengembangan aplikasi mobile (cross-platform). Sering terlibat dalam riset Usability (UX) dan desain antarmuka.'
WHERE id = 'f5e872a4-599f-8817-c25e-493a68577f89'; -- Naufal Rizky, S.T., M.T.

UPDATE public.dosen SET deskripsi = 'Ahli Big Data dan Machine Learning Optimization. Berpengalaman dalam komputasi paralel dan analisis data skala besar menggunakan framework seperti Hadoop/Spark.'
WHERE id = 'a6f983b5-6a07-9928-d367-5a4b7968879a'; -- Sonia Dewi, S.Kom., M.Kom.