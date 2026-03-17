create database olojinha;
use olojinha;
create table categorias
(
    catid int primary key auto_increment,
    catnome varchar(150),
    catativo boolean default 1
);

create table subcategorias
(
    subid int primary key auto_increment,
    subnome varchar (150),
    subcatid int,
    subativo boolean default 1,
    constraint fksubcatid foreign key (subcatid)
    references categorias (catid)
);

create table produtos
(
    proid int primary key auto_increment,
    pronome varchar(150),
    prodescricao varchar(1024),
    provalorcusto double,
    provalorvenda double,
    proquantidade int,
    prosubid int,
    proativo boolean default 1,
    constraint fkprosubid foreign key (prosubid)
    references subcategorias (subid)
);

create table fotosproduto
(
    fotid int primary key auto_increment,
    fotcaminho varchar(1024),
    fotdescricao varchar(150),
    fotproid int,
    fotprincipal boolean default 0,
    fotativo boolean default 1,
    constraint fkfotproid foreign key (fotproid)
    references produtos (proid)
);