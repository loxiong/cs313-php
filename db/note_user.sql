/* WEEK 05 Prepare : Basic Queries
 * Covers the basics of retrieving, or querying, data from a PostgreSQL database
 */
 
/* CREATE TABLES */
CREATE TABLE note_user (
  id SERIAL,
  username VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE note (
  id SERIAL,
  userId INT NOT NULL,
  content TEXT,
  PRIMARY KEY (id),
  FOREIGN KEY (userId) REFERENCES note_user (id)
);

/* INSERT DATA 
 * INSERT INTO tableName (column1, column2, etc.) VALUES (value1, value2, etc.);
 * Note: Do not have to specify the id column for these rows because we have set it to SERIAL, 
 * so it will automatically be assigned the next integer value.
 */
 
/* INSERT into table note_user */
INSERT INTO note_user (username, password) VALUES ('john', 'pass');
INSERT INTO note_user (username, password) VALUES ('jane', 'byui');

/* INSERT into table note */
INSERT INTO note (userId, content) VALUES (1, 'A note for John');
INSERT INTO note (userId, content) VALUES (1, 'Another note for John');
INSERT INTO note (userId, content) VALUES (2, 'And this is a note for Jane');

/* RETRIEVING DATA */

/* To select all rows from the user table, and display every column, 
 * use the following command SELECT * FROM tableName;
 * Note that the * operator will select all columns.
 */
SELECT * FROM note_user;

/* If we only want to receive certain columns, or specify a different order for the columns, 
 * we can list specific column names, rather than using the *, as follows.
 */
SELECT username FROM note_user;             /*username is a column in the note_user table */
SELECT password, username FROM note_user;   /*password and username are columns in the note_user table */

/* If we want to restrict the rows that are returned, 
 * we add a "WHERE clause" at the end of our statement.
 * SELECT columnNames FROM tableName WHERE conditions;
 */
 SELECT * FROM note_user WHERE username = 'john';   /*selects all columns from note_user table where the username is John */
 SELECT * FROM note_user WHERE id > 1;              /*selects all columns from note_user table where the id is greater than 1 */
 
 /* Another clause that can be added to a query 
  * after the optional "where clause" is an "order by clause."
  */
SELECT * FROM note_user ORDER BY username;      /*selects all columns from note_user table and the rows are ordered by the username */
SELECT * FROM note_user ORDER BY username DESC; /*rows are ordered by descending order by username */

/* JOINING TABLES */

/* “join” tables together on the matching column (in this case userId) 
 * to temporarily make one big table that has the user information and the note information in it. 
 * Then we can use the username in the where clause. 
 * The syntax of joining tables is as follows:
   SELECT columns
        FROM table1
        JOIN table2
        ON columnFromTable1 = columnFromTable2;
 * it is useful to give them aliases so that we can say which table we mean
   SELECT columns
        FROM table1 AS t1
        JOIN table2 AS t2
        ON t1.column = t2.column;
 */
SELECT * FROM note_user AS u    /*selects all columns*/
    JOIN note AS n
    ON u.id = n.userId;

SELECT * FROM note_user AS u
    JOIN note AS n
    ON u.id = n.userId
    WHERE u.username = 'john';

SELECT n.content FROM note_user AS u    /*selects the specified content column from the note table (n.content)*/ 
    JOIN note AS n
    ON u.id = n.userId 
    WHERE u.username = 'john';          /*and that we want to restrict the data to only those rows where the username column from the user table (u.username) is equal to 'john'*/