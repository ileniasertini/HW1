drop database if exists SHOP;
create database SHOP;
use SHOP;

/*----------------------------------------------------*/
create table users(
    id integer primary key AUTO_INCREMENT,
    username varchar(255) not null unique,
    nome varchar(255) not null, 
    cognome varchar(255) not null,
    email varchar(255) not null unique,
    password varchar(255) not null
)ENGINE='InnoDB';

/*----------------------------------------------------*/

create table articolo(
    codice int PRIMARY KEY, 
    nome varchar(255),
    descrizione nvarchar(5000),
    immagine nvarchar(5000),
    prezzo varchar(255)
)ENGINE='InnoDB';


insert INTO articolo( codice, nome, descrizione, immagine, prezzo) VALUES
( '1234', 'T-SHIRT', 'Maglietta bianca con collo rotondo a maniche corte.Orlo con nodo sul davanti.Disponibile anche in nero.', 'IMG_6831.JPEG', '10');
insert INTO articolo( codice, nome, descrizione, immagine, prezzo) VALUES
( '5678', 'FELPA', 'Felpa gialla con collo rotondo e maniche lunghe.Dettaglio di scritta anteriore combinata a contrasto.', 'IMG_6833.JPEG', '30');
insert INTO articolo( codice, nome, descrizione, immagine, prezzo) VALUES
( '1122', 'GONNA', 'Gonna-pantalone,color verde, a vita alta con spacco anteriore.Chiusura laterale con cerniera nascosta nella cucitura.', 'IMG_6828.JPEG', '18');
insert INTO articolo( codice, nome, descrizione, immagine, prezzo) VALUES
( '5555', 'GIUBBOTTO', 'Giacca color panna, effetto pelle con collo a revers .Tasche anteriori e chiusura frontale con cerniera metallica.', 'IMG_6841.JPEG', '40');
insert INTO articolo( codice, nome, descrizione, immagine, prezzo) VALUES
( '6969', 'VESTITO', 'Dettaglio di nodo anteriore.Chiusura con cerniera laterale nascosta nella cucitura.', 'IMG_6842.JPEG', '28');
insert INTO articolo( codice, nome, descrizione, immagine, prezzo) VALUES
( '8765', 'GIACCA', 'Giacca disponibile in piu colorazioni.Chiusura con bottoni color oro.Tasche laterlai finte ', '1_8.jpeg', '40');
insert INTO articolo( codice, nome, descrizione, immagine, prezzo) VALUES
( '1111', 'TUTA', 'Tuta con polsini sulle ginocchia. Vestibilità stretta.', '1_7.jpeg', '13');


/*----------------------------------------------------*/

create table novita(
	codice int PRIMARY KEY,
    FOREIGN KEY(codice)REFERENCES articolo(codice) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE='InnoDB';


insert into novita(codice) values ('1234');
insert into novita(codice) values ('1122');
insert into novita(codice) values ('6969');
insert into novita(codice) values ('1111');


/*----------------------------------------------------*/

create table carrello(
    utente varchar(255),
    nome varchar(255),
    FOREIGN KEY(utente) REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE='InnoDB';


/*----------------------------------------------------*/

create table RECENSIONE(
	utente varchar(255),
    descrizione nvarchar(6000),
    index utente(utente),
    FOREIGN KEY(utente) REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE
)Engine='InnoDB';

