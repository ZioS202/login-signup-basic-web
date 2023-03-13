USE users;

CREATE TABLE IF NOT EXISTS user_info (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO user_info (username, password) VALUES ('admin', 'rootpass');
