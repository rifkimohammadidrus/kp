create table AMPRAHAN 
(
   ID_AMPRAHAN          integer                        not null,
   ID_ATRIBUT           integer                        null,
   TANGGAL              date                           null,
   DESKRIPSI            varchar(200)                   null,
   JUMLAH               numeric(60)                   null,
   constraint PK_AMPRAHAN primary key (ID_AMPRAHAN)
);

create unique index AMPRAHAN_PK on AMPRAHAN (
ID_AMPRAHAN ASC
);
create index RELATIONSHIP_2_FK on AMPRAHAN (
ID_ATRIBUT ASC
);

create table JENIS_ANGGARAN 
(
   ID_JENIS             integer                        not null,
   JENIS                varchar(100)                   not null,
   constraint PK_JENIS_ANGGARAN primary key (ID_JENIS)
);

create unique index JENIS_ANGGARAN_PK on JENIS_ANGGARAN (
ID_JENIS ASC
);

create table REALISASI 
(
   ID_REALISASI         integer                        not null,
   ID_ATRIBUT           integer                        null,
   TANGGAL              date                           null,
   DESKRIPSI            varchar(200)                   null,
   JUMLAH               numeric(60)                   null,
   constraint PK_REALISASI primary key (ID_REALISASI)
);

create unique index REALISASI_PK on REALISASI (
ID_REALISASI ASC
);

create index RELATIONSHIP_3_FK on REALISASI (
ID_ATRIBUT ASC
);

create table RINCIAN_ANGGARAN 
(
   ID_ATRIBUT           integer                        not null,
   ID_JENIS             integer                        null,
   ID_AMPRAHAN          integer                        null,
   ID_REALISASI         integer                        null,
   RINCIAN              varchar(100)                   not null,
   constraint PK_RINCIAN_ANGGARAN primary key (ID_ATRIBUT)
);

create unique index RINCIAN_ANGGARAN_PK on RINCIAN_ANGGARAN (
ID_ATRIBUT ASC
);

create index RELATIONSHIP_1_FK on RINCIAN_ANGGARAN (
ID_JENIS ASC
);

create index RELATIONSHIP_4_FK on RINCIAN_ANGGARAN (
ID_AMPRAHAN ASC
);

create index RELATIONSHIP_5_FK on RINCIAN_ANGGARAN (
ID_REALISASI ASC
);

alter table AMPRAHAN
   add constraint FK_AMPRAHAN_RELATIONS_RINCIAN_ foreign key (ID_ATRIBUT)
      references RINCIAN_ANGGARAN (ID_ATRIBUT)
      on update restrict
      on delete restrict;

alter table REALISASI
   add constraint FK_REALISAS_RELATIONS_RINCIAN_ foreign key (ID_ATRIBUT)
      references RINCIAN_ANGGARAN (ID_ATRIBUT)
      on update restrict
      on delete restrict;

alter table RINCIAN_ANGGARAN
   add constraint FK_RINCIAN__RELATIONS_JENIS_AN foreign key (ID_JENIS)
      references JENIS_ANGGARAN (ID_JENIS)
      on update restrict
      on delete restrict;

alter table RINCIAN_ANGGARAN
   add constraint FK_RINCIAN__RELATIONS_AMPRAHAN foreign key (ID_AMPRAHAN)
      references AMPRAHAN (ID_AMPRAHAN)
      on update restrict
      on delete restrict;

alter table RINCIAN_ANGGARAN
   add constraint FK_RINCIAN__RELATIONS_REALISAS foreign key (ID_REALISASI)
      references REALISASI (ID_REALISASI)
      on update restrict
      on delete restrict;