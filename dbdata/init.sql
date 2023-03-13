USE users;

CREATE TABLE IF NOT EXISTS user_info (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
-- admin/rootpass
INSERT INTO user_info (username, password) VALUES ('admin', '5012f5182061c46e57859cf617128c6f70eddfba4db27772bdede5a039fa7085');
