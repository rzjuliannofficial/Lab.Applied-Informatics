--
-- CREATE EXTENSIONS & TYPES
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;

CREATE TYPE public.member_jabatan AS ENUM (
    'ketua_lab',
    'asisten_lab',
    'member'
);

CREATE TYPE public.user_role AS ENUM (
    'admin',
    'editor'
);

--
-- 2. CREATE TABLES
--

-- Table: dosen
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

-- Table: users
CREATE TABLE public.users (
    id SERIAL NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    role public.user_role DEFAULT 'editor'::public.user_role NOT NULL,
    id_dosen uuid,
    CONSTRAINT users_pkey PRIMARY KEY (id),
    CONSTRAINT users_username_key UNIQUE (username),
    CONSTRAINT fk_user_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL
);

-- Table: berita
CREATE TABLE public.berita (
    id SERIAL NOT NULL,
    created_by uuid NOT NULL,
    judul character varying(255) NOT NULL,
    isi_berita text NOT NULL,
    tanggal date,
    gambar_utama text,
    kategori character varying(100),
    CONSTRAINT berita_pkey PRIMARY KEY (id),
    CONSTRAINT berita_created_by_fkey FOREIGN KEY (created_by) REFERENCES public.dosen(id) ON DELETE SET NULL
);

-- Table: aktivitas_dosen
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

-- Table: fasilitas
CREATE TABLE public.fasilitas (
    id_fasilitas SERIAL NOT NULL,
    nama_fasilitas character varying(255) NOT NULL,
    deskripsi text,
    kondisi character varying(50),
    foto text,
    CONSTRAINT fasilitas_pkey PRIMARY KEY (id_fasilitas)
);

-- Table: kekayaan_intelektual
CREATE TABLE public.kekayaan_intelektual (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    no_permohonan character varying(100),
    tahun character varying(20),
    CONSTRAINT kekayaan_intelektual_pkey PRIMARY KEY (id),
    CONSTRAINT kekayaan_intelektual_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Table: ppm
CREATE TABLE public.ppm (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun character varying(20),
    CONSTRAINT ppm_pkey PRIMARY KEY (id),
    CONSTRAINT ppm_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Table: produk
CREATE TABLE public.produk (
    id SERIAL NOT NULL,
    nama_produk character varying(255) NOT NULL,
    deskripsi text,
    link_demo text,
    image text,
    kategori character varying(100),
    CONSTRAINT produk_pkey PRIMARY KEY (id)
);

-- Table: publikasi_dosen
CREATE TABLE public.publikasi_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    link_jurnal text,
    kategori character varying(100),
    deskripsi text,
    CONSTRAINT publikasi_dosen_pkey PRIMARY KEY (id),
    CONSTRAINT publikasi_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL
);

-- Table: riset_dosen
CREATE TABLE public.riset_dosen (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    sumber_dana character varying(100),
    CONSTRAINT riset_dosen_pkey PRIMARY KEY (id),
    CONSTRAINT riset_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
);

-- Table: partners
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

-- Table: galeri (MODIFIED STRUCTURE)
CREATE TABLE public.galeri (
    id SERIAL NOT NULL,
    uploaded_by uuid NOT NULL,
    file_url text NOT NULL,
    caption character varying(255),
    deskripsi text,
    tanggal_upload timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    kategori character varying(50),
    
    -- Foreign Keys
    id_berita integer,
    id_produk integer,
    id_fasilitas integer,
    
    -- New Foreign Keys for Dosen Activities
    id_publikasi_dosen integer,
    id_aktivitas_dosen integer,
    id_ppm integer,
    id_riset_dosen integer,
    id_kekayaan_intelektual integer,
    
    CONSTRAINT galeri_pkey PRIMARY KEY (id),
    CONSTRAINT fk_galeri_uploaded_by_dosen FOREIGN KEY (uploaded_by) REFERENCES public.dosen(id) ON DELETE CASCADE,
    CONSTRAINT fk_galeri_berita FOREIGN KEY (id_berita) REFERENCES public.berita(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_fasilitas FOREIGN KEY (id_fasilitas) REFERENCES public.fasilitas(id_fasilitas) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_produk FOREIGN KEY (id_produk) REFERENCES public.produk(id) ON DELETE SET NULL,
    
    -- New Constraints
    CONSTRAINT fk_galeri_pubdosen FOREIGN KEY (id_publikasi_dosen) REFERENCES public.publikasi_dosen(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_akt_dosen FOREIGN KEY (id_aktivitas_dosen) REFERENCES public.aktivitas_dosen(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_ppm FOREIGN KEY (id_ppm) REFERENCES public.ppm(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_riset FOREIGN KEY (id_riset_dosen) REFERENCES public.riset_dosen(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_ki FOREIGN KEY (id_kekayaan_intelektual) REFERENCES public.kekayaan_intelektual(id) ON DELETE SET NULL
);