--
-- PostgreSQL database cluster dump
--

-- Started on 2025-11-30 10:21:27

\restrict 0AhA3XAfuEgKOpa9UPrWb75qLFvMcTs00XaLwvLLLteR280ilFiH7GdH2YqlJte

SET default_transaction_read_only = off;

SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;

--
-- Roles
--

CREATE ROLE postgres;
ALTER ROLE postgres WITH SUPERUSER INHERIT CREATEROLE CREATEDB LOGIN REPLICATION BYPASSRLS;

--
-- User Configurations
--








\unrestrict 0AhA3XAfuEgKOpa9UPrWb75qLFvMcTs00XaLwvLLLteR280ilFiH7GdH2YqlJte

--
-- Databases
--

--
-- Database "template1" dump
--

\connect template1

--
-- PostgreSQL database dump
--

\restrict PrbvhMld872CV1cjqjCJQKbQTc0uW9PRyGN7EGXfgZQMLJPyrm8MdOWoZXFpnMX

-- Dumped from database version 15.14
-- Dumped by pg_dump version 15.14

-- Started on 2025-11-30 10:21:27

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

-- Completed on 2025-11-30 10:21:28

--
-- PostgreSQL database dump complete
--

\unrestrict PrbvhMld872CV1cjqjCJQKbQTc0uW9PRyGN7EGXfgZQMLJPyrm8MdOWoZXFpnMX

--
-- Database "Ai_database" dump
--

--
-- PostgreSQL database dump
--

\restrict x6kHqmlvUIYka63473ZbbVyvgTIYXw9iqCTaOidV9g2fTKaDDB1aogZW0xOsndt

-- Dumped from database version 15.14
-- Dumped by pg_dump version 15.14

-- Started on 2025-11-30 10:21:28

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
-- TOC entry 3527 (class 1262 OID 41765)
-- Name: Ai_database; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "Ai_database" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';


ALTER DATABASE "Ai_database" OWNER TO postgres;

\unrestrict x6kHqmlvUIYka63473ZbbVyvgTIYXw9iqCTaOidV9g2fTKaDDB1aogZW0xOsndt
\connect "Ai_database"
\restrict x6kHqmlvUIYka63473ZbbVyvgTIYXw9iqCTaOidV9g2fTKaDDB1aogZW0xOsndt

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
-- TOC entry 2 (class 3079 OID 43120)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 3528 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


--
-- TOC entry 904 (class 1247 OID 43164)
-- Name: member_jabatan; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.member_jabatan AS ENUM (
    'ketua_lab',
    'asisten_lab',
    'member'
);


ALTER TYPE public.member_jabatan OWNER TO postgres;

--
-- TOC entry 901 (class 1247 OID 43158)
-- Name: user_role; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.user_role AS ENUM (
    'admin',
    'editor'
);


ALTER TYPE public.user_role OWNER TO postgres;

--
-- TOC entry 242 (class 1255 OID 41849)
-- Name: hash_user_password(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.hash_user_password() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
  IF TG_OP = 'INSERT' OR (TG_OP = 'UPDATE' AND NEW.password IS DISTINCT FROM OLD.password) THEN
    NEW.password := crypt(NEW.password, gen_salt('bf'));
  END IF;
  RETURN NEW;
END;
$$;


ALTER FUNCTION public.hash_user_password() OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 219 (class 1259 OID 43200)
-- Name: aktivitas_dosen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aktivitas_dosen (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    jenis_aktivitas character varying(255),
    tanggal date,
    deskripsi text
);


ALTER TABLE public.aktivitas_dosen OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 43199)
-- Name: aktivitas_dosen_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aktivitas_dosen_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aktivitas_dosen_id_seq OWNER TO postgres;

--
-- TOC entry 3529 (class 0 OID 0)
-- Dependencies: 218
-- Name: aktivitas_dosen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aktivitas_dosen_id_seq OWNED BY public.aktivitas_dosen.id;


--
-- TOC entry 235 (class 1259 OID 43306)
-- Name: berita; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.berita (
    id integer NOT NULL,
    created_by uuid NOT NULL,
    judul character varying(255) NOT NULL,
    isi_berita text NOT NULL,
    tanggal date,
    gambar_utama text,
    kategori character varying(100)
);


ALTER TABLE public.berita OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 43305)
-- Name: berita_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.berita_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.berita_id_seq OWNER TO postgres;

--
-- TOC entry 3530 (class 0 OID 0)
-- Dependencies: 234
-- Name: berita_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.berita_id_seq OWNED BY public.berita.id;


--
-- TOC entry 215 (class 1259 OID 43171)
-- Name: dosen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dosen (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    nama character varying(255) NOT NULL,
    nip character varying(100),
    email character varying(255),
    foto_profil text,
    keahlian_text text,
    deskripsi text,
    jabatan public.member_jabatan DEFAULT 'member'::public.member_jabatan,
    google_scholar text,
    researcher text,
    orcid text
);


ALTER TABLE public.dosen OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 43320)
-- Name: fasilitas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fasilitas (
    id_fasilitas integer NOT NULL,
    nama_fasilitas character varying(255) NOT NULL,
    deskripsi text,
    kondisi character varying(50),
    foto text
);


ALTER TABLE public.fasilitas OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 43319)
-- Name: fasilitas_id_fasilitas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fasilitas_id_fasilitas_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.fasilitas_id_fasilitas_seq OWNER TO postgres;

--
-- TOC entry 3531 (class 0 OID 0)
-- Dependencies: 236
-- Name: fasilitas_id_fasilitas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fasilitas_id_fasilitas_seq OWNED BY public.fasilitas.id_fasilitas;


--
-- TOC entry 241 (class 1259 OID 43338)
-- Name: galeri; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.galeri (
    id integer NOT NULL,
    uploaded_by uuid NOT NULL,
    file_url text NOT NULL,
    caption character varying(255),
    deskripsi text,
    tanggal_upload timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    kategori character varying(50),
    id_penelitian integer,
    id_kegiatan_lab integer,
    id_publikasi_lab integer,
    id_berita integer,
    id_produk integer,
    id_fasilitas integer
);


ALTER TABLE public.galeri OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 43337)
-- Name: galeri_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeri_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeri_id_seq OWNER TO postgres;

--
-- TOC entry 3532 (class 0 OID 0)
-- Dependencies: 240
-- Name: galeri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeri_id_seq OWNED BY public.galeri.id;


--
-- TOC entry 225 (class 1259 OID 43240)
-- Name: kegiatan_lab; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kegiatan_lab (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    tanggal_kegiatan date,
    file_dokumentasi text
);


ALTER TABLE public.kegiatan_lab OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 43239)
-- Name: kegiatan_lab_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kegiatan_lab_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kegiatan_lab_id_seq OWNER TO postgres;

--
-- TOC entry 3533 (class 0 OID 0)
-- Dependencies: 224
-- Name: kegiatan_lab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kegiatan_lab_id_seq OWNED BY public.kegiatan_lab.id;


--
-- TOC entry 221 (class 1259 OID 43214)
-- Name: kekayaan_intelektual; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kekayaan_intelektual (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    no_permohonan character varying(100),
    tahun character varying(20)
);


ALTER TABLE public.kekayaan_intelektual OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 43213)
-- Name: kekayaan_intelektual_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kekayaan_intelektual_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kekayaan_intelektual_id_seq OWNER TO postgres;

--
-- TOC entry 3534 (class 0 OID 0)
-- Dependencies: 220
-- Name: kekayaan_intelektual_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kekayaan_intelektual_id_seq OWNED BY public.kekayaan_intelektual.id;


--
-- TOC entry 227 (class 1259 OID 43254)
-- Name: penelitian_lab; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.penelitian_lab (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    status character varying(20)
);


ALTER TABLE public.penelitian_lab OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 43253)
-- Name: penelitian_lab_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.penelitian_lab_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.penelitian_lab_id_seq OWNER TO postgres;

--
-- TOC entry 3535 (class 0 OID 0)
-- Dependencies: 226
-- Name: penelitian_lab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.penelitian_lab_id_seq OWNED BY public.penelitian_lab.id;


--
-- TOC entry 231 (class 1259 OID 43282)
-- Name: ppm; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ppm (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer
);


ALTER TABLE public.ppm OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 43281)
-- Name: ppm_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ppm_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ppm_id_seq OWNER TO postgres;

--
-- TOC entry 3536 (class 0 OID 0)
-- Dependencies: 230
-- Name: ppm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ppm_id_seq OWNED BY public.ppm.id;


--
-- TOC entry 239 (class 1259 OID 43329)
-- Name: produk; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produk (
    id integer NOT NULL,
    nama_produk character varying(255) NOT NULL,
    deskripsi text,
    link_demo text,
    image text,
    kategori character varying(100)
);


ALTER TABLE public.produk OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 43328)
-- Name: produk_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produk_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produk_id_seq OWNER TO postgres;

--
-- TOC entry 3537 (class 0 OID 0)
-- Dependencies: 238
-- Name: produk_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produk_id_seq OWNED BY public.produk.id;


--
-- TOC entry 229 (class 1259 OID 43268)
-- Name: publikasi_dosen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.publikasi_dosen (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    tahun integer,
    link_jurnal text,
    kategori character varying(100)
);


ALTER TABLE public.publikasi_dosen OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 43267)
-- Name: publikasi_dosen_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.publikasi_dosen_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.publikasi_dosen_id_seq OWNER TO postgres;

--
-- TOC entry 3538 (class 0 OID 0)
-- Dependencies: 228
-- Name: publikasi_dosen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.publikasi_dosen_id_seq OWNED BY public.publikasi_dosen.id;


--
-- TOC entry 223 (class 1259 OID 43226)
-- Name: publikasi_lab; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.publikasi_lab (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text,
    file_dokumen text,
    kategori character varying(100)
);


ALTER TABLE public.publikasi_lab OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 43225)
-- Name: publikasi_lab_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.publikasi_lab_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.publikasi_lab_id_seq OWNER TO postgres;

--
-- TOC entry 3539 (class 0 OID 0)
-- Dependencies: 222
-- Name: publikasi_lab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.publikasi_lab_id_seq OWNED BY public.publikasi_lab.id;


--
-- TOC entry 233 (class 1259 OID 43294)
-- Name: riset_dosen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.riset_dosen (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    sumber_dana character varying(100)
);


ALTER TABLE public.riset_dosen OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 43293)
-- Name: riset_dosen_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.riset_dosen_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.riset_dosen_id_seq OWNER TO postgres;

--
-- TOC entry 3540 (class 0 OID 0)
-- Dependencies: 232
-- Name: riset_dosen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.riset_dosen_id_seq OWNED BY public.riset_dosen.id;


--
-- TOC entry 217 (class 1259 OID 43181)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    role public.user_role DEFAULT 'editor'::public.user_role NOT NULL,
    id_dosen uuid NOT NULL,
    email character varying(255)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 43180)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3541 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3285 (class 2604 OID 43203)
-- Name: aktivitas_dosen id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aktivitas_dosen ALTER COLUMN id SET DEFAULT nextval('public.aktivitas_dosen_id_seq'::regclass);


--
-- TOC entry 3293 (class 2604 OID 43309)
-- Name: berita id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.berita ALTER COLUMN id SET DEFAULT nextval('public.berita_id_seq'::regclass);


--
-- TOC entry 3294 (class 2604 OID 43323)
-- Name: fasilitas id_fasilitas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas ALTER COLUMN id_fasilitas SET DEFAULT nextval('public.fasilitas_id_fasilitas_seq'::regclass);


--
-- TOC entry 3296 (class 2604 OID 43341)
-- Name: galeri id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri ALTER COLUMN id SET DEFAULT nextval('public.galeri_id_seq'::regclass);


--
-- TOC entry 3288 (class 2604 OID 43243)
-- Name: kegiatan_lab id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan_lab ALTER COLUMN id SET DEFAULT nextval('public.kegiatan_lab_id_seq'::regclass);


--
-- TOC entry 3286 (class 2604 OID 43217)
-- Name: kekayaan_intelektual id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kekayaan_intelektual ALTER COLUMN id SET DEFAULT nextval('public.kekayaan_intelektual_id_seq'::regclass);


--
-- TOC entry 3289 (class 2604 OID 43257)
-- Name: penelitian_lab id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.penelitian_lab ALTER COLUMN id SET DEFAULT nextval('public.penelitian_lab_id_seq'::regclass);


--
-- TOC entry 3291 (class 2604 OID 43285)
-- Name: ppm id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ppm ALTER COLUMN id SET DEFAULT nextval('public.ppm_id_seq'::regclass);


--
-- TOC entry 3295 (class 2604 OID 43332)
-- Name: produk id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk ALTER COLUMN id SET DEFAULT nextval('public.produk_id_seq'::regclass);


--
-- TOC entry 3290 (class 2604 OID 43271)
-- Name: publikasi_dosen id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_dosen ALTER COLUMN id SET DEFAULT nextval('public.publikasi_dosen_id_seq'::regclass);


--
-- TOC entry 3287 (class 2604 OID 43229)
-- Name: publikasi_lab id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_lab ALTER COLUMN id SET DEFAULT nextval('public.publikasi_lab_id_seq'::regclass);


--
-- TOC entry 3292 (class 2604 OID 43297)
-- Name: riset_dosen id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.riset_dosen ALTER COLUMN id SET DEFAULT nextval('public.riset_dosen_id_seq'::regclass);


--
-- TOC entry 3283 (class 2604 OID 43184)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3499 (class 0 OID 43200)
-- Dependencies: 219
-- Data for Name: aktivitas_dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aktivitas_dosen (id, id_dosen, judul, jenis_aktivitas, tanggal, deskripsi) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Keynote Speaker Summit	Seminar	2025-10-15	Materi NLP.
2	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Juri Lomba Robotik	Juri	2025-11-05	Menilai robot line follower.
3	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Workshop Laravel	Workshop	2025-11-12	Pelatihan framework PHP.
4	e4d7f193-488e-770f-b14d-3829574f6e78	Konferensi AI Global	Konferensi	2025-11-20	Presentasi paper.
5	f5e872a4-599f-8817-c25e-493a68577f89	Mentoring Startup	Mentoring	2025-12-01	Membimbing startup mahasiswa.
6	a6f983b5-6a07-9928-d367-5a4b7968879a	Reviewer Jurnal Data	Reviewer	2025-12-05	Mereview artikel ilmiah.
\.


--
-- TOC entry 3515 (class 0 OID 43306)
-- Dependencies: 235
-- Data for Name: berita; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.berita (id, created_by, judul, isi_berita, tanggal, gambar_utama, kategori) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Lab AI Meraih Hibah Riset Rp 500 Juta	Dr. Rina Saraswati berhasil mendapatkan hibah besar untuk riset stunting.	2025-11-15	/img/berita/hibah.jpg	Prestasi
2	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Kolaborasi Lab dan Industri dalam Keamanan Cloud	Lab AI bekerja sama dengan TechCorp untuk pengamanan infrastruktur cloud.	2025-11-01	/img/berita/cloud.jpg	Kerjasama
3	e4d7f193-488e-770f-b14d-3829574f6e78	Robot Lengan Lab AI Dipamerkan di I-Tech Expo	Prototipe robot Prof. Mira menarik perhatian pengunjung di pameran teknologi.	2025-10-20	/img/berita/expo.jpg	Pameran
4	f5e872a4-599f-8817-c25e-493a68577f89	Workshop Mobile App Development 2025	Pelatihan intensif pengembangan aplikasi Android menggunakan Kotlin.	2025-12-05	/img/berita/mobile_workshop.jpg	Event
5	a6f983b5-6a07-9928-d367-5a4b7968879a	Kuliah Tamu: Big Data di Era 5.0	Mengundang praktisi data dari unicorn Indonesia.	2025-12-10	/img/berita/kuliah_tamu.jpg	Akademik
6	550e8400-e29b-41d4-a716-446655440000	Kompetisi Game Dev Mahasiswa	Ajang kreativitas mahasiswa dalam membuat game edukasi.	2025-12-15	/img/berita/game_dev.jpg	Lomba
7	550e8400-e29b-41d4-a716-446655440001	Webinar Cybersecurity Awareness	Pentingnya menjaga data pribadi di era digital.	2025-12-20	/img/berita/cyber_webinar.jpg	Seminar
8	550e8400-e29b-41d4-a716-446655440002	Peluncuran Blockchain Research Group	Grup riset baru yang fokus pada teknologi desentralisasi.	2026-01-05	/img/berita/blockchain_launch.jpg	Pengumuman
\.


--
-- TOC entry 3495 (class 0 OID 43171)
-- Dependencies: 215
-- Data for Name: dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dosen (id, nama, nip, email, foto_profil, keahlian_text, deskripsi, jabatan, google_scholar, researcher, orcid) FROM stdin;
b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Dr. Rina Saraswati	1975102001	rina.sarah@lab.id	/img/dosen_rina.jpg	Deep Learning, NLP, Data Visualization	Kepala Laboratorium AI. Fokus penelitian utama pada Natural Language Processing.	ketua_lab	\N	\N	\N
c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Ir. Joni Iskandar, M.Sc.	1980051502	joni.iskan@lab.id	/img/dosen_joni.jpg	IoT, Embedded Systems, Network Security	Ahli dalam sistem tertanam dan Internet of Things (IoT).	asisten_lab	\N	\N	\N
d3c6e082-377d-6f9e-a03c-27184f3e5d67	Dr. Kevin Sanjaya	1988110103	kevin.san@lab.id	/img/dosen_kevin.jpg	Web Development, Cloud Computing, Database System	Spesialis dalam pengembangan aplikasi web skala besar.	member	\N	\N	\N
e4d7f193-488e-770f-b14d-3829574f6e78	Prof. Mira Lestari	1965030804	mira.les@lab.id	/img/dosen_mira.jpg	Robotics, Computer Vision, AI Ethics	Peneliti senior di bidang Robotika dan Visi Komputer.	member	\N	\N	\N
f5e872a4-599f-8817-c25e-493a68577f89	Naufal Rizky, S.T., M.T.	1992072505	naufal.rizky@lab.id	/img/dosen_naufal.jpg	Software Engineering, Mobile Apps, UX/UI Design	Fokus pada Software Engineering dan pengembangan aplikasi mobile.	member	\N	\N	\N
a6f983b5-6a07-9928-d367-5a4b7968879a	Sonia Dewi, S.Kom., M.Kom.	1990041206	sonia.d@lab.id	/img/dosen_sonia.jpg	Big Data, Parallel Processing, Machine Learning Optimization	Ahli Big Data dan Machine Learning Optimization.	member	\N	\N	\N
550e8400-e29b-41d4-a716-446655440000	Budi Santoso, M.Kom.	1985010107	budi.s@lab.id	/img/dosen_budi.jpg	Game Development, AR/VR	Dosen dengan minat khusus pada pengembangan teknologi imersif.	member	\N	\N	\N
550e8400-e29b-41d4-a716-446655440001	Siti Aminah, Ph.D.	1979020208	siti.a@lab.id	/img/dosen_siti.jpg	Cyber Security, Cryptography	Pakar keamanan siber dan enkripsi data.	member	\N	\N	\N
550e8400-e29b-41d4-a716-446655440002	Rudi Hermawan, S.T., M.T.	1991030309	rudi.h@lab.id	/img/dosen_rudi.jpg	Blockchain, Fintech	Mengembangkan solusi berbasis blockchain untuk sektor keuangan.	member	\N	\N	\N
550e8400-e29b-41d4-a716-446655440003	Dewi Puspita, S.Si., M.Cs.	1989040410	dewi.p@lab.id	/img/dosen_dewi.jpg	Bioinformatics, Computational Biology	Menggabungkan ilmu komputer dengan biologi molekuler.	member	\N	\N	\N
550e8400-e29b-41d4-a716-446655440004	Andi Wijaya, S.Kom., M.Kom.	1993050511	andi.w@lab.id	/img/dosen_andi.jpg	Cloud Architecture, DevOps	Spesialis infrastruktur cloud dan metodologi DevOps.	member	\N	\N	\N
\.


--
-- TOC entry 3517 (class 0 OID 43320)
-- Dependencies: 237
-- Data for Name: fasilitas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fasilitas (id_fasilitas, nama_fasilitas, deskripsi, kondisi, foto) FROM stdin;
1	Server NVIDIA A100	Server Deep Learning.	Sangat Baik	/img/fasilitas/server.jpg
2	Robot Lengan 6 Axis	Robot industri kecil.	Baik	/img/fasilitas/robot.jpg
3	VR Headset Oculus Quest 2	Perangkat Virtual Reality untuk riset.	Baik	/img/fasilitas/vr.jpg
4	3D Printer Ender 3	Printer 3D untuk prototyping.	Perlu Perbaikan	/img/fasilitas/3dprinter.jpg
5	Laboratorium Komputer Mac	Lab dengan 20 unit iMac.	Sangat Baik	/img/fasilitas/lab_mac.jpg
6	IoT Development Kit	Paket lengkap sensor dan mikrokontroler.	Baik	/img/fasilitas/iot_kit.jpg
7	Ruang Podcast	Studio rekaman audio visual.	Sangat Baik	/img/fasilitas/podcast.jpg
\.


--
-- TOC entry 3521 (class 0 OID 43338)
-- Dependencies: 241
-- Data for Name: galeri; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.galeri (id, uploaded_by, file_url, caption, deskripsi, tanggal_upload, kategori, id_penelitian, id_kegiatan_lab, id_publikasi_lab, id_berita, id_produk, id_fasilitas) FROM stdin;
1	d3c6e082-377d-6f9e-a03c-27184f3e5d67	/galeri/foto_keg_web.jpg	Sesi Praktikum	Mahasiswa sedang melakukan penetrasi tes pada server lokal.	2025-05-19 10:00:00	Kegiatan Lab	\N	1	\N	\N	\N	\N
2	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	galeri/foto_server.jpg	Server A100	Rak server utama yang terletak di ruang pendingin.	2025-01-10 09:00:00	Fasilitas	\N	\N	\N	\N	\N	1
3	e4d7f193-488e-770f-b14d-3829574f6e78	galeri/pameran_robot.jpg	Demo Robot	Prof Mira mendemokan robot lengan di depan pengunjung.	2025-10-21 14:00:00	Berita	\N	\N	\N	3	\N	\N
4	f5e872a4-599f-8817-c25e-493a68577f89	galeri/apps_ui.png	UI Design	Tampilan antarmuka aplikasi penterjemah.	2025-02-01 08:00:00	Produk	\N	\N	\N	\N	1	\N
5	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	galeri/iot_kit_detail.jpg	IoT Kit	Detail komponen dalam kit pembelajaran IoT.	2025-03-05 11:00:00	Fasilitas	\N	\N	\N	\N	\N	5
6	a6f983b5-6a07-9928-d367-5a4b7968879a	galeri/seminar_bigdata.jpg	Suasana Seminar	Antusiasme peserta seminar Big Data.	2025-07-26 09:30:00	Berita	\N	\N	\N	6	\N	\N
7	d3c6e082-377d-6f9e-a03c-27184f3e5d67	galeri/server_maintenance.jpg	Maintenance	Kegiatan perawatan rutin server lab.	2025-06-10 16:00:00	Kegiatan Lab	\N	4	\N	\N	\N	\N
\.


--
-- TOC entry 3505 (class 0 OID 43240)
-- Dependencies: 225
-- Data for Name: kegiatan_lab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kegiatan_lab (id, id_dosen, judul, deskripsi, tanggal_kegiatan, file_dokumentasi) FROM stdin;
1	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Pelatihan Keamanan Web Dasar	Pelatihan security.	2025-05-18	/dok/keg_web.pdf
2	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Diskusi Proyek Akhir Deep Learning	Sesi presentasi.	2025-05-10	/dok/keg_dl.pdf
3	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Workshop IoT untuk Smart Home	Perakitan perangkat pintar.	2025-06-01	/dok/iot_workshop.pdf
4	f5e872a4-599f-8817-c25e-493a68577f89	Bootcamp UI/UX Design	Pelatihan desain antarmuka.	2025-06-15	/dok/uiux_bootcamp.pdf
5	a6f983b5-6a07-9928-d367-5a4b7968879a	Data Science Hackathon	Kompetisi analisis data.	2025-07-01	/dok/hackathon.pdf
6	550e8400-e29b-41d4-a716-446655440000	Game Jam 2025	Membuat game dalam 48 jam.	2025-07-20	/dok/gamejam.pdf
7	550e8400-e29b-41d4-a716-446655440001	Capture The Flag (CTF) Competition	Kompetisi keamanan siber.	2025-08-05	/dok/ctf.pdf
\.


--
-- TOC entry 3501 (class 0 OID 43214)
-- Dependencies: 221
-- Data for Name: kekayaan_intelektual; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kekayaan_intelektual (id, id_dosen, judul, no_permohonan, tahun) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Metode Klasifikasi Teks	P002025001	2025
2	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Desain Alat IoT	D002025002	2025
3	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Kode Sumber Web App	C002025003	2025
4	e4d7f193-488e-770f-b14d-3829574f6e78	Algoritma Navigasi	P002025004	2025
5	f5e872a4-599f-8817-c25e-493a68577f89	Desain Antarmuka Mobile	D002025005	2025
6	a6f983b5-6a07-9928-d367-5a4b7968879a	Model Prediksi Cuaca	P002025006	2025
\.


--
-- TOC entry 3507 (class 0 OID 43254)
-- Dependencies: 227
-- Data for Name: penelitian_lab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.penelitian_lab (id, id_dosen, judul, deskripsi, status) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Penterjemah Bahasa Isyarat	Visi komputer.	Ongoing
2	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Smart Parking System	IoT based parking.	Completed
3	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Optimasi Query Database	Database performance.	Ongoing
4	e4d7f193-488e-770f-b14d-3829574f6e78	Robot Pembersih Lantai	Autonomous robot.	Planned
5	f5e872a4-599f-8817-c25e-493a68577f89	Aplikasi Mental Health	Mobile app health.	Completed
6	a6f983b5-6a07-9928-d367-5a4b7968879a	Prediksi Harga Saham	Machine Learning.	Ongoing
\.


--
-- TOC entry 3511 (class 0 OID 43282)
-- Dependencies: 231
-- Data for Name: ppm; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ppm (id, id_dosen, judul, tahun) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Pelatihan Guru SMA	2024
2	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Digitalisasi UMKM Desa	2023
3	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Workshop Coding Anak Panti	2024
4	e4d7f193-488e-770f-b14d-3829574f6e78	Penyuluhan Teknologi Tepat Guna	2025
5	f5e872a4-599f-8817-c25e-493a68577f89	Pendampingan Start-up Lokal	2023
6	a6f983b5-6a07-9928-d367-5a4b7968879a	Edukasi Internet Sehat	2024
\.


--
-- TOC entry 3519 (class 0 OID 43329)
-- Dependencies: 239
-- Data for Name: produk; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produk (id, nama_produk, deskripsi, link_demo, image, kategori) FROM stdin;
1	App Penterjemah Isyarat	Aplikasi mobile AI.	http://demo.isyarat.app	/img/produk/isyarat.jpg	Mobile App
2	Sistem Smart Home	Kendali rumah pintar.	http://demo.smarthome.lab	/img/produk/smarthome.jpg	IoT
3	E-Voting Blockchain	Sistem pemilu aman.	http://evoting.lab	/img/produk/evoting.jpg	Blockchain
4	Game Edukasi Matematika	Belajar sambil bermain.	http://mathgame.lab	/img/produk/mathgame.jpg	Game
5	Deteksi Masker Wajah	Sistem visi komputer.	http://mask.lab	/img/produk/mask.jpg	AI
6	Dashboard Monitoring Energi	Pantau listrik real-time.	http://energy.lab	/img/produk/energy.jpg	Web App
7	Chatbot Layanan Akademik	Asisten virtual kampus.	http://chatbot.lab	/img/produk/chatbot.jpg	AI
\.


--
-- TOC entry 3509 (class 0 OID 43268)
-- Dependencies: 229
-- Data for Name: publikasi_dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.publikasi_dosen (id, id_dosen, judul, deskripsi, tahun, link_jurnal, kategori) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	NLP for Bahasa Indonesia	Penelitian bahasa.	2024	http://jurnal.id/nlp	Jurnal Internasional
2	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	IoT Security Challenges	Keamanan IoT.	2024	http://jurnal.id/iot	Prosiding
3	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Scalable Web Architecture	Arsitektur web.	2023	http://jurnal.id/web	Jurnal Nasional
4	e4d7f193-488e-770f-b14d-3829574f6e78	Ethical AI Framework	Etika AI.	2025	http://jurnal.id/ai	Jurnal Internasional
5	f5e872a4-599f-8817-c25e-493a68577f89	UX Trends in 2025	Tren desain.	2025	http://jurnal.id/ux	Artikel Ilmiah
6	a6f983b5-6a07-9928-d367-5a4b7968879a	Big Data in Healthcare	Data kesehatan.	2024	http://jurnal.id/bigdata	Jurnal Internasional
\.


--
-- TOC entry 3503 (class 0 OID 43226)
-- Dependencies: 223
-- Data for Name: publikasi_lab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.publikasi_lab (id, id_dosen, judul, deskripsi, file_dokumen, kategori) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Laporan Riset Stunting	Analisis data kesehatan.	/dok/stunting.pdf	Laporan
2	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Modul Praktikum IoT	Panduan belajar IoT.	/dok/modul_iot.pdf	Modul Ajar
3	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Whitepaper Cloud Security	Standar keamanan cloud.	/dok/cloud_sec.pdf	Whitepaper
4	e4d7f193-488e-770f-b14d-3829574f6e78	Jurnal Robotika Indonesia Vol 1	Kumpulan paper riset.	/dok/jurnal_robot.pdf	Jurnal
5	f5e872a4-599f-8817-c25e-493a68577f89	Pedoman UI/UX Kampus	Standar desain aplikasi.	/dok/uiux_guide.pdf	Pedoman
6	a6f983b5-6a07-9928-d367-5a4b7968879a	Dataset Lalu Lintas Kota	Data open source.	/dok/traffic_data.zip	Dataset
\.


--
-- TOC entry 3513 (class 0 OID 43294)
-- Dependencies: 233
-- Data for Name: riset_dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.riset_dosen (id, id_dosen, judul, tahun, sumber_dana) FROM stdin;
1	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	Analisis Sentimen Pemilu	2024	Internal
2	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	Smart Farming IoT	2023	Dikti
3	d3c6e082-377d-6f9e-a03c-27184f3e5d67	Optimasi Cloud Storage	2024	Industri
4	e4d7f193-488e-770f-b14d-3829574f6e78	Robot SAR Otonom	2025	LPDP
5	f5e872a4-599f-8817-c25e-493a68577f89	Aplikasi Belajar Bahasa	2023	Mandiri
6	a6f983b5-6a07-9928-d367-5a4b7968879a	Prediksi Banjir Jakarta	2024	Pemprov
\.


--
-- TOC entry 3497 (class 0 OID 43181)
-- Dependencies: 217
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, password, role, id_dosen, email) FROM stdin;
1	rina.admin	123	admin	b1a4c8f0-1e5b-4c7d-8a1a-0e9f2d1c3b4e	rina.sarah@lab.id
2	joni.editor	123	editor	c2b5d971-2f6c-5d8e-9b2b-1f073e2d4c5f	joni.iskan@lab.id
3	kevin.editor	123	editor	d3c6e082-377d-6f9e-a03c-27184f3e5d67	kevin.san@lab.id
4	budi.editor	123	editor	550e8400-e29b-41d4-a716-446655440000	budi.s@lab.id
5	siti.editor	123	editor	550e8400-e29b-41d4-a716-446655440001	siti.a@lab.id
6	rudi.editor	123	editor	550e8400-e29b-41d4-a716-446655440002	rudi.h@lab.id
7	dewi.editor	123	editor	550e8400-e29b-41d4-a716-446655440003	dewi.p@lab.id
8	andi.editor	123	editor	550e8400-e29b-41d4-a716-446655440004	andi.w@lab.id
\.


--
-- TOC entry 3542 (class 0 OID 0)
-- Dependencies: 218
-- Name: aktivitas_dosen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aktivitas_dosen_id_seq', 6, true);


--
-- TOC entry 3543 (class 0 OID 0)
-- Dependencies: 234
-- Name: berita_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.berita_id_seq', 8, true);


--
-- TOC entry 3544 (class 0 OID 0)
-- Dependencies: 236
-- Name: fasilitas_id_fasilitas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fasilitas_id_fasilitas_seq', 7, true);


--
-- TOC entry 3545 (class 0 OID 0)
-- Dependencies: 240
-- Name: galeri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeri_id_seq', 7, true);


--
-- TOC entry 3546 (class 0 OID 0)
-- Dependencies: 224
-- Name: kegiatan_lab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kegiatan_lab_id_seq', 7, true);


--
-- TOC entry 3547 (class 0 OID 0)
-- Dependencies: 220
-- Name: kekayaan_intelektual_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kekayaan_intelektual_id_seq', 6, true);


--
-- TOC entry 3548 (class 0 OID 0)
-- Dependencies: 226
-- Name: penelitian_lab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.penelitian_lab_id_seq', 6, true);


--
-- TOC entry 3549 (class 0 OID 0)
-- Dependencies: 230
-- Name: ppm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ppm_id_seq', 6, true);


--
-- TOC entry 3550 (class 0 OID 0)
-- Dependencies: 238
-- Name: produk_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produk_id_seq', 7, true);


--
-- TOC entry 3551 (class 0 OID 0)
-- Dependencies: 228
-- Name: publikasi_dosen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.publikasi_dosen_id_seq', 6, true);


--
-- TOC entry 3552 (class 0 OID 0)
-- Dependencies: 222
-- Name: publikasi_lab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.publikasi_lab_id_seq', 6, true);


--
-- TOC entry 3553 (class 0 OID 0)
-- Dependencies: 232
-- Name: riset_dosen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.riset_dosen_id_seq', 6, true);


--
-- TOC entry 3554 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 8, true);


--
-- TOC entry 3313 (class 2606 OID 43207)
-- Name: aktivitas_dosen aktivitas_dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aktivitas_dosen
    ADD CONSTRAINT aktivitas_dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3329 (class 2606 OID 43313)
-- Name: berita berita_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.berita
    ADD CONSTRAINT berita_pkey PRIMARY KEY (id);


--
-- TOC entry 3299 (class 2606 OID 43384)
-- Name: dosen dosen_google_scholar_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_google_scholar_key UNIQUE (google_scholar);


--
-- TOC entry 3301 (class 2606 OID 43388)
-- Name: dosen dosen_orcid_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_orcid_key UNIQUE (orcid);


--
-- TOC entry 3303 (class 2606 OID 43179)
-- Name: dosen dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3305 (class 2606 OID 43386)
-- Name: dosen dosen_researcher_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_researcher_key UNIQUE (researcher);


--
-- TOC entry 3331 (class 2606 OID 43327)
-- Name: fasilitas fasilitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas
    ADD CONSTRAINT fasilitas_pkey PRIMARY KEY (id_fasilitas);


--
-- TOC entry 3335 (class 2606 OID 43346)
-- Name: galeri galeri_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT galeri_pkey PRIMARY KEY (id);


--
-- TOC entry 3319 (class 2606 OID 43247)
-- Name: kegiatan_lab kegiatan_lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan_lab
    ADD CONSTRAINT kegiatan_lab_pkey PRIMARY KEY (id);


--
-- TOC entry 3315 (class 2606 OID 43219)
-- Name: kekayaan_intelektual kekayaan_intelektual_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kekayaan_intelektual
    ADD CONSTRAINT kekayaan_intelektual_pkey PRIMARY KEY (id);


--
-- TOC entry 3321 (class 2606 OID 43261)
-- Name: penelitian_lab penelitian_lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.penelitian_lab
    ADD CONSTRAINT penelitian_lab_pkey PRIMARY KEY (id);


--
-- TOC entry 3325 (class 2606 OID 43287)
-- Name: ppm ppm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ppm
    ADD CONSTRAINT ppm_pkey PRIMARY KEY (id);


--
-- TOC entry 3333 (class 2606 OID 43336)
-- Name: produk produk_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk
    ADD CONSTRAINT produk_pkey PRIMARY KEY (id);


--
-- TOC entry 3323 (class 2606 OID 43275)
-- Name: publikasi_dosen publikasi_dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_dosen
    ADD CONSTRAINT publikasi_dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3317 (class 2606 OID 43233)
-- Name: publikasi_lab publikasi_lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_lab
    ADD CONSTRAINT publikasi_lab_pkey PRIMARY KEY (id);


--
-- TOC entry 3327 (class 2606 OID 43299)
-- Name: riset_dosen riset_dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.riset_dosen
    ADD CONSTRAINT riset_dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3307 (class 2606 OID 43191)
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- TOC entry 3309 (class 2606 OID 43189)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3311 (class 2606 OID 43193)
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- TOC entry 3337 (class 2606 OID 43208)
-- Name: aktivitas_dosen fk_aktivitas_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aktivitas_dosen
    ADD CONSTRAINT fk_aktivitas_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3345 (class 2606 OID 43314)
-- Name: berita fk_berita_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.berita
    ADD CONSTRAINT fk_berita_dosen FOREIGN KEY (created_by) REFERENCES public.dosen(id) ON DELETE SET NULL;


--
-- TOC entry 3346 (class 2606 OID 43367)
-- Name: galeri fk_galeri_berita; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_berita FOREIGN KEY (id_berita) REFERENCES public.berita(id) ON DELETE SET NULL;


--
-- TOC entry 3347 (class 2606 OID 43347)
-- Name: galeri fk_galeri_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_dosen FOREIGN KEY (uploaded_by) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3348 (class 2606 OID 43377)
-- Name: galeri fk_galeri_fasilitas; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_fasilitas FOREIGN KEY (id_fasilitas) REFERENCES public.fasilitas(id_fasilitas) ON DELETE SET NULL;


--
-- TOC entry 3349 (class 2606 OID 43357)
-- Name: galeri fk_galeri_kegiatan; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_kegiatan FOREIGN KEY (id_kegiatan_lab) REFERENCES public.kegiatan_lab(id) ON DELETE SET NULL;


--
-- TOC entry 3350 (class 2606 OID 43352)
-- Name: galeri fk_galeri_penelitian; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_penelitian FOREIGN KEY (id_penelitian) REFERENCES public.penelitian_lab(id) ON DELETE SET NULL;


--
-- TOC entry 3351 (class 2606 OID 43372)
-- Name: galeri fk_galeri_produk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_produk FOREIGN KEY (id_produk) REFERENCES public.produk(id) ON DELETE SET NULL;


--
-- TOC entry 3352 (class 2606 OID 43362)
-- Name: galeri fk_galeri_publab; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_publab FOREIGN KEY (id_publikasi_lab) REFERENCES public.publikasi_lab(id) ON DELETE SET NULL;


--
-- TOC entry 3340 (class 2606 OID 43248)
-- Name: kegiatan_lab fk_keglab_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan_lab
    ADD CONSTRAINT fk_keglab_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3338 (class 2606 OID 43220)
-- Name: kekayaan_intelektual fk_ki_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kekayaan_intelektual
    ADD CONSTRAINT fk_ki_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3341 (class 2606 OID 43262)
-- Name: penelitian_lab fk_penlab_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.penelitian_lab
    ADD CONSTRAINT fk_penlab_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3343 (class 2606 OID 43288)
-- Name: ppm fk_ppm_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ppm
    ADD CONSTRAINT fk_ppm_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3342 (class 2606 OID 43276)
-- Name: publikasi_dosen fk_pubdosen_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_dosen
    ADD CONSTRAINT fk_pubdosen_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL;


--
-- TOC entry 3339 (class 2606 OID 43234)
-- Name: publikasi_lab fk_publab_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_lab
    ADD CONSTRAINT fk_publab_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL;


--
-- TOC entry 3344 (class 2606 OID 43300)
-- Name: riset_dosen fk_riset_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.riset_dosen
    ADD CONSTRAINT fk_riset_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3336 (class 2606 OID 43194)
-- Name: users fk_user_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_user_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


-- Completed on 2025-11-30 10:21:28

--
-- PostgreSQL database dump complete
--

\unrestrict x6kHqmlvUIYka63473ZbbVyvgTIYXw9iqCTaOidV9g2fTKaDDB1aogZW0xOsndt

-- Completed on 2025-11-30 10:21:28

--
-- PostgreSQL database cluster dump complete
--

