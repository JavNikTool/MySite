--
-- PostgreSQL database dump
--

-- Dumped from database version 15.4
-- Dumped by pg_dump version 15.4

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
-- Data for Name: blog; Type: TABLE DATA; Schema: public; Owner: javniktool
--

COPY public.blog (id, title, img, img_alt, text, date, text_preview) FROM stdin;
1	С запуском!!!!!!!!!	/uploads/phplhPWlu/phplhPWlu	pivo	<p>Можете веселиться, спамить здесь сколько угодно, выискивать любые ошибки/косяки. Так же писать любые замечания и пожелания (которые вряд ли когда нибудь будут реализованы, но надо просто <span style="font-size: 14pt;"><strong>потерпеть</strong>)</span></p>	2023-12-05 21:43:27.184054	оно живое, страшно...
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: javniktool
--

COPY public.users (id, admin, regdata, password, login) FROM stdin;
4	f	2023-12-05 22:20:34.355255	$2y$08$EjNFMkpWFNww8gCEgqn5H.Iv.CPOlkER0l1.O8lwMWlx3iURKOLom	89521896730
5	f	2023-12-18 20:17:01.093393	$2y$08$URQxNYioJA9HR2a81x/uo.Nbo2KR4DGbPMJ4KOKTZvLhzqB./5K3S	drop database 
3	t	2023-12-05 21:28:19.18935	$2y$10$cw2mzNqBnlmYg4fUfZTPserUECUm4YnXqngTEEOXIcJWzPIfrDwC.	javniktool
\.


--
-- Data for Name: chat; Type: TABLE DATA; Schema: public; Owner: javniktool
--

COPY public.chat (id, blog_id, user_id, comment, "time", author) FROM stdin;
1	1	3	<p>Вот и думайте головой</p>	2023-12-05 21:55:58.708788	javniktool
\.


--
-- Name: blog_id_seq; Type: SEQUENCE SET; Schema: public; Owner: javniktool
--

SELECT pg_catalog.setval('public.blog_id_seq', 2, true);


--
-- Name: chat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: javniktool
--

SELECT pg_catalog.setval('public.chat_id_seq', 6, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: javniktool
--

SELECT pg_catalog.setval('public.users_id_seq', 5, true);


--
-- PostgreSQL database dump complete
--

