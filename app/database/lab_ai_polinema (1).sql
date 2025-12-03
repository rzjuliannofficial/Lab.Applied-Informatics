--
-- PostgreSQL database dump
--

\restrict pDqGT7gkobirCMhOnQzBQfDbBZyPICFdpHQfiaDa3jD268k8uYDChBCGHRp8xQb

-- Dumped from database version 15.14
-- Dumped by pg_dump version 15.14

-- Started on 2025-12-01 11:13:14

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
-- TOC entry 2 (class 3079 OID 28087)
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
-- TOC entry 902 (class 1247 OID 28125)
-- Name: member_jabatan; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.member_jabatan AS ENUM (
    'ketua_lab',
    'asisten_lab',
    'member'
);


ALTER TYPE public.member_jabatan OWNER TO postgres;

--
-- TOC entry 905 (class 1247 OID 28132)
-- Name: user_role; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.user_role AS ENUM (
    'admin',
    'editor'
);


ALTER TYPE public.user_role OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 215 (class 1259 OID 28137)
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
-- TOC entry 216 (class 1259 OID 28142)
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
-- Dependencies: 216
-- Name: aktivitas_dosen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aktivitas_dosen_id_seq OWNED BY public.aktivitas_dosen.id;


--
-- TOC entry 217 (class 1259 OID 28143)
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
-- TOC entry 218 (class 1259 OID 28148)
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
-- Dependencies: 218
-- Name: berita_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.berita_id_seq OWNED BY public.berita.id;


--
-- TOC entry 219 (class 1259 OID 28149)
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
    jabatan public.member_jabatan,
    google_scholar text,
    researcher text,
    orcid text
);


ALTER TABLE public.dosen OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 28155)
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
-- TOC entry 221 (class 1259 OID 28160)
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
-- Dependencies: 221
-- Name: fasilitas_id_fasilitas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fasilitas_id_fasilitas_seq OWNED BY public.fasilitas.id_fasilitas;


--
-- TOC entry 222 (class 1259 OID 28161)
-- Name: galeri; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.galeri (
    id integer NOT NULL,
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
    kategori character varying(50)
);


ALTER TABLE public.galeri OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 28167)
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
-- Dependencies: 223
-- Name: galeri_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeri_id_seq OWNED BY public.galeri.id;


--
-- TOC entry 224 (class 1259 OID 28168)
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
-- TOC entry 225 (class 1259 OID 28173)
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
-- Dependencies: 225
-- Name: kegiatan_lab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kegiatan_lab_id_seq OWNED BY public.kegiatan_lab.id;


--
-- TOC entry 226 (class 1259 OID 28174)
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
-- TOC entry 227 (class 1259 OID 28177)
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
-- Dependencies: 227
-- Name: kekayaan_intelektual_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kekayaan_intelektual_id_seq OWNED BY public.kekayaan_intelektual.id;


--
-- TOC entry 243 (class 1259 OID 28345)
-- Name: partners; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.partners (
    id integer NOT NULL,
    nama character varying(255) NOT NULL,
    logo text,
    website character varying(255),
    deskripsi text,
    kategori character varying(100),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.partners OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 28344)
-- Name: partners_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.partners_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.partners_id_seq OWNER TO postgres;

--
-- TOC entry 3535 (class 0 OID 0)
-- Dependencies: 242
-- Name: partners_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.partners_id_seq OWNED BY public.partners.id;


--
-- TOC entry 228 (class 1259 OID 28178)
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
-- TOC entry 229 (class 1259 OID 28183)
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
-- TOC entry 3536 (class 0 OID 0)
-- Dependencies: 229
-- Name: penelitian_lab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.penelitian_lab_id_seq OWNED BY public.penelitian_lab.id;


--
-- TOC entry 230 (class 1259 OID 28184)
-- Name: ppm; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ppm (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun character varying(20)
);


ALTER TABLE public.ppm OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 28187)
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
-- TOC entry 3537 (class 0 OID 0)
-- Dependencies: 231
-- Name: ppm_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ppm_id_seq OWNED BY public.ppm.id;


--
-- TOC entry 232 (class 1259 OID 28188)
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
-- TOC entry 233 (class 1259 OID 28193)
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
-- TOC entry 3538 (class 0 OID 0)
-- Dependencies: 233
-- Name: produk_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produk_id_seq OWNED BY public.produk.id;


--
-- TOC entry 234 (class 1259 OID 28194)
-- Name: publikasi_dosen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.publikasi_dosen (
    id integer NOT NULL,
    id_dosen uuid NOT NULL,
    judul character varying(255) NOT NULL,
    tahun integer,
    link_jurnal text,
    kategori character varying(100),
    deskripsi text
);


ALTER TABLE public.publikasi_dosen OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 28199)
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
-- TOC entry 3539 (class 0 OID 0)
-- Dependencies: 235
-- Name: publikasi_dosen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.publikasi_dosen_id_seq OWNED BY public.publikasi_dosen.id;


--
-- TOC entry 236 (class 1259 OID 28200)
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
-- TOC entry 237 (class 1259 OID 28205)
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
-- TOC entry 3540 (class 0 OID 0)
-- Dependencies: 237
-- Name: publikasi_lab_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.publikasi_lab_id_seq OWNED BY public.publikasi_lab.id;


--
-- TOC entry 238 (class 1259 OID 28206)
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
-- TOC entry 239 (class 1259 OID 28209)
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
-- TOC entry 3541 (class 0 OID 0)
-- Dependencies: 239
-- Name: riset_dosen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.riset_dosen_id_seq OWNED BY public.riset_dosen.id;


--
-- TOC entry 240 (class 1259 OID 28210)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    role public.user_role DEFAULT 'editor'::public.user_role NOT NULL,
    id_dosen uuid
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 28214)
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
-- TOC entry 3542 (class 0 OID 0)
-- Dependencies: 241
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3285 (class 2604 OID 28215)
-- Name: aktivitas_dosen id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aktivitas_dosen ALTER COLUMN id SET DEFAULT nextval('public.aktivitas_dosen_id_seq'::regclass);


--
-- TOC entry 3286 (class 2604 OID 28216)
-- Name: berita id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.berita ALTER COLUMN id SET DEFAULT nextval('public.berita_id_seq'::regclass);


--
-- TOC entry 3288 (class 2604 OID 28217)
-- Name: fasilitas id_fasilitas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas ALTER COLUMN id_fasilitas SET DEFAULT nextval('public.fasilitas_id_fasilitas_seq'::regclass);


--
-- TOC entry 3289 (class 2604 OID 28218)
-- Name: galeri id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri ALTER COLUMN id SET DEFAULT nextval('public.galeri_id_seq'::regclass);


--
-- TOC entry 3291 (class 2604 OID 28219)
-- Name: kegiatan_lab id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan_lab ALTER COLUMN id SET DEFAULT nextval('public.kegiatan_lab_id_seq'::regclass);


--
-- TOC entry 3292 (class 2604 OID 28220)
-- Name: kekayaan_intelektual id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kekayaan_intelektual ALTER COLUMN id SET DEFAULT nextval('public.kekayaan_intelektual_id_seq'::regclass);


--
-- TOC entry 3301 (class 2604 OID 28348)
-- Name: partners id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.partners ALTER COLUMN id SET DEFAULT nextval('public.partners_id_seq'::regclass);


--
-- TOC entry 3293 (class 2604 OID 28221)
-- Name: penelitian_lab id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.penelitian_lab ALTER COLUMN id SET DEFAULT nextval('public.penelitian_lab_id_seq'::regclass);


--
-- TOC entry 3294 (class 2604 OID 28222)
-- Name: ppm id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ppm ALTER COLUMN id SET DEFAULT nextval('public.ppm_id_seq'::regclass);


--
-- TOC entry 3295 (class 2604 OID 28223)
-- Name: produk id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk ALTER COLUMN id SET DEFAULT nextval('public.produk_id_seq'::regclass);


--
-- TOC entry 3296 (class 2604 OID 28224)
-- Name: publikasi_dosen id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_dosen ALTER COLUMN id SET DEFAULT nextval('public.publikasi_dosen_id_seq'::regclass);


--
-- TOC entry 3297 (class 2604 OID 28225)
-- Name: publikasi_lab id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_lab ALTER COLUMN id SET DEFAULT nextval('public.publikasi_lab_id_seq'::regclass);


--
-- TOC entry 3298 (class 2604 OID 28226)
-- Name: riset_dosen id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.riset_dosen ALTER COLUMN id SET DEFAULT nextval('public.riset_dosen_id_seq'::regclass);


--
-- TOC entry 3299 (class 2604 OID 28227)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3494 (class 0 OID 28137)
-- Dependencies: 215
-- Data for Name: aktivitas_dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aktivitas_dosen (id, id_dosen, judul, jenis_aktivitas, tanggal, deskripsi) FROM stdin;
\.


--
-- TOC entry 3496 (class 0 OID 28143)
-- Dependencies: 217
-- Data for Name: berita; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.berita (id, created_by, judul, isi_berita, tanggal, gambar_utama, kategori) FROM stdin;
5	a0000000-0000-0000-0000-000000000001	Kunjungan Industri ke Lab AI Polinema	Tidak ada	1232-12-12	/uploads/berita/berita_1764495622_951de4da8d.jpg	ez
6	a0000000-0000-0000-0000-000000000001	mplementasi Teknologi untuk Mendukung Budidaya dan Pemasaran Pertanian Berbasis Smart Farming pada P4S Bumiaji Sejahtera Kota Batu	Implementasi Teknologi untuk Mendukung Budidaya dan Pemasaran Pertanian Berbasis Smart Farming pada P4S Bumiaji Sejahtera Kota Batu\r\nProgram Studi D-IV Sistem Informasi Bisnis (SIB) Politeknik Negeri Malang melalui kegiatan Pengabdian kepada Masyarakat Skema Kemitraan Masyarakat kembali menunjukkan komitmennya dalam mendukung penerapan teknologi di sektor pertanian. Kegiatan ini mengusung judul “Implementasi Teknologi untuk Mendukung Budidaya dan Pemasaran Pertanian Berbasis Smart Farming pada P4S Bumiaji Sejahtera Kota Batu.”\r\nKegiatan pengabdian ini diketuai oleh Triana Fatmawati, S.T., M.T., dengan anggota tim yang terdiri dari Ir. Yan Watequlis Syaifudin, S.T., M.MT., Ph.D., Indrazno Siradjuddin, S.T., M.T., Ph.D., Yuri Ariyanto, S.Kom., M.Kom., Rokhimatul Wakhidah, S.Pd., M.T., dan Chandrasena Setiadi, S.T., M.Tr.T..\r\nMelalui kolaborasi antara dunia akademik dan masyarakat tani, kegiatan ini bertujuan untuk memperkenalkan konsep Smart Farming yang mengintegrasikan teknologi digital dalam proses budidaya, pengawasan lingkungan, dan pemasaran hasil pertanian. Implementasi sistem berbasis IoT (Internet of Things) serta platform digital pemasaran diharapkan dapat meningkatkan efisiensi produksi dan memperluas jangkauan pasar bagi para petani di P4S Bumiaji Sejahtera.\r\nSelain memberikan pelatihan teknis, tim pengabdian juga membantu mitra dalam merancang strategi promosi digital untuk memperkuat daya saing produk pertanian lokal di era modern.\r\nDengan adanya kegiatan ini, diharapkan masyarakat tani di Kota Batu dapat bertransformasi menuju pertanian cerdas, mandiri, dan berkelanjutan, sejalan dengan visi Politeknik Negeri Malang dalam mewujudkan inovasi teknologi untuk kemajuan bangsa.	2025-11-11	\N	Smartfarming , Teknologi 
\.


--
-- TOC entry 3498 (class 0 OID 28149)
-- Dependencies: 219
-- Data for Name: dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dosen (id, nama, nip, email, foto_profil, keahlian_text, deskripsi, jabatan, google_scholar, researcher, orcid) FROM stdin;
a0000000-0000-0000-0000-000000000002	Pramana Yoga Saputra, S.Kom., M.MT.	198305212006041003	pramana.yoga@polinema.ac.id	dosen_pramana.jpg	Software Engineering, Mobile Dev	Koordinator pengembangan piranti lunak.	asisten_lab	\N	\N	\N
a0000000-0000-0000-0000-000000000003	Mustika Mentari, S.Kom., M.Kom.	198805042015042001	mustika.mentari@polinema.ac.id	dosen_mustika.jpg	Data Mining, DSS, AI	Peneliti aktif di bidang sistem pendukung keputusan.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000004	Mochammad Afif Hendrawan, S.Kom.	199001012019031001	afif.hendrawan@polinema.ac.id	dosen_afif.jpg	Computer Vision, Image Processing	Fokus pada pengolahan citra digital.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000005	Chandra Wiharya	199201012020121001	chandra.wiharya@polinema.ac.id	dosen_chandra.jpg	Embedded System, IoT	Pengembang sistem tertanam dan IoT.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000007	Kadek Suarjuna Batubulan	199103032019031003	kadek.suarjuna@polinema.ac.id	dosen_kadek.jpg	Web Development, UI/UX	Spesialis antarmuka pengguna dan desain web.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000009	Retno Damayanti, S.Pd., M.Kom.	198505052010122005	retno.damayanti@polinema.ac.id	dosen_retno.jpg	Education Technology, E-Learning	Pengembang media pembelajaran interaktif.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000010	Triana Fatmawati, S.T., M.T.	198706062012122006	triana.fatmawati@polinema.ac.id	dosen_triana.jpg	Network Security, Cryptography	Peneliti keamanan jaringan.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000011	Yuri Ariyanto, S.Kom., M.Kom.	198206272010121006	yuri.ariyanto@polinema.ac.id	dosen_yuri.jpg	Big Data, Data Analysis	Analis data berskala besar.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000008	Noprianto, S.Kom., M.Eng.	198904042018031004	noprianto@polinema.ac.id	dosen_noprianto.jpg	Internet Of Think, Computer Vision, Software Engineer, Machine Learning	Fokus pada arsitektur cloud dan backend.	member	\N	\N	\N
a0000000-0000-0000-0000-000000000006	M. Hasyim Ratsanjani, S.Kom., M.Kom.	199302022021031002	hasyim.ratsanjani@polinema.ac.id	/uploads/dosen/dosen_1764483374_ec096830a2.png	Information Extraction, Text Mining, Project Management, Social Media Analytics, Digital Image Processing	He received bachelor degree from Department of Informatics Engineering, Maulana Malik Ibrahim Islamic University in 2013 and master degree from Department ofInformatic Engineering, Indonesia University  in 2016.	member			
a0000000-0000-0000-0000-000000000001	Yan Watequlis Syaifudin, S.T., M.MT., Ph.D.	198101052005011005	yan.watequlis@polinema.ac.id	/uploads/dosen/dosen_1764482269_543840b0dc.png	Cyber Security, AI, Network	Dosen Senior dan Peneliti di bidang Keamanan Siber dan AI.	ketua_lab	https://scholar.google.com/citations?user=H3IYHJUAAAAJ	https://www.researchgate.net/profile/Yan-Syaifudin	https://orcid.org/0000-0001-6582-3495
\.


--
-- TOC entry 3499 (class 0 OID 28155)
-- Dependencies: 220
-- Data for Name: fasilitas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fasilitas (id_fasilitas, nama_fasilitas, deskripsi, kondisi, foto) FROM stdin;
1	PC High Performance Computing (HPC)	Komputer spek tinggi untuk training model Deep Learning.	Sangat Baik	hpc.jpg
2	Robot Arm Dobot Magician	Robot lengan untuk simulasi industri 4.0.	Baik	dobot.jpg
3	IoT Development Board Kits	Perangkat lengkap Raspberry Pi dan Arduino.	Baik	iot_kits.jpg
4	gagag	gagag	perbaikan	/uploads/fasilitas/fasilitas_1764495747_9d7d572b6c.png
\.


--
-- TOC entry 3501 (class 0 OID 28161)
-- Dependencies: 222
-- Data for Name: galeri; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.galeri (id, uploaded_by, file_url, caption, id_penelitian, id_kegiatan_lab, id_publikasi_lab, id_berita, id_produk, id_fasilitas, tanggal_upload, kategori) FROM stdin;
5	a0000000-0000-0000-0000-000000000001	/uploads/berita/berita_1764495622_951de4da8d.jpg		\N	\N	\N	5	\N	\N	2025-11-30 16:40:22.859929	\N
6	a0000000-0000-0000-0000-000000000001	/uploads/fasilitas/fasilitas_1764495747_9d7d572b6c.png		\N	\N	\N	\N	\N	4	2025-11-30 16:42:27.720938	\N
\.


--
-- TOC entry 3503 (class 0 OID 28168)
-- Dependencies: 224
-- Data for Name: kegiatan_lab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kegiatan_lab (id, id_dosen, judul, deskripsi, tanggal_kegiatan, file_dokumentasi) FROM stdin;
\.


--
-- TOC entry 3505 (class 0 OID 28174)
-- Dependencies: 226
-- Data for Name: kekayaan_intelektual; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kekayaan_intelektual (id, id_dosen, judul, no_permohonan, tahun) FROM stdin;
\.


--
-- TOC entry 3522 (class 0 OID 28345)
-- Dependencies: 243
-- Data for Name: partners; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.partners (id, nama, logo, website, deskripsi, kategori, created_at) FROM stdin;
1	ADS	/uploads/partners/ads.png	#	Technology Solutions	Industry Partner	2025-12-01 11:11:16.732905
2	ARM Solusi	/uploads/partners/arm.png	#	Software Development	Industry Partner	2025-12-01 11:11:16.732905
3	Bumaji Sejantera	/uploads/partners/bumaji.png	#	Agricultural Tech	Industry Partner	2025-12-01 11:11:16.732905
4	DSG	/uploads/partners/dsg.png	#	Digital Solutions	Industry Partner	2025-12-01 11:11:16.732905
5	PT Link Apisindo Media	/uploads/partners/link.png	#	Media & Tech	Industry Partner	2025-12-01 11:11:16.732905
6	QuantumGrid	/uploads/partners/quantum.png	#	Cloud Services	Industry Partner	2025-12-01 11:11:16.732905
7	Infonika Garasa	/uploads/partners/infonika.png	#	IT Infrastructure	Industry Partner	2025-12-01 11:11:16.732905
8	Utcero Indonesia	/uploads/partners/utcero.png	#	Tech Innovation	Industry Partner	2025-12-01 11:11:16.732905
9	Sekawan Media	/uploads/partners/sekawan.png	#	Digital Agency	Industry Partner	2025-12-01 11:11:16.732905
10	Malang Creative Fusion	/uploads/partners/mcf.png	#	Creative Solutions	Industry Partner	2025-12-01 11:11:16.732905
11	INSTIKI	/uploads/partners/instiki.png	#	Technology Institute	Educational Institutions	2025-12-01 11:11:16.732905
12	MCC	/uploads/partners/mcc.png	#	Computing Center	Educational Institutions	2025-12-01 11:11:16.732905
13	UNESA	/uploads/partners/unesa.png	#	State University	Educational Institutions	2025-12-01 11:11:16.732905
14	Politeknik Negeri Banyuwangi	/uploads/partners/polban.png	#	Polytechnic	Educational Institutions	2025-12-01 11:11:16.732905
15	SMK Negeri 1	/uploads/partners/smk1.png	#	Vocational School	Educational Institutions	2025-12-01 11:11:16.732905
16	UIN Malang	/uploads/partners/uin.png	#	Islamic University	Educational Institutions	2025-12-01 11:11:16.732905
17	Politeknik Negeri Malang	/uploads/partners/polinema.png	#	State Polytechnic	Educational Institutions	2025-12-01 11:11:16.732905
18	ASTRAtech	/uploads/partners/astra.png	#	Technical School	Educational Institutions	2025-12-01 11:11:16.732905
19	Duke University	/uploads/partners/duke.png	#	USA University	International Institutions	2025-12-01 11:11:16.732905
20	Okayama University	/uploads/partners/okayama.png	#	Japan University	International Institutions	2025-12-01 11:11:16.732905
21	DPUBM	/uploads/partners/dpubm.png	#	Public Works	Government Institutions	2025-12-01 11:11:16.732905
22	Kota Batu	/uploads/partners/batu.png	#	City Government	Government Institutions	2025-12-01 11:11:16.732905
23	BIN	/uploads/partners/bin.png	#	Intelligence Agency	Government Institutions	2025-12-01 11:11:16.732905
24	Diskominfo Kota Batu	/uploads/partners/diskominfo-batu.png	#	Communication Office	Government Institutions	2025-12-01 11:11:16.732905
25	Kominfo Jatim	/uploads/partners/kominfo.png	#	Regional Communication Office	Government Institutions	2025-12-01 11:11:16.732905
\.


--
-- TOC entry 3507 (class 0 OID 28178)
-- Dependencies: 228
-- Data for Name: penelitian_lab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.penelitian_lab (id, id_dosen, judul, deskripsi, status) FROM stdin;
1	a0000000-0000-0000-0000-000000000006	PBO gege	Gajelu	rencana
\.


--
-- TOC entry 3509 (class 0 OID 28184)
-- Dependencies: 230
-- Data for Name: ppm; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ppm (id, id_dosen, judul, tahun) FROM stdin;
\.


--
-- TOC entry 3511 (class 0 OID 28188)
-- Dependencies: 232
-- Data for Name: produk; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produk (id, nama_produk, deskripsi, link_demo, image, kategori) FROM stdin;
3	AMATI	Automated Cyber Security Maturity Assessment - A comprehensive security assessment tool designed to evaluate and enhance organizational cybersecurity posture.	#	/uploads/produk/amati.png	Security
4	SEALS	Smart Adaptive Learning System - An intelligent learning platform that adapts to individual student needs and learning patterns for optimal educational outcomes.	#	/uploads/produk/seals.png	Education
5	Agrilink Vocpro	Agricultural Vocational Professional Platform - Connecting farmers with modern agricultural technologies and best practices through innovative digital solutions.	#	/uploads/produk/ijo-removebg-preview.png	Agriculture
6	CrowdEquiChain	Blockchain-based Crowdfunding Platform - Decentralized equity crowdfunding solution ensuring transparency, security, and fair distribution of investment opportunities.	#	/uploads/produk/logo_blockchain-1024x305.png	Blockchain
7	OwnCloud Server	Private Cloud Storage Solution - Secure, self-hosted cloud storage platform providing complete control over your data with enterprise-grade features.	#	/uploads/produk/OwnCloud2-Logo.svg_-300x157.png	Cloud Storage
8	Gitea	Self-hosted Git Service - Lightweight, fast, and reliable version control platform for managing code repositories with seamless collaboration tools.	#	/uploads/produk/gitea-300x107-removebg-preview.png	DevOps
\.


--
-- TOC entry 3513 (class 0 OID 28194)
-- Dependencies: 234
-- Data for Name: publikasi_dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.publikasi_dosen (id, id_dosen, judul, tahun, link_jurnal, kategori, deskripsi) FROM stdin;
1	a0000000-0000-0000-0000-000000000001	Ayam Bakar	2025	google	Malaz	WENAK 
\.


--
-- TOC entry 3515 (class 0 OID 28200)
-- Dependencies: 236
-- Data for Name: publikasi_lab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.publikasi_lab (id, id_dosen, judul, deskripsi, file_dokumen, kategori) FROM stdin;
1	a0000000-0000-0000-0000-000000000001	Rilis Aplikasi Smart Campus v2.0	affafaf	\N	Malaz
\.


--
-- TOC entry 3517 (class 0 OID 28206)
-- Dependencies: 238
-- Data for Name: riset_dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.riset_dosen (id, id_dosen, judul, tahun, sumber_dana) FROM stdin;
\.


--
-- TOC entry 3519 (class 0 OID 28210)
-- Dependencies: 240
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, password, role, id_dosen) FROM stdin;
1	admin	$2a$06$ppvUMlZUwv2CZ545KOCpFuVAgCtR7e2KaDeFtj/iJ17yKAz9HnYja	admin	a0000000-0000-0000-0000-000000000001
2	pramana	$2a$06$uRdGRIzsQsy3KLqjik70bOXIFFv1eU9954W9JH2Zk9LVAilb.LzIi	editor	a0000000-0000-0000-0000-000000000002
3	mustika	$2a$06$6OZJBzYgcyf0qUvb6mY2wuIgd6VVDObGsGA4INStjv.JAt5LFHp2.	editor	a0000000-0000-0000-0000-000000000003
4	afif	$2a$06$RtNcJI0bk0MBS7gUv6Rif.3dN7ShwRhSrQyaq/Q.tfRMZuY17Ln2G	editor	a0000000-0000-0000-0000-000000000004
5	chandra	$2a$06$c56UE1pbJDgBd.zW5Ohqfuj1DZb04Tgpqqzi3vSbnazDbAfwwtFou	editor	a0000000-0000-0000-0000-000000000005
6	hasyim	$2a$06$c.K9d6ck5QIe7TM55iJWJOVd3b.cWIDUyN7ImjKXmgcfTiSj4flmu	editor	a0000000-0000-0000-0000-000000000006
7	kadek	$2a$06$evkgyzYC5lz3EMSM.IHU0O9muqQdL6zfOANXKoEUtfY/gG06kk7Oa	editor	a0000000-0000-0000-0000-000000000007
8	nopri	$2a$06$VV7JQc9/K7yOC0yuSmiNO.0JRYJl/wMCTDsVfjXo1/t06WkeTymBC	editor	a0000000-0000-0000-0000-000000000008
9	retno	$2a$06$eSLwor3hLNSAnerc69.lMueLRIj/PQ6ToNzRWuT6Fnlae4SZGbbiW	editor	a0000000-0000-0000-0000-000000000009
10	triana	$2a$06$QhmLUkAw6TBFhQNT8BJBrOCmwURqhfItGEFnmo0jE27ohbFUwBMrm	editor	a0000000-0000-0000-0000-000000000010
11	yuri	$2a$06$QiwzDb0PzPgO48SrWWaaUO1RJRs0u1bVKR17hTUXPtU/cEWtjT79K	editor	a0000000-0000-0000-0000-000000000011
\.


--
-- TOC entry 3543 (class 0 OID 0)
-- Dependencies: 216
-- Name: aktivitas_dosen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aktivitas_dosen_id_seq', 1, false);


--
-- TOC entry 3544 (class 0 OID 0)
-- Dependencies: 218
-- Name: berita_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.berita_id_seq', 6, true);


--
-- TOC entry 3545 (class 0 OID 0)
-- Dependencies: 221
-- Name: fasilitas_id_fasilitas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fasilitas_id_fasilitas_seq', 4, true);


--
-- TOC entry 3546 (class 0 OID 0)
-- Dependencies: 223
-- Name: galeri_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeri_id_seq', 6, true);


--
-- TOC entry 3547 (class 0 OID 0)
-- Dependencies: 225
-- Name: kegiatan_lab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kegiatan_lab_id_seq', 1, false);


--
-- TOC entry 3548 (class 0 OID 0)
-- Dependencies: 227
-- Name: kekayaan_intelektual_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kekayaan_intelektual_id_seq', 1, false);


--
-- TOC entry 3549 (class 0 OID 0)
-- Dependencies: 242
-- Name: partners_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.partners_id_seq', 25, true);


--
-- TOC entry 3550 (class 0 OID 0)
-- Dependencies: 229
-- Name: penelitian_lab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.penelitian_lab_id_seq', 1, true);


--
-- TOC entry 3551 (class 0 OID 0)
-- Dependencies: 231
-- Name: ppm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ppm_id_seq', 1, false);


--
-- TOC entry 3552 (class 0 OID 0)
-- Dependencies: 233
-- Name: produk_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produk_id_seq', 8, true);


--
-- TOC entry 3553 (class 0 OID 0)
-- Dependencies: 235
-- Name: publikasi_dosen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.publikasi_dosen_id_seq', 1, true);


--
-- TOC entry 3554 (class 0 OID 0)
-- Dependencies: 237
-- Name: publikasi_lab_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.publikasi_lab_id_seq', 1, true);


--
-- TOC entry 3555 (class 0 OID 0)
-- Dependencies: 239
-- Name: riset_dosen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.riset_dosen_id_seq', 1, false);


--
-- TOC entry 3556 (class 0 OID 0)
-- Dependencies: 241
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 11, true);


--
-- TOC entry 3304 (class 2606 OID 28229)
-- Name: aktivitas_dosen aktivitas_dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aktivitas_dosen
    ADD CONSTRAINT aktivitas_dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3306 (class 2606 OID 28231)
-- Name: berita berita_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.berita
    ADD CONSTRAINT berita_pkey PRIMARY KEY (id);


--
-- TOC entry 3308 (class 2606 OID 28233)
-- Name: dosen dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3310 (class 2606 OID 28235)
-- Name: fasilitas fasilitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fasilitas
    ADD CONSTRAINT fasilitas_pkey PRIMARY KEY (id_fasilitas);


--
-- TOC entry 3312 (class 2606 OID 28237)
-- Name: galeri galeri_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT galeri_pkey PRIMARY KEY (id);


--
-- TOC entry 3314 (class 2606 OID 28239)
-- Name: kegiatan_lab kegiatan_lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan_lab
    ADD CONSTRAINT kegiatan_lab_pkey PRIMARY KEY (id);


--
-- TOC entry 3316 (class 2606 OID 28241)
-- Name: kekayaan_intelektual kekayaan_intelektual_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kekayaan_intelektual
    ADD CONSTRAINT kekayaan_intelektual_pkey PRIMARY KEY (id);


--
-- TOC entry 3334 (class 2606 OID 28353)
-- Name: partners partners_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.partners
    ADD CONSTRAINT partners_pkey PRIMARY KEY (id);


--
-- TOC entry 3318 (class 2606 OID 28243)
-- Name: penelitian_lab penelitian_lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.penelitian_lab
    ADD CONSTRAINT penelitian_lab_pkey PRIMARY KEY (id);


--
-- TOC entry 3320 (class 2606 OID 28245)
-- Name: ppm ppm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ppm
    ADD CONSTRAINT ppm_pkey PRIMARY KEY (id);


--
-- TOC entry 3322 (class 2606 OID 28247)
-- Name: produk produk_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produk
    ADD CONSTRAINT produk_pkey PRIMARY KEY (id);


--
-- TOC entry 3324 (class 2606 OID 28249)
-- Name: publikasi_dosen publikasi_dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_dosen
    ADD CONSTRAINT publikasi_dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3326 (class 2606 OID 28251)
-- Name: publikasi_lab publikasi_lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_lab
    ADD CONSTRAINT publikasi_lab_pkey PRIMARY KEY (id);


--
-- TOC entry 3328 (class 2606 OID 28253)
-- Name: riset_dosen riset_dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.riset_dosen
    ADD CONSTRAINT riset_dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3330 (class 2606 OID 28255)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3332 (class 2606 OID 28257)
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- TOC entry 3335 (class 2606 OID 28258)
-- Name: aktivitas_dosen aktivitas_dosen_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aktivitas_dosen
    ADD CONSTRAINT aktivitas_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3336 (class 2606 OID 28263)
-- Name: berita berita_created_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.berita
    ADD CONSTRAINT berita_created_by_fkey FOREIGN KEY (created_by) REFERENCES public.dosen(id) ON DELETE SET NULL;


--
-- TOC entry 3337 (class 2606 OID 28268)
-- Name: galeri fk_galeri_berita; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_berita FOREIGN KEY (id_berita) REFERENCES public.berita(id) ON DELETE SET NULL;


--
-- TOC entry 3338 (class 2606 OID 28273)
-- Name: galeri fk_galeri_fasilitas; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_fasilitas FOREIGN KEY (id_fasilitas) REFERENCES public.fasilitas(id_fasilitas) ON DELETE SET NULL;


--
-- TOC entry 3339 (class 2606 OID 28278)
-- Name: galeri fk_galeri_kegiatan_lab; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_kegiatan_lab FOREIGN KEY (id_kegiatan_lab) REFERENCES public.kegiatan_lab(id) ON DELETE SET NULL;


--
-- TOC entry 3340 (class 2606 OID 28283)
-- Name: galeri fk_galeri_penelitian; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_penelitian FOREIGN KEY (id_penelitian) REFERENCES public.penelitian_lab(id) ON DELETE SET NULL;


--
-- TOC entry 3341 (class 2606 OID 28288)
-- Name: galeri fk_galeri_produk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_produk FOREIGN KEY (id_produk) REFERENCES public.produk(id) ON DELETE SET NULL;


--
-- TOC entry 3342 (class 2606 OID 28293)
-- Name: galeri fk_galeri_publikasi_lab; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_publikasi_lab FOREIGN KEY (id_publikasi_lab) REFERENCES public.publikasi_lab(id) ON DELETE SET NULL;


--
-- TOC entry 3343 (class 2606 OID 28298)
-- Name: galeri fk_galeri_uploaded_by_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeri
    ADD CONSTRAINT fk_galeri_uploaded_by_dosen FOREIGN KEY (uploaded_by) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3351 (class 2606 OID 28303)
-- Name: users fk_user_dosen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_user_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL;


--
-- TOC entry 3344 (class 2606 OID 28308)
-- Name: kegiatan_lab kegiatan_lab_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kegiatan_lab
    ADD CONSTRAINT kegiatan_lab_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3345 (class 2606 OID 28313)
-- Name: kekayaan_intelektual kekayaan_intelektual_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kekayaan_intelektual
    ADD CONSTRAINT kekayaan_intelektual_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3346 (class 2606 OID 28318)
-- Name: penelitian_lab penelitian_lab_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.penelitian_lab
    ADD CONSTRAINT penelitian_lab_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3347 (class 2606 OID 28323)
-- Name: ppm ppm_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ppm
    ADD CONSTRAINT ppm_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


--
-- TOC entry 3348 (class 2606 OID 28328)
-- Name: publikasi_dosen publikasi_dosen_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_dosen
    ADD CONSTRAINT publikasi_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL;


--
-- TOC entry 3349 (class 2606 OID 28333)
-- Name: publikasi_lab publikasi_lab_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.publikasi_lab
    ADD CONSTRAINT publikasi_lab_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE SET NULL;


--
-- TOC entry 3350 (class 2606 OID 28338)
-- Name: riset_dosen riset_dosen_id_dosen_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.riset_dosen
    ADD CONSTRAINT riset_dosen_id_dosen_fkey FOREIGN KEY (id_dosen) REFERENCES public.dosen(id) ON DELETE CASCADE;


-- Completed on 2025-12-01 11:13:14

--
-- PostgreSQL database dump complete
--

\unrestrict pDqGT7gkobirCMhOnQzBQfDbBZyPICFdpHQfiaDa3jD268k8uYDChBCGHRp8xQb

