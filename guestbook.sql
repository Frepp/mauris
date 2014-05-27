use frpe13;

CREATE TABLE ci_posts(
 id INT(11) NOT NULL AUTO_INCREMENT,
 text text NOT NULL,
 author VARCHAR(128) NOT NULL,
 PRIMARY KEY(id)
);

show tables;

select * from ci_posts;
