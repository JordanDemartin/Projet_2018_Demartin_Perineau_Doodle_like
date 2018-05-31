create table doudle_compte(
prenom varchar(50) not null,
nom varchar(50) not null,
login varchar(50) primary key,
email varchar(100) not null,
passw varchar(100) not null);

create table doudle_sondage(
cle int primary key,
titre varchar(50) not null,
lieu varchar(50) not null,
etat varchar(10) not null,
descriptif varchar(200)
createur int references doudle_compte);

create table doudle_date(
cleDate int primary key,
jour int not null,
mois int not null,
annee int not null,
heure int not null,
minu int not null,
sondage int references doudle_sondage);

create table doudle_participant(
id int primary key,
prenom varchar(50) not null,
nom varchar(50) not null
);

create table doudle_vote(
cleVote int primary key,
cleParticipant int references doudle_participant,
cleDate int references doudle_date);