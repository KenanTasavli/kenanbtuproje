CREATE DATABASE IF NOT EXISTS `dhekim` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `dhekim`;

create table randevular(
    randevu_id int not null AUTO_INCREMENT,
    ad varchar(255) not null,
    soyad varchar(255) not null,
    telno varchar(255) not null,
    tarih date not null,
    saat time not null,
    sikayet varchar(255) not null,
    PRIMARY key(randevu_id)
);

create table kullanicilar(
    kullanici_id int not null AUTO_INCREMENT,
    kullaniciadi varchar(255) not null,
    eposta varchar(255) not null,
    sifre varchar(255) not null,
    PRIMARY key(kullanici_id)
);