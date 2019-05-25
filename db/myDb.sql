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


CREATE TABLE players 
( player_id           SERIAL          PRIMARY KEY
, first_name          VARCHAR(50)    NOT NULL
, last_name           VARCHAR(50)    NOT NULL
, team                VARCHAR(50)    NOT NULL
, salary              VARCHAR(50)    NOT NULL
, age                 INT            NOT NULL   
, img_path            VARCHAR(150)   NOT NULL);

INSERT INTO players(first_name, last_name, team, salary, age, img_path) VALUES 
('Stephen', 'Curry', 'Golden State Warriors', '$37,457,154', 31, '/blog-project/images/players/curry.png'),
('Anthony', 'Davis', 'New Orleans Pelicans', '$25,434,263', 26, '/blog-project/images/players/davis.png'),
('Luka', 'Doncic', 'Dallas Mavericks', '$6,560,640', 20, '/blog-project/images/players/doncic.png'),
('Kevin', 'Durant', 'Golden State Warriors', '$30,000,000', 30, '/blog-project/images/players/durant.png'),
('Joel', 'Embiid', 'Philadelphia 76ers', '$25,467,250', 25, '/blog-project/images/players/embiid.png'),
('Paul', 'George', 'Oklahoma City Thunder', '$30,560,700', 29, '/blog-project/images/players/george.png'),
('Giannis', 'Antetokounmpo', 'Milwaukee Bucks', '$24,157,304', 24, '/blog-project/images/players/giannis.png'),
('Rudy', 'Gobert', 'Utah Jazz', '$23,241,573', 26, '/blog-project/images/players/gobert.png'),
('Blake', 'Griffin', 'Detroit Pistons', '$32,088,932', 30, '/blog-project/images/players/griffin.png'),
('James', 'Harden', 'Houston Rockets', '$30,431,854', 29, '/blog-project/images/players/harden.png'),
('Joe', 'Ingles', 'Utah Jazz', '$13,045,455', 31, '/blog-project/images/players/ingles.png'),
('Kyrie', 'Irving', 'Boston Celtics', '$20,009,189', 27, '/blog-project/images/players/irving.png'),
('Kemba', 'Walker', 'Charlotte Hornets', '$12,000,000', 29, '/blog-project/images/players/kemba.png'),
('Klay', 'Thompson', 'Golden State Warriors', '$18,988,725', 29, '/blog-project/images/players/klay.png'),
('LeBron', 'James', 'Los Angeles Lakers', '$35,654,150', 34, '/blog-project/images/players/lebron.png'),
('Kawhi', 'Leonard', 'Toronto Raptors', '$23,114,067', 27, '/blog-project/images/players/leonard.png'),
('Damian', 'Lillard', 'Portland Trailblazers', '$27,977,689', 28, '/blog-project/images/players/lillard.png'),
('Donovan', 'Mitchell', 'Utah Jazz', '$3,111,480', 22, '/blog-project/images/players/mitchell.png'),
('Chris', 'Paul', 'Houston Rockets', '$35,654,150', 34, '/blog-project/images/players/paul.png'),
('Nikola', 'Jokic', 'Denver Nuggets', '$24,605,181', 24, '/blog-project/images/players/joker.png');


-- Additional inserts after the fact
INSERT INTO users(user_first_name, user_last_name, user_email, user_password) VALUES 
('Tony', 'Stark', 'ironman@gmail.com', 'pepper123'),
('Bruce', 'Banner', 'hulk@gmail.com', 'smash!'),
('Peter', 'Quill', 'starlord@gmail.com', 'gamora<3'),
('Steve', 'Rogers', 'captainamerica@gmail.com', 'america'),
('Bucky', 'Barnes', 'wintersoldier@gmail.com', 'metalarm'),
('Natasha', 'Romanoff', 'blackwidow@gmail.com', '123456'),
('Stephen', 'Strange', 'drstrange@gmail.com', 'knowledge123');

INSERT INTO comments(user_id, img_id, comment_text) VALUES 
(2, 3, 'Curry is amazing! Golden State will win again.'),
(3, 4, 'Even without Durant, Warriors are going to win.'),
(4, 5, 'Giannis cannot handle the pressure.  Bucks are losing tonight.'),
(5, 6, 'Can you believe that Kemba made 3rd all-nba over Klay even though he did not make the playoffs??!'),
(6, 7, 'LeBron probably does not know what to do with himself this year.  This is his first time not going to the finals in like 7 years!!!'),
(7, 8, 'Kawhi Leonard is the new best player in the world.  The Raptors are going to win it all and dethrone the Warriors!'),
(8, 3, 'I have looked into the future and foreseen that Golden State will win the championship and Curry will be the Finals MVP.');

SELECT * FROM 

-- TESTING INSERTS INTO EACH TABLE -- 
INSERT INTO categories(category_name)
VALUES ('Utah Jazz');

SELECT 
    user_first_name, 
    user_last_name, 
    comment_text, 
    comment_date 
FROM 
    comments
INNER JOIN users ON users.user_id = comments.user_id;

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