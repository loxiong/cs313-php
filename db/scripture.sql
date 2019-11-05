/******* WEEK 5 - Team Activity *******/

/* Create a new table called "Scriptures" that has the following columns:
 * id
 * book
 * chapter
 * verse
 * content
 */
 
CREATE TABLE scriptures (
    id          SERIAL NOT NULL PRIMARY KEY, 
    book        VARCHAR(255) NOT NULL,
    chapter     INT NOT NULL,
    verse       INT NOT NULL,
    content     TEXT NOT NULL
);

/* Insert the following scriptures (along with the text of the verse as content) into your database:
 * John 1:5
 * Doctrine and Covenants 88:49
 * Doctrine and Covenants 93:28
 * Mosiah 16:9
 */

INSERT INTO scriptures (book, chapter, verse, content)
VALUES
    ('John', 1, 5, 'And the alight shineth in bdarkness; and the darkness ccomprehended it not.'),
    ('Doctrine and Covenants', 88, 49, 'The alight shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall bcomprehend even God, being quickened in him and by him.'),
    ('Doctrine and Covenants', 93, 28, 'He that akeepeth his commandments receiveth btruth and clight, until he is glorified in truth and dknoweth all things.'),
    ('Mosiah', 16, 9, 'He is the alight and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

/******** WEEK 6 - Team Activity *******/

/* Add to your scripture DB from last week. 
 * Create new table "topic" with two columns: id and name
 * Insert into this table the following topics: Faith, Sacrifice, Charity
 * Create another table to link scriptures to topics
 */

CREATE TABLE topic (
    id      SERIAL NOT NULL PRIMARY KEY, 
    name    VARCHAR(255)
);

INSERT INTO topic (name)
VALUES
    ('Faith'),
    ('Sacrifice'),
    ('Charity');

INSERT INTO topic (name)
VALUES
    ('Light');
    
/* This table will establish the many-to-many relationship between scriptures table and the topic table*/
CREATE TABLE scripture_topic (
    scriptures_id   INTEGER REFERENCES scriptures(id),   
    topic_id        INTEGER REFERENCES topic(id)
);

/* How to query for specific book name by joining tables
 * Example:
SELECT c.name, n.content FROM note n
JOIN course c ON n.course_id = c.id
WHERE c.code = 'CS 313';

SELECT c.code, c.name, n.content FROM note n
JOIN course c ON n.course_id = c.id
WHERE c.id = 1;
 */
 
/* TESTING QUERIES */

SELECT id, book, chapter, verse FROM scriptures WHERE book = 'John';

SELECT
b1.book, b1.chapter,
b2.book, b2.chapter
FROM 
scriptures s1
INNER JOIN scriptures s2 ON b1.id > b2.id
AND b1.book = b2.book;

SELECT a.chapter AS chapter1, b.verse AS verse1, a.book
FROM scriptures A, scriptures B
WHERE a.id > b.id;

SELECT a.chapter AS chapter1, b.verse AS verse1, a.book
FROM scriptures A, scriptures B
WHERE a.id < b.id;

SELECT a.chapter AS chapter1, b.verse AS verse1, a.book
FROM scriptures A, scriptures B
WHERE a.id = b.id;

SELECT a.chapter AS chapter1, b.verse AS verse1, a.book
FROM scriptures A INNER JOIN scriptures B
ON a.id = b.id;

/* QUERIES TO ADD TOPIC TO EXISTING SCRIPTURES */
INSERT INTO scripture_topic (scriptures_id, topic_id)
VALUES
    (1, 4),
    (2, 4),
    (3, 4),
    (4, 4),
    (5, 4),
    (6, 4),
    (7, 4),
    (8, 4),
    (25, 3),
    (27, 1);

UPDATE scriptures
SET content = 'I, Nephi, having been aborn of bgoodly cparents, therefore I was taught somewhat in all the learning of my father; and having seen many afflictions in the course of my days, nevertheless, having been highly favored of the Lord in all my days; yea, having had a great knowledge of the goodness and the mysteries of God'
WHERE id = 5;

UPDATE scriptures
SET content = 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
WHERE id = 3;

UPDATE scripture_topic
SET topic_id = 1
WHERE scriptures_id = 5;