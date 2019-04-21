create table circuit(
    idCircuit int AUTO_INCREMENT,
    numCircuit int ,
    themeCircuit varchar(50),
    duree int,
    moyTransport varchar(50),
    image_url varchar(255),
    PRIMARY KEY(idCircuit)
);

CREATE TABLE client(
    idClient int AUTO_INCREMENT,
    numCin int,
    nom varchar(50),
    prenom varchar(50),
    adresse varchar(50),
    numTel int,
    sexe varchar(50),
    password varchar(244),
    PRIMARY KEY(idClient)
);
CREATE TABLE reservation(
	idReservation int AUTO_INCREMENT,
    idClient int,
    idCircuit int,
    dateDepart date,
    heureDepart time,
    nbrPersonne int,
    PRIMARY KEY(idReservation)
);
CREATE table personneAvecClient(
	idPersonne int AUTO_INCREMENT,
    idClient int,
    nomP varchar(50),
    prenomP varchar(50),
    ageP int,
    PRIMARY KEY(idPersonne)
);
