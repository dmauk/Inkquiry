CREATE TABLE users (
id     INT(6) NOT NULL AUTO_INCREMENT,
username   VARCHAR(18) NOT NULL,
pass   VARCHAR(255) NOT NULL,
email  VARCHAR(255) NOT NULL,
reg_date   DATETIME NOT NULL,
UNIQUE INDEX user_name_unique (username),
PRIMARY KEY (id)
) ENGINE=INNODB;