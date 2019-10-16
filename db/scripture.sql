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