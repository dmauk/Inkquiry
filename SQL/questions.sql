CREATE TABLE questions (
id        INT(6) NOT NULL AUTO_INCREMENT,
question       VARCHAR(255) NOT NULL,
question_date      DATETIME NOT NULL,
author        INT(6) NOT NULL,
PRIMARY KEY (id)
) ENGINE=INNODB;