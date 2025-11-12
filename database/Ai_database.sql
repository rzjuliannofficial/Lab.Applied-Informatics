--
-- PostgreSQL database dump
--

\restrict fTZnoeSoQdnDhlat62MjOcJxGyfkAedpDbu3DV9nTk7DFB3wapbgIMa0Xwq6qBy

-- Dumped from database version 15.14
-- Dumped by pg_dump version 15.14

-- Started on 2025-11-04 14:34:30

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 215 (class 1259 OID 25823)
-- Name: dosen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dosen (
    id integer NOT NULL,
    nama character varying(255) NOT NULL,
    nip character varying(50) NOT NULL,
    email character varying(255) NOT NULL,
    keahlian character varying(255),
    deskripsi text,
    foto_url character varying(255),
    no_telpon character varying(20),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.dosen OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 25822)
-- Name: dosen_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.dosen_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dosen_id_seq OWNER TO postgres;

--
-- TOC entry 3345 (class 0 OID 0)
-- Dependencies: 214
-- Name: dosen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.dosen_id_seq OWNED BY public.dosen.id;


--
-- TOC entry 217 (class 1259 OID 25838)
-- Name: projects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.projects (
    id integer NOT NULL,
    judul character varying(255) NOT NULL,
    deskripsi text NOT NULL,
    kategori character varying(100),
    teknologi character varying(255),
    gambar_url character varying(255),
    url_demo character varying(255),
    dosen_id integer,
    status character varying(50) DEFAULT 'active'::character varying,
    tahun integer,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.projects OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 25837)
-- Name: projects_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.projects_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.projects_id_seq OWNER TO postgres;

--
-- TOC entry 3346 (class 0 OID 0)
-- Dependencies: 216
-- Name: projects_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.projects_id_seq OWNED BY public.projects.id;


--
-- TOC entry 3178 (class 2604 OID 25826)
-- Name: dosen id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen ALTER COLUMN id SET DEFAULT nextval('public.dosen_id_seq'::regclass);


--
-- TOC entry 3181 (class 2604 OID 25841)
-- Name: projects id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects ALTER COLUMN id SET DEFAULT nextval('public.projects_id_seq'::regclass);


--
-- TOC entry 3337 (class 0 OID 25823)
-- Dependencies: 215
-- Data for Name: dosen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dosen (id, nama, nip, email, keahlian, deskripsi, foto_url, no_telpon, created_at, updated_at) FROM stdin;
1	Dr. Budi Santoso	1982031001	budi.santoso@polinema.ac.id	AI & Machine Learning	Kepala Lab AI dengan pengalaman 15 tahun di bidang kecerdasan buatan	/images/dosen1.jpg	+62-812-3456-7890	2025-11-01 13:21:37.262375	2025-11-01 13:21:37.262375
2	Ir. Siti Nurhaliza, M.Kom	1985052002	siti.nurhaliza@polinema.ac.id	Multimedia & Web Dev	Spesialis multimedia dan pengembangan aplikasi web modern	/images/dosen2.jpg	+62-812-3456-7891	2025-11-01 13:21:37.262375	2025-11-01 13:21:37.262375
3	Adi Pratama, S.T., M.T.	1988071003	adi.pratama@polinema.ac.id	Computer Vision	Ahli dalam pengolahan citra dan visi komputer	/images/dosen3.jpg	+62-812-3456-7892	2025-11-01 13:21:37.262375	2025-11-01 13:21:37.262375
\.


--
-- TOC entry 3339 (class 0 OID 25838)
-- Dependencies: 217
-- Data for Name: projects; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.projects (id, judul, deskripsi, kategori, teknologi, gambar_url, url_demo, dosen_id, status, tahun, created_at, updated_at) FROM stdin;
1	Smart Traffic Management System	Sistem manajemen lalu lintas menggunakan AI dan computer vision untuk mendeteksi kemacetan real-time	AI/IoT	Python, TensorFlow, OpenCV	/images/project1.jpg	#	1	active	2024	2025-11-01 13:21:39.014441	2025-11-01 13:21:39.014441
2	Digital Art Generator	Platform generator seni digital menggunakan deep learning dan neural networks	AI/Creative	Python, PyTorch, React	/images/project2.jpg	#	2	active	2024	2025-11-01 13:21:39.014441	2025-11-01 13:21:39.014441
3	Augmented Reality Learning App	Aplikasi pembelajaran interaktif dengan teknologi Augmented Reality untuk siswa	AR/Education	Unity, C#, ARKit	/images/project3.jpg	#	2	active	2023	2025-11-01 13:21:39.014441	2025-11-01 13:21:39.014441
4	Natural Language Processing Chatbot	Chatbot cerdas dengan kemampuan pemahaman bahasa alami untuk customer service	NLP	Python, NLTK, FastAPI	/images/project4.jpg	#	1	active	2024	2025-11-01 13:21:39.014441	2025-11-01 13:21:39.014441
5	3D Video Production Suite	Suite profesional untuk produksi video 3D dan animasi berkualitas tinggi	Multimedia	Blender, Python, WebGL	/images/project5.jpg	#	2	active	2023	2025-11-01 13:21:39.014441	2025-11-01 13:21:39.014441
6	IoT Sensor Network Analytics	Platform analitik untuk jaringan sensor IoT dengan dashboard real-time	IoT/Data	Node.js, PostgreSQL, React	/images/project6.jpg	#	3	active	2024	2025-11-01 13:21:39.014441	2025-11-01 13:21:39.014441
\.


--
-- TOC entry 3347 (class 0 OID 0)
-- Dependencies: 214
-- Name: dosen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dosen_id_seq', 3, true);


--
-- TOC entry 3348 (class 0 OID 0)
-- Dependencies: 216
-- Name: projects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.projects_id_seq', 6, true);


--
-- TOC entry 3186 (class 2606 OID 25836)
-- Name: dosen dosen_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_email_key UNIQUE (email);


--
-- TOC entry 3188 (class 2606 OID 25834)
-- Name: dosen dosen_nip_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_nip_key UNIQUE (nip);


--
-- TOC entry 3190 (class 2606 OID 25832)
-- Name: dosen dosen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT dosen_pkey PRIMARY KEY (id);


--
-- TOC entry 3192 (class 2606 OID 25848)
-- Name: projects projects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (id);


--
-- TOC entry 3193 (class 2606 OID 25849)
-- Name: projects projects_dosen_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_dosen_id_fkey FOREIGN KEY (dosen_id) REFERENCES public.dosen(id);


-- Completed on 2025-11-04 14:34:31

--
-- PostgreSQL database dump complete
--

\unrestrict fTZnoeSoQdnDhlat62MjOcJxGyfkAedpDbu3DV9nTk7DFB3wapbgIMa0Xwq6qBy

