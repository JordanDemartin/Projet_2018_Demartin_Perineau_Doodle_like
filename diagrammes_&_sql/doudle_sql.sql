create table doudle_compte(
prenom varchar(50) not null,
nom varchar(50) not null,
login varchar(50) primary key,
email varchar(100) not null,
passw varchar(255) not null);

create table doudle_sondage(
cle varchar(20) primary key,
titre varchar(50) not null,
lieu varchar(50) not null,
etat varchar(10) not null,
descriptif varchar(200),
createur varchar(50) not null references doudle_compte);

create table doudle_date(
cleDate int primary key AUTO_INCREMENT,
jour int not null,
mois int not null,
annee int not null,
heure int not null,
minu int not null,
sondage varchar(20) not null references doudle_sondage);

create table doudle_participant(
id int primary key AUTO_INCREMENT,
prenom varchar(50) not null,
nom varchar(50) not null);

create table doudle_vote(
cleVote int primary key AUTO_INCREMENT,
cleParticipant int not null references doudle_participant,
cleDate int not null references doudle_date);


CREATE TRIGGER `del_sondage` BEFORE DELETE ON `doudle_compte` FOR EACH ROW delete from doudle_sondage where doudle_sondage.createur=OLD.login;
CREATE TRIGGER `del_date` BEFORE DELETE ON `doudle_sondage` FOR EACH ROW delete from doudle_date where doudle_date.sondage=OLD.cle;
CREATE TRIGGER `del_vote` BEFORE DELETE ON `doudle_date` FOR EACH ROW delete from doudle_vote where doudle_vote.cleDate=OLD.cleDate;
CREATE TRIGGER `del_participant` BEFORE DELETE ON `doudle_vote` FOR EACH ROW delete from doudle_participant where doudle_participant.id=OLD.cleParticipant;