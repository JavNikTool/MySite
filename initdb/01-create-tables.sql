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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: blog; Type: TABLE; Schema: public; Owner: javniktool
--

CREATE TABLE public.blog (
    id integer NOT NULL,
    title character varying NOT NULL,
    img character varying NOT NULL,
    img_alt character varying NOT NULL,
    text character varying NOT NULL,
    date timestamp without time zone DEFAULT now() NOT NULL,
    text_preview character varying NOT NULL
);


ALTER TABLE public.blog OWNER TO javniktool;

--
-- Name: blog_id_seq; Type: SEQUENCE; Schema: public; Owner: javniktool
--

CREATE SEQUENCE public.blog_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.blog_id_seq OWNER TO javniktool;

--
-- Name: blog_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: javniktool
--

ALTER SEQUENCE public.blog_id_seq OWNED BY public.blog.id;


--
-- Name: chat; Type: TABLE; Schema: public; Owner: javniktool
--

CREATE TABLE public.chat (
    id integer NOT NULL,
    blog_id integer NOT NULL,
    user_id integer NOT NULL,
    comment character varying(1000) NOT NULL,
    "time" timestamp without time zone DEFAULT now() NOT NULL,
    author character varying NOT NULL
);


ALTER TABLE public.chat OWNER TO javniktool;

--
-- Name: chat_id_seq; Type: SEQUENCE; Schema: public; Owner: javniktool
--

CREATE SEQUENCE public.chat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.chat_id_seq OWNER TO javniktool;

--
-- Name: chat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: javniktool
--

ALTER SEQUENCE public.chat_id_seq OWNED BY public.chat.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: javniktool
--

CREATE TABLE public.users (
    id integer NOT NULL,
    admin boolean DEFAULT false NOT NULL,
    regdata timestamp without time zone DEFAULT now() NOT NULL,
    password character varying NOT NULL,
    login character varying NOT NULL
);


ALTER TABLE public.users OWNER TO javniktool;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: javniktool
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO javniktool;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: javniktool
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: blog id; Type: DEFAULT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.blog ALTER COLUMN id SET DEFAULT nextval('public.blog_id_seq'::regclass);


--
-- Name: chat id; Type: DEFAULT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.chat ALTER COLUMN id SET DEFAULT nextval('public.chat_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: blog blog_pk; Type: CONSTRAINT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.blog
    ADD CONSTRAINT blog_pk PRIMARY KEY (id);


--
-- Name: chat chat_pk; Type: CONSTRAINT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT chat_pk PRIMARY KEY (id);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- Name: chat chat_blog___fk; Type: FK CONSTRAINT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT chat_blog___fk FOREIGN KEY (blog_id) REFERENCES public.blog(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: chat chat_user___fk; Type: FK CONSTRAINT; Schema: public; Owner: javniktool
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT chat_user___fk FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

