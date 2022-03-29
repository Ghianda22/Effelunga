--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-02-17 11:35:11

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
-- TOC entry 3222 (class 0 OID 17230)
-- Dependencies: 232
-- Data for Name: affiancamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.affiancamento VALUES ('mario           ', 'elisa           ', 'terminato', '2020-05-12');
INSERT INTO public.affiancamento VALUES ('luigi           ', 'anto            ', 'in corso', '2021-01-15');
INSERT INTO public.affiancamento VALUES ('fede            ', 'elisa           ', 'in corso', '2020-12-10');


--
-- TOC entry 3221 (class 0 OID 17215)
-- Dependencies: 231
-- Data for Name: assegnazione; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.assegnazione VALUES (1, 'fede            ', 'febbraio', 'in corso');
INSERT INTO public.assegnazione VALUES (1, 'fede            ', 'gennaio', 'non raggiunto');
INSERT INTO public.assegnazione VALUES (2, 'fede            ', 'gennaio', 'raggiunto');
INSERT INTO public.assegnazione VALUES (3, 'mario           ', 'ottobre', 'non raggiunto');
INSERT INTO public.assegnazione VALUES (3, 'mario           ', 'novembre', 'non raggiunto');
INSERT INTO public.assegnazione VALUES (3, 'mario           ', 'dicembre', 'non raggiunto');
INSERT INTO public.assegnazione VALUES (6, 'luigi           ', 'gennaio', 'raggiunto');
INSERT INTO public.assegnazione VALUES (5, 'luigi           ', 'gennaio', 'non raggiunto');
INSERT INTO public.assegnazione VALUES (5, 'luigi           ', 'febbraio', 'in corso');


--
-- TOC entry 3193 (class 0 OID 16779)
-- Dependencies: 203
-- Data for Name: catalogo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.catalogo VALUES (1, 'Speciale San Valentino', '2021-02-08', '2021-02-15');
INSERT INTO public.catalogo VALUES (3, 'Le nostre produzioni', '2021-01-31', '2021-03-01');
INSERT INTO public.catalogo VALUES (2, 'I regali più belli', '2021-02-08', '2021-02-22');


--
-- TOC entry 3200 (class 0 OID 16834)
-- Dependencies: 210
-- Data for Name: catalogo_offerte; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.catalogo_offerte VALUES (2, 13, '+20', '');
INSERT INTO public.catalogo_offerte VALUES (3, 31, NULL, '-10%');
INSERT INTO public.catalogo_offerte VALUES (3, 30, '+20', '-10%');
INSERT INTO public.catalogo_offerte VALUES (3, 11, '+20', '-10%');
INSERT INTO public.catalogo_offerte VALUES (3, 14, '+20', '-10%');
INSERT INTO public.catalogo_offerte VALUES (3, 24, NULL, '-10%');
INSERT INTO public.catalogo_offerte VALUES (3, 27, NULL, '-10%');
INSERT INTO public.catalogo_offerte VALUES (3, 22, NULL, '-10%');
INSERT INTO public.catalogo_offerte VALUES (1, 8, NULL, '-5%');
INSERT INTO public.catalogo_offerte VALUES (1, 9, NULL, '-5%');


--
-- TOC entry 3197 (class 0 OID 16811)
-- Dependencies: 207
-- Data for Name: catalogo_regali; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.catalogo_regali VALUES (1, 3);
INSERT INTO public.catalogo_regali VALUES (1, 4);
INSERT INTO public.catalogo_regali VALUES (1, 1);
INSERT INTO public.catalogo_regali VALUES (1, 2);
INSERT INTO public.catalogo_regali VALUES (1, 5);
INSERT INTO public.catalogo_regali VALUES (2, 1);
INSERT INTO public.catalogo_regali VALUES (2, 2);
INSERT INTO public.catalogo_regali VALUES (2, 3);


--
-- TOC entry 3218 (class 0 OID 17192)
-- Dependencies: 228
-- Data for Name: composizione_prodotto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.composizione_prodotto VALUES (10, 11, 4);
INSERT INTO public.composizione_prodotto VALUES (12, 11, 10);
INSERT INTO public.composizione_prodotto VALUES (21, 22, 1);
INSERT INTO public.composizione_prodotto VALUES (15, 22, 1);
INSERT INTO public.composizione_prodotto VALUES (22, 14, 2);
INSERT INTO public.composizione_prodotto VALUES (23, 14, 2);
INSERT INTO public.composizione_prodotto VALUES (25, 24, 1);
INSERT INTO public.composizione_prodotto VALUES (19, 24, 1);
INSERT INTO public.composizione_prodotto VALUES (17, 24, 1);
INSERT INTO public.composizione_prodotto VALUES (24, 14, 2);
INSERT INTO public.composizione_prodotto VALUES (26, 27, 4);
INSERT INTO public.composizione_prodotto VALUES (24, 27, 2);
INSERT INTO public.composizione_prodotto VALUES (19, 31, 1);
INSERT INTO public.composizione_prodotto VALUES (32, 31, 1);
INSERT INTO public.composizione_prodotto VALUES (33, 31, 1);
INSERT INTO public.composizione_prodotto VALUES (31, 30, 1);
INSERT INTO public.composizione_prodotto VALUES (21, 30, 1);
INSERT INTO public.composizione_prodotto VALUES (18, 30, 2);
INSERT INTO public.composizione_prodotto VALUES (34, 31, 1);


--
-- TOC entry 3208 (class 0 OID 16958)
-- Dependencies: 218
-- Data for Name: dipendente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.dipendente VALUES ('luigi           ', 'luigi', 'bianchi', '2011-11-11', '3333      ', 'lui@gi.it', 'giuseppe', 2000, 'milano', '2021-01-01', 800.00, '8', 'media');
INSERT INTO public.dipendente VALUES ('vale            ', 'valentina', 'lore', '2011-11-11', '3333      ', 'va@le.it', 'napoleone', 2000, 'milano', '2011-01-01', 1000.00, '1', 'nessuna');
INSERT INTO public.dipendente VALUES ('mario           ', 'mario', 'rossi', '2012-12-12', '3333      ', 'ma@rio.it', 'bonaparte', 2000, 'roma', '2021-01-01', 800.00, '88', 'media');
INSERT INTO public.dipendente VALUES ('fede            ', 'federica', 'neri', '2012-12-12', '3333      ', 'fe@de.it', 'achille', 2000, 'monza', '2000-01-01', 1800.00, '1', 'media');
INSERT INTO public.dipendente VALUES ('anto            ', 'antonella', 'verdi', '2010-10-10', '3333      ', 'an@to.it', 'cesare', 2000, 'monza', '2000-01-01', 1500.00, '5', 'alta');
INSERT INTO public.dipendente VALUES ('elisa           ', 'elisa', 'puopolo', '2010-10-10', '3333      ', 'eli@sa.it', 'garibaldi', 2000, 'milano', '2011-01-01', 1000.00, '1', 'alta');


--
-- TOC entry 3211 (class 0 OID 17014)
-- Dependencies: 221
-- Data for Name: fornitore; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.fornitore VALUES ('04119190371', 'Barilla', 'S.p.A.    ', 'bonifico', '05212621  ', 'ufficiorelazioniesterne@barilla.it', 'Via Mantova', 43122, 'Parma', '166');
INSERT INTO public.fornitore VALUES ('01654010345', 'Granarolo', 'S.p.A.    ', 'bonifico', '0514162311', 'info@granarolo.it', 'Via Cadriano', 40127, 'Bologna', '27/2');
INSERT INTO public.fornitore VALUES ('02649300247', 'Fietta', 'S.p.A     ', 'bonifico', '0424527501', 'fietta@fietta.it', 'Via Portile', 36061, 'Bassano del Grappa', '16');
INSERT INTO public.fornitore VALUES ('05066690156', 'Pellegrini', 'S.p.A     ', 'assegno', '0289130   ', 'vending@gruppopellegrini.it', 'via Lorenteggio', 20152, 'Milano', '255');
INSERT INTO public.fornitore VALUES ('04030970968', 'Parmalat', 'S.p.A     ', 'assegno', '0521808081', 'info@parmalat.net', 'Via delle Nazioni Unite', 43044, 'Collecchio', '4');
INSERT INTO public.fornitore VALUES ('01058630961', 'Star Stabilimento Alimentare', 'S.p.A     ', 'MAV', '03968381  ', 'contact@staralimentare.it', 'Via Matteotti', 20864, 'Agrate Brianza', '142');
INSERT INTO public.fornitore VALUES ('04916380159', 'Effelunga', 'S.p.A     ', 'bonifico', '0292931   ', 'prodottiamarchio@esselunga.it', 'Via Giambologna', 20096, 'Limito di Pioltello', '1');
INSERT INTO public.fornitore VALUES ('00737950154', 'STAEDTLER Italia', 'S.p.A     ', 'MAV', '015496875 ', 'informazion@staedtler.com', 'Via Privata Archimede', 20094, 'Corsico', '5/7/9');
INSERT INTO public.fornitore VALUES ('0362909004 ', 'Ferrero', 'S.p.A     ', 'bonifico', '0118152403', 'info@ferrero.com', 'Piazzale Pietro Ferrero', 12051, 'Alba', '1');
INSERT INTO public.fornitore VALUES ('00777280157', 'Nestlè Italiana', 'S.p.A     ', 'MAV', '0281811   ', 'info@nestle.it', 'Via del Mulino', 20057, 'Assago', '6');


--
-- TOC entry 3212 (class 0 OID 17019)
-- Dependencies: 222
-- Data for Name: fornitura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.fornitura VALUES ('02649300247', 13, 8, 1.07, '0158451');
INSERT INTO public.fornitura VALUES ('04030970968', 10, 2, 1.20, '14748');
INSERT INTO public.fornitura VALUES ('05066690156', 15, 1, 2.45, '632964');
INSERT INTO public.fornitura VALUES ('04119190371', 1, 10, 2.87, '5974');
INSERT INTO public.fornitura VALUES ('04119190371', 7, 10, 1.64, '9782');
INSERT INTO public.fornitura VALUES ('04119190371', 19, 7, 0.36, '0168');
INSERT INTO public.fornitura VALUES ('04119190371', 20, 5, 0.84, '0197');
INSERT INTO public.fornitura VALUES ('01654010345', 16, 1, 0.40, '97864');
INSERT INTO public.fornitura VALUES ('01654010345', 17, 1, 0.56, '97862');
INSERT INTO public.fornitura VALUES ('01654010345', 18, 1, 2.09, '89641');
INSERT INTO public.fornitura VALUES ('04916380159', 21, 3, 0.94, '9614');
INSERT INTO public.fornitura VALUES ('04119190371', 23, 6, 0.41, '65784');
INSERT INTO public.fornitura VALUES ('04916380159', 25, 1, 2.03, '264510');
INSERT INTO public.fornitura VALUES ('04916380159', 26, 8, 1.75, '981653');
INSERT INTO public.fornitura VALUES ('00737950154', 4, 9, 1.77, '15748');
INSERT INTO public.fornitura VALUES ('00737950154', 5, 9, 4.02, '15786');
INSERT INTO public.fornitura VALUES ('00737950154', 6, 9, 1.58, '15722');
INSERT INTO public.fornitura VALUES ('00737950154', 28, 9, 11.98, '15749');
INSERT INTO public.fornitura VALUES ('00737950154', 29, 9, 3.21, '15731');
INSERT INTO public.fornitura VALUES ('05066690156', 2, 2, 4.21, '65498');
INSERT INTO public.fornitura VALUES ('05066690156', 3, 2, 8.97, '65497');
INSERT INTO public.fornitura VALUES ('04916380159', 32, 4, 0.36, '1245');
INSERT INTO public.fornitura VALUES ('04916380159', 33, 5, 0.22, '1246');
INSERT INTO public.fornitura VALUES ('04916380159', 34, 3, 0.41, '1279');
INSERT INTO public.fornitura VALUES ('00777280157', 8, 4, 2.10, '15795');
INSERT INTO public.fornitura VALUES ('0362909004 ', 9, 4, 2.25, '54686');
INSERT INTO public.fornitura VALUES ('01058630961', 12, 7, 0.64, '98555');


--
-- TOC entry 3201 (class 0 OID 16849)
-- Dependencies: 211
-- Data for Name: magazzino; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.magazzino VALUES (3, 5, 2, 5);
INSERT INTO public.magazzino VALUES (3, 4, 30, 7);
INSERT INTO public.magazzino VALUES (1, 5, 12, 5);
INSERT INTO public.magazzino VALUES (1, 4, 5, 7);
INSERT INTO public.magazzino VALUES (1, 6, 1, 10);
INSERT INTO public.magazzino VALUES (1, 28, 3, 2);
INSERT INTO public.magazzino VALUES (2, 4, 6, 7);
INSERT INTO public.magazzino VALUES (2, 5, 4, 5);
INSERT INTO public.magazzino VALUES (2, 6, 38, 10);
INSERT INTO public.magazzino VALUES (2, 28, 4, 2);
INSERT INTO public.magazzino VALUES (2, 29, 16, 4);
INSERT INTO public.magazzino VALUES (4, 4, 47, 7);
INSERT INTO public.magazzino VALUES (4, 5, 3, 5);
INSERT INTO public.magazzino VALUES (4, 6, 50, 10);
INSERT INTO public.magazzino VALUES (4, 28, 1, 2);
INSERT INTO public.magazzino VALUES (4, 29, 3, 4);


--
-- TOC entry 3210 (class 0 OID 16984)
-- Dependencies: 220
-- Data for Name: mansione_attuale; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.mansione_attuale VALUES (2, 'amministrazione', 'elisa           ', 'contabilità', '2020-02-02');
INSERT INTO public.mansione_attuale VALUES (3, 'amministrazione', 'vale            ', 'gestione dipendenti', '2020-02-02');
INSERT INTO public.mansione_attuale VALUES (2, 'surgelati', 'mario           ', 'controllo qualità', '2010-02-02');
INSERT INTO public.mansione_attuale VALUES (3, 'fresco', 'fede            ', 'controllo qualità', '2020-02-02');
INSERT INTO public.mansione_attuale VALUES (2, 'surgelati', 'luigi           ', 'controllo qualità', '2021-02-02');
INSERT INTO public.mansione_attuale VALUES (3, 'fresco', 'anto            ', 'cassa', '2021-02-02');


--
-- TOC entry 3209 (class 0 OID 16966)
-- Dependencies: 219
-- Data for Name: mansione_passata; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.mansione_passata VALUES (2, 'macelleria', 'elisa           ', 'servizio al banco', 'xxxxxx', '2019-02-02', '2020-02-02', false);
INSERT INTO public.mansione_passata VALUES (3, 'macelleria', 'vale            ', 'controllo qualità', 'xxxxxx', '2019-02-02', '2020-02-02', true);


--
-- TOC entry 3220 (class 0 OID 17209)
-- Dependencies: 230
-- Data for Name: obiettivo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.obiettivo VALUES (1, 'Organizzare magazzino', 'Smistare i prodotti arrivati dai fornitori e organizzarli correttamente');
INSERT INTO public.obiettivo VALUES (2, 'Rifornire surgelati', 'Restock del reparto surgelati');
INSERT INTO public.obiettivo VALUES (3, 'Servire al banco macelleria', 'Servire completamente un cliente rispettando tutti i passaggi');
INSERT INTO public.obiettivo VALUES (4, 'Espositore cartoleria', 'Sapere dove vanno i prodotti e risistemarli');
INSERT INTO public.obiettivo VALUES (5, 'Cassiere esperto', 'Imparare tutte le operazioni da fare con la cassa');
INSERT INTO public.obiettivo VALUES (6, 'Assistenza casse automatiche', 'Imparare ad assistere i clienti nelle operazioni di cassa automatica');


--
-- TOC entry 3214 (class 0 OID 17065)
-- Dependencies: 224
-- Data for Name: orario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.orario VALUES (1, 'festivo', 8, 12);
INSERT INTO public.orario VALUES (1, 'feriale', 8, 22);
INSERT INTO public.orario VALUES (2, 'festivo', 8, 12);
INSERT INTO public.orario VALUES (2, 'feriale', 8, 22);
INSERT INTO public.orario VALUES (3, 'festivo', 8, 12);
INSERT INTO public.orario VALUES (3, 'feriale', 8, 22);


--
-- TOC entry 3203 (class 0 OID 16889)
-- Dependencies: 213
-- Data for Name: prodotti_vendita; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.prodotti_vendita VALUES (1, 'macelleria', 2, 5, 'AA', 20);
INSERT INTO public.prodotti_vendita VALUES (1, 'macelleria', 3, 5, 'AB', 20);
INSERT INTO public.prodotti_vendita VALUES (2, 'cancelleria', 4, 5, 'AA', 20);
INSERT INTO public.prodotti_vendita VALUES (2, 'cancelleria', 5, 5, 'AA', 20);
INSERT INTO public.prodotti_vendita VALUES (2, 'macelleria', 2, 5, 'AB', 20);
INSERT INTO public.prodotti_vendita VALUES (2, 'macelleria', 3, 5, 'AA', 20);


--
-- TOC entry 3213 (class 0 OID 17050)
-- Dependencies: 223
-- Data for Name: prodotti_venduti; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.prodotti_venduti VALUES (1, 2, 5, 'pollo', 5.50, 'macelleria');
INSERT INTO public.prodotti_venduti VALUES (1, 3, 5, 'bistecca', 50.50, 'macelleria');
INSERT INTO public.prodotti_venduti VALUES (2, 4, 5, 'quanderno', 2.50, 'cancelleria');
INSERT INTO public.prodotti_venduti VALUES (2, 5, 5, 'penna', 1.00, 'cancelleria');
INSERT INTO public.prodotti_venduti VALUES (2, 2, 5, 'pollo', 5.50, 'macelleria');
INSERT INTO public.prodotti_venduti VALUES (2, 3, 5, 'bistecca', 25.50, 'macelleria');


--
-- TOC entry 3199 (class 0 OID 16828)
-- Dependencies: 209
-- Data for Name: prodotto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.prodotto VALUES (8, 'Baci perugina', 10, 3.00);
INSERT INTO public.prodotto VALUES (9, 'Ferrero Rocher', 10, 3.25);
INSERT INTO public.prodotto VALUES (11, 'Lasagne', 0, 2.75);
INSERT INTO public.prodotto VALUES (1, 'biscotti mulino bianco', 2, 3.50);
INSERT INTO public.prodotto VALUES (13, 'chiacchere', 3, 1.60);
INSERT INTO public.prodotto VALUES (10, 'besciamella chef 500ml', 20, 1.95);
INSERT INTO public.prodotto VALUES (12, 'gran ragù star 180g', 6, 1.27);
INSERT INTO public.prodotto VALUES (16, 'latte uht parzialmente scremato 1l', 0, 1.25);
INSERT INTO public.prodotto VALUES (17, 'latte fresco alta qualità 1l', 3, 1.49);
INSERT INTO public.prodotto VALUES (18, 'mozzarella 3x210 g', 10, 2.99);
INSERT INTO public.prodotto VALUES (19, 'farina di grano tenero 00 1 kg', 2, 0.79);
INSERT INTO public.prodotto VALUES (20, 'ragù alla bolognese 295 g', 5, 1.70);
INSERT INTO public.prodotto VALUES (15, 'macinato bovino 350g', 20, 3.70);
INSERT INTO public.prodotto VALUES (7, 'macine 800g', 5, 2.19);
INSERT INTO public.prodotto VALUES (21, 'passata di pomodoro siccagno siciliano 410 g', 8, 1.49);
INSERT INTO public.prodotto VALUES (22, 'ragù fresco 500g', 35, 3.15);
INSERT INTO public.prodotto VALUES (23, 'emiliane le sottili lasagne all uovo 500 g', 15, 2.25);
INSERT INTO public.prodotto VALUES (25, 'burro bio 250g', 16, 2.79);
INSERT INTO public.prodotto VALUES (14, 'lasagne nostra produzione', 60, 4.00);
INSERT INTO public.prodotto VALUES (26, 'pesto con basilico genovese dop senza aglio 180g', 9, 2.29);
INSERT INTO public.prodotto VALUES (27, 'lasagne vegetariane nostra produzione', 40, 5.12);
INSERT INTO public.prodotto VALUES (6, 'Matite tipo HB 2pz', 0, 3.25);
INSERT INTO public.prodotto VALUES (5, 'Staedtler Ball 432 Penne a sfera colorate, 10 pezzi', 0, 4.98);
INSERT INTO public.prodotto VALUES (4, 'Gomme bianche per cancellare, 2pz', 0, 3.29);
INSERT INTO public.prodotto VALUES (28, 'Compasso', 0, 15.50);
INSERT INTO public.prodotto VALUES (29, 'Lumocolor marcatori 4pz', 0, 4.89);
INSERT INTO public.prodotto VALUES (24, 'besciamella nostra produzione 500ml', 40, 12.40);
INSERT INTO public.prodotto VALUES (30, 'Pizza pronta nostra produzione', 0, 3.99);
INSERT INTO public.prodotto VALUES (31, 'Impasto per pizza bianca', 0, 2.45);
INSERT INTO public.prodotto VALUES (3, 'Bistecca di vitello', 0, 10.50);
INSERT INTO public.prodotto VALUES (2, 'Petto di pollo', 0, 5.50);
INSERT INTO public.prodotto VALUES (32, 'Dolomiti naturale 0.5l', 0, 0.75);
INSERT INTO public.prodotto VALUES (33, 'Sale iodato grosso 1kg', 0, 0.49);
INSERT INTO public.prodotto VALUES (34, 'lievito per pizze focacce e torte salate conf. 5x16 g', NULL, 0.99);


--
-- TOC entry 3194 (class 0 OID 16785)
-- Dependencies: 204
-- Data for Name: promozioni; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.promozioni VALUES (1, 1);
INSERT INTO public.promozioni VALUES (2, 1);
INSERT INTO public.promozioni VALUES (3, 1);
INSERT INTO public.promozioni VALUES (1, 2);
INSERT INTO public.promozioni VALUES (2, 2);
INSERT INTO public.promozioni VALUES (3, 2);
INSERT INTO public.promozioni VALUES (1, 3);
INSERT INTO public.promozioni VALUES (2, 3);
INSERT INTO public.promozioni VALUES (3, 3);
INSERT INTO public.promozioni VALUES (1, 4);
INSERT INTO public.promozioni VALUES (2, 4);
INSERT INTO public.promozioni VALUES (3, 4);


--
-- TOC entry 3216 (class 0 OID 17088)
-- Dependencies: 226
-- Data for Name: regali_ritirati; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.regali_ritirati VALUES (4, 4, '2020-08-15');
INSERT INTO public.regali_ritirati VALUES (3, 5, '2020-11-11');
INSERT INTO public.regali_ritirati VALUES (1, 6, '2020-03-15');
INSERT INTO public.regali_ritirati VALUES (5, 9, '2020-01-18');


--
-- TOC entry 3196 (class 0 OID 16802)
-- Dependencies: 206
-- Data for Name: regalo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.regalo VALUES (3, 'Orso bianco', 75, 50, 'Un bellissimo peluche di Orso Bianco, uno dei tre protagonisti del cartone We Bare Bears');
INSERT INTO public.regalo VALUES (4, 'Ciabatte Minnie', 40, 40, 'Ciabatte donna Defonseca con disegno di Minnie, numeri dal 35-42');
INSERT INTO public.regalo VALUES (1, 'set copriletto', 250, 20, 'fantastico set copriletto a pois da una piazza e mezzo');
INSERT INTO public.regalo VALUES (2, 'borsa gucci', 500, 10, 'Modello appena uscito della famosa casa di moda');
INSERT INTO public.regalo VALUES (5, 'collana pandora', 400, 10, 'preziosa collana di argento');


--
-- TOC entry 3202 (class 0 OID 16864)
-- Dependencies: 212
-- Data for Name: reparto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.reparto VALUES (1, 'amministrazione');
INSERT INTO public.reparto VALUES (1, 'surgelati');
INSERT INTO public.reparto VALUES (1, 'fresco');
INSERT INTO public.reparto VALUES (1, 'cancelleria');
INSERT INTO public.reparto VALUES (2, 'amministrazione');
INSERT INTO public.reparto VALUES (2, 'surgelati');
INSERT INTO public.reparto VALUES (2, 'fresco');
INSERT INTO public.reparto VALUES (2, 'cancelleria');
INSERT INTO public.reparto VALUES (3, 'amministrazione');
INSERT INTO public.reparto VALUES (3, 'surgelati');
INSERT INTO public.reparto VALUES (3, 'fresco');
INSERT INTO public.reparto VALUES (3, 'cancelleria');
INSERT INTO public.reparto VALUES (4, 'amministrazione');
INSERT INTO public.reparto VALUES (4, 'surgelati');
INSERT INTO public.reparto VALUES (4, 'fresco');
INSERT INTO public.reparto VALUES (4, 'cancelleria');
INSERT INTO public.reparto VALUES (5, 'amministrazione');
INSERT INTO public.reparto VALUES (5, 'surgelati');
INSERT INTO public.reparto VALUES (5, 'fresco');
INSERT INTO public.reparto VALUES (5, 'cancelleria');
INSERT INTO public.reparto VALUES (1, 'macelleria');
INSERT INTO public.reparto VALUES (2, 'macelleria');
INSERT INTO public.reparto VALUES (3, 'macelleria');
INSERT INTO public.reparto VALUES (4, 'macelleria');
INSERT INTO public.reparto VALUES (5, 'macelleria');
INSERT INTO public.reparto VALUES (1, 'cassa');
INSERT INTO public.reparto VALUES (2, 'cassa');
INSERT INTO public.reparto VALUES (3, 'cassa');
INSERT INTO public.reparto VALUES (4, 'cassa');
INSERT INTO public.reparto VALUES (5, 'cassa');
INSERT INTO public.reparto VALUES (1, 'cassa automatica');
INSERT INTO public.reparto VALUES (2, 'cassa automatica');


--
-- TOC entry 3215 (class 0 OID 17075)
-- Dependencies: 225
-- Data for Name: responsabile; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.responsabile VALUES (2, 'amministrazione', 'elisa           ', 'elisa@effelunga.it', 'sas');
INSERT INTO public.responsabile VALUES (3, 'amministrazione', 'vale            ', 'vale@effelunga.it', 'sas');
INSERT INTO public.responsabile VALUES (2, 'surgelati', 'mario           ', 'mario@effelunga.it', 'sas');
INSERT INTO public.responsabile VALUES (3, 'fresco', 'fede            ', 'fede@effelunga.it', 'sas');


--
-- TOC entry 3207 (class 0 OID 16917)
-- Dependencies: 217
-- Data for Name: scontrino; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.scontrino VALUES (1, 1, 'macelleria', NULL, 56.90, '2020-05-12 00:00:00', '1');
INSERT INTO public.scontrino VALUES (2, 1, 'macelleria', NULL, 20.50, '2020-05-12 00:00:00', '2');
INSERT INTO public.scontrino VALUES (3, 2, 'cancelleria', NULL, 10.30, '2020-05-12 00:00:00', '1');
INSERT INTO public.scontrino VALUES (4, 2, 'cancelleria', NULL, 5.50, '2020-05-12 00:00:00', '2');
INSERT INTO public.scontrino VALUES (5, 2, 'macelleria', NULL, 22.22, '2020-05-12 00:00:00', '1');
INSERT INTO public.scontrino VALUES (6, 2, 'macelleria', NULL, 222.22, '2020-05-12 00:00:00', '2');


--
-- TOC entry 3191 (class 0 OID 16768)
-- Dependencies: 201
-- Data for Name: supermercato; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.supermercato VALUES (1, 'celoria');
INSERT INTO public.supermercato VALUES (2, 'golgi');
INSERT INTO public.supermercato VALUES (3, 'noto');
INSERT INTO public.supermercato VALUES (4, 'festa del perdono');
INSERT INTO public.supermercato VALUES (5, 'santa sofia');


--
-- TOC entry 3205 (class 0 OID 16906)
-- Dependencies: 215
-- Data for Name: tessera_cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tessera_cliente VALUES (5, 'Valentina', 'Lorè', '3450526319', '1998-01-22', 'valelore98@gmail.com', 'Mattioli', 28012, 'Cressa', 'saaaaaas', '20bis', 0);
INSERT INTO public.tessera_cliente VALUES (6, 'Giancarlo', 'Pagani', '3495915416', '1997-04-30', 'pagani.gian@libero.it', 'Mattioli', 28012, 'Cressa', 'èmiononno', '16', 0);
INSERT INTO public.tessera_cliente VALUES (7, 'Maria Santina', 'Zaninetti', '3408066215', '1947-12-11', 'mariuccia@libero.it', 'Mattioli', 28012, 'Cressa', 'èmianonna', '16', 0);
INSERT INTO public.tessera_cliente VALUES (8, 'Aurora', 'Bovolenta', '3398585020', '2005-07-09', 'aurora05.ab@gmail.com', 'Fratelli Ferri', 28012, 'Cressa', 'amicasis', '3', 0);
INSERT INTO public.tessera_cliente VALUES (9, 'Aldo', 'Pagani', '23456787  ', '1969-03-16', 'lozio.aldo@gmail.com', 'Mattioli', 28012, 'Cressa', 'unicoVeroZio', '16', 0);
INSERT INTO public.tessera_cliente VALUES (10, 'Niccolò', 'La Manna', '3472530309', '2005-12-07', 'voglioprenderefuoco@gmail.com', 'Sant''Antonio', 28010, 'Fontaneto D''Agogna', 'amicosis', '50', 0);
INSERT INTO public.tessera_cliente VALUES (4, 'Aurora', 'Lorè', '3339040002', '2005-08-22', 'piangospesso@gmail.com', 'Mattioli', 28012, 'Cressa', 'sississis', '20bis', 0);


--
-- TOC entry 3217 (class 0 OID 17103)
-- Dependencies: 227
-- Data for Name: turni; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.turni VALUES ('elisa', 'feriale', 8.00, 12.00);
INSERT INTO public.turni VALUES ('elisa', 'festivo', 8.00, 10.00);
INSERT INTO public.turni VALUES ('vale', 'feriale', 8.00, 12.00);
INSERT INTO public.turni VALUES ('vale', 'festivo', 8.00, 10.00);
INSERT INTO public.turni VALUES ('mario', 'feriale', 12.00, 18.00);
INSERT INTO public.turni VALUES ('mario', 'festivo', 8.00, 10.00);
INSERT INTO public.turni VALUES ('luigi', 'feriale', 12.00, 18.00);
INSERT INTO public.turni VALUES ('luigi', 'festivo', 8.00, 10.00);
INSERT INTO public.turni VALUES ('anto', 'feriale', 12.00, 18.00);
INSERT INTO public.turni VALUES ('anto', 'festivo', 8.00, 10.00);
INSERT INTO public.turni VALUES ('fede', 'feriale', 12.00, 18.00);
INSERT INTO public.turni VALUES ('fede', 'festivo', 8.00, 10.00);


--
-- TOC entry 3235 (class 0 OID 0)
-- Dependencies: 202
-- Name: catalogo_id_catalogo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.catalogo_id_catalogo_seq', 2, true);


--
-- TOC entry 3236 (class 0 OID 0)
-- Dependencies: 229
-- Name: obiettivo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.obiettivo_id_seq', 6, true);


--
-- TOC entry 3237 (class 0 OID 0)
-- Dependencies: 208
-- Name: prodotto_id_prodotto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.prodotto_id_prodotto_seq', 34, true);


--
-- TOC entry 3238 (class 0 OID 0)
-- Dependencies: 205
-- Name: regalo_id_regalo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.regalo_id_regalo_seq', 4, true);


--
-- TOC entry 3239 (class 0 OID 0)
-- Dependencies: 216
-- Name: scontrino_id_scontrino_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.scontrino_id_scontrino_seq', 1, false);


--
-- TOC entry 3240 (class 0 OID 0)
-- Dependencies: 200
-- Name: supermercato_id_supermercato_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.supermercato_id_supermercato_seq', 1, false);


--
-- TOC entry 3241 (class 0 OID 0)
-- Dependencies: 214
-- Name: tessera_cliente_id_tessera_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tessera_cliente_id_tessera_seq', 1, false);


-- Completed on 2021-02-17 11:35:12

--
-- PostgreSQL database dump complete
--

