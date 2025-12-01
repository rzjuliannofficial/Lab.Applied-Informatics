--
-- PostgreSQL database dump
--

-- Dumped from database version 15.14
-- Dumped by pg_dump version 15.14

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Clean up existing tables and types to ensure a clean slate
--
DROP TABLE IF EXISTS public.aktivitas_dosen CASCADE;
DROP TABLE IF EXISTS public.berita CASCADE;
DROP TABLE IF EXISTS public.dosen CASCADE;
DROP TABLE IF EXISTS public.fasilitas CASCADE;
DROP TABLE IF EXISTS public.galeri CASCADE;
DROP TABLE IF EXISTS public.kegiatan_lab CASCADE;
DROP TABLE IF EXISTS public.kekayaan_intelektual CASCADE;
DROP TABLE IF EXISTS public.partners CASCADE;
DROP TABLE IF EXISTS public.penelitian_lab CASCADE;
DROP TABLE IF EXISTS public.ppm CASCADE;
DROP TABLE IF EXISTS public.produk CASCADE;
DROP TABLE IF EXISTS public.publikasi_dosen CASCADE;
DROP TABLE IF EXISTS public.publikasi_lab CASCADE;
DROP TABLE IF EXISTS public.riset_dosen CASCADE;
DROP TABLE IF EXISTS public.users CASCADE;

DROP TYPE IF EXISTS public.member_jabatan;
DROP TYPE IF EXISTS public.user_role;
DROP EXTENSION IF EXISTS pgcrypto;

--
-- Extensions and Types
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
-- Tables Structure
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
    id_dosen uuid NOT NULL, -- Diubah menjadi NOT NULL
    email CHARACTER varying(255) UNIQUE,
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
CREATE TABLE public.kekayaan_intelektual (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    no_permohonan character varying(100),
    tahun character varying(20),
    CONSTRAINT kekayaan_intelektual_pkey PRIMARY KEY (id),
    CONSTRAINT fk_ki_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
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
    kondisi character varying(50),
    foto text,
    CONSTRAINT fasilitas_pkey PRIMARY KEY (id_fasilitas)
);

-- Table: kegiatan_lab
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

-- Table: penelitian_lab
CREATE TABLE public.penelitian_lab (
    id SERIAL NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    status character varying(20),
    CONSTRAINT penelitian_lab_pkey PRIMARY KEY (id),
    CONSTRAINT penelitian_lab_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE
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

-- Table: publikasi_lab
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

-- Table: partners (Updated with SERIAL id)
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

-- Table: galeri
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
    tanggal_upload timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    kategori character varying(50),
    CONSTRAINT galeri_pkey PRIMARY KEY (id),
    CONSTRAINT fk_galeri_uploaded_by_dosen FOREIGN KEY (uploaded_by) REFERENCES public.dosen(id) ON DELETE CASCADE,
    CONSTRAINT fk_galeri_berita FOREIGN KEY (id_berita) REFERENCES public.berita(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_fasilitas FOREIGN KEY (id_fasilitas) REFERENCES public.fasilitas(id_fasilitas) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_kegiatan_lab FOREIGN KEY (id_kegiatan_lab) REFERENCES public.kegiatan_lab(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_penelitian FOREIGN KEY (id_penelitian) REFERENCES public.penelitian_lab(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_produk FOREIGN KEY (id_produk) REFERENCES public.produk(id) ON DELETE SET NULL,
    CONSTRAINT fk_galeri_publikasi_lab FOREIGN KEY (id_publikasi_lab) REFERENCES public.publikasi_lab(id) ON DELETE SET NULL
);

--
-- Reset Sequences (Adjust values if necessary based on max ID)
--
SELECT setval('public.aktivitas_dosen_id_seq', COALESCE((SELECT MAX(id) FROM public.aktivitas_dosen), 1), false);
SELECT setval('public.berita_id_seq', COALESCE((SELECT MAX(id) FROM public.berita), 1), true);
SELECT setval('public.fasilitas_id_fasilitas_seq', COALESCE((SELECT MAX(id_fasilitas) FROM public.fasilitas), 1), true);
SELECT setval('public.galeri_id_seq', COALESCE((SELECT MAX(id) FROM public.galeri), 1), true);
SELECT setval('public.kegiatan_lab_id_seq', COALESCE((SELECT MAX(id) FROM public.kegiatan_lab), 1), false);
SELECT setval('public.kekayaan_intelektual_id_seq', COALESCE((SELECT MAX(id) FROM public.kekayaan_intelektual), 1), false);
SELECT setval('public.partners_id_seq', COALESCE((SELECT MAX(id) FROM public.partners), 1), true);
SELECT setval('public.penelitian_lab_id_seq', COALESCE((SELECT MAX(id) FROM public.penelitian_lab), 1), true);
SELECT setval('public.ppm_id_seq', COALESCE((SELECT MAX(id) FROM public.ppm), 1), false);
SELECT setval('public.produk_id_seq', COALESCE((SELECT MAX(id) FROM public.produk), 1), true);
SELECT setval('public.publikasi_dosen_id_seq', COALESCE((SELECT MAX(id) FROM public.publikasi_dosen), 1), true);
SELECT setval('public.publikasi_lab_id_seq', COALESCE((SELECT MAX(id) FROM public.publikasi_lab), 1), true);
SELECT setval('public.riset_dosen_id_seq', COALESCE((SELECT MAX(id) FROM public.riset_dosen), 1), false);
SELECT setval('public.users_id_seq', COALESCE((SELECT MAX(id) FROM public.users), 1), true);

-- PostgreSQL database dump complete