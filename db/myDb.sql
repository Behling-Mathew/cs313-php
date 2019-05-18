-- TABLE CREATION --

CREATE TABLE categories
( category_id      SERIAL          PRIMARY KEY
, category_name    VARCHAR(30)     NOT NULL);

CREATE TABLE users 
( user_id          SERIAL          PRIMARY KEY
, user_first_name  VARCHAR(15)     NOT NULL
, user_last_name   VARCHAR(15)
, user_email       VARCHAR(40)     NOT NULL UNIQUE
, user_password    VARCHAR(255)    NOT NULL); 

CREATE TABLE images 
( img_id           SERIAL          PRIMARY KEY
, img_name         VARCHAR(100)    NOT NULL
, img_path         VARCHAR(150)    NOT NULL);

CREATE TABLE comments 
( comment_id       SERIAL          PRIMARY KEY
, comment_text                     TEXT NOT NULL
, comment_date     TIMESTAMP       DEFAULT current_timestamp NOT NULL
, user_id          INT             NOT NULL REFERENCES users(user_id)
, img_id           INT             NOT NULL REFERENCES images(img_id));



-- TESTING INSERTS INTO EACH TABLE -- 
INSERT INTO categories(category_name)
VALUES ('Utah Jazz');

SELECT * FROM categories;

-- DISPLAYS ------------------------------------------------------------------------------------------
-- category_id | category_name
-- -------------+---------------
--           1 | Utah Jazz
-- (1 row)

INSERT INTO users(user_first_name, user_last_name, user_email, user_password)
VALUES ('Peter', 'Parker', 'spiderman@gmail.com', 'maryjane123');

SELECT * FROM users;

-- DISPLAYS ------------------------------------------------------------------------------------------
-- user_id | user_first_name | user_last_name |     user_email      | user_password
-- ---------+-----------------+----------------+---------------------+---------------
--        1 | Peter           | Parker         | spiderman@gmail.com | maryjane123
-- (1 row)

INSERT INTO images(img_name, img_path)
VALUES ('spidey', '/web/images/spidey.png');

SELECT * FROM images;

-- DISPLAYS ------------------------------------------------------------------------------------------
-- img_id | img_name |        img_path
-- --------+----------+------------------------
--      1 | spidey   | /web/images/spidey.png
-- (1 row)

INSERT INTO comments(user_id, img_id, comment_text)
VALUES (1, 1, 'Spida-Mitchell is my favorite player!');

SELECT * FROM comments;

-- DISPLAYS ------------------------------------------------------------------------------------------
-- comment_id |             comment_text              |        comment_date        | user_id | img_id
-- ------------+---------------------------------------+----------------------------+---------+-------
--          2 | Spida-Mitchell is my favorite player! | 2019-05-18 18:35:18.297002 |       1 |      1
-- (1 row)