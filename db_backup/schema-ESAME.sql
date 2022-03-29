--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-02-17 11:34:45

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
-- TOC entry 232 (class 1259 OID 17230)
-- Name: affiancamento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.affiancamento (
    cf_junior character(16) NOT NULL,
    cf_senior character(16) NOT NULL,
    stato character varying(20) NOT NULL,
    data_inizio date NOT NULL
);


ALTER TABLE public.affiancamento OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 17215)
-- Name: assegnazione; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.assegnazione (
    id_obiettivo integer NOT NULL,
    cf_dipendente character(16) NOT NULL,
    mese character varying(20) NOT NULL,
    stato character varying(20) NOT NULL
);


ALTER TABLE public.assegnazione OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16779)
-- Name: catalogo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.catalogo (
    id_catalogo integer NOT NULL,
    nome character varying(30) NOT NULL,
    data_inizio date NOT NULL,
    data_fine date
);


ALTER TABLE public.catalogo OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16777)
-- Name: catalogo_id_catalogo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.catalogo_id_catalogo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.catalogo_id_catalogo_seq OWNER TO postgres;

--
-- TOC entry 3195 (class 0 OID 0)
-- Dependencies: 202
-- Name: catalogo_id_catalogo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.catalogo_id_catalogo_seq OWNED BY public.catalogo.id_catalogo;


--
-- TOC entry 210 (class 1259 OID 16834)
-- Name: catalogo_offerte; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.catalogo_offerte (
    id_catalogo integer NOT NULL,
    id_prodotto integer NOT NULL,
    op_punti character varying(4),
    op_prezzo character varying(4)
);


ALTER TABLE public.catalogo_offerte OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16811)
-- Name: catalogo_regali; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.catalogo_regali (
    id_catalogo integer NOT NULL,
    id_regalo integer NOT NULL
);


ALTER TABLE public.catalogo_regali OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 17192)
-- Name: composizione_prodotto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.composizione_prodotto (
    ingrediente integer NOT NULL,
    assemblato integer NOT NULL,
    quantita integer NOT NULL
);


ALTER TABLE public.composizione_prodotto OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 16958)
-- Name: dipendente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dipendente (
    cf character(16) NOT NULL,
    nome character varying(150) NOT NULL,
    cognome character varying(150) NOT NULL,
    data_nascita date,
    telefono character(10) NOT NULL,
    email character varying(50) NOT NULL,
    via character varying(100),
    cap numeric(5,0),
    citta character varying(100),
    data_assunzione date NOT NULL,
    stipendio numeric(8,2) NOT NULL,
    civico character varying(10) NOT NULL,
    esperienza character varying(20)
);


ALTER TABLE public.dipendente OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 17014)
-- Name: fornitore; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fornitore (
    p_iva character(11) NOT NULL,
    nome character varying(80) NOT NULL,
    rag_sociale character(10) NOT NULL,
    mod_pagamento character varying(100) NOT NULL,
    telefono character(10) NOT NULL,
    email character varying(50) NOT NULL,
    via character varying(100) NOT NULL,
    cap numeric(5,0) NOT NULL,
    citta character varying(100),
    civico character varying(10) NOT NULL
);


ALTER TABLE public.fornitore OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 17019)
-- Name: fornitura; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fornitura (
    p_iva character(11) NOT NULL,
    id_prodotto integer NOT NULL,
    tempo_consegna integer,
    prezzo_fornitore numeric(8,2),
    codice_esterno character varying(20)
);


ALTER TABLE public.fornitura OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 16849)
-- Name: magazzino; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.magazzino (
    id_supermercato integer NOT NULL,
    id_prodotto integer NOT NULL,
    quantita integer,
    soglia_minima integer
);


ALTER TABLE public.magazzino OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 16984)
-- Name: mansione_attuale; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mansione_attuale (
    id_supermercato integer NOT NULL,
    nome_reparto character varying(30) NOT NULL,
    cf character(16) NOT NULL,
    nome_mansione character varying(50) NOT NULL,
    data_inizio date NOT NULL
);


ALTER TABLE public.mansione_attuale OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16966)
-- Name: mansione_passata; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mansione_passata (
    id_supermercato integer NOT NULL,
    nome_reparto character varying(30) NOT NULL,
    cf character(16) NOT NULL,
    nome_mansione character varying(50) NOT NULL,
    descrizione character varying(600),
    data_inizio date NOT NULL,
    data_fine date NOT NULL,
    responsabile boolean NOT NULL
);


ALTER TABLE public.mansione_passata OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 17209)
-- Name: obiettivo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.obiettivo (
    id integer NOT NULL,
    nome character varying(40) NOT NULL,
    descrizione character varying(400) NOT NULL
);


ALTER TABLE public.obiettivo OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 17207)
-- Name: obiettivo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.obiettivo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.obiettivo_id_seq OWNER TO postgres;

--
-- TOC entry 3196 (class 0 OID 0)
-- Dependencies: 229
-- Name: obiettivo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.obiettivo_id_seq OWNED BY public.obiettivo.id;


--
-- TOC entry 224 (class 1259 OID 17065)
-- Name: orario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orario (
    id_supermercato integer NOT NULL,
    giorno character varying(15) NOT NULL,
    apertura numeric NOT NULL,
    chiusura numeric NOT NULL
);


ALTER TABLE public.orario OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 16889)
-- Name: prodotti_vendita; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prodotti_vendita (
    id_supermercato integer NOT NULL,
    nome_reparto character varying(30) NOT NULL,
    id_prodotto integer NOT NULL,
    soglia_minima integer,
    scaffale character varying(4) NOT NULL,
    quantita integer
);


ALTER TABLE public.prodotti_vendita OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 17050)
-- Name: prodotti_venduti; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prodotti_venduti (
    id_scontrino integer NOT NULL,
    id_prodotto integer NOT NULL,
    quantita integer NOT NULL,
    nome character varying(100) NOT NULL,
    prezzo_vendita numeric(8,2) NOT NULL,
    nome_reparto character varying(30) NOT NULL
);


ALTER TABLE public.prodotti_venduti OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16828)
-- Name: prodotto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prodotto (
    id_prodotto integer NOT NULL,
    nome character varying(100) NOT NULL,
    punti integer,
    prezzo_al_pubblico numeric(8,2) NOT NULL
);


ALTER TABLE public.prodotto OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16826)
-- Name: prodotto_id_prodotto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.prodotto_id_prodotto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.prodotto_id_prodotto_seq OWNER TO postgres;

--
-- TOC entry 3197 (class 0 OID 0)
-- Dependencies: 208
-- Name: prodotto_id_prodotto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.prodotto_id_prodotto_seq OWNED BY public.prodotto.id_prodotto;


--
-- TOC entry 204 (class 1259 OID 16785)
-- Name: promozioni; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.promozioni (
    id_catalogo integer NOT NULL,
    id_supermercato integer NOT NULL
);


ALTER TABLE public.promozioni OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 17088)
-- Name: regali_ritirati; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.regali_ritirati (
    id_regalo integer NOT NULL,
    id_tessera integer NOT NULL,
    data_ritiro date NOT NULL
);


ALTER TABLE public.regali_ritirati OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16802)
-- Name: regalo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.regalo (
    id_regalo integer NOT NULL,
    nome character varying(150) NOT NULL,
    punti integer NOT NULL,
    disponibilita integer NOT NULL,
    descrizione character varying(600)
);


ALTER TABLE public.regalo OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16800)
-- Name: regalo_id_regalo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.regalo_id_regalo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.regalo_id_regalo_seq OWNER TO postgres;

--
-- TOC entry 3198 (class 0 OID 0)
-- Dependencies: 205
-- Name: regalo_id_regalo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.regalo_id_regalo_seq OWNED BY public.regalo.id_regalo;


--
-- TOC entry 212 (class 1259 OID 16864)
-- Name: reparto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reparto (
    id_supermercato integer NOT NULL,
    nome_reparto character varying(30) NOT NULL
);


ALTER TABLE public.reparto OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 17075)
-- Name: responsabile; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.responsabile (
    id_supermercato integer,
    nome_reparto character varying(30),
    cf character(16),
    email_aziendale character varying(50) NOT NULL,
    password character varying(20) NOT NULL
);


ALTER TABLE public.responsabile OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16917)
-- Name: scontrino; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.scontrino (
    id_scontrino integer NOT NULL,
    id_supermercato integer,
    nome_reparto character varying(30),
    id_tessera integer,
    totale numeric(8,2) NOT NULL,
    data timestamp without time zone NOT NULL,
    cassa character varying(3) NOT NULL
);


ALTER TABLE public.scontrino OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 16915)
-- Name: scontrino_id_scontrino_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.scontrino_id_scontrino_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.scontrino_id_scontrino_seq OWNER TO postgres;

--
-- TOC entry 3199 (class 0 OID 0)
-- Dependencies: 216
-- Name: scontrino_id_scontrino_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.scontrino_id_scontrino_seq OWNED BY public.scontrino.id_scontrino;


--
-- TOC entry 201 (class 1259 OID 16768)
-- Name: supermercato; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.supermercato (
    id_supermercato integer NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE public.supermercato OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16766)
-- Name: supermercato_id_supermercato_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.supermercato_id_supermercato_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.supermercato_id_supermercato_seq OWNER TO postgres;

--
-- TOC entry 3200 (class 0 OID 0)
-- Dependencies: 200
-- Name: supermercato_id_supermercato_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.supermercato_id_supermercato_seq OWNED BY public.supermercato.id_supermercato;


--
-- TOC entry 215 (class 1259 OID 16906)
-- Name: tessera_cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tessera_cliente (
    id_tessera integer NOT NULL,
    nome character varying(150) NOT NULL,
    cognome character varying(150) NOT NULL,
    telefono character(10),
    data_nascita date,
    email character varying(50) NOT NULL,
    via character varying(100),
    cap numeric(5,0),
    citta character varying(100),
    password character varying(20) NOT NULL,
    civico character varying(10) NOT NULL,
    punti integer DEFAULT 0
);


ALTER TABLE public.tessera_cliente OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 16904)
-- Name: tessera_cliente_id_tessera_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tessera_cliente_id_tessera_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tessera_cliente_id_tessera_seq OWNER TO postgres;

--
-- TOC entry 3201 (class 0 OID 0)
-- Dependencies: 214
-- Name: tessera_cliente_id_tessera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tessera_cliente_id_tessera_seq OWNED BY public.tessera_cliente.id_tessera;


--
-- TOC entry 227 (class 1259 OID 17103)
-- Name: turni; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.turni (
    cf character varying(16) NOT NULL,
    giorno character varying(15) NOT NULL,
    inizio_turno numeric NOT NULL,
    fine_turno numeric NOT NULL
);


ALTER TABLE public.turni OWNER TO postgres;

--
-- TOC entry 2970 (class 2604 OID 16782)
-- Name: catalogo id_catalogo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo ALTER COLUMN id_catalogo SET DEFAULT nextval('public.catalogo_id_catalogo_seq'::regclass);


--
-- TOC entry 2976 (class 2604 OID 17212)
-- Name: obiettivo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.obiettivo ALTER COLUMN id SET DEFAULT nextval('public.obiettivo_id_seq'::regclass);


--
-- TOC entry 2972 (class 2604 OID 16831)
-- Name: prodotto id_prodotto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotto ALTER COLUMN id_prodotto SET DEFAULT nextval('public.prodotto_id_prodotto_seq'::regclass);


--
-- TOC entry 2971 (class 2604 OID 16805)
-- Name: regalo id_regalo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.regalo ALTER COLUMN id_regalo SET DEFAULT nextval('public.regalo_id_regalo_seq'::regclass);


--
-- TOC entry 2975 (class 2604 OID 16920)
-- Name: scontrino id_scontrino; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scontrino ALTER COLUMN id_scontrino SET DEFAULT nextval('public.scontrino_id_scontrino_seq'::regclass);


--
-- TOC entry 2969 (class 2604 OID 16771)
-- Name: supermercato id_supermercato; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.supermercato ALTER COLUMN id_supermercato SET DEFAULT nextval('public.supermercato_id_supermercato_seq'::regclass);


--
-- TOC entry 2973 (class 2604 OID 16909)
-- Name: tessera_cliente id_tessera; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tessera_cliente ALTER COLUMN id_tessera SET DEFAULT nextval('public.tessera_cliente_id_tessera_seq'::regclass);


--
-- TOC entry 3026 (class 2606 OID 17234)
-- Name: affiancamento affiancamento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.affiancamento
    ADD CONSTRAINT affiancamento_pkey PRIMARY KEY (cf_junior, cf_senior);


--
-- TOC entry 3024 (class 2606 OID 17219)
-- Name: assegnazione assegnazione_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assegnazione
    ADD CONSTRAINT assegnazione_pkey PRIMARY KEY (id_obiettivo, cf_dipendente, mese);


--
-- TOC entry 2990 (class 2606 OID 16838)
-- Name: catalogo_offerte catalogo_offerte_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo_offerte
    ADD CONSTRAINT catalogo_offerte_pkey PRIMARY KEY (id_catalogo, id_prodotto);


--
-- TOC entry 2980 (class 2606 OID 16784)
-- Name: catalogo catalogo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo
    ADD CONSTRAINT catalogo_pkey PRIMARY KEY (id_catalogo);


--
-- TOC entry 2986 (class 2606 OID 16815)
-- Name: catalogo_regali catalogo_regali_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo_regali
    ADD CONSTRAINT catalogo_regali_pkey PRIMARY KEY (id_catalogo, id_regalo);


--
-- TOC entry 3020 (class 2606 OID 17196)
-- Name: composizione_prodotto composizione_prodotto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.composizione_prodotto
    ADD CONSTRAINT composizione_prodotto_pkey PRIMARY KEY (ingrediente, assemblato);


--
-- TOC entry 3002 (class 2606 OID 16965)
-- Name: dipendente dipendente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dipendente
    ADD CONSTRAINT dipendente_pkey PRIMARY KEY (cf);


--
-- TOC entry 3008 (class 2606 OID 17018)
-- Name: fornitore fornitore_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornitore
    ADD CONSTRAINT fornitore_pkey PRIMARY KEY (p_iva);


--
-- TOC entry 3010 (class 2606 OID 17023)
-- Name: fornitura fornitura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornitura
    ADD CONSTRAINT fornitura_pkey PRIMARY KEY (id_prodotto, p_iva);


--
-- TOC entry 2992 (class 2606 OID 16853)
-- Name: magazzino magazzino_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.magazzino
    ADD CONSTRAINT magazzino_pkey PRIMARY KEY (id_prodotto, id_supermercato);


--
-- TOC entry 3006 (class 2606 OID 16988)
-- Name: mansione_attuale mansione_attuale_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mansione_attuale
    ADD CONSTRAINT mansione_attuale_pkey PRIMARY KEY (id_supermercato, nome_reparto, cf);


--
-- TOC entry 3004 (class 2606 OID 16973)
-- Name: mansione_passata mansione_passata_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mansione_passata
    ADD CONSTRAINT mansione_passata_pkey PRIMARY KEY (id_supermercato, nome_reparto, cf);


--
-- TOC entry 3022 (class 2606 OID 17214)
-- Name: obiettivo obiettivo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.obiettivo
    ADD CONSTRAINT obiettivo_pkey PRIMARY KEY (id);


--
-- TOC entry 3014 (class 2606 OID 17069)
-- Name: orario orario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orario
    ADD CONSTRAINT orario_pkey PRIMARY KEY (id_supermercato, giorno);


--
-- TOC entry 2996 (class 2606 OID 16893)
-- Name: prodotti_vendita prodotti_vendita_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotti_vendita
    ADD CONSTRAINT prodotti_vendita_pkey PRIMARY KEY (id_supermercato, nome_reparto, id_prodotto, scaffale);


--
-- TOC entry 3012 (class 2606 OID 17054)
-- Name: prodotti_venduti prodotti_venduti_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotti_venduti
    ADD CONSTRAINT prodotti_venduti_pkey PRIMARY KEY (id_scontrino, id_prodotto);


--
-- TOC entry 2988 (class 2606 OID 16833)
-- Name: prodotto prodotto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotto
    ADD CONSTRAINT prodotto_pkey PRIMARY KEY (id_prodotto);


--
-- TOC entry 2982 (class 2606 OID 16789)
-- Name: promozioni promozioni_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.promozioni
    ADD CONSTRAINT promozioni_pkey PRIMARY KEY (id_catalogo, id_supermercato);


--
-- TOC entry 3016 (class 2606 OID 17092)
-- Name: regali_ritirati regali_ritirati_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.regali_ritirati
    ADD CONSTRAINT regali_ritirati_pkey PRIMARY KEY (id_regalo, id_tessera);


--
-- TOC entry 2984 (class 2606 OID 16810)
-- Name: regalo regalo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.regalo
    ADD CONSTRAINT regalo_pkey PRIMARY KEY (id_regalo);


--
-- TOC entry 2994 (class 2606 OID 16868)
-- Name: reparto reparto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reparto
    ADD CONSTRAINT reparto_pkey PRIMARY KEY (id_supermercato, nome_reparto);


--
-- TOC entry 3000 (class 2606 OID 16922)
-- Name: scontrino scontrino_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scontrino
    ADD CONSTRAINT scontrino_pkey PRIMARY KEY (id_scontrino);


--
-- TOC entry 2978 (class 2606 OID 16776)
-- Name: supermercato supermercato_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.supermercato
    ADD CONSTRAINT supermercato_pkey PRIMARY KEY (id_supermercato);


--
-- TOC entry 2998 (class 2606 OID 16914)
-- Name: tessera_cliente tessera_cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tessera_cliente
    ADD CONSTRAINT tessera_cliente_pkey PRIMARY KEY (id_tessera);


--
-- TOC entry 3018 (class 2606 OID 17107)
-- Name: turni turni_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turni
    ADD CONSTRAINT turni_pkey PRIMARY KEY (cf, giorno);


--
-- TOC entry 3058 (class 2606 OID 17235)
-- Name: affiancamento affiancamento_cf_junior_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.affiancamento
    ADD CONSTRAINT affiancamento_cf_junior_fkey FOREIGN KEY (cf_junior) REFERENCES public.dipendente(cf) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3059 (class 2606 OID 17240)
-- Name: affiancamento affiancamento_cf_senior_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.affiancamento
    ADD CONSTRAINT affiancamento_cf_senior_fkey FOREIGN KEY (cf_senior) REFERENCES public.dipendente(cf) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3057 (class 2606 OID 17225)
-- Name: assegnazione assegnazione_cf_dipendente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assegnazione
    ADD CONSTRAINT assegnazione_cf_dipendente_fkey FOREIGN KEY (cf_dipendente) REFERENCES public.dipendente(cf) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3056 (class 2606 OID 17220)
-- Name: assegnazione assegnazione_id_obiettivo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assegnazione
    ADD CONSTRAINT assegnazione_id_obiettivo_fkey FOREIGN KEY (id_obiettivo) REFERENCES public.obiettivo(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3032 (class 2606 OID 17133)
-- Name: catalogo_offerte catalogo_offerte_id_catalogo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo_offerte
    ADD CONSTRAINT catalogo_offerte_id_catalogo_fkey FOREIGN KEY (id_catalogo) REFERENCES public.catalogo(id_catalogo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3031 (class 2606 OID 17128)
-- Name: catalogo_offerte catalogo_offerte_id_prodotto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo_offerte
    ADD CONSTRAINT catalogo_offerte_id_prodotto_fkey FOREIGN KEY (id_prodotto) REFERENCES public.prodotto(id_prodotto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3030 (class 2606 OID 17143)
-- Name: catalogo_regali catalogo_regali_id_catalogo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo_regali
    ADD CONSTRAINT catalogo_regali_id_catalogo_fkey FOREIGN KEY (id_catalogo) REFERENCES public.catalogo(id_catalogo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3029 (class 2606 OID 17138)
-- Name: catalogo_regali catalogo_regali_id_regalo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalogo_regali
    ADD CONSTRAINT catalogo_regali_id_regalo_fkey FOREIGN KEY (id_regalo) REFERENCES public.regalo(id_regalo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3055 (class 2606 OID 17202)
-- Name: composizione_prodotto composizione_prodotto_assemblato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.composizione_prodotto
    ADD CONSTRAINT composizione_prodotto_assemblato_fkey FOREIGN KEY (assemblato) REFERENCES public.prodotto(id_prodotto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3054 (class 2606 OID 17197)
-- Name: composizione_prodotto composizione_prodotto_ingrediente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.composizione_prodotto
    ADD CONSTRAINT composizione_prodotto_ingrediente_fkey FOREIGN KEY (ingrediente) REFERENCES public.prodotto(id_prodotto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3045 (class 2606 OID 17163)
-- Name: fornitura fornitura_id_prodotto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornitura
    ADD CONSTRAINT fornitura_id_prodotto_fkey FOREIGN KEY (id_prodotto) REFERENCES public.prodotto(id_prodotto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3044 (class 2606 OID 17158)
-- Name: fornitura fornitura_p_iva_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornitura
    ADD CONSTRAINT fornitura_p_iva_fkey FOREIGN KEY (p_iva) REFERENCES public.fornitore(p_iva) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3033 (class 2606 OID 17118)
-- Name: magazzino magazzino_id_prodotto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.magazzino
    ADD CONSTRAINT magazzino_id_prodotto_fkey FOREIGN KEY (id_prodotto) REFERENCES public.prodotto(id_prodotto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3034 (class 2606 OID 17123)
-- Name: magazzino magazzino_id_supermercato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.magazzino
    ADD CONSTRAINT magazzino_id_supermercato_fkey FOREIGN KEY (id_supermercato) REFERENCES public.supermercato(id_supermercato) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3043 (class 2606 OID 16994)
-- Name: mansione_attuale mansione_attuale_cf_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mansione_attuale
    ADD CONSTRAINT mansione_attuale_cf_fkey FOREIGN KEY (cf) REFERENCES public.dipendente(cf);


--
-- TOC entry 3042 (class 2606 OID 16989)
-- Name: mansione_attuale mansione_attuale_id_supermercato_nome_reparto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mansione_attuale
    ADD CONSTRAINT mansione_attuale_id_supermercato_nome_reparto_fkey FOREIGN KEY (id_supermercato, nome_reparto) REFERENCES public.reparto(id_supermercato, nome_reparto);


--
-- TOC entry 3041 (class 2606 OID 16979)
-- Name: mansione_passata mansione_passata_cf_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mansione_passata
    ADD CONSTRAINT mansione_passata_cf_fkey FOREIGN KEY (cf) REFERENCES public.dipendente(cf);


--
-- TOC entry 3040 (class 2606 OID 16974)
-- Name: mansione_passata mansione_passata_id_supermercato_nome_reparto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mansione_passata
    ADD CONSTRAINT mansione_passata_id_supermercato_nome_reparto_fkey FOREIGN KEY (id_supermercato, nome_reparto) REFERENCES public.reparto(id_supermercato, nome_reparto);


--
-- TOC entry 3048 (class 2606 OID 17070)
-- Name: orario orario_id_supermercato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orario
    ADD CONSTRAINT orario_id_supermercato_fkey FOREIGN KEY (id_supermercato) REFERENCES public.supermercato(id_supermercato);


--
-- TOC entry 3036 (class 2606 OID 17148)
-- Name: prodotti_vendita prodotti_vendita_id_prodotto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotti_vendita
    ADD CONSTRAINT prodotti_vendita_id_prodotto_fkey FOREIGN KEY (id_prodotto) REFERENCES public.prodotto(id_prodotto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3037 (class 2606 OID 17153)
-- Name: prodotti_vendita prodotti_vendita_id_supermercato_nome_reparto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotti_vendita
    ADD CONSTRAINT prodotti_vendita_id_supermercato_nome_reparto_fkey FOREIGN KEY (id_supermercato, nome_reparto) REFERENCES public.reparto(id_supermercato, nome_reparto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3047 (class 2606 OID 17060)
-- Name: prodotti_venduti prodotti_venduti_id_prodotto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotti_venduti
    ADD CONSTRAINT prodotti_venduti_id_prodotto_fkey FOREIGN KEY (id_prodotto) REFERENCES public.prodotto(id_prodotto);


--
-- TOC entry 3046 (class 2606 OID 17055)
-- Name: prodotti_venduti prodotti_venduti_id_scontrino_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prodotti_venduti
    ADD CONSTRAINT prodotti_venduti_id_scontrino_fkey FOREIGN KEY (id_scontrino) REFERENCES public.scontrino(id_scontrino);


--
-- TOC entry 3027 (class 2606 OID 16790)
-- Name: promozioni promozioni_id_catalogo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.promozioni
    ADD CONSTRAINT promozioni_id_catalogo_fkey FOREIGN KEY (id_catalogo) REFERENCES public.catalogo(id_catalogo);


--
-- TOC entry 3028 (class 2606 OID 16795)
-- Name: promozioni promozioni_id_supermercato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.promozioni
    ADD CONSTRAINT promozioni_id_supermercato_fkey FOREIGN KEY (id_supermercato) REFERENCES public.supermercato(id_supermercato);


--
-- TOC entry 3051 (class 2606 OID 17093)
-- Name: regali_ritirati regali_ritirati_id_regalo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.regali_ritirati
    ADD CONSTRAINT regali_ritirati_id_regalo_fkey FOREIGN KEY (id_regalo) REFERENCES public.regalo(id_regalo) ON UPDATE CASCADE;


--
-- TOC entry 3052 (class 2606 OID 17098)
-- Name: regali_ritirati regali_ritirati_id_tessera_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.regali_ritirati
    ADD CONSTRAINT regali_ritirati_id_tessera_fkey FOREIGN KEY (id_tessera) REFERENCES public.tessera_cliente(id_tessera) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3035 (class 2606 OID 16869)
-- Name: reparto reparto_id_supermercato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reparto
    ADD CONSTRAINT reparto_id_supermercato_fkey FOREIGN KEY (id_supermercato) REFERENCES public.supermercato(id_supermercato);


--
-- TOC entry 3050 (class 2606 OID 17083)
-- Name: responsabile responsabile_cf_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.responsabile
    ADD CONSTRAINT responsabile_cf_fkey FOREIGN KEY (cf) REFERENCES public.dipendente(cf);


--
-- TOC entry 3049 (class 2606 OID 17078)
-- Name: responsabile responsabile_id_supermercato_nome_reparto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.responsabile
    ADD CONSTRAINT responsabile_id_supermercato_nome_reparto_fkey FOREIGN KEY (id_supermercato, nome_reparto) REFERENCES public.reparto(id_supermercato, nome_reparto);


--
-- TOC entry 3039 (class 2606 OID 17173)
-- Name: scontrino scontrino_id_supermercato_nome_reparto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scontrino
    ADD CONSTRAINT scontrino_id_supermercato_nome_reparto_fkey FOREIGN KEY (id_supermercato, nome_reparto) REFERENCES public.reparto(id_supermercato, nome_reparto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3038 (class 2606 OID 17168)
-- Name: scontrino scontrino_id_tessera_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scontrino
    ADD CONSTRAINT scontrino_id_tessera_fkey FOREIGN KEY (id_tessera) REFERENCES public.tessera_cliente(id_tessera) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3053 (class 2606 OID 17108)
-- Name: turni turni_cf_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turni
    ADD CONSTRAINT turni_cf_fkey FOREIGN KEY (cf) REFERENCES public.dipendente(cf) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2021-02-17 11:34:46

--
-- PostgreSQL database dump complete
--

