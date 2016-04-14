DROP TABLE IF EXISTS user;
 
CREATE TABLE user (
username VARCHAR(20) PRIMARY KEY,
usertype VARCHAR(20),
salt VARCHAR(20),
hashed_password VARCHAR(256)
);
