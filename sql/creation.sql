#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: artist
#------------------------------------------------------------

CREATE TABLE artist(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT artist_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: album
#------------------------------------------------------------

CREATE TABLE album(
        id         Int  Auto_increment  NOT NULL ,
        album_name Varchar (100) NOT NULL ,
        id_artist  Int NOT NULL
	,CONSTRAINT album_PK PRIMARY KEY (id)

	,CONSTRAINT album_artist_FK FOREIGN KEY (id_artist) REFERENCES artist(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: song
#------------------------------------------------------------

CREATE TABLE song(
        id        Int  Auto_increment  NOT NULL ,
        song_name Varchar (100) NOT NULL ,
        id_album  Int NOT NULL
	,CONSTRAINT song_PK PRIMARY KEY (id)

	,CONSTRAINT song_album_FK FOREIGN KEY (id_album) REFERENCES album(id)
)ENGINE=InnoDB;

