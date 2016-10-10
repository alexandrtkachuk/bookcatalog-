DROP TABLE IF EXISTS book2author;


DROP TABLE IF EXISTS authors ;
CREATE TABLE authors (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name VARCHAR(50));

DROP TABLE IF EXISTS books ;
CREATE TABLE books (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name VARCHAR(50), opisanie VARCHAR(50), cena INT );


CREATE TABLE book2author (idbook INT , idauthor INT, 
    FOREIGN KEY (idbook) REFERENCES books(id),
    FOREIGN KEY (idauthor) REFERENCES authors(id));

