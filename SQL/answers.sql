CREATE TABLE answers (
id         INT(6) NOT NULL AUTO_INCREMENT,
content        TEXT NOT NULL,
answer_date       DATETIME NOT NULL,
question_id      INT(6) NOT NULL,
author     INT(6) NOT NULL,
PRIMARY KEY (id)
) ENGINE=INNODB;