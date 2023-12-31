PGDMP                         {            presensi-ddd    15.2 (Debian 15.2-1.pgdg110+1)    15.2 (Debian 15.2-1.pgdg110+1) f    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16384    presensi-ddd    DATABASE     y   CREATE DATABASE "presensi-ddd" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';
    DROP DATABASE "presensi-ddd";
                postgres    false            �            1259    16389    bahasa    TABLE     G  CREATE TABLE public.bahasa (
    id_bahasa character(2) NOT NULL,
    nama character varying(50),
    nama_en character varying(50) NOT NULL,
    is_default numeric(1,0) DEFAULT 0 NOT NULL,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    expired_at date
);
    DROP TABLE public.bahasa;
       public         heap    postgres    false            �            1259    16395    dosen    TABLE       CREATE TABLE public.dosen (
    id_dosen uuid NOT NULL,
    nama character varying(200) NOT NULL,
    id_user_sso uuid,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
    DROP TABLE public.dosen;
       public         heap    postgres    false            �            1259    16400    hari    TABLE       CREATE TABLE public.hari (
    id_hari numeric(2,0) NOT NULL,
    nama character varying(50) NOT NULL,
    nama_en character varying(50),
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    expired_at date
);
    DROP TABLE public.hari;
       public         heap    postgres    false            �            1259    16405    jadwal_kelas    TABLE     q  CREATE TABLE public.jadwal_kelas (
    id_jadwal_kelas uuid NOT NULL,
    id_kelas uuid NOT NULL,
    id_ruangan uuid,
    id_hari numeric(2,0) NOT NULL,
    jam_mulai time without time zone,
    jam_selesai time without time zone,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
     DROP TABLE public.jadwal_kelas;
       public         heap    postgres    false            �            1259    16410    kehadiran_dosen    TABLE     �  CREATE TABLE public.kehadiran_dosen (
    id_pertemuan_kuliah uuid NOT NULL,
    id_dosen uuid NOT NULL,
    jam_mulai date,
    jam_selesai date,
    is_lupa_presensi numeric(1,0) DEFAULT 0 NOT NULL,
    bentuk_hadir character(1),
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date,
    CONSTRAINT ckc_bentuk_hadir_kehadira CHECK (((bentuk_hadir IS NULL) OR (bentuk_hadir = ANY (ARRAY['L'::bpchar, 'D'::bpchar]))))
);
 #   DROP TABLE public.kehadiran_dosen;
       public         heap    postgres    false            �            1259    16417    kehadiran_mahasiswa    TABLE     �  CREATE TABLE public.kehadiran_mahasiswa (
    id_pertemuan_kuliah uuid NOT NULL,
    id_mhs uuid NOT NULL,
    jenis_hadir character(1),
    jam_catat date,
    kode_akses_masuk character(6),
    jenis_izin character(1),
    alasan character varying(500),
    tgl_izin date,
    is_pengisi_berita_acara numeric(1,0) DEFAULT 0,
    berita_acara character varying(500),
    jam_mulai date,
    jam_selesai date,
    pencatat character varying(200),
    bentuk_hadir character(1),
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date,
    CONSTRAINT ckc_bentuk_hadir_kehadira CHECK (((bentuk_hadir IS NULL) OR (bentuk_hadir = ANY (ARRAY['L'::bpchar, 'D'::bpchar])))),
    CONSTRAINT ckc_is_pengisi_berita_kehadira CHECK (((is_pengisi_berita_acara IS NULL) OR (is_pengisi_berita_acara = ANY (ARRAY[(1)::numeric, (0)::numeric])))),
    CONSTRAINT ckc_jenis_hadir_kehadira CHECK (((jenis_hadir IS NULL) OR (jenis_hadir = ANY (ARRAY['H'::bpchar, 'A'::bpchar, 'I'::bpchar, 'S'::bpchar])))),
    CONSTRAINT ckc_jenis_izin_kehadira CHECK (((jenis_izin IS NULL) OR (jenis_izin = ANY (ARRAY['I'::bpchar, 'S'::bpchar]))))
);
 '   DROP TABLE public.kehadiran_mahasiswa;
       public         heap    postgres    false            �            1259    16429    kelas    TABLE     N  CREATE TABLE public.kelas (
    id_kelas uuid NOT NULL,
    nama character varying(20) NOT NULL,
    daya_tampung smallint NOT NULL,
    jml_terisi smallint,
    sks_kelas numeric(5,2) NOT NULL,
    rencana_tm numeric(2,0),
    realisasi_tm numeric(2,0),
    is_nilai_final numeric(1,0) DEFAULT 0 NOT NULL,
    tgl_nilai_final date,
    id_bahasa character(2),
    id_semester character(5) NOT NULL,
    id_prodi uuid NOT NULL,
    id_mk uuid NOT NULL,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
    DROP TABLE public.kelas;
       public         heap    postgres    false            �            1259    16435    kuliah    TABLE     �   CREATE TABLE public.kuliah (
    id_kelas uuid NOT NULL,
    id_mhs uuid NOT NULL,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
    DROP TABLE public.kuliah;
       public         heap    postgres    false            �            1259    16440 	   mahasiswa    TABLE     +  CREATE TABLE public.mahasiswa (
    id_mhs uuid NOT NULL,
    nim character varying(14) NOT NULL,
    nama character varying(200) NOT NULL,
    id_user_sso uuid,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
    DROP TABLE public.mahasiswa;
       public         heap    postgres    false            �            1259    16445    mata_kuliah    TABLE     W  CREATE TABLE public.mata_kuliah (
    id_mk uuid NOT NULL,
    kode_mk character varying(10) NOT NULL,
    nama character varying(100) NOT NULL,
    nama_en character varying(100),
    sks_mk numeric(5,2),
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
    DROP TABLE public.mata_kuliah;
       public         heap    postgres    false            �            1259    16450    mengajar    TABLE     P  CREATE TABLE public.mengajar (
    id_kelas uuid NOT NULL,
    id_dosen uuid NOT NULL,
    urutan numeric(2,0),
    sks_ajar numeric(5,2),
    rencana_tm numeric(2,0),
    realisasi_tm numeric(2,0),
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
    DROP TABLE public.mengajar;
       public         heap    postgres    false            �            1259    16455    pertemuan_kuliah    TABLE        CREATE TABLE public.pertemuan_kuliah (
    id_pertemuan_kuliah uuid NOT NULL,
    id_ruangan uuid,
    id_kelas uuid NOT NULL,
    pertemuan_ke numeric(2,0) NOT NULL,
    tgl_kuliah timestamp without time zone NOT NULL,
    jam_mulai timestamp without time zone,
    jam_selesai timestamp without time zone,
    topik_kuliah character varying(1000),
    topik_kuliah_en character varying(1000),
    is_online numeric(1,0) DEFAULT 0 NOT NULL,
    kode_akses character(6),
    berlaku_sampai timestamp without time zone,
    bentuk_tm character(1),
    status_pertemuan character(1) DEFAULT '1'::bpchar NOT NULL,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date,
    CONSTRAINT ckc_bentuk_tm_pertemua CHECK (((bentuk_tm IS NULL) OR (bentuk_tm = ANY (ARRAY['H'::bpchar, 'L'::bpchar, 'D'::bpchar])))),
    CONSTRAINT ckc_status_pertemuan_pertemua CHECK ((status_pertemuan = ANY (ARRAY['1'::bpchar, '2'::bpchar, '3'::bpchar, '4'::bpchar])))
);
 $   DROP TABLE public.pertemuan_kuliah;
       public         heap    postgres    false            �            1259    16466    program_studi    TABLE     �   CREATE TABLE public.program_studi (
    id_prodi uuid NOT NULL,
    nama character varying(200) NOT NULL,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
 !   DROP TABLE public.program_studi;
       public         heap    postgres    false            �            1259    16471    ruangan    TABLE       CREATE TABLE public.ruangan (
    id_ruangan uuid NOT NULL,
    kode character varying(10),
    nama character varying(100) NOT NULL,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    deleted_at date
);
    DROP TABLE public.ruangan;
       public         heap    postgres    false            �            1259    16476    semester    TABLE     C  CREATE TABLE public.semester (
    id_semester character(5) NOT NULL,
    nama character varying(50) NOT NULL,
    nama_en character varying(50),
    is_smt_aktif numeric(1,0) NOT NULL,
    created_at date DEFAULT '2023-04-08'::date NOT NULL,
    updated_at date DEFAULT '2023-04-08'::date NOT NULL,
    expired_at date
);
    DROP TABLE public.semester;
       public         heap    postgres    false            �            1259    16481    user    TABLE     �   CREATE TABLE public."user" (
    id_user uuid NOT NULL,
    name character varying(200) NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    "group" character varying(20) NOT NULL
);
    DROP TABLE public."user";
       public         heap    postgres    false            �          0    16389    bahasa 
   TABLE DATA           j   COPY public.bahasa (id_bahasa, nama, nama_en, is_default, created_at, updated_at, expired_at) FROM stdin;
    public          postgres    false    214   ��       �          0    16395    dosen 
   TABLE DATA           `   COPY public.dosen (id_dosen, nama, id_user_sso, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    215   �       �          0    16400    hari 
   TABLE DATA           Z   COPY public.hari (id_hari, nama, nama_en, created_at, updated_at, expired_at) FROM stdin;
    public          postgres    false    216   ��       �          0    16405    jadwal_kelas 
   TABLE DATA           �   COPY public.jadwal_kelas (id_jadwal_kelas, id_kelas, id_ruangan, id_hari, jam_mulai, jam_selesai, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    217   "�       �          0    16410    kehadiran_dosen 
   TABLE DATA           �   COPY public.kehadiran_dosen (id_pertemuan_kuliah, id_dosen, jam_mulai, jam_selesai, is_lupa_presensi, bentuk_hadir, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    218   ��       �          0    16417    kehadiran_mahasiswa 
   TABLE DATA             COPY public.kehadiran_mahasiswa (id_pertemuan_kuliah, id_mhs, jenis_hadir, jam_catat, kode_akses_masuk, jenis_izin, alasan, tgl_izin, is_pengisi_berita_acara, berita_acara, jam_mulai, jam_selesai, pencatat, bentuk_hadir, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    219   ��       �          0    16429    kelas 
   TABLE DATA           �   COPY public.kelas (id_kelas, nama, daya_tampung, jml_terisi, sks_kelas, rencana_tm, realisasi_tm, is_nilai_final, tgl_nilai_final, id_bahasa, id_semester, id_prodi, id_mk, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    220   U      �          0    16435    kuliah 
   TABLE DATA           V   COPY public.kuliah (id_kelas, id_mhs, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    221   :      �          0    16440 	   mahasiswa 
   TABLE DATA           g   COPY public.mahasiswa (id_mhs, nim, nama, id_user_sso, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    222   q,      �          0    16445    mata_kuliah 
   TABLE DATA           p   COPY public.mata_kuliah (id_mk, kode_mk, nama, nama_en, sks_mk, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    223   �B      �          0    16450    mengajar 
   TABLE DATA           �   COPY public.mengajar (id_kelas, id_dosen, urutan, sks_ajar, rencana_tm, realisasi_tm, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    224   D      �          0    16455    pertemuan_kuliah 
   TABLE DATA             COPY public.pertemuan_kuliah (id_pertemuan_kuliah, id_ruangan, id_kelas, pertemuan_ke, tgl_kuliah, jam_mulai, jam_selesai, topik_kuliah, topik_kuliah_en, is_online, kode_akses, berlaku_sampai, bentuk_tm, status_pertemuan, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    225   &E      �          0    16466    program_studi 
   TABLE DATA           [   COPY public.program_studi (id_prodi, nama, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    226   �`      �          0    16471    ruangan 
   TABLE DATA           ]   COPY public.ruangan (id_ruangan, kode, nama, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    227   :a      �          0    16476    semester 
   TABLE DATA           p   COPY public.semester (id_semester, nama, nama_en, is_smt_aktif, created_at, updated_at, expired_at) FROM stdin;
    public          postgres    false    228   7d      �          0    16481    user 
   TABLE DATA           L   COPY public."user" (id_user, name, username, password, "group") FROM stdin;
    public          postgres    false    229   �d      �           2606    16487    bahasa pk_bahasa 
   CONSTRAINT     U   ALTER TABLE ONLY public.bahasa
    ADD CONSTRAINT pk_bahasa PRIMARY KEY (id_bahasa);
 :   ALTER TABLE ONLY public.bahasa DROP CONSTRAINT pk_bahasa;
       public            postgres    false    214            �           2606    16489    dosen pk_dosen 
   CONSTRAINT     R   ALTER TABLE ONLY public.dosen
    ADD CONSTRAINT pk_dosen PRIMARY KEY (id_dosen);
 8   ALTER TABLE ONLY public.dosen DROP CONSTRAINT pk_dosen;
       public            postgres    false    215            �           2606    16491    hari pk_hari 
   CONSTRAINT     O   ALTER TABLE ONLY public.hari
    ADD CONSTRAINT pk_hari PRIMARY KEY (id_hari);
 6   ALTER TABLE ONLY public.hari DROP CONSTRAINT pk_hari;
       public            postgres    false    216            �           2606    16493    jadwal_kelas pk_jadwal_kelas 
   CONSTRAINT     g   ALTER TABLE ONLY public.jadwal_kelas
    ADD CONSTRAINT pk_jadwal_kelas PRIMARY KEY (id_jadwal_kelas);
 F   ALTER TABLE ONLY public.jadwal_kelas DROP CONSTRAINT pk_jadwal_kelas;
       public            postgres    false    217            �           2606    16495 "   kehadiran_dosen pk_kehadiran_dosen 
   CONSTRAINT     {   ALTER TABLE ONLY public.kehadiran_dosen
    ADD CONSTRAINT pk_kehadiran_dosen PRIMARY KEY (id_pertemuan_kuliah, id_dosen);
 L   ALTER TABLE ONLY public.kehadiran_dosen DROP CONSTRAINT pk_kehadiran_dosen;
       public            postgres    false    218    218            �           2606    16497 *   kehadiran_mahasiswa pk_kehadiran_mahasiswa 
   CONSTRAINT     �   ALTER TABLE ONLY public.kehadiran_mahasiswa
    ADD CONSTRAINT pk_kehadiran_mahasiswa PRIMARY KEY (id_pertemuan_kuliah, id_mhs);
 T   ALTER TABLE ONLY public.kehadiran_mahasiswa DROP CONSTRAINT pk_kehadiran_mahasiswa;
       public            postgres    false    219    219            �           2606    16499    kelas pk_kelas 
   CONSTRAINT     R   ALTER TABLE ONLY public.kelas
    ADD CONSTRAINT pk_kelas PRIMARY KEY (id_kelas);
 8   ALTER TABLE ONLY public.kelas DROP CONSTRAINT pk_kelas;
       public            postgres    false    220            �           2606    16501    kuliah pk_kuliah 
   CONSTRAINT     \   ALTER TABLE ONLY public.kuliah
    ADD CONSTRAINT pk_kuliah PRIMARY KEY (id_kelas, id_mhs);
 :   ALTER TABLE ONLY public.kuliah DROP CONSTRAINT pk_kuliah;
       public            postgres    false    221    221            �           2606    16503    mahasiswa pk_mahasiswa 
   CONSTRAINT     X   ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT pk_mahasiswa PRIMARY KEY (id_mhs);
 @   ALTER TABLE ONLY public.mahasiswa DROP CONSTRAINT pk_mahasiswa;
       public            postgres    false    222            �           2606    16505    mata_kuliah pk_mata_kuliah 
   CONSTRAINT     [   ALTER TABLE ONLY public.mata_kuliah
    ADD CONSTRAINT pk_mata_kuliah PRIMARY KEY (id_mk);
 D   ALTER TABLE ONLY public.mata_kuliah DROP CONSTRAINT pk_mata_kuliah;
       public            postgres    false    223            �           2606    16507    mengajar pk_mengajar 
   CONSTRAINT     b   ALTER TABLE ONLY public.mengajar
    ADD CONSTRAINT pk_mengajar PRIMARY KEY (id_kelas, id_dosen);
 >   ALTER TABLE ONLY public.mengajar DROP CONSTRAINT pk_mengajar;
       public            postgres    false    224    224                       2606    16509 $   pertemuan_kuliah pk_pertemuan_kuliah 
   CONSTRAINT     s   ALTER TABLE ONLY public.pertemuan_kuliah
    ADD CONSTRAINT pk_pertemuan_kuliah PRIMARY KEY (id_pertemuan_kuliah);
 N   ALTER TABLE ONLY public.pertemuan_kuliah DROP CONSTRAINT pk_pertemuan_kuliah;
       public            postgres    false    225                       2606    16511    program_studi pk_program_studi 
   CONSTRAINT     b   ALTER TABLE ONLY public.program_studi
    ADD CONSTRAINT pk_program_studi PRIMARY KEY (id_prodi);
 H   ALTER TABLE ONLY public.program_studi DROP CONSTRAINT pk_program_studi;
       public            postgres    false    226                       2606    16513    ruangan pk_ruangan 
   CONSTRAINT     X   ALTER TABLE ONLY public.ruangan
    ADD CONSTRAINT pk_ruangan PRIMARY KEY (id_ruangan);
 <   ALTER TABLE ONLY public.ruangan DROP CONSTRAINT pk_ruangan;
       public            postgres    false    227            
           2606    16515    semester pk_semester 
   CONSTRAINT     [   ALTER TABLE ONLY public.semester
    ADD CONSTRAINT pk_semester PRIMARY KEY (id_semester);
 >   ALTER TABLE ONLY public.semester DROP CONSTRAINT pk_semester;
       public            postgres    false    228                       2606    16517    user pk_user 
   CONSTRAINT     Q   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT pk_user PRIMARY KEY (id_user);
 8   ALTER TABLE ONLY public."user" DROP CONSTRAINT pk_user;
       public            postgres    false    229            �           1259    16518 	   bahasa_pk    INDEX     H   CREATE UNIQUE INDEX bahasa_pk ON public.bahasa USING btree (id_bahasa);
    DROP INDEX public.bahasa_pk;
       public            postgres    false    214            �           1259    16519    bhs_pengantar_kelas_fk    INDEX     M   CREATE INDEX bhs_pengantar_kelas_fk ON public.kelas USING btree (id_bahasa);
 *   DROP INDEX public.bhs_pengantar_kelas_fk;
       public            postgres    false    220            �           1259    16520    dosen_ajar_fk    INDEX     F   CREATE INDEX dosen_ajar_fk ON public.mengajar USING btree (id_dosen);
 !   DROP INDEX public.dosen_ajar_fk;
       public            postgres    false    224            �           1259    16521    dosen_hadir_tm_fk    INDEX     Q   CREATE INDEX dosen_hadir_tm_fk ON public.kehadiran_dosen USING btree (id_dosen);
 %   DROP INDEX public.dosen_hadir_tm_fk;
       public            postgres    false    218            �           1259    16522    dosen_pk    INDEX     E   CREATE UNIQUE INDEX dosen_pk ON public.dosen USING btree (id_dosen);
    DROP INDEX public.dosen_pk;
       public            postgres    false    215            �           1259    16523    hari_jadwal_fk    INDEX     J   CREATE INDEX hari_jadwal_fk ON public.jadwal_kelas USING btree (id_hari);
 "   DROP INDEX public.hari_jadwal_fk;
       public            postgres    false    217            �           1259    16524    hari_pk    INDEX     B   CREATE UNIQUE INDEX hari_pk ON public.hari USING btree (id_hari);
    DROP INDEX public.hari_pk;
       public            postgres    false    216            �           1259    16525    jadwal_kelas_pk    INDEX     Z   CREATE UNIQUE INDEX jadwal_kelas_pk ON public.jadwal_kelas USING btree (id_jadwal_kelas);
 #   DROP INDEX public.jadwal_kelas_pk;
       public            postgres    false    217            �           1259    16526    kehadiran_dosen_pk    INDEX     n   CREATE UNIQUE INDEX kehadiran_dosen_pk ON public.kehadiran_dosen USING btree (id_pertemuan_kuliah, id_dosen);
 &   DROP INDEX public.kehadiran_dosen_pk;
       public            postgres    false    218    218            �           1259    16527    kehadiran_mahasiswa_pk    INDEX     t   CREATE UNIQUE INDEX kehadiran_mahasiswa_pk ON public.kehadiran_mahasiswa USING btree (id_pertemuan_kuliah, id_mhs);
 *   DROP INDEX public.kehadiran_mahasiswa_pk;
       public            postgres    false    219    219            �           1259    16528    kelas_ajar_fk    INDEX     F   CREATE INDEX kelas_ajar_fk ON public.mengajar USING btree (id_kelas);
 !   DROP INDEX public.kelas_ajar_fk;
       public            postgres    false    224            �           1259    16529    kelas_jadwal_fk    INDEX     L   CREATE INDEX kelas_jadwal_fk ON public.jadwal_kelas USING btree (id_kelas);
 #   DROP INDEX public.kelas_jadwal_fk;
       public            postgres    false    217            �           1259    16530    kelas_kuliah_fk    INDEX     F   CREATE INDEX kelas_kuliah_fk ON public.kuliah USING btree (id_kelas);
 #   DROP INDEX public.kelas_kuliah_fk;
       public            postgres    false    221            �           1259    16531    kelas_pk    INDEX     E   CREATE UNIQUE INDEX kelas_pk ON public.kelas USING btree (id_kelas);
    DROP INDEX public.kelas_pk;
       public            postgres    false    220            �           1259    16532    kelas_tm_fk    INDEX     L   CREATE INDEX kelas_tm_fk ON public.pertemuan_kuliah USING btree (id_kelas);
    DROP INDEX public.kelas_tm_fk;
       public            postgres    false    225            �           1259    16533 	   kuliah_pk    INDEX     O   CREATE UNIQUE INDEX kuliah_pk ON public.kuliah USING btree (id_kelas, id_mhs);
    DROP INDEX public.kuliah_pk;
       public            postgres    false    221    221            �           1259    16534    mahasiswa_pk    INDEX     K   CREATE UNIQUE INDEX mahasiswa_pk ON public.mahasiswa USING btree (id_mhs);
     DROP INDEX public.mahasiswa_pk;
       public            postgres    false    222            �           1259    16535    mata_kuliah_pk    INDEX     N   CREATE UNIQUE INDEX mata_kuliah_pk ON public.mata_kuliah USING btree (id_mk);
 "   DROP INDEX public.mata_kuliah_pk;
       public            postgres    false    223            �           1259    16536    mengajar_pk    INDEX     U   CREATE UNIQUE INDEX mengajar_pk ON public.mengajar USING btree (id_kelas, id_dosen);
    DROP INDEX public.mengajar_pk;
       public            postgres    false    224    224            �           1259    16537    mhs_hadir_tm_fk    INDEX     Q   CREATE INDEX mhs_hadir_tm_fk ON public.kehadiran_mahasiswa USING btree (id_mhs);
 #   DROP INDEX public.mhs_hadir_tm_fk;
       public            postgres    false    219            �           1259    16538    mhs_kuliah_fk    INDEX     B   CREATE INDEX mhs_kuliah_fk ON public.kuliah USING btree (id_mhs);
 !   DROP INDEX public.mhs_kuliah_fk;
       public            postgres    false    221            �           1259    16539    mk_kelas_fk    INDEX     >   CREATE INDEX mk_kelas_fk ON public.kelas USING btree (id_mk);
    DROP INDEX public.mk_kelas_fk;
       public            postgres    false    220            �           1259    16540    pertemuan_kuliah_pk    INDEX     f   CREATE UNIQUE INDEX pertemuan_kuliah_pk ON public.pertemuan_kuliah USING btree (id_pertemuan_kuliah);
 '   DROP INDEX public.pertemuan_kuliah_pk;
       public            postgres    false    225            �           1259    16541    prodi_kelas_fk    INDEX     D   CREATE INDEX prodi_kelas_fk ON public.kelas USING btree (id_prodi);
 "   DROP INDEX public.prodi_kelas_fk;
       public            postgres    false    220                       1259    16542    program_studi_pk    INDEX     U   CREATE UNIQUE INDEX program_studi_pk ON public.program_studi USING btree (id_prodi);
 $   DROP INDEX public.program_studi_pk;
       public            postgres    false    226            �           1259    16543    ruangan_jadwal_fk    INDEX     P   CREATE INDEX ruangan_jadwal_fk ON public.jadwal_kelas USING btree (id_ruangan);
 %   DROP INDEX public.ruangan_jadwal_fk;
       public            postgres    false    217                       1259    16544 
   ruangan_pk    INDEX     K   CREATE UNIQUE INDEX ruangan_pk ON public.ruangan USING btree (id_ruangan);
    DROP INDEX public.ruangan_pk;
       public            postgres    false    227                       1259    16545    ruangan_tm_fk    INDEX     P   CREATE INDEX ruangan_tm_fk ON public.pertemuan_kuliah USING btree (id_ruangan);
 !   DROP INDEX public.ruangan_tm_fk;
       public            postgres    false    225                       1259    16546    semester_pk    INDEX     N   CREATE UNIQUE INDEX semester_pk ON public.semester USING btree (id_semester);
    DROP INDEX public.semester_pk;
       public            postgres    false    228            �           1259    16547    smt_kelas_fk    INDEX     E   CREATE INDEX smt_kelas_fk ON public.kelas USING btree (id_semester);
     DROP INDEX public.smt_kelas_fk;
       public            postgres    false    220            �           1259    16548    tm_hadir_dosen_fk    INDEX     \   CREATE INDEX tm_hadir_dosen_fk ON public.kehadiran_dosen USING btree (id_pertemuan_kuliah);
 %   DROP INDEX public.tm_hadir_dosen_fk;
       public            postgres    false    218            �           1259    16549    tm_hadir_mhs_fk    INDEX     ^   CREATE INDEX tm_hadir_mhs_fk ON public.kehadiran_mahasiswa USING btree (id_pertemuan_kuliah);
 #   DROP INDEX public.tm_hadir_mhs_fk;
       public            postgres    false    219                       1259    16550    user_pk    INDEX     D   CREATE UNIQUE INDEX user_pk ON public."user" USING btree (id_user);
    DROP INDEX public.user_pk;
       public            postgres    false    229                       2606    16551    jadwal_kelas fk_jadwal_kelas    FK CONSTRAINT     �   ALTER TABLE ONLY public.jadwal_kelas
    ADD CONSTRAINT fk_jadwal_kelas FOREIGN KEY (id_kelas) REFERENCES public.kelas(id_kelas) ON UPDATE RESTRICT ON DELETE RESTRICT;
 F   ALTER TABLE ONLY public.jadwal_kelas DROP CONSTRAINT fk_jadwal_kelas;
       public          postgres    false    3307    220    217                       2606    16556 !   jadwal_kelas fk_jadwal_kelas_hari    FK CONSTRAINT     �   ALTER TABLE ONLY public.jadwal_kelas
    ADD CONSTRAINT fk_jadwal_kelas_hari FOREIGN KEY (id_hari) REFERENCES public.hari(id_hari) ON UPDATE RESTRICT ON DELETE RESTRICT;
 K   ALTER TABLE ONLY public.jadwal_kelas DROP CONSTRAINT fk_jadwal_kelas_hari;
       public          postgres    false    217    216    3286                       2606    16561 $   jadwal_kelas fk_jadwal_kelas_ruangan    FK CONSTRAINT     �   ALTER TABLE ONLY public.jadwal_kelas
    ADD CONSTRAINT fk_jadwal_kelas_ruangan FOREIGN KEY (id_ruangan) REFERENCES public.ruangan(id_ruangan) ON UPDATE RESTRICT ON DELETE RESTRICT;
 N   ALTER TABLE ONLY public.jadwal_kelas DROP CONSTRAINT fk_jadwal_kelas_ruangan;
       public          postgres    false    227    3335    217                       2606    16566 "   kehadiran_dosen fk_kehadiran_dosen    FK CONSTRAINT     �   ALTER TABLE ONLY public.kehadiran_dosen
    ADD CONSTRAINT fk_kehadiran_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id_dosen) ON UPDATE RESTRICT ON DELETE RESTRICT;
 L   ALTER TABLE ONLY public.kehadiran_dosen DROP CONSTRAINT fk_kehadiran_dosen;
       public          postgres    false    3283    215    218                       2606    16571 ,   kehadiran_dosen fk_kehadiran_dosen_pt_kuliah    FK CONSTRAINT     �   ALTER TABLE ONLY public.kehadiran_dosen
    ADD CONSTRAINT fk_kehadiran_dosen_pt_kuliah FOREIGN KEY (id_pertemuan_kuliah) REFERENCES public.pertemuan_kuliah(id_pertemuan_kuliah) ON UPDATE RESTRICT ON DELETE RESTRICT;
 V   ALTER TABLE ONLY public.kehadiran_dosen DROP CONSTRAINT fk_kehadiran_dosen_pt_kuliah;
       public          postgres    false    3329    225    218                       2606    16576 $   kehadiran_mahasiswa fk_kehadiran_mhs    FK CONSTRAINT     �   ALTER TABLE ONLY public.kehadiran_mahasiswa
    ADD CONSTRAINT fk_kehadiran_mhs FOREIGN KEY (id_mhs) REFERENCES public.mahasiswa(id_mhs) ON UPDATE RESTRICT ON DELETE RESTRICT;
 N   ALTER TABLE ONLY public.kehadiran_mahasiswa DROP CONSTRAINT fk_kehadiran_mhs;
       public          postgres    false    3317    219    222                       2606    16581 .   kehadiran_mahasiswa fk_kehadiran_mhs_pt_kuliah    FK CONSTRAINT     �   ALTER TABLE ONLY public.kehadiran_mahasiswa
    ADD CONSTRAINT fk_kehadiran_mhs_pt_kuliah FOREIGN KEY (id_pertemuan_kuliah) REFERENCES public.pertemuan_kuliah(id_pertemuan_kuliah) ON UPDATE RESTRICT ON DELETE RESTRICT;
 X   ALTER TABLE ONLY public.kehadiran_mahasiswa DROP CONSTRAINT fk_kehadiran_mhs_pt_kuliah;
       public          postgres    false    219    225    3329                       2606    16586    kelas fk_kelas_bhs_pengantar    FK CONSTRAINT     �   ALTER TABLE ONLY public.kelas
    ADD CONSTRAINT fk_kelas_bhs_pengantar FOREIGN KEY (id_bahasa) REFERENCES public.bahasa(id_bahasa) ON UPDATE RESTRICT ON DELETE RESTRICT;
 F   ALTER TABLE ONLY public.kelas DROP CONSTRAINT fk_kelas_bhs_pengantar;
       public          postgres    false    3280    220    214                       2606    16591    kelas fk_kelas_matakuliah    FK CONSTRAINT     �   ALTER TABLE ONLY public.kelas
    ADD CONSTRAINT fk_kelas_matakuliah FOREIGN KEY (id_mk) REFERENCES public.mata_kuliah(id_mk) ON UPDATE RESTRICT ON DELETE RESTRICT;
 C   ALTER TABLE ONLY public.kelas DROP CONSTRAINT fk_kelas_matakuliah;
       public          postgres    false    3320    220    223                       2606    16596    kelas fk_kelas_prodi    FK CONSTRAINT     �   ALTER TABLE ONLY public.kelas
    ADD CONSTRAINT fk_kelas_prodi FOREIGN KEY (id_prodi) REFERENCES public.program_studi(id_prodi) ON UPDATE RESTRICT ON DELETE RESTRICT;
 >   ALTER TABLE ONLY public.kelas DROP CONSTRAINT fk_kelas_prodi;
       public          postgres    false    226    220    3332                       2606    16601    kelas fk_kelas_semester    FK CONSTRAINT     �   ALTER TABLE ONLY public.kelas
    ADD CONSTRAINT fk_kelas_semester FOREIGN KEY (id_semester) REFERENCES public.semester(id_semester) ON UPDATE RESTRICT ON DELETE RESTRICT;
 A   ALTER TABLE ONLY public.kelas DROP CONSTRAINT fk_kelas_semester;
       public          postgres    false    228    220    3338                       2606    16606    kuliah fk_kuliah_kelas    FK CONSTRAINT     �   ALTER TABLE ONLY public.kuliah
    ADD CONSTRAINT fk_kuliah_kelas FOREIGN KEY (id_kelas) REFERENCES public.kelas(id_kelas) ON UPDATE RESTRICT ON DELETE RESTRICT;
 @   ALTER TABLE ONLY public.kuliah DROP CONSTRAINT fk_kuliah_kelas;
       public          postgres    false    221    3307    220                       2606    16611    kuliah fk_kuliah_mhs    FK CONSTRAINT     �   ALTER TABLE ONLY public.kuliah
    ADD CONSTRAINT fk_kuliah_mhs FOREIGN KEY (id_mhs) REFERENCES public.mahasiswa(id_mhs) ON UPDATE RESTRICT ON DELETE RESTRICT;
 >   ALTER TABLE ONLY public.kuliah DROP CONSTRAINT fk_kuliah_mhs;
       public          postgres    false    222    221    3317                       2606    16616    mengajar fk_mengajar_dosen    FK CONSTRAINT     �   ALTER TABLE ONLY public.mengajar
    ADD CONSTRAINT fk_mengajar_dosen FOREIGN KEY (id_dosen) REFERENCES public.dosen(id_dosen) ON UPDATE RESTRICT ON DELETE RESTRICT;
 D   ALTER TABLE ONLY public.mengajar DROP CONSTRAINT fk_mengajar_dosen;
       public          postgres    false    3283    224    215                       2606    16621    mengajar fk_mengajar_kelas    FK CONSTRAINT     �   ALTER TABLE ONLY public.mengajar
    ADD CONSTRAINT fk_mengajar_kelas FOREIGN KEY (id_kelas) REFERENCES public.kelas(id_kelas) ON UPDATE RESTRICT ON DELETE RESTRICT;
 D   ALTER TABLE ONLY public.mengajar DROP CONSTRAINT fk_mengajar_kelas;
       public          postgres    false    3307    220    224                       2606    16626 *   pertemuan_kuliah fk_pertemuan_kuliah_kelas    FK CONSTRAINT     �   ALTER TABLE ONLY public.pertemuan_kuliah
    ADD CONSTRAINT fk_pertemuan_kuliah_kelas FOREIGN KEY (id_kelas) REFERENCES public.kelas(id_kelas) ON UPDATE RESTRICT ON DELETE RESTRICT;
 T   ALTER TABLE ONLY public.pertemuan_kuliah DROP CONSTRAINT fk_pertemuan_kuliah_kelas;
       public          postgres    false    225    220    3307                       2606    16631 ,   pertemuan_kuliah fk_pertemuan_kuliah_ruangan    FK CONSTRAINT     �   ALTER TABLE ONLY public.pertemuan_kuliah
    ADD CONSTRAINT fk_pertemuan_kuliah_ruangan FOREIGN KEY (id_ruangan) REFERENCES public.ruangan(id_ruangan) ON UPDATE RESTRICT ON DELETE RESTRICT;
 V   ALTER TABLE ONLY public.pertemuan_kuliah DROP CONSTRAINT fk_pertemuan_kuliah_ruangan;
       public          postgres    false    227    3335    225            �   K   x�s��tJ�H,NT��KO/�,�t�K��,��4�4202�50�5�@f��qy� 4���g&r�Yy���u��qqq H��      �   q   x�M�+�0 P�����:N��с���ci�4Pi�=��z��s�����"�*Jbn�v_X��u�����ǎ�W;BG��T!1`�J����(h��)2��s[�v�1~�J      �   }   x���;�0E��y/A�	�P�G�q3Q�`���)�=)�����'��E��g��Y�6�k��7���i���*Y�\e��KN���Ӛ
Ƨ��w��8sԥ��/*�Q���&9q`o�<�1_�CF�      �   `  x���A�m7DǷ�B�`�Ed�`���p[��Q��3˲�|����;M���u	<������r��2����]	�U@���]�\�"X)])�[L�w�8���~3~#>������8��ǿ������(�uE;{\Qٺ��G�.�}�'#��12@Q	g�ʈ'�m�HP�ُ�`�Y�E"Q� �g<��j�_i�'��H���a�@]�ܨ���X�Z���^��*��$#�M�"�<]Ilw������X"������6������x� ּ����\���4�gS��bȴ��r`�]�:R瘧�lW�+��lmҿ\�]�/v=l���s�5XMУ�۞ݞ�'���P���p�����a?ys8��u���g����m5������.�Wl�D���"yS4�lonw{gSn��O=������n����hn�?G6�e�|Pg{Z�_�A��d���XR��|j㣹�p��Cر����=nb���nO~�G�&�� �N�P>w$�s	K^O}g��Ƚ��g}���y#a�w:Eɻ"��ɪ����ǡ����mF�'�x-�j���3V��ޔ���|_�#z9%U?ƹ��~�|N������oP�H_      �      x��\A�\)\�wai?ˉ>Ao ���0�*�]���bz"m�w}T��ʔ�Uw��V��S(�� �$$Y�<��]��n��:��RBɊI����9�m-�E�)$������Or�%D�����Me��1���`fḾ����H�:6a1��9�������M�[IC)l�����bku�2O�c���{�_Y#i����0��k��Sd&#)�.7�7��6��������n��{狥FT��Jy�"{�C!ka�8����ږ�x��ϔ�L_-U��hZ�R�#�I裬 �)ɀ�y���&}^�j�cu��_j�t�	��/���j��y��cNns�� ]k�c���M�Ċ?�V���}�AR�3Y�[wȵ��RS�v��/���j��'%@)�r�	�ѻ���m#�����L�C؛�vxR���Sy�ؕo���j���&����VX�<��b=��ՓsM[G���R�8�H����n�n����S�7u�޴�M2Vh@�X�f%������҈�Č�R�¹�v�s��W(��t��[�&�ASf�AV���E��TLnQ"=[U]�POa ���i��Pb�+gɘ���`����0cG^D&��H}H�I��+�?���ɥFaf�&�K�GkX;3 �x�o�����|W�M�¿
0
 ��̖F��X7x��U�'��g1B�<�i�U	O�k!��ܮ�N����V1(������\�be ���9��7��.9V]� p�(��[a�a�\k�6U=������D ���өE��$kF���F?w��{��9��ҽ�s^<��0���kG��U�y�k�#2ղj�$3a�� =C{R0��/��?�_.Īc���A�[��fb xG@��-�~>8X�$�6�7� ����tޜ�y���� 9�Ε2�J�k�҂�G��I��>'�����kG�Qӆ;�ݱ�%����n��Z���v�_7%�V�7(��7�s�qF;�.oX;�o��4`�%��@��Y%�G�Ǵ�Nʟ��Ւ���+Ab��`�yg��Qm�1lȵ����AKĀ���85�����n�J����Hf��`�2�z�˫¤��6��1�.���5d�PTK໰�0s�|�?�Z��[ɹ��������#����6S/ۮ26�+~ ��Q���A�s8KG�AIR����`����a��l�,�l�@��[L�f�k/�7��[ў�.0pK�\����(V5݀��{�6vS@kV���y� oȘiY�{\�5�U��8��6��'p���V��Mnt�au��"�ì{M�AI���	z �a�zT�us�#��Ƃ�Ƭܬb�If�aC���jI{���2����1�ZZzc�`�'��,�����f�cso"h�\S��l]zS��V�@|О�^���3le�U�i#����|j5!��|+'�H TF�uhXc�>���@���W�94��k�Pv}������Xǖs�Zh,����H|�)��`ǳ�1�+�$H���=��ԹuH��Vn�q�0>�LRΚs9��we$T�6��w�+�XfQGX���qT�75�DG��T�%i:�#a��n�*��l����	j�Ny+�ࢌ	�XA��_+�V������6�h��bQ�Uw�8;��������,8;�Q��\�;����Ը�`���7y�d�*h��xQ��$�^��& ��z�m5 dNsT����o��mg��2�B���n�%#@p�)M����S�Ee����oZ;��$	"��H�OE8*���B �t�o/jň#0�ʫ;N0E*��a����)TnaC�s��=8�6״3��R���(��Pr�m�U������-6��չƣ~%�_'�6���xF��t-i���[�@��9]]oC�A�"hd&kt�d�#ʥ:�9i��j�X� ��0���u�ܤ�y�ޅ��x�@�3��]�p�`����o�+��]�������5����DY����]��X]׹�-�'�Z�=^Y�KG��D�n�.�������N���T���Kf��{����Z�m�� -�0�p|hi�z��5G��[KP|ծ����ݖ���=�;����P�f�6�u�T��R���C�"�[^���E&�����UA��b��@��Z�LNA�W��=��G���<�����I���:�U+C�����Eh֦.�zz�֫r=D�f����jt���aeG�?b�,`^���&�~yo�Kflk���gh(U�E��!.HW���*
��к���1
4R d�!C��
�[=�MkB�����/���z��={�&Wu*r�~��A"A2�$dD�~�4��	)�}[1:��P���Й�{;ǋ����Ͷ�X����ظm��Ư��й�{�r�Cq�h���(�9|8�� ��yZA�ŉ��W?,Eի���XXt���Yp�u�G�t*�h�����Q��m��h���{�z�����]�vIX�MW��;;t���̐+p4XU5n�?�\�ZFG�2��H�3 5�NA'9�g�_�#Oj�� ;������9�P�k���I�<GZ���޹��T��U��!u/>΄��.��@�{�H���� ��Z��ϕʖ�l3�w�Av�,��l�$��}�Vg�'<z���z��w,&&�u(2d��*J:X�@ցwGB�����z��Q���co�qG� rZ�}WE6ЍsU0o|X��u32¾���i��2�-����=GP:H@��ڹ͒K�7;|X�cy�Ă
�-�WM�	�V?�]�i<ɷD3m]C��ks�~m�����/�zPKWp�&y.y�dD���Oxc�}�xYE9��*Hl[�(�W�K�^'�G��Nu�ycP�	Q�(\y�n��u��<RYW8|�T+�i�
0j���V��@��A�RiW����F���_2vI�g���71r���yg&�ތ��V+.��0b�#���uϼ��}ç�A[���ƞlWG�Y���۱�+�=N�b������� nX��7�������R�gӪ!G��NJ��-����y��|�5gd[���o\5�.H��l��.�6�|�Aҭ�/|�f�Z�?^��N�ڼ�6��C<+�����z=��8�*�w���(W����~�l��#N`�:;�[�U<Y��j��ʧ�:��VfZN�j�L当�+)V��+�M����Ӻf��~���Rh^����S��>��W}�|�a����)Xi�;r8o�{�\��}~��G��j�l�;V��wZ��OV�h����ϫޠƫe����I�� X]O9-�5��y�8}
T���=N!���򽛶
���*ʇ�/�+v���H�#�e ty1�>e�]/nƾ��$g�fS5�!�܀�����B����9��a�?��gZl����k��Y��
��X�U-��x�٧�BK�M�%EW��"�S�Ƽ����9|�T#�l�;�ܹY~'9͡�>��~�~��1|��w�����!MHh2��U��5�E�1|X����@V��i��֜��*��%�k?8o���wau����>f�4�N˼Q��GV4�"��������/p�	�X��@����Ç�,f���e��;dZ�6�I��v���c�`��ↄ0�R�W�bZٻJN�.ov� ��1�S�2(��Hנ�o{�'UÖBN��6	���c�s�,���t�S�mX��/�^����p- 8������5��p��A���V��*������� )����E������d8Y�Q�]㚗�hR�5|xJ2U0k^�?�u���ݼ�Λ�T�_余�Q�U�`V�]�*�E��A	�LWu�3�I�Qs前�R��5��w�ҙ��٧��uqΕ�e�_0��ս3��T�b$$
 ��H�TBP��IL���s�bD�Z��\�������d�ݼ>|g(�>UN�T���!�U��묉0�@Q~^u:ʬ�h�X�_�G�<�h�� ���݆�{�\���.=7g�Eܫ�Z5�tU����l����� �   -P\���e��˾������n�XW���~3�Q����i���K9��s�އ����u�+U���\����M�6�Z�r!)	2`�+QW]Wu��a��/�	�ӻ���&���y����Kd<��	�Ǡ � g*��]�;�R��lg��+�^&���q�|!�5m|�܅3�Ճ�uX�mY~��]��e:�i�������W�sK��p=�a]�&=��ul�ѧU�)t�p��߿�7))      �      x�̽ˎe9r�9�~�z�_�yZ}�:hU����
hP��ӷ-�̌��}/3:��Z����#i4���h|H����lSy?�j�Z�S�:�>��/��h�K��i�׶��ZQ:�����j��?�Xm�2V����	ڼ�ۿ��������Y���_���o�� �ךcx��ʻE@�.�y��jp�2Jӟ�o��f�UllNWF]ʗ�Ty�oI��UJ����1�C������!���hj�敟k�<�P&�6Mʶ�(:|f�Y��*��臂W���LNdǮ�
K(���l4Y�k�w=h[S���P�Ӄ�|n�ZrU�Zm-Y�Ɯʙ��FO�O�}��7C�ؚ��n��%	�����3��3�C�j���4gl��@?^G)���J��VtP�����*W�TH�v�h&�.
4��4��JE���T�(�Ȏ,ef^�~�aM�j�k�M�\|S�e�S�3�_�[ǘ� �m&�B�� GԊ|yW1��F�}�r�s�S7!+[4m-U7UcY�zwq�6���R�]瘒����j���ޏ�cZ-�F��]P��MxG^�{�Rh9i��^(��͢��{C��.7�J)�T�_��"Nb�O=k2U��;E���Z�<FjU�B��.����2L]a���S�sP��C�%.��؄O�Z����E۟���j[TiQ`W�1�Ɇ����2��	($�𦓉�q��zv�����73���rP��<y��h�Z���m�Մ��\�з�+��٫�3m�4�%]�����(�\F���fZw>/K>�6U�Ϻ�U�\��Y}�S�A������Y�C��5[���5�Rw�����=�д)[��t��Η�l�iZ��E'�[�I�)٤��|A�3�E�Bֲ�گD�ʄ�I��C�@� k�Zn��_X����l�$jY���f5탴�44���4�E-FaR������4"��U��\	�3^v���[�6bKmv���IS�u�
�d�}.�B���jK0�S���=9�ڪ�b��Q��֤���RTK��Z�'7����W(&��(EO�Ӥ��M%�1Z���qv#v��A���^���v�Ը>ץ�:e7bK�q���M��3�Y���+&Z_��{�佫*\v��ѯ0*+��h���.+�ZQ�("�j�F�d�f5S�˛B{���^�0(X��~7�V�
�VO��^ڋ��\H$NJ��q��ζ^Z���ejm�]�ܖ�-뛧,D�Y��
��)��DM�̉*��|p��`@q�f_��uo^P�f�̶�- ��wK���7/�y�z7/�u�:7/�i3�`�1�ބ���0�T���0Y���`�+/��2;=L]�! e�TUya@E�yo��T�SR�'0��2/mL1e޵1��y��VJ%���2'��*�*��0���B`�'�޴-4J8=Lhdޛ0���0��ּ#�j����Q�+�s!�P��V���h���a ���a ���2���	��0���	��0���	��0���	��0��Ⱦ7!#;"0�;=D`d�3���	��N�C@`䆁FnH`dߛ��=FF�	���K�wmD`d�(���� #{���0���	��!"0��M�������}oB�g`�mF����P��M�Q�C��{��ѐk|	�������� EGy@�[0�)o�-q�3�{V�D�w�t3(L���$?(P��"��J�K~��⥼�@A� �P�=Lq�_��* �)���	TcB] �<>&��/P2�ec~ P:��c~ PB�0���&5&'�<1��@�����P�=�I����g~ P��eh����6^�S�{��6�-������ɟ�CyFJ(��=^�Z����Tn�>���L��b\G{qql@xA.3^����~�f����w �ź��v���]�!�y�-��
[/�e�^����
!^��l11m|�F�ޘ�dn�m��x�s������޽���hf��%���\&�������^>�l1���{�˨���Rj�I�SOr�Ě;6�ˬ�w)�{�'����Q Zn���\3�e�ܡ	\z�$�wom�p-8w�׃so�pM�ǁ��+�oW���/�g�_��m���X�v���$���4z��Z���; �n�� �l1��-?����|+`!��-?����v������q������[	�)��bRZ�ֺW`����
 a-|�'8���@0'�{�yt��0��{l1X�a�@�A��!�{DX?b���I,0�����^�U| ���D
B�����z�[�c��2���&;��e{YH���h�np���Xcey6[~jB�N����}���9J��)I�*���AAt�K5T�p��`�5n��	7̾�- ��kKXf[���׳`��l�}[ f_���ׯ`��k�}�ZFH�ރ�֨%6�m}Zf[�����:�{0��|�ݏ=l	i�{y[��}�Yb{�֞E��]�Y f_s��כ%v�m�Y"[�֙%&��,����d��f[;���ݘ��l��ɶf, ����k�!�v}��ҋ�6JD/f���z��F��?�)U����⥘�s͝آ�1L�i҅��d
�M�A������������g��_~�{��xъ� "��@DS>���g,h�G =� �QDt�#�������m��wD4�3��..>���L� h�g =��h��>�|h��YW@w_0�d�m� ��
Z�5�#�����?��A����wg���S9�n�S #��DB�;�3~xOqF��]D�gD�q�	π�g	�.D<�Fލ�	n��%g	��݀�ԕ2�3�i��#���EJ��ў��^�u�5���һ�_�y�+#��� ��ʼ�&���� ��̈X�3#��� ���H A}f$��>3@P�	 ���	��������
) �׌����Bz͜��P���n����'G��H A�eD����L ��� ���H A�eN�%�ߌ�Š~3"��7sb�~3"�
�_F$:���ߎ����Y\�4Ç�KuJ�˪7��?<���ւ�Ȅ*@	 ��� G$vB��Lj��{Q��]$�D��.��8OZ��Ђ�2=�%�:U&m���[�ZWX���l��i6 P������x (��[��-
��{~ P��BP��(���>?(�����$|~��� &���� &�����@��	�����@�^`+�{� ���@����7[P��(�LrL��BP�?�a�@t�	�[&�8RL��W ў���@�^`Rc������"L��.1���~����YL��������}P3�m�Z�������j􋥤86 �V~ �V~ ��w��\�p}���@��V�!��q�;0�ͭ��on�on�on�on�on��I�ͭ��ꊿ���*��b7�
 a7��Op��Vy@���{���~�7�
l1�ͭAts+?xs+?xs�@T������*0���[�6xs�@ܴ#�?q��^4 t;��ng�p��Y���tn�9��*r ڶȆ*�mom�B���ya�vV�����)�ag��K[�rA�^3e�Ս�Ռ0KҨ����k԰ya@��Ԯya@���2H!97�Q��4/�M��4/�I�z4/�=3���{0��̼Qb�33�73{`L[f��t�=��ȼ�5d�� ӏ��+H;�uc^P3f޵1��9;��b�	����Kӄ���0�}�F�����s�ڐ&��=sÀ�0s�i��XH��(�Zgv����%��E(�MoZ�2��Rx[�J%�DɫmnA��^W�ƗL?�������?<��ܾ�>���҇�x9��ܨ*b��#�hK/�6��#VBnI�Wȭ�"@�-�"@�ͧ"@�M�G&9rө�Ŷ4�}������޷�;w��ӳ��e�2{2p��)�\n�@S�u-������M�ā;2�'Z#���"k��Tf��/=2��_z��� r�Ll    �O*�7��� !��ʸ	�~�3�$p��L4���s�������;B� "w��̫-���_�`_��<�qv�����'C��z<���������P�as2E�S��_\g��o�W�������?�?E{�ֱ#�����%��g�O۴��o��zK9�֔+,i_���W~a��)�����`��/�A_� /x-�47�A_� �?+*�� �?+*�� b?+*��������=�F	���0�2��A�7�*������jTJ��@�9��$sVTg�A�p�]��y�P����ͻ�A�7�en�]i(��g@��y��dmVT�f��/�!��%&�P���F�4a��ۅ�%�?��>܋�i3��([U���(��N�{��'��:0/��:0�e0�ԁya@�ԁya@�ԁya@�ԁ�a�t�=Lf�(1�Ӂ�=0�3WB:��t`^ˀ:0�v�������:0/�3�ژ̜`:0��t`楍�����3�ژ��g0�{׆t`^P�u`�Ӂ�'����Qb:0��t`�Ӂ?b�U��O��xr��v���.�lV@t��n&6s��ya�FҼ0`#i^��4�e�FҼ0`#i^��4/�H�l$�6��I����a����{ֻ����������~k���KfvzX�d�j���K��%3�MX�d�k��<��v��Kk�̼kc풙7J�]2����%3'�X�d^�]2/�.�9���%3�MX�bf��u(fޛ����n�ah��׎�K��)���������� �Q��]2%9g6�������J�c���b	l	4��/K�R�.1OGJ�}��������T�H��O�����2%��p%����Xh������~n��7�~����@f�5E�G^�6u
��Jִ�s��.:l�W����QMl3y�Y��������r-a���x	�-��q�q9�����ʸ��VKݩ��W�xF����R�Er�S��s0��d���u|��/���k�+�]���d� cɎ�e��l�zG�\�\ӹ�����H�y2ڢ�6��&���ʣ<�gJ����������I|HEDƏ�P�%�)��j�8�r�D9o3�9Y $�?2Ǽ�-����5�F��/���Q"����p�Rc�u����+Ju��+?ﳤ1�76֯�YS!o6W����蘪��m� �¯qz�Ȣ�J���1)�i&*��WX3S�F��d�:
�L.E�*�� ���B󆖘uAM{���FU�˭I�+u����f�H�<�B�L���&���lV��Q����U6��Ueu�|�4J�w��lP+Yg,M��#�/Z>OٲZ�Uui*�I��4��UW�	����.`���y���:\><���=HY
� �-�ܖ���9���s
��]�7p�@Z���ti8Hc�FH_���-#�+��)DS�����a��i8HG�����=� ��y��% �7�p�@Z��t��h�0�>p��Nkg�4��AQ.B����[����b�v)}�Z[@�>�.Ѓ�^?x��$,��<��n@@z��U M��<Bt�y�hf�q�6 aH� �4	 H� ���.`K���P�/⇐ܟ�A���9���s�!(�?a%(�?����� DD� �� 	 H��C�& � �����f�6ʐ�}�A��e"����+�y�_���|�b[@�y~ H� �.�������; ����.�[<� 0ǰ�n;���]��S��y@�����g�-�R�삀��.��g�<� �]8��� �����"D��?x��<� 1��s�@�9~ �í~�"N;����J�p��|´�+�Œ�s��3=f����������6q�*N B��	@H�8��e���oE]��|Ct�#��1~h���\
�k�� �s� �t����q�=N n�R>�8��<D�82��r�@��r��!�@D9i"G�!D#y�f�i$',i&g����Y���rd�@4��GD�N+�s�a-����`B7��b�K�)[�@�� 5�w ��j*�5���h���@PS�� TrpKgy�xo�aZ
���~ P+��~ P�_i��o1P�0��w�=|���o�-���1�z�����0�g��z���W@ �g�[�3$�����@=C�b��qb�Az�@���v
L����:���+�+X5��&��zi����p�藤M6�]���� ϯ�A�ϯ�[<��o1�������,��y�!ϳ�mi�((�Ѵn<�"?���,���]��x�E<�"�e�a�Y~ �,���gYl��Y�� ;�r ;�¿(��,�v�E ��β��gY�'9x�E ��ζ��g[n�@�A�#]7�[�_#E�kT�����g�h݅/��+6<>��]�he;@`݅����~��u�@`]����W�-�X��5�@`�?Xc��X��5�@����lD|Xc!����$Ç�[�o+`��< Xo!�[ ��-�X_!9`��1VO��O�Or�~B ���'���z�{�й��.��N
r�d��d_+���S�X�����ߓ��������m���x �ߓ�bhOq���=���ߓ�-��=ف����@x?���f��h/Ovk��<�]��S�����^��@h/O�!D{y���<���S��ɾ(�^����˓�������CX/Ov ��';���N��K�tڇ'�*�b�BT�F�CN�昆�;j���[k�s��_����ys7͟g}��Y�-8��Q^K���2�!�nQ�9��+ʼԱ{Eya�;EeWx�(����Eya�{Ee��؇�[��a�������@: �F��%*���{D��;Dy��?�y��������3�}��{vW(����	����B1�1��E�qo��r_�#�Z�n�%������o�>��u��%���^���zӯ�>x���%,�����+�G���|B�{�����". ��%��\�Ċ����� 1��p�b�pdH}@ď!���BH;8�	G�)Dt�Ei"��/H A��3��!@k� ��	 Hs��/��hѺѼ�V�f���]�����*^E��<Q�b[@x3^K���|�V�*�K^��5���
��\[�=���n7 �0�u�@xm3^_���0�u�C�p�!���{��f �΀{s�k����@�9`R��;�k����f ��}�u�{\�����z����s5KQ�L�*��j�`��6�������"�`t �>x��s �=�� ���(������ �sX�!����?n�U`����>��G`/y@��< �A�p`�������G�B�?�p``� b����� fc��������o1�_?�/��!4cjO;0��B_]T�䂆ˮk]1=ca��&���m�g,�zSb������~��g.�-����W�c�9�9���pX-���@�9��ϩ�uN���xC~҃�0��xC~H�s�;�!�ǰs�@�9�!�al�ع��;wq ;w�?����;w�����]H�!��?x�<wq�_
Z�p�T>^i��l�,s���x��_(p��Ŷ�@-��73���@P���E�[�"�-j��E�1L�pXO~ P���S�!j�C
j?�X�j�p��@-���bZ����"���6L��������6P��W�q`�cz�@L��_��!a`z?�G��z����~ P����[�R�����M'��,��A몹f(�to��o�-��JV��JV��JV�JV�~J�9�E�;g�{    (y�6x%+z��[���@z|�����R�ݓ�0轓�0���s�_���wK�x�$+z�$�F
�);���"e��{"Y��#�w���[��!Ya�{!��v'$o������ ��;���چ��cȥ�I{w����Y]�4V]�Z猩*����w(��խ��-�@/~/���sa�T��Y�pe:M��-%3e3J���&f�2Z��M:�eJNɻT�{��h�S��Uғ����^�h+�a)Wi#�4��!G��d�>SDf�2���d��)n6��L_����]�Ok>�
�RhY�X�7-^ʊ�9\zSmF�zm���C�Y�hQ��&]����,��m�䖝�	Y���T�Y
�
m�y�F�EQ��\F�%�ଞ)�h����T(i(]9cƪ�����JC��D|�#=� ���������e�C�g�ϖg��#�}@���}~����;�� ���3����F�8b�*G3$_/K�%@��i<f�����[[��b�	�S���[[��b�ɱSl97v
v�E�����y����V��h%�L^ɓ#�a�z�k��Gu��������"BB:"$��!BB:"$��!B^"$�{��kh�͗�>���2&C¼��J�:�FS�h���g�z;l׈�.G?:�?�G�Y2Ӏ���t��4��d��#3��i@/�Lz�����e[�t�����K;������0�-i�R��i 叝FL�ۢ�T?v�];���Ӱ'�[��qk��r�ڒ�U�9�����S$G��og��������z�D���&½7���p/�M�!�^z<K��� �
>р�Tv��R ��׽ v��;�G�g��DxV�M�g��Dxv�M���d�ό��˃dX��}�(>�'���'�O���
ŨP�^�k��r��䅆�{�r��6/ņ�As�-��'B�f���0R�-���~���AnQ��2��
��2O����Wu�-d�U���V+��@�����lQ�ɴ�/�j}�]��}D`2-@&�D`2-@&�D`2-@&�D`2�Q\Ә���Z�:9���Ϋ2�,����8d�C�^A�E�^A�E��d����p��=�ۢ`� ܢ`I�E�_A�r��I���a'��F�,ok5���I�]^��i���=�sD`v+@f�D`v+@f�D��9"0� �]"0�}�h��b�Iѿ��ԫ�q�<Y3�q����k��}�����#B_#����������D�kd~"�52?���}��O��F~���՘iª�hM{���D5��r��j	���������C�;D�� =� �!�@)@zH"�C
�(ޡ ��svY.���T��B+�UK�j��ć�57��uxܘ��r�-"��F��]'ܢ+�ޢa��(�#&s�];ܢ +f�V�<Gk��d�*LG������O&'��،��Ww(�߄�P�	١��C��&d���M����
�7!;�oB�*��Q��4ݼ#�7KO�i�_7�����Q�RL,?���>x���+f��ԁI?�mW�5r���h̬�9�~��=����5C�tu�-k\�!�˻���4�΢@~��Mn���ͥ�U��l�����`'
h��Xfld����1���M���6��W2�O�@KmΫ��q4�]Uy�Ud8W��A�b=^�+�������Q2�f��V7���[�(�s$�u[�
Q��)��~"��d-���Z�����!ۋ��E�VJW�l��_2�8�;*M��ܫQx����X,�2S�`��ɯ:=z�̂,�����f>5�4��6�ʮ�zr�2y�]���Q�Z$��IyF̊ҵ�\#G��Ho��V��'.܂�ɜ(�����u����jjrLu�`��lu di���Q�BKݓ�v��lh}ىM�q�>\%�ׅWVJٸ���I�]V�B��PY�x
�)���u)���B[4�t�kd����t&�M���
�(��E�V�3Zr���:G�06�@I���A*[���*�洶�.W�]@�VۯDy9w- O��m�{��\9�r�=��C�l@`���J�@`���J�@�������0>>�b1,U��*E�M���a�4��:`���I. �~Z|Łi���ۜ�-�I�C�*fS&~ 0e��X�$`!,e�S&��K��:,ez
�3<%W�R��2E�>�4�Ha�e,x�3���bs��C9��2��)?�2��)?�2�����Ͽ>�b1,e��v�L������L�� �6�|չ���ݵ�����b`��s����wYL��-�M�@`���M�K�,��M�@`�$��ai��^��MOM7����2���'�׮m��6K
��u8m�乢ϑM�؁д�M�؁д�M��z����[,�M�C�&v 4mbB�&v 4m�w;i�S[hj�n��Ԉ�*h��n4�aB�v 4���`��o!0�aB��=L��,0�y(��hb\�LAd�ѝ�d��@9	���j_�)6|�5���H A���H A����},�س��HXJu$��TGJu$��TGd�#o��z�^����s�P$a1��O��!	�@��I m�CO��{�I�D���7Cl�=�P�#�g!�Γ@.��N�N����<�êtK����A���1���W�&����<1o����7V��	 (�� ��!)������Z���x��HXJw$��t�a\X`�TGdr#�����Js��(�ywȘ��;s
Jw$��tGz�#�>"B��H q�A{{�N��߭�ĉώI��"2�j���"��y�~)*�E�S�>}�R {Y'kCb���H A��V:��G��M�-(���
��z�~��!���� ���!��	 (#� �2�s
z�"a1(C����W���V!��HX�P$��E�PD&�N�")@ى�u��4�}�Th���2�'��(L�^;W���(����������B���̶^ǒ౯Ͽ>��y�n�a�t���c:�@�1~ ��$���[<�se�f���[<���pXw�U������U�l1�x����=�@��~�	�����a�{�-���goÎ��oؑ����1ToT)�_�uU�n�"��Z\W8��:=s�r|�cӋ��2J>�`/v�����]�7*.}��x ����b��~ ���B钄���M�@[��*��x���V��7!�-����2��%�-�����L��2��o�����L�I�f.�u��L���N���4���=m'=z�"&���P����D��Pn6�0�6�:��4͓h\,l@`�~ ��?���r�v9x�mo���x�Ű��;��������@`�7�u>�_u`�~����-vC������E"�|'-�s�tH�*Pѝ���uI�߰.	OQ�FAb*j�B񘧕S��*��p��k�=�%�X
���z���J@`Ǆw��w5���@�����
�@`�!�;*�]����vU�;+�����$�R)	����-vZ��i�h+�z"Q؂�n&�7���
�CvT��~����	�M��Ø�&�ssިP_�$�TY��4��ej?�In���˦m"y�g�_63�/���8�^��Z��|����f��;�y.m�=���l�_6����e�2�Fr[�Wm�(�76���{c3ά�|�o�G63�V��;��۳�~��{�/��@vhӽ��,y�EC����-ffGR�<G��Ƨ7Ài/����/����͏;���w}x��RXZ�k)(�yB�ق��x-�6�0`ZüԱ�Fvu�Ep���d-�;��S^0����	��8̖��^���y�BR�]Lo>l��m�\}��ld��e�fG��ؔ��8N�U/�&�l��̛ô�}�c����x-�F���"�����Yʇd�- �%�Ёͷya���̓k� ;��V��� �Z
l��k)��/��@v��6�k����    �{��Z �Zl�ͼ�I�A��˰��L�=��U\���ZgUE;�"�2�U�zƇ�X����v��3>�@�~ �L?x��<����&�����agz�-�������gx���3<n ;���U羮:wת���[<�#o1����3<�@�m��@�m��;�#`!�l?�*��u;��o7�K[�vs�S�q��DK[�v��"�_�,�V�-���_��L�߶`�t�M�Xa�4�M�Xa����?��x���Ԉ�Rh�
�f �0h������CtB�Y��ЌC�Rh��j)4�`�A�V4����`v�k0�`�A�
޽K��lo�3��Z&]���]�I���:T�h[툣��������U��G��TPm�)�Km9��!�����G�>��w���W�|G�D�|4S�t�E�4+��G >�G��l��}O��=�ѵ��.[���ؙ�ä~��b��n�,�\��c�;O�@N���b*G�/�ig���(�*�7���h��4(�`h�Ҫ��)E��Đ)�HU�1{*�Ō�tw�w䱼�}�5��8�����Cj��4j�8�Ut�/A�lk}�iHg�1~��K�J8c!����_|1֞��[�'*)�󔓫ڛUv�\��d+�(J���hh��0t���zg�2�ĵD�hsZ&$�@'E~�QH��'�Lrk�ǹm*�4�S��W�������ʇR][]ǯɨ��5;��ä6(�p�z��0k
�����&�Ū-69����1N�J�5�E����`y|�eWp��L>���)D2�w�*��[.��Av���:�(t,��5��-O�Yr!�\LIϳ��j#��2��~�he�4�J�g�ˉ�_��.$����_�LƑTѭR ��p��]�U��(
�`/*G��6A���k��b߼Ȅ�c�-rO�I�i��Ti�7���U�B�����ŷk�ŎE�8u�9�>��I�i��*��I����K���%rXPt������[�����ӕpR���?3rkjJ���@qE��;��m֠_P:��Vs���d�蜳Z��Qyd��-nu�*�\ښA{���"��b�e�a�?oY��Π�Vc�뮫k�Y2��W)���	W�J��Yr!.�c��٣����1���%v�ɏQ�F	����(��c�e(�L��9#�K�B�E�*�h��ӷ"����:q��;���BZ_?��x���S���o�^�/� ���޼(���C�^Nn/BC�/��r#�B�!�}���sp_�Z�b�о�rh�ŗS����r��m�/��ȶs�o�3R{�8#�F��!�}1�Ԝ�c�,�/��ؾs*�c��t_���c�¦���\9o�|�R�Tl�|$�(�o� �̫Zd�Kv!�I�& �� X���x V#Vż��(���*~ �
��z��S`Ջ�Ű*�n�r�X��V��!X�"0�X�����Jy@�����U��kX��< X�"V��X%?X	�V��SX����J~ ���@��U��[�t �*]���F��������h���KO=���l�A1�<��, �l��Bʇ^��`��/,��x(���	�0���@EPx�Od-
'��E^P0�6P,a6L(��(����F��#�~Fd�@Q�{uB�^���0�����<x-��0��!c"��@��fG���y�XRI��yM��k��`���E]�6�u'r���w���X���@H�x�f�Aǯ-F�?<��' !�� $~� ��#��rFN B��	@H09�(' !!��#��	@H`9�� "ˑ`Z��ADl9�f���*D��oe��!�KA����Xsd�!��	@HđH)!!�H���9' !�� R��.�M�6���K�PW�v���X̘CâOz��D���և��l�����7[}~`��Ͽ>���> �#��> �þ(P�G�b��#��< �#��< �#?Ġ��@�� DE��y�P�����#�f@��}�EE����@QG|�PQGu�w	P�DEq@T䑏�A�Gy؝0*�<4�HnP�M�@���2��U��m�E��o=���q�CH�?<�
;� �l1Pؑ�(���< (�����@L�9 �	=�&���B�< (���Bρ!Ƅy@P�9��`Bρ`z�AL�9�f0���*�����{�.&�p)��#
?�&���< (���1�G~ bB�S�M���wQ�A��s�*g�Ț-�d��0���d�@1�~�b��K=��Ro�� "��	@H�5�v��w B��	B��	@H:1Đ0tĂ�0t�� ��	@H:1!a�]���^H:2��t����tbQ@B���A' !!�W�ZAeq���$�$q+�t����t�N BbБ��NX�$�$�<	D��{ʰV/��>�{�N�R�PR̳�͊�7�_3�yt�!���-@�a� >x�kb�����@��x ������ؼ�l`,?��&�����������M�������lv|`H���`dy@��< �����"p+XS��j�,`͒������C6Q>0ǰF��`se�96X>cM��-6Z �n�z
h����Q鐯�?'�fo�ǚ�܊�Z�c��MѦ[z�l��9� �l1��G�C��>��x X��o1�����������; �J��X��@��F���_`e?Ж����ǅ��.�jF~��U3�`Ռ< X5#�`U2.���B�*��b`U?X#?�`́9�U���U0�s�z9�bU/��\��*���(��kR�BM�_ۢ]��aE��Mr�G@H1oԑ������! �_�([p�"�����T��)����p�"��-�����:��	�m��g�f����Ul�&��L`�+U~>l�������}�Dbض��~i_49�ѷ���Xr"��N��("�sW0�����}�D f_90��K�0��ǉ�|[��Ծ�!�}E�s0�O3fq����S>I��0��]6gH�����E���������������Y������?��E���rF��"B�qXD89�_��`��<, ��E��㰈psv��"B�qXD:�C�a��8,"�E��㰈�t���"��qXD�:�[�a��8,"��E��㰈pv���nW�� ��p=�)���r�I�/����J�u�Cݡ}u�D�Y�CǶ����:��=|�ݏ=	��ӑ�{��}ud��;?�3_�̍p`Yˁ�v��������vXO^K��sxa�^9����a6�G�����8��#�qc}q���G�ý:��7�{!����y������`o^K�}lxa�6�I+ؿ��R`�f��
��`���<
}1���jS-��:ZB{֘D��&�;�� س���-�����>x��Y�o1�g?سF~��5 ��5 ��5�`��E���o�B����b}l�-������ܱ>6���F��`}m~n1��b�.��}mLzc������>�����{���=m���a����frG�X�~k��k���5O�9�6�R?���AQ��Dy��d#A�$_Θ�3������c�8����������5�ph�Q8��(ڿF9v�=�ͮ�_����u`�VK��kXa��5�Æ���6�+گFփ��jd7f�_����Ո¡�j�W#֯�w�����_+گFtB��jX-���a��9~�Z]`V�?/pL�=t���1h��k�����j�4W��H#�WA\ǗE�/�?>x��y�f�A�!',U�� ��EN B�#' ��#�H��@�z��C�GN B�$' ���Puɑ!F�MN B�&Gv���H��T��H��D�U��Y�@���Š��#n�@9U��sH�    	@�"� T�r$bF�TN BU+G �*�'sw�P�{)&��4������K���Ni���夬Dâ<�%�-y����/��П�E���V����uO�R�lU5yү���J�_Ə��e�J�5%ZmeF�ZMG��a6e�9�Q�-?��}&���w?���i
sE�z�f��tsq([�p�ڤ�18k��5�}�6�L�m�;�^�$�18��;�h4�{�ʧDp~E�,����:W�o�4'���Q*�U��j�j2����]n���^�%�P��Z�^_���k���Iv;͠m�Q�lx�j�܌���@6kiw�r4�.�:ԪW&0yNC���vmm�M��4�\y�("fJ缵��NJ�Ӣ��~��o�CIٻ�땹 �+1�4U�fw���Ei�s�<Ĝ�����}��/��\_��k�S�E��5�����8MK�S�}��U�@;tMOG�?�]��f�֋��,q~K�֮͹Ě��9�כ�Eh��mZڗ����]����Q*���-Ӫ4�����)j���wL&Y�j
�z-�ф0C�z�VK��]Պ�2��4�^~`�7���b^���+ymZSSӤ����ϊ�0�[�z�.����,:��(��Um)}Ѭ�����ѺԊZ�bqZ��浭�"qmm�e�,Q-.�z�+�l��W��"���2�!x�$4sl��C�{T���.'�S^�TY�L�k�]�G�8�m�Rv5c	nz]h7;�:2�,I���ߑ�"נ&j9CaK��t�T
9�H�w��僥Xפ�j�c�����!����qF��R�S�Lͩ$
��9j=O�m9כ�A�g
���r��a���B鶇I��k�y��EU��rfTʙ��J��N�:��4ٷ�)}��\s���ҹ��<� #Q����4�r���UF36I�{b�?�)�\wp��O�}�N����@Dy�n�!��!:�@D�9��1G MFfU �̙IH52&C�"D�� ��̑���4B&��jD��F�F�f#C��6G&:��Ș�n����M+@��!B�"D�9 Ι��p��F@�93��p#c�-��p���<m2kb����
��2,"��}�śNY�	��s��)?Cy�*�y���Q4�GЈAU3"DP�̻D����M�� �r�I��� R##C��ɼE�|��A�2"6�
dD���"�"F��������A�1�����T!#B�%���'��)��4;��T�>��R���%���T
#c��E&�@
^d�4���H
�T���Kd��j�g�ְ���'�8������r��N�U��˰�%Xg��#�	m)$���g??R�Y"����!zSxG�?<�"�?�*{�<5�L���N��!f�l�!�<"$0J�� 	"�L� x.�{&#�;x.��6ع ��� Ia���|�Ĵ��	�g��x>H�>ء �I
�H԰�@���a��[����_�!DzFM��8�P�ѯ���
%=�,��X3�n���#<M���W�d����[D��"�0� xz��7UY�=>���0x\Gb��:D��"�|� x>G�F��	"�|� і@¾ق�p��6x&Gb*agr��39D�!	"���<��H�#�� xG�hK$aw��I� ;Z#��aGk$f3v�F�<K#�!�g�#�YK�8��\Ю�r/��Ҭe��N�;Z���O��~���:���@�m�����A�ъ�mH�=��&C�Њ��D�;��ֳ�� [���mh1ɯ�C_oq�`+Z���gy��w��>h�Y���L����s�A�o�-?�|V�l>+�����l>�O�6��]�h�Y�l@�?�h�Y~"�ͬ� �mfy�<�f�=m���>5�Z6�����뮾E:P�c 'L�m3��)OӀu'�4`�	3Xo�L֚|C�慥я�w��u&̦kL��/��jK�i��ng�Քp��'��jI�i�Ʈܶ��I�i��n�`�#�4`�3X0�M��p��P�{�`E"�4`�3ء��6X�wD��p�WXq�Ha�!�4`Q��|�&z��܈梿�DR�Q�R}���e]{�X�Ϭ4P�;T��N�y��@%�4P=;T��?RH-?R��N�p�{?�`��6H�?R��Nj��)�`��
4�m�h��@��4Pa?R��?o���y�c�G[H!;T��o��?�@*.��)�ڂ���
�D��-���D�_Z��3��J�I���	S��F(���\����c��*�&�3���w��s�x�ŷ�w���6^�!��d�ux�����5؉��n"�l��/�`�\�!����a@�ȃ}L�Bn"�؃�Fp�7^�!<��:n�� ��J�doJ�� ���kB���v��!�9"\.#�%#�\E�m2�����&y��B$KQet���/���b���ym{��?�K�x?� x?�;Do.~����AĮ�o�o��F^f�/�X�e�&v������}%�R�L/�=�`��J�v�� x������|?�:n��˗���W`���|��b�_m G���[ ���%�]�+1��k~DuH��_ o�=`.�`y@�N`������bw��X�H��[����7_�ź͵�z��w�Hc���١�Ra�)�n��i9رqo��N���N�� ��U�z`SWû�������D`SW	"��+�]�W��U` ���DXSW"��+�$��2Ӏ�\�m�5s�;`3W"�����U���*�.��U�.`W��6p�������?��z�J�s�i+�<�����[�#�_Hs�U\�e�)+�����J)7L���7<4��7D�rt��>�j�}>�beo�0��s1���< ��L8P= �RO���v�g(��`ʉ�}@�D�E�ʉ��0�D�SN�(�H�S�@AE�F��"@�*��XLj,�
�0GbZaz� �������0�E��%G"����&��lKt���� 
.OڧZJL,��.��&�%PLD��b7�<�|g�m;�K����A���Ҡmgyiж��4h�Y���2Ӏmgyiж���l;�l��,3�v��m;�l��,/�v��6`�Y^��,/�v��l;�<o�����l;�m�mgyiж�̶��2G`�Y�|
l;�<RRmg�hж���v��4&�dr�rj��� �R.Gݵ�4����iO��i���4`Yf��,3�9����J����;����̦[�r���k�L���v�XKXn�`�`�i�ޯ�4`�Wn�`M^�i��ܶ���2ӈݔ�Evqe����{�`�[��ֽ�����Lvm�ֱ�;��ڳr�WXkV����2ӈݔ��� �W?n�l%h�\���оSVI�3E44Ut�mJϜ�ڢ`���E�%Q�SlI�[�;Ŗ��N��9��Ȏ��O��1�Sli�^��y�-v�~���bK;�Ŏf�N����bG#`����)�4~�-�^pw�؛;�?����Sl��������wv�>{��NN�?";�<;�V/�	�:w���.Y�����*�~`�䟝_��9��FV�_\�������R�!z��>x�e ��R���R���R&xA� xA�v#� x#� t�B�F��v#��]�Q$F
�E��E�F��(D��(D��(D�U(��
EbaW��w����H���D"�n8�H�N�#�'&o8�I���j<Kd[��{r5���vu�{���)�����{�4��v]�5�U�A�
��ɺ;J%����Y��Sֿ�b�cA�w-��*+F��W�]R���9}	�R�����rdQ }��!;� ���(�.��P.PZ�ѻ����������Y:崋r��i�Y
�)�L*�B뱸���l��j����6�|���{�a�a�~�y��֔���ݥKd��o�sgK�\�9�N�-��U͗t㳻6��"���9�cD�(ю����B�/:Iu�)J�J-+d�,�J�Ⱥ�H[J���E    �nҳ�pR�4e'��U�^E���釚�*�93yKGA�Q7�h��ͅB��:���j[Ti�ԋ6&�_ �� �e�~;^�.��5�T(̫W\��I��8S-��ҥ0y=�*�[�=���҆=��*�+�f'����S�xV�Y9��u7!����2����fW�B?P���(P�sԜ+�U��`�y�N!���ˠ���F��T.��J��DQ����ff��W��y�י���bsc�O�{�c����]v��˴�)'�Wt@_Jna�f��r�r��䳸`[QÐ{����(�ksK�FY70�H�Q��q�+%��s�?Z/���!c�S^��9����ڊZ�c ���_h�3�~N�ThN5
���K�Zj~Q���h��b�er�_��_M
�(d��P~1S��I��[M�3�����7��Ŕ.W�s�.+T[.�����_�K��A'�P���qy��C8
-Jk�͏2v�6JLi�v�xJ��;�A�V�1���2��/^�R�n(]�/%W)3p��_LH�$ـ�t�M׿z;�����h��n14]gB�uv 4]gB�uv 4]gB�uq7����n L��'���B0]gB�uv 4]gB�u�I����C�u�I����L�������S`�.n14]��j�t�M�Ň�;]�%�[O5��}���(�V���%�h<�q`���[��������;@o�}��x ���[L����t�~s�­���`);���);?��˻0epX�~�yb);�����L������L��'9������l10e��X�.�8��]~NA);�f�m10e����l5X�~�oa)�< w
Oɛ-5��s���z���ٹ�sK�2�J߹a�ԝJ��a��JϹa�7��0PJ����0P*�>g���}i#)�w0��g��ؓpH�;��T�J��a��J�1����pPj�m)(�f��HJ���tZzA�4�^���Җ�Rh��I��a�TYzض��,C���^���z�h��s��b�r����{B	��w�������P
}J�O B��@$�>��' �ߘ�$=?a%(e?��G���q%H�p'�g_�H��JP��N n���[Y�$��$Y�|pį!���쭈�p��!r�	�-	B��!�	kq��7���h��v��m�ӯ��:�݌���,&?�묁76������	 H^� �� D>� ��zX���Y�q�fz�/a1H: ��ւd��	�G�"��D&8a1�2@d�"��$H A��T)pb�����, 2�@đ"i��!��-����X�o�cH�/�� �G��� �N�C�}Z�#�T�2�6�<(�����ԡ[m`a���-r�ƽ|�~�˰u[�`��;�7[�,��XY�o1�����BH
��XE o1����b`���9�U�	�J��cE��U�U���@`E ?�����`U ���* �I���p��[~�9����V_�b�[}��{�ơ�|�/?|ܩ}.4O_����E2y�-��G��h�<�_b*9|�r�- �m?�6��7����; ��y��J�'6��^~��N���������!�F�����	����g���X�X=~ ��?�F�l�'?ɷ�w�l�'0���y�k�'?��n��[��[l+eg���vy���Ǔ6�T=�R��YΡ/�����Ҕ��af�WN���bȩ��Xp�����@X�=?Xp�Л�� ��-���b���@��^~H���s+�pXѽ����{�U����E��@`�=?Xt/?���{~��E��+�p�X�������-��[,��j�"�~+��%�{|��;���ǫ�?�\��S�"+I�4h_�&wm�7�ڽc�c'�7"�v��w �o���7�����w o�s�w�@�[{�!����o����ng��?0ϰ7��{s��bo��-�����w�����֞|k/?�����-�����8M�������[|�/o1��;�m{���͗B�t?�(�3��A�Ep���*��L��������hG�I���1��1��q���1��1��1��1��1��q�!�R<�e_��-��/���/��^u�y�@�%y�@�Ey�@�ey�0��b��yܓ|'玳�Rpn�b<�=�Oxuq��m��x�>�,O���������.�����:��B{��]y���/&��2�j���6?�j a�6?�j���f�[����-},��60���m~ 0�X�X�-���t��b`�����@[�6�sSl����������^�Yb����)0��T\�b�]�����[XZ.ȝ��Т���Ϯؿ�q��R���)������ۂ��ya�Bv^�h�+X���ya��t^��l#����Iz|�eaE��K+8��XlμڰBs^�М,2��e'4X\�k)���yBcE��N+(��C`19s<���Z
,"g�>�r^�x\vض��,U���.����U����r��[�C����b(y,������������vp@X;8~ �?���l��Лf:=>���ۿ�������M�b`�7�U����J˟P�� ��zoA�m��'3���m�&3��M�Abm�����M ��ڼ�[l�&��`m��-�͛< �[�6byUڢ9M�0 ��I[N���9����������:/��3�`i:/���X������p`��k)0U�����)����sf׀�沖�r�Ո��0`7v^�;/���Nh05���3Oh,%gv�X:.;��T��R`�SK���[���3oX�-연�[zk��0Z�m,d��+e�C�H��Ɡ��䜡��*Kn����Z����; �R�'D�-(?a%(=�f�A)����B(U��������KXJӏ̱�T���+��@R�#NI�EV$��K Ai���K m������KXe+U�
����LH�~�!B���Št��Š�� ��sGP�~�Z�o��^=�26S ���l����%,������e��d��:��W2��{�FS'Z�?o������������Y������?��ҹ׫U��L�������h��rEʒC�r�f�|j�P<N�����Ͼ�q(�[�qJ䳖�m�fU:+6��}���y(9ҥf�A�'P�����1'%ZS~�L����A�r������Ϟs���4�JHi�r{�0h�z��L�r����P��+Ij�+����'�����zk�sʙ�t��.�N��9J�J��av�V��0��K���yu�\��|մ��,*�ZL��\[���a�Vȅ��49OrV��Km��pX
ct�j3��d�J)0m3��c�T*�6 g����s�D)�	��|�]�v�2��mf՚K�<z����З:�&e3�bc�B�1���*-�~u�	����ת�L?��c�R�<T�R
�i�ڕ��6���\�:Ĭ���'�շlo��8�'�苆�\Om��.U{��W)������k�_��G��blz����}U7zR&�3���z��Q�j)�:Q� �k5�6?�kǣ���A�5�ѻq�/���o�����������_����_������������>!��k�XS�~�d*M�H;q/�2.���]:��}��r�b��(M?�'e9�R�fހ�jU"K�{1�~������ˏ@�r�ZJw����a=#��z��tj��� ��M���V[�4^�O"���v�������j�������Y�%עj�1�iM]Wj1�T����cU��'r���1�d��zEyK��l��.��R�/s�Ua���n��˒�Ly��ƼDА�j��C��Y�T�~(5m)s��{�dUv6��c����oV�yGc�)��V�z�JP+]��Uwk��9�(��+NZ�&�Q�Ѡ�i[tnO�]13����c���_�yhKr�)�W	����w n�/�ے^�Z    lG�9	�%ɜܒgNnI5�ndG�9i�-�F�b[r�I�mI7G�܎�spKґ�s[r��U�#�ܒy$�tK�9�m+��wGT��T$��Ĕ�sjKX9:�wD���;��I�-�ErQl	/��tGtu�;�Ӝ���vd;ը�!��JY�<m!{d��x!��t!��t!��t!��p!��p!��t!��t!��t!ΞK.��s�8[P҅8[P҅8{~J�gJ�g�O	��>�B�-(�B���O�gj�矿�z�g3ʓ-��s�8[P҅8{>A�gJ�go���A	��9*�B��0A�go�	��9O�BcY��؜�uJ��sW�B��R��[~���4��2�ш�|%��vZ_��:��~��+L�o6���3��C���L������V� o�C�xS;�D�{��'�Ӝ>��y�7�����c}�M��� o�_?~�wpS�<���>��y�7������}�M]�� ojv��ئ~�y,�������c�M��� o*q�xS��<��
�'�S��y�M�����y�|S�<��j�p���ʥ	�t,��h��� /�kq	;�g�����>�w���\M������`A��5�_� ���IX:�w�bȑ��Б>�!���t�� t�� t�Ob�AG�NX:�w��!G�N BG�D�r���*E��� ��K)t��L��q�ȑ����IX:�w�b��#� 9�w9�'1�#}@Б�#{'r�� t��f��2/��҇˼�`�^K���9I�}�c���}�x-�Xb���)���d��7��R`�$YK���d��^I���I���#Iأc��d���H�s�$���H�p`�!�j=��ǰ�C�0`�!^�ݐ�[	Op�������w�?o��Z��1��/�J�s�>>޲��B�Nk)t����g�A�5�#��2�5�J%7i���k��u19�'m�����J�-�}�� �k?�x9��N�Y,��el�����w����'��.�I����O��������!�}]�����I����S~u[��$[�N�I��~�ˡ)�/.}�)�/8�r��"�'���B�!��W�d��Z�x_��,���ס9�/���>����>�����m�l������JHMGK�1��J�͔��SVֿPZ���s��~��m����zcA����@����SV,����OY������SW��+y@�ԕ< x
K<�u�b����SX�[x
����Na������<�%>a���Z���rV�)����:�R��"=2Œa���w}]��fM	ʟo�<����.h��Ѝ-Ҕ��E��cw�HS~�iʏ��"M��k`����=0Ҷ���0���C7�HS~��q����dn�L1�fi� �B ��J�V�V�N)����_�H!�r�����ؕq)�f]��C��
w�K�V{�>���Ǯ��ݏ�#I|�Biʭr����ݐþ�}���؝9��̇.ё��ح:�Ç����н;���C�Ga��G|��iʏ��s#e��m��Sj�R�Q�:u��O�_��.&����K_Y�}v��N� �9�B�?<�v{����Ű.�`gy@�;��;D�[�!v��R�[?�!�_úD���"���q`Ub#�����lcq"^�ZY8Z��������\�[luq``�. b-/��6��l�q`/��a��-2n&�E.}��Y��f���	sRڙ�Ȁ8c��l����&[pdI�z�ب��l��)J"j0��-W����H���p�j�	�m%� ܾ�t n_A: ��&�p%�J�	'��"��W����K'�ܶ�t n_U:����u[]: ��,��[�U�p[�N��]����-��ۗ�N��mI� ܾvbAlKa'�e�~n[;�l�a'V�v�	o�`�J�w�4�kM�U�~�il-A�su�l�B��Nck$�T�½�y|��<sxƒ�G��0<�y�pg�����y���%7�~�ռy��s�n2<3�ga����:<>r�n9�þy�pǲ_`�x��<�xf�n�;�þy��s�n��;�������<[w����;�y���恺�17��}���u�c{�<ewf�n��.�^M�^E7(��ɩ<=-��\�����X������%��/����/?� T�u�Ӻ��櫣U)�V>R�@�!�:�.�=�A�32�%Ʉ�~ H���#�v���<�x���~���X���<0x��y`����uG��������?:^�t��<0x�y`�z�����H������%��Kz��Y��F�]�tޢ�uI������'��O����I������+��W:^��
l4���S�����-\Z��mc[���*>[E��*�ۂ�:���Cp��s����N�m�˝��.�; �_.w n�<� �~y�	W�]w�	o����/; �_�v��m����/g;����N����p��j'���r�p��4����\�хl�̝��k����̝p!�5s��k�N��5q'�k�N������^_�C�u���!'��E�v��t(�E��L�-
�(��2�T����-9�[���^:�K���l��_B@�X�F6~OLU�5U#G�A��	��쫘��dE�O�
��'S�C����t���d�ph}2U8�>�*Z�Lw)��.�`}2U8�>�*Z�Lw�듩¡��t�9�>��l듩¡��tc+X�L�O�,6��d��O�
��'�]J��d�ph}2�	�'Ӆ��s`}2]U�'ӝ�`}2�E�Ov\;� /o[u�&����Aۃ����NRˬO���T��mk����_>~��k�P?��P?�%�H�%�H��P��P��P��%��o�) �=ꯨ�W\1�P��%��oq �oq�:��_\�_\�_�XV���k��Qe!F�/���Q%�"�WX꿸d �� "�W B����ׂ؊��RX���^�Zl�r�$ʦ�%w��Ֆ��\4��^�E,��6��÷J�|�y,����8Җ�6�0HrF{ؠČ6���F(�m)(�"m)(�"%]�a���
�$W�-%R�a�����A	m8(Y"=�P�D_?I�EI�H�@��؆$B�}J��;8� �����Ϗ��!�i��Ij��>$�!�h"Ɍ[-E1-����ibU��m[��i�v�sk�� ���l�|v��ޥaQ�^l}C���J���x��/,��/�/.W��a���d���xn��J��ֵO��yR�(������2�%���G�Ͷ���ٺ�h`ꯧ�o��k��l�6��e4���C2�i#����֖�R�No�~K�_����������zк�'�����:6�,��rR�?x���A;J�+i��Y�J޿Y�"�k�旚,ē�ab�Ҙ�1H�R��H�6ew��k�h��u
?O?t
b��-�#0��3��2s�sZ�q�7$-Y<l(���#-L5�4�&CӠ��Ъ���e$�e�c)`�1����+f�Df�]B[��v�8B^<+zII��5� G?)֚B[�p�[�Y�r8Hu":��Ð����zWM���#�h݅`�K?(��c�1��8�����"�>
K:6�HB=Փ�;��\��zwC��2/�>��%������mj�p3�;]K�N����	x������d33ɺ��Ҍ#�3z������F�ɧԈ�e�C{�c�1�8ZK� �%.iX,I#N��-�,�"N�$�"��!N���,� N���b�E!.X,1�`Fė���(�
��}M�ŭ���y��n��RZ�)� �Y⑝E!�Y`�������x��_>��2P�	��N�e!����� ����N`Q�	���,
q	���L[@I���!��$&�ƕֻ�u;ED�G���ݤF�r,
�X��Y\�<Q ���=L7��oD��?�<K� �  7�x�gQ��^�L�x��%TW�a�� Š*���4g��b�ܬ��[ގ:o��ji�KK׹+�:p(�`�,uS(���0p�_>�( ��@�K̄��瀷�����}��-8�t�����Fd�@���Ut<�*K�*K �����ݑ��-MS���;���}��^�
��*��;=y�������H��9��&u�����X�(���N\� B���^��A��o2�,
$��L�3,
Pլ0�j����p�$\;�J�Lm6ų{�����aQ�_aQ�g]X�k��Aŉ�@G�!�x篯�.9���/oDΑV B�F��=��l�&���D�|i t�t��*p�ْ��AgK+�:[Z�-�x�����Ԃ�%��ȕ�f��p#���fyeâW6,
qeâ������B�����E,
�,
�,,
���B���E!�aQ��Ne�B��o�J?p�Kr�7���΅�iA:b8��Q�	�B<��(Ы��r������.
D��W"�����E��]ĕ �,���.��������mWu@���: z�U���ۮ�D��V�A�W#������*'���#-G�o�c�^|��Bm0��l6�%�s�.c�����Py
x�� ���d���@��e��ag/���Q�> x2�����'3�������ά0t:�`]�Ng^S;J�������c+���12)�t�ƕI?����+��i�[�f�ݗ;9�S�~|��Q�/��Mަ�5�H�T��Ze��n�
�
|$L^��8�Q�������4�#"��ޗ�u#�.xO�6��S0��-�wQs���汵�CM�+cx�2'
��&��M��M�_�$�QH�%��B�Z
�B���E!_�C!~��E!~��E!~��E!~��i�$��*}vC�!�F����n���0�ܚx�>�1fR�";/.�˓��a���/� D�����)� ���c΢As��B�_o�`�B�ä��B\Y�(�<�������Pwb�b������ǅ[�\X�B}<�|ŝ���kJ�͡���I!�'���j�Q"�쥜�{Ki���#�c�E׾=V�q׏w �RF�dh6u����1u��������^I�sh��',
���뀢G-�&���e��+Ӧ��i���ݓ� ?J�O�Җ�lٞ��m��pN���E�֤w�>Z��L�_>�(~�â@�
}5��D�[!"�P�<�nH����>��'E��y�nH�L�!y�?Tb�{+�>ph)��.��M!K��t�������c��5
�JX�x9���9�xy~!݀�E!^Ȟ���9�x9�x9�x9�e�9�x9�xy��n�˚�ҷJ��׏?��yH      �   �  x�ŔKn1���]:�v?�^"��'��گ����$$/fd��U�j�9ݹ2��YmC�9@l��ݖ��������X*V���||�ސ
��-}��� �x�}�1y�9G�sv�v�
ȉ��2�rv�Vb9�~9�����Owj�!�	,�y���u�6�Q�Ư�`������{���ߞ�.�\Z��}qk̷��ַ�<Ė��n��a�S��s��}�p�����8<h��ðw�	�){�?SO��[1��J���pC�e�Byd���	��=��v�6p��MN��@��+�Ӽ��cjV>\�� ˰�a���
y'Y��+���T15�ު�\;����%z:�Ri]�N�^��~A$^<���tX[��1�uX��A)�<<-��ҭ�1/>��	����1tִ�f+�o�%�G$�V�GV-.�3��F�'lLjzx_�K@}��D�u?����}�Ta      �      x���K�d9�EǑ{QCJ���D�g�K�C�����y�K�I$/�(;紞br�����F?ǅT�Ωו���j�Õ5�˽	���|���>��=����������snL�4�-�Ӻ��>N�I;ojۺۈ�ф��쵲��7���ĉ��h�t%��h�?�,Kݮ�]�����\�Cw�g��&�껗����\�%;�s��M�O9��(����������:ފŤ^�,�&V:2z.���U�ӵ�K���s��9�fU�%u7��DTń��Ҟ�őv
�uF[3�����"���(��ʒV���hBN��}q���0]�"=άxh�G���܊����e���'Vvy�|t�Ы[�6JpC�Y]M-fm��QM�-ն�zjMW۪gi���W�����=08��Q��ę3�$�Wm�VE\��Q�����>��}�����[���1��ٝstR��Ou��
��̖áJ��nۨ�ĉ�&}�3�+�����}L�m��8��v��נ� P����c��� ^_j���^����|<�8�Q��Ca�>��^7*N�P*�NL��a���c)�l��ݻQ֎%���f�{	��5t���%I$U
���e�}�ؽ^�ѿfw-���'�G�v"y1�������n�{�ٶ;�͞�h�5�k-u�q�V=>kI��E���F�k���ת��^�׊�3<
�F���5���Ww�#,b�P~��dH/Dn�^�i�u{�D�ڜ��F�'���������JRE�m&"D��ޜ�֍��_#ʯ��`0R� *X�n\�3dh���UT��dw�W�hC�$ţg��3Ҟ��we��S)	��,i��Mt�*Q� �b��Z�XK5.����0�~����hhu�[c.bj��_a0RY�'���dw�(4?���N�Xt�WUY<rq�>{&��T4:�P��_Id�P��[Iq7��i8�m������Ww���a��9�Z�#,)g������Y���uC8Il�Ia�"������I�#�J]�N��1%�G�އ:��A��Qw_�Xu�M>;?��Z!
_bGΞ��^����c*�WT�£���+� ���N{�Q=5x�C���8`n��I��V"��D*[�(ݱ]��NMe1����!ĮĽ~�6���N�v<�"%�h�k�ޝ/F/���֏���]O����:�H�v���I�-ɨ2�드f�P}ʻH��ˤ��\� �Kd��d*	@�q'D��Q�)���/�L�����JDy~���>�mj�>��,�,�P�����΢b;Lp�=_���m����)�S=]�@xVª���f��j�)��x��W&r��<nƀ���N��1W����M��l��ެ�%��1b;w��yG}-���!�lاQ���im�ke�2k���m�2��i�v�14T�u�v�!������_S�6_�x#��� �b*Pq��eT�����1~d���]��lP��)�%6�����x��DS���hT�"^!7� V#����n)*m���
`âff*?�0�����(�bW�pi��*N�:�A*I�`{5Q��~`���b�	3�)�--�.3~`ԕ�$����������o X����zW&�HΕ�4 ������
�I����C���}�ޕ	O�TO���/�-��4�l�)�h����Vc��f�S���:X�/���2����x;� er�4ց��uJ3뫉g��+j��n�~U+��z���ְS���ލĭ��l4��YΜ|���ޕ��cܻU���rQ�� -����Ne��+Ш�Sԥf�'TqmdwHR39H��������+o��nO'�W&ގq�L��]�x;�2RH��`��N��k��X��w�~�W&��W&���eDA\��vW��n��
�]%!��|M�7�|e�
\���A�6�>�mOR�-%�W|kh߹���}����ڍ��BM��fQGZ4kJ��8��נ���f0&+I�(�˝�wE���"9w��3�]� AN{6��~my*�W=՚�s��#U�fo]5�jhW��+�cW&NͧC��ɔS8m@N�����G�G[�΄��(��^���F&8m3tdL�t��	�nE��߉�ܝ�xajR�C�_�عG�)�������VQ�P+�dAsM��-�<l�YXA�:��#ó�)�#��L_|��0��ET���HT�D�nT�0�Buk3Gn���حx���YtgBCȋ��fl�v�5�4N]���m��E.U�R�Ⱥ15�xV/I�_��d���	=����&|u�`l0�R�烁\� 6N(B�C��n�i&	S�tN�s�H���Mp�k��<�����P7�~Q���B���@�-a�B����};�5b����%����^0���c~ݨ�|ްs5`�!�A֛����^���1"�B��� ��I��#����BW)�t2;|�e�/@�����BکY�M+Iu	�VEc
�G)}����y,�� ��u�YXDL�r�3F�U��ӭ]�H��p]e*b��
��z�מ�܍1*j�n?Z�3��2���m�aN��N�:���h��0�7Ά��
Y�L�@ڊ��d���\�X\��T��,Z����*GhU$~p�+(��#"�Q���"��>>�J�Ww�>��ۻu"&��"���j�l���t����l ��"��f��R���$�	^����t���{�p�2*���@ �/����V��������G�B手фX-�»��OV���\�X6������� F`����h�����������λ���/$��͡���
E[�D��{�{�iS].�B�H#����+1B��� )�q��?�ŕ	�oR���;�8եHϡ��?xԕ�Aa��f�A	N�kY��H���QX�6jk�)<�5(��_dW�n��<�1	Yb�U=JE����i�`�k�,D)��+�;�z����>�(T�.�*��lm�#�b��P̱?�s�
�[lR���Cb�6�R����������1�Tody��Cv�b�5kfGb��W_x�4yBhB��v[�@Bi���5�}��uv3��JJ)���>��!ĮL�=uG`��a���3 &�"���e|��ܭ¯�Z�v�p.d �R�2<�c��l��D)���7�g͢4bu���bx}M?^� 8)Mm��s�:�At��S���ޙh-�����dԣ� ���؋��Å;_��h�6��pZ��mc�_G$w�XZP�RWV!����*�$g��z�n�� �x 6;E�G�k�N���9��"(- bgV
لEw�S��z]����6(B����?)��_g�w`���J�n�7�%�~r��C���t�G�;�lH��Ħĝ0�t�:�W �T`�z������ɮ$���|�}�Y6N�Y�,�z Ý&m�����x/�Z6۬i_ط���y�o_�j�%zp��M� ��0u����,���#~�"�UK�X���� lH�G6,����1�4H�܋�P�6���ue�[�.e�jsXy�u���%v-���S��O�߁H6QL���+iem��^}���5����YH���,zi��O�> �0�vU�ʄ%.�5����J�l^��h��m�i=s�M��H#9���@m�n�_�x��2��e�N��{���������?T����/n��,8�䭟���bv(�6�쾺{��z��ĤE�+:����MS����Q/�"j��lx)o�ڈ��HYoײ�7*�tʰ���/���K�C��|��	��C���]+�[��O��һ/��W+��DIK�}l?���ж9�آ]b���=vӵ���B�zl�w�A�=�@����a�ِ��e,����dil��ݻ���+�⿆v?�(݋w������.�=��l�DE��=�M�ݷ!�^7*��O!�'<����z7w�������n�(�1�K���J���[5\�$�"����<΁�䅶>l�k6f>�pAXE��`
�}O]�X���s��X�5o(pL>dXh��(8�':��b��N���m�2#d�N�SO~� "  �LohF�$������c��L�6L�ƍM���?�V�Q�&���̯LD�w��lv���Q��B��Q�?���Dh�숐�:�������~�j"�E�!Qۓ�[�Ge�}�ko(�~ݨ Q�	�*~s�a�uȿPI枭}MP\���"Y��o���F��Dm����21{7��DU���;�X�S��{.i��畉���t5O���ɱɾ�'�HZ��h?���	*i<G�f�}OwEFhY���FA��v�y���c�@EQ����+�+�\��J�x
k������,M��*����D��,��E�����C4u˛b��@9Y�-`w�^Mt�aG=��aT��ik��ռ�9}|}�]^�����o����ns�$��T��k��'Ni�l��n�v{�g@�m�� ��Ĉ9#$p���],��C�תa�5�~�Q�Sa��P��	ya�$5[�-o��M�a��+�х�Q9Z�[�5gH>]��,I�]�2筡=����7{��ԯ+�w�My���H�͢6����l��?h�3؋�����uՄz��͓Dh��_M����I��݅��3�r+�Ή	���+;@�."MX�gmy���Okl=i|�ܹ�~7�oz`�Y�m9%Z�^�3��d��-Zɵ�n�$�����z�Mck����G�e��בz���t��mzb��M�f�܅�\��/�|���ET�"�#����Q��'�;�_wH��k��.�Vb7����e'�G����H�����ag~��)v���p�:�@�*B���*�;RЃX��-D�z�SN^�x��ua�.����z�-����v��t����0�zG��ow�nL<^��q�F���
���n��w��g9 reBua*Iվ��λ{ɕj?B��n]�x���+���N�xÊӍmWe}����"�LĆ*�/c	i6qNv/K�~��c�+oWe�L�\N�����:��n�'|-_�E��Xl��3t��*֕i<�d;���%`ƌ޾8ۘ�DԲ�C(��1�������?���oC�jn      �      x��\��%9n�g�B?@> ������u���OP�v�������wp�Hd&�5��Ṫ��{��Ҝ����B�����?�������������ǿ��{�G������g�Eԇ�x��b��ieu����2�]5���Ϫ�pn�W�F].W���H_����_U�g�6rk)�cN�bN˕���3P�r�Uӫj��:r_��t���b��*�|⒰%����W��Y5e�,�n���u�J���Jܤ��ۮ*���YU�(k,d�X���u��`���W�WU��ZC�4��-Ov�sw-�����M4��U�|V�~�9Ft�����.^�W�HMa��Uɿ��/�ەҊ���(ca��C��V$�]��e�cs\����h�F��=3OZv��]��!mu@ȱP�p��G٨2C�o��^�<��囋�Z,B�@�4�/=�]��/���K��ZOx�Z�!�#�TxJп˾F�kM�Q� �ب8Ѱ���W�-TɲqKo��7ĺ_�����b��4���R2?e��o��%��6t��蚢6ɱ1�2�.��}�,/&?��%�ӰF�"�����<e� �o��ܱYxЙ[�����A��I��yÁ�(�o��(�$쑨e��b�"�`�wW�C��(�o��X���nF�����<��x�]��o��P�
�1`�ؖ����W̕���F�,�_�w�*����%'EY�o�t�����(�o�%�ʜC�=:!���[عP�=���2�FYHSfMŁ�l:Js�jLM��Ԋ���2�F��J�W���-K�з1���&FV�(�7��ee������G��24��*}���o��7��'O=`�ӬF:ɵ��Ha`�`�?O�F���?��i��Z3v��&��W�s?mx�,\P������2m�0���0WQpwBx�,|��B��̈́��������M2�"�7��7�H�����c%H��Vc���U8�C*~���RK���s e�ʊ/��^�����>�e�e$T1M �u,��:�l�����}W�e�(�(îcbc�Dm�����ۈ����,�e�e���*	3!A�k� tF�����4�e�e+x�.tB�p %�����t�X }������������@06�t@c9�p���{�}x�,|��G0K��F!�����fH��<�^��FY�FYl�f�	�@~�`m��([K������FY�FFAI"����v0D��al��(��(+��@u�-8@6�
��)/
�}�ӾQ�Q�a�b�l��8`�����5�@=eG��2��\et7�`:Vhǂa�99������.�FY�FY�S�!�2Y1��j�
m"��`�o��o���%ɠH�d�w�"6���7��7��7�z)��$:� D��e���۞�}�,^��	��n���>(R���`+<L�.�FY���\y&tk�p�˄(a�$��Ts�(Ko��o�����n�����k��F�����FY�F���`�obI��0[�(����e�e@�+,)칙SH�R����-���6�Q��Q6�xF�*Q�[�S �'_�05�u{��FY�FC���1�c�����`	,��=��q���j5��3+�ط6A�)�5@<�f�}�,}�L�v���3�[Яְ&�ؠz�eo��o���t�k-�-�+c���yB&<�FY���r7�TSFٌe���ږ9ږ��:!�Q��QV�8Rv�n� /��KM�+{]�"�e�e��â&'�O; Z�ز�&��ؽ�FY�F�40�)���Jp���P1p}��<�e�e<�L\�פ-��]`�Ay�,�ᐿ� �AӃ���0HȊ��R$r�c<�ᐿ� �y�$t��g�����&n!�f��A��$0�8B�I�`ÓIRvYD���gB~�!_��jh0������h:���J[��7�74g����/C\$Z eW�!����G~�!_H'�а3n��K �j"'��m��w�����3w�{�3��5�oś�X`��B�p�o8(�K�?.{㲅�m���B��mZ�����
s�o�d��2XK�&���y��|�4h���\�D�Ĩ�~ƚ���<-�^y�L.�����Џ����Xe	)C���]��2������1`����LԆ_|��Q���7��vLj����p�vL����X1�ų��y�7�<�Dd�Q���	kƔl�ZS]i�y�L�Q�SW���t�P�PD�J�qվ	]�(���2n)���E�Z���(�*��ϊe�F�~���[;��?�D;>.g��]��2�FY�xI��\[�Vk�	�61HCL{�2�FY���1�J]�Z1�Pv-�w��2�\i���(�� .L�"3a�&���C:�F�~�l�Ѣ����� � �ٵ<��F�^��C�a�9S0(����2ʊ��	=��}�L�Q6�P%X�5~j�Fʂϵ�$s�A�(Ӌ��R5�ok�x��S	��Dں>�ǵ�E��w�AM� ��wmEY}oT�s"�o��7�@朗qb�Ѝ�tN�`�p�>j~�E(o����֐'�J0��21i]��0��I��V�(+�#w��H����3�v;���\w�7��7�$�,C��i��Jͮ�i�� ���3��e�r�5W
vKpK(�a�8c�`�M�<}[�(+I��}k?~���<a��[�$�ڤS�(+���Z�5�S���PA8v�:�tLϖ�QV�Q�6U��9�t��Q>��\syFMy��\��a=� ��y�FVS4��8�Z��S����2�}��p������.^^]���=�F����;˭`�d�ve�5����v����o�%8��!=j��0,W�5��T�}�u��c�������_0u1Hm�Q=���M�t�3�o�gV��AM���s�-x�VaR;dlm���7��iź�v��o���xr�c��������>��=� t�4����S��u�=��7�:G��8"�kӸ�C��g�Kd�6���-��0������ڠ��֧�q��/��G����n`��������+��ӿ�5���p8�ЫC���,�й"stp%7��y�{d��7إ��z���>V�y3�yz#Y}�>^�3�q�k@�K�Y�ݟa�F@�+ە�ܮ��O^�؀�����-ؓG��D�zog`�ؠ��F�of���X߆u�
a�`����.��|���7�� �Ԛ�
�8����l\2).��L?�̃�J��R�6֖i�љٸ�6dBwaE]�8X�l�,lSr��՗v�o��FQ�t�u�DL��&��)w�i�=�v�mԩm�>#���.���B��K�qq�6.��Y�kk�e��m0�m´6po˩��w�x�7f��D����
��8��G.m�1��%7@6Ԛwpv��It(_�z�G�Gyt$7��мִ〹�9Ac�'�<2�a��g@ꂷ���AX�Z=�ʂ�-���^�#�A��F���W�I2V;q���zA��LŞ;Gx�.�(�v�����ѿ:`*��m��y�]��%��b��f(�]'ڵ]I>�X��=�v�o�
S���� <j/u+D)V!���G~�.�[�����<�Sic�u�m�6C}����%�a��GK���hK�x��=���x�D8�U
��\Jv�6���t�6{g��K�#�����x`:F�t:t�V��c߅ӑ�K��9$���>+�b}� ��X�w�!��8���4ifaO��+�S[ɗ���3���7��C��0m1���w �`�����q�%�Q1]`T1=U���n��y���ig���q�%ȑ��R ���C�	��Y ra1�����{���y� _ߒ��c�*Qw�%L4ڮ{��尣xJ]���tjW�ɀ��:����u�]�ZM9b�¹Y�sB��Tԕ�;�?�|:�t	sL8��pi�>dï�k��`� ��o9�tIsd��:*��5��^[Ť�˵=w�4]�����.�lN�e�z؍�(K0��� J  gG��.y�
�lY1o�����Ľa\�1h:�t	t�cB���ε*�a����]�� �-�XVJh����>a}�\�0p1A��g�]"2��4��ݮ�1���u:mM��=w�H]2-(��&(��4�(���1�G��.�U%��\��������Y�(��n=~�=�vIu�
Hq���eG��쑠n	nv�y�o�XG�۩t��n��H�0nğ,4���n��K�c��1y��e��b�F7�Ʉ$ԝ��#�A�`�|���I��.ۍ�����{���$;�&0xs˫5�	���Am��Hv�%ڑF���`F�E��:�0l�<�>;�t�vh�lA
Նp��"g�]�����O�3s�o�ޯ�� Ճ>3��F�qj���w�%���]0�%�
 u��s�T� ���;�}�t(�&��!���d��>��#�A�|��|01��򿮈'�1L=��`��a��#�A����ʖ4������U/��������K�#�%J6��Z���͠����u�]"��	�I.�nE�H�/�:CO�vp���]2T�L~�o��s�X�(=�p���|�R��j���^�c�|X���gGv�.�c��]��o�1�RIa�Gi�>;�#tI��_'�D�0ߑR�&����Ne�������|r?�j����s$�>`��ey����%?��R�Pv�����������QG~�.�з�j nS{I��5B�U���u::$tI�Ԧ�ڴ��"&��9c\d��ߎ	]"$�G+v�>�/ܖ����tad>>����%C"�A,/��4�r?�YΞ��E�?>�Ȑ�%D�1U��t�[s�U����&~��"�K��M�҆�[PW�S�� h�����Y�o��_y��o���!,7�'���{��#����;<���zخ�6�0/vP��	]�$��f�잟�7A��'�j(��Jr�Uv		��8t�a��j	�D�*Eh��uߑ$�K�$rbt�e�ge����	vm>���v�o�,	3���t���E1~��\�=<��gG��.a���K;�B��.�����&&�L�]���%M�� ǎ>�v^����[L͒���t�I�'�0��jϮ��+'0݊ �����Á�K�d�c[h�e��j�s'���̺BXo�8�$t	��M���)��0�Ď�u��N:%tI��k�����i%����1�_�	>:%t���7Ѽ�(mo���`u5�I���+��dJJ!C�@����M�E��hO4*LѮ{��y��n^��X�A�~��10��ɲ\�7�P	�R%��4l ,���5��Ƙ����~���T	]b%��1z�r��V�5�,𿽶X���X	]r%�����}�h}�	�d,��[���u8r%t	�TL/x�L����0P^��s�{K�,i#`x�E�4�
�^�gK�]q���=�v��4���
 �i��eD��2�!!5z�G?��AcL>�-�
���,��o;�~��?�RZ�]KL�d)CL�.������������� x�      �   $  x��Q�j�0<�_�ذzؒ�i!PR�@���d�uLl���U�J��^�ef`fg=*�� ��Z �8g\�D-��l�-�`�xJs��D�iNC�2-��c�u��w_pl��&>S��
�I�
Pڟ��2X#�Z���B����6�C�����pF�uZ��|N|M�H���'�������)|Q(�����Fc.:�� >������2F��y���|9��{��r$�)t��i�B���m�t�����j�q*�Z���"4��Ӓ�y,����&�a��VUU}��      �     x����m�!�ϻ�82��D*�����R�/q@ȚO3�ۃ&����
Vt� �z�^��Md�f���v@�yg��;4^���=�$2���~~ߢ�p�bB��k�E�M*s=�۹�K�r����t����I^�"�&�r��+������%�$o��qd��^���34[E�I^� �t����K��NF�#�m��y6�8k��'6�M�&)��l�g��
L�yFd��T��y��~�?�6�mɺR�8�A���ä���}~������      �      x��]M�;�^�;E_@��Hqֳ�ŠO�����1����%WD70�a�4K_�"?J$#�,�gua��R��9/%y�}dJ}��s��y�]��]�~��,��W�?�ZE#EW3w��LWu-"����H��ɻ@.�߼��ǯ���;����?�a���}8�?ўG���������RK���Yɥ�����H�X,B:�`Cz.1~��-q ʇ�N�R�<{*N2V�h�k�7Gm�Dk��!�)��\�) ���)nn�����Zz($��m���~����π�4C���Y\�5`�2\� L��`�U��^�S�M���-P��+Q�D�o���X��Z�ݕ���ӥ��,!kɡ�q�}~�'�H�`�R"ɡ�S��Z�X�8$&��bi@�<�n�?W����,t(�l�̬�Qgl�Vm�����}��-�x#��\a�Ĥ�P�)X?hqk���0��p�Xl�N�V���V�����M$�S�S=���%ƞ\*.S�+�A޷;cJ��d�"��LI�)��F�Բ"��C�l���<���Vhw҅�t+_��`���P�v�gQ�q�h]Rrt����(͕� �s�Iֺ�k�!_�l�*r(�\�%��;�cE�sU�q�޴{_�K/u�`ȣ?u�k*��kO�&WK)�e�����3��U�mo�CQ�`MO��`BԚ��PtHT��S�߹g�s��ژ8��:EUQĝ:	v�Ż4:��@�ө�u'Z~��72���mI�wt��S��{�Pk4�%��ehr��,���N�t2~ے�����"G���A�+�l�棼 Ȃv��}��>�lnI����h���ʂ�ő눛>j��_�h$x�z8VA^*HL©Ρ��Y?&�M&��R�:�pU7�����	��S�@�&�P]H��(�*P�a����᧮�_n�V��k�	��a �Y6���}A�am�e�DKlO!��,n���>?o�-�T��㏜���"��F�܈��#��w�31��.�`��w7�����P!_��.N�h��`i�g���VWA���,���T�H�qp���V�ѭ9�㣊�-����58Y	j�s"_�0��g+1{5=;8�iG.ŵX,y�<��R��-�oݢ'�)XĐ���"Z$� y��UC�9���F��߱�+�,ϗCQ�Iw���Y��q�g�gT^m��y�!�@�Ժ�)�g7��h"���ș��A.�ƕ��"
�}(�� 7���-�|�c%���t�
\�N�l��������(�CQ_��.,�'��r�C�)�Ľu��j��V���<�%�>~&���:E;{��&���uJe�Y��{�Ѿ��.$���K8u�h�i
 ��aȭ0��:R�\�F��\!a�?O!_�g�����H�G� ��l
%�wF�7H�u7���
÷5�?��б��K�����]�	K�K̥9Px`����������1�8)��c��:�lYs�2$�h/�8SB�e��n��Ouз��Ȕ�5�.�l����0�C�^�u*Z�PIu3��+/�r�V�*E>u~R��+-�����9BW��=z�<��sP�0��i�5�E��]�؁ލe�Gp�:��W��ͷ��H��Dӥ�;��cQ�hC�� ��|{V�uzD���-��ӝ�8�K!�9&��P���`�2H����V^���no8��h�s�}�V���2�S��J�>���5ŀ��j;F�9*vڍ��O�¢�"�P�9��v�m�$`ۆ遁��vl�S
��m�K�r���6���>��	4�#�ڝ�*\�5I�-`'߈�e}�/�� %�CQ��̉�yGpa�>:2L:�3���X�IR&�*��1�(M��L�r7��b+�^�T�?J���CQ�`������k(�� �B=!�U��7����s�߿���!�r(�lԘ27r�vN��j'`�%Y�̳m��-���֖]��*�a�U�5[��
X5�sZMp�F?py�h2K�P���!W)�]�Щy6��3QZ�$�s����^Is6..�zX�?)i4Z�ҷ0��Ҽ{��g�?q�KƙI"�CQ�`[��~@��X��SȨ,�R�d3}��[���I�7xʔE��I�XZ���$V�30��Δ�'���oD�^&{A�$�CQ�7����\�UmW���\Q_u�Hi��^A�J��R�PE���( ׫���
C�`������dF{v_!��5��7c��P�95Z3�q�[����ke; ����Mֻ��S�W�X��*ڡH��`;~��`+!�r���2���]�f%J�CQ�Z\E�.�#�088x`�59��emV��i�^�
�_�cQ�W',ō�X#���9���7��^��y��׶��U�o���CQ�EX�-L�����竊�-ϵdh�N��gx��I��`�WI����Q�caP$��+�0��V�#.Bя[U����
��pG����'J?�ۏ��3��yjU�,+�9������h��y�^tf�~�x�~�h`͇�NOU��^�߀�U�4����!��=K�C�:����K�cQ��sFjlnYC��,X=�!y�h�1l���
����R8�CQ��qxAs:�x���J3�T�M���m��-���n�	!0b͡��|�֬I(���*9M�.6��F�ߩٷ���ks ������eZ�֡�`��p�j�)V�_d�+�������*8�CQ���׵ڜ`�����G琪�~��=��6��T��"�X~�DYE��4�z��~�K��&�]��"!�/�{`_g�t�����D(��Ey�l���X#�鐩7�U_��*cl�lm�}�H�����j��E�9BX�p�Z�T���A����U뭡�����%M�Y_�vo�YYCԍ�H�S�ţ8�#r�r��[Aą3�����q��)�R����u��%�����)%�i��dO�|K��%��G>���[�.i�"W��:�f���r�}�6�K��	����!�N-G/��l`:�"�E<�5XC�h�j�.�9�B�cQ�>��^2�[=O��h��Q�fdw�⌛Y�طb��@���t(�EU�L�&�S��_�*V��lf.D|#ط��G1���cQ�j��j�V������{$ۭe܏�����sb8���|����y���o,A��@���[y���J�mqf���lj����}�e�"��v�듚U�ג ��C�6;���jȻR,K��CQ�Y�.���`��pH�s�ɓ�.Yh��x�{�ۅ���'�����	�i"%w�S���r��e�1�ޚ�[Ѿ����G�A<uU�H�O�_63��ꐨ��smͶK���s�tA��������u���`Q��ÒA��"�ɱ��܈�m����I%ҡ�S�Ztx�'��(|X���a��96�����
�tm&�$���8c�k�)	�բUu �	\�ڏi�^���@3uH�\�V�m�=���j#���	�;��x��9�X��P����)��"_���%+�i�#�����i[`_�Z������T�Q���P�6��m���蕗u+M#\�f�ٞ�}��+�94�oS���!��{�`źTV;��v�"���,�B[���R�N��s��١վ�V�u�eœl{xHCR��oR�=��3L���CQ煱}"�ht�.��]a��pT#�@���=�?��4P������>��R�zT�N�Idw9u�9�:�Fm��{`��=/����
��:?Ncagf��&��Q\�h+e^�ױ{��U���4��B�CQ�
s����#USs���}�(%˽�}Y��ԩ�AE}1?����1ʣ�W$��W�yRH�nD�6����,R��k���e,8� �`5�d7��K���yv8s�>Rq�M��b��
f=�6����\�*P��"�:���f2��L	�]��M���-�6�x�=!$~V6�NAξ�*al�P�ț #��)�����-�wU6!]�|(��8����i���]�M�2��2Xf�S�o�
W�7(�CQ�U�E�1\�b�EC�����"*�&��{O��UE��q)�+.�v�Օ\�Yu��6G�>��te���/� �  �C��F�nN�J�����>�'$T}�yal��Ci$��)j�m�Sd���C�yR0f�-xg-+�E�޹g�+h/��ϣ������c���GPm��
�k �� ��Yп�w�⡨�+*j$�Ú�A��&p���z_w�Ϸ�+�/-2�:w�ɷ�k	��+�[F�~�Ʃ��"�-��GG2�8��%a)��X�f [Um���jMT�Vr�,����l�E����PC�&�d�v-�c�"��i���>;�U�&;<.�=oQ��ꂛ�B�1%�y�/컧�v'l&�îUH���i%�tX���҂�.dsɪ���� �Y����T�K��>�PYj�������氆%�1�;��M-7Q�':u�ҴZ��x��C��d��נ�i��n�~�d�Ǯ�̮�|R8 ��<sk!���J�9�/E}1x"���h%�c����b�H���a��g�=�����E�Chɹ�v���bX/��`�7��g|Z��$��ί#�V�c$��,�RW�ܦ�G�M��MC]�#b�:��ʅ{{� �ֿ᧫����t���Vټ��C�s��fl!��gU�o��
9��xKb�Xb���1�ɭ5]���=�?R ���h�OZ��`C8�qyF�E4��[mw�=Ŋ��P���ց��*�)���aǺ�1���z��}�=�X�X�1QI*��5@$l�@�o-/�8"��^�wyŞ�3�%�'�x(ꋲ���v-��r�>*�e�)�����{f�@6��H���r����XIi����x�
Ϙx�WeG����"���ة�����&i��i:i1N+x���;h���v���;WnL=O�f�6}ߊ/�w��搼ڝ>��D� 1|c6�֘t��Fhd��2���P�K%k�3�iZ\Ȥ�E�_�Q�pږ��w�lLk���F<ǝ��i�.<��o�ܵ�+�G�F�C�R���������-��L���{#��1�&Y~�.�='�ƾ�</Z���>��ou�Fk�Bb��p�R(����k��m1�[�Nm�n`n��;!���9�������z��Ӊ�����"cw X����H�B�<	��ҧ��� ����+����F��D�c�GE���Y5c�Ó ����Pc��6�}�F@u4G�#4�&�|��h��i�J{#��Ж���[��ٓ	�o�95����ؒ2�R]Y3�X�hM�Wj��-,���ҁ�}��W�L'{�D��*D{~pWmr5���G�Z�t����R������zӇ�3��g/�L?_q��<���,�_QE���~-},�\u�-j�=�W��l���~�Y��ŕb�u��hE�0����{���:hF�7Ж�h��U�`ȵ��oX4rٖX�f��B{S�3x���rl�� �p).,�Ѻ�#|M�7�˷��S�+��vXQ]��	��F�%�$.�H���l�G��å�_B���~��m�OI`�V���f�(�#��M��-+�vO�[����'���x\{e320�t4d�YJ���tN�T�[|u���PD���������O�����t�{�c����m��ݱ��60��d�e��n����4��gMQ��/�u�������Z�_���=o���E?����ȟ�=&GW�PJ�P���y�- ���g���U�� �͂ZT�6aCFJ��&Y����ǥ�M�����
�G�"ؿ�����Ql��m�}}��r~y�ֳ��)�����Q��c/�PΞ���N'_��_��Ϟ�-���:� lK*��2�Y_��*���� ���07���=����Bߠ�	�Av��u�5r5gc�v];L+ܹ���ď���G�x5`�!ïs�I'	`���60��w�[h�ie���w�r��f��D�1���|�ekJ�ĝ�^{�B�+�I��GΫ]R�^�yr�e&^���:�ל�y��Ԟ!ߒѓ�\�3��#�ع:�6��<��ujt8c���/�}��H{��EUr�����1m�(yn����g��Ux��9��<�r�A�K\V�\�m���}�O��-�%�@�?�EZ��b;�'���J��s�ͽk9��uJ�
�d��<��Z�'�C�#���[�4gN,�o�ֻړ�9P�6o`%7���9�쎨�3�{�B�� ���_kM����+�4�ZGZn M��Z�g1�=i�p�7���Ρ�;")�\x U7}Ae�۳\���3�$�����Ox͆wb�@�c�y�s�,�Q�d�o�� ���٧�������*�D�R��6�!�i�KZ���ýS��K�R��nG30{;��BN״���{/�j޾<%�A���kڻ��U�� y���Q�ŭ��E��eaI��88���3�	�V�)�uW�[`߫�/�~�v��ֱa��j��m(�.���:��w�7�����i� DE�כ1K#$�d�)��ה��^�n�⫉��u��rR�)�:�Yl�a�L�!ߣ���tѷ
¬��j��o�aW݉���P�y��Δ��
�d��گ��$|u3���v��ط��+�Y��:oCNi��Y�&{�eX�x�C��>#��_Ǿ����B%�u�P8u>��;H��D�F�1A@u�+-����۴o]5��7\����|�^�D�!�a��r�sv�u���_�{� J�P�y�u����Ո�9�F����4*m�o�}�C��BC�$E��/m��h/�%d޺ZwJk�G������~<{ծt4
L��Σ��sh���`���<�o�IM:�ڽ��?�C��&t����S�����C˳�Z�1awj�m �n�d3]�D}�2�a�&�*?��)��j��Q_���Fo-�����f<u^ك�u�WU���ɒ�<���X�m7���ۋ���/E��Ή`RH��Fl��z�J��+Ő��/�[7(��"�?��?��?f�      �   X   x�365II5�HյL17�5I�0Ե47�еH6OJ6N�4�4N��5Tq����V��s��u��v�4202�50�5�@f��q��qqq ��      �   �  x����n�H�����0�9�Φ�
n�±�^�3��5�$E�y��/�w� H��s�rK����!�D������_�f�<�w{�?�lv���N=2`������8�)x�#WP]K@Å �74�6�L�Wy�k����(�gFD�V$	X=B���PjO]��3�=l����ò�s޿��/�y�������/��q*7o��
�('9
"t�M�>H������i<�<���79��i��r *A�{g/��A)!�vj��M�������9�}��A��!�7�?�7J.�)0Ė���
�{��j�В�/_샵���V���Ӽ���<�$�Ț g;q�p�H	���Pk&�N�$x�`���c��)����X���
�"��>{����ٛ_omo��mƢɭ-n"V�����ioB�|!�����ifBj7!�uȔ����>	����y��h��Q��V�r��p���e��1�� ��B�Q���6�U,�һ�(���1 �1H�63!]�(j��Z-�n�=z(h�z�5OX�}�r�Wn ��%*e6�h�{v#�٠5*�/������x�M(߬��� .�ou��$��Q9��ak�%�Z0D�0�M�m_P��Cp�z�N��p��?���_o�2Ֆ�i���Ֆ%�-J�C��1,ҫ�󥳜"zd�&+�w�T-ԣ��T�[�v���rk��}8��r�:��z2g�ۑN��Z���o�F�H�	�c�^_]]����      �   c   x�32020�tO�K,P ��!�kYj׀H���X 3c��@�9��s�4��� ��i7�DXoh	�` ���k��%�z���Dh����� 4,      �   �   x�=�AR�0 �u8��I�B��"�@��q�Ba*���.��{��xɉ��'4l�pIJW��G����C�F��F���E�2��������f�)o*����n�xg��${s�����C�?%i����װ@PY�Xk�9U��.�EI��Ti�P��L`S�V�?~�/�'������Vd�����:��$L��{Y=�1)���8�_l��?�z_X���O�     