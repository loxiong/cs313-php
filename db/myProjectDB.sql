CREATE TABLE concession_user (
    id          SERIAL NOT NULL PRIMARY KEY, 
    first_name  VARCHAR(50) NOT NULL,
    last_name   VARCHAR(50) NOT NULL,
    username    VARCHAR(50) NOT NULL UNIQUE,
    password    VARCHAR(100) NOT NULL    
);

CREATE TABLE category (
    category_id          SERIAL NOT NULL PRIMARY KEY,
    category_name        VARCHAR(100)
);

CREATE TABLE store (
    store_id    SERIAL NOT NULL PRIMARY KEY,
    store_name  VARCHAR(100) NOT NULL
);

CREATE TABLE item (
    item_id     SERIAL NOT NULL PRIMARY KEY,
    item_name   VARCHAR(100) NOT NULL, 
    item_desc   TEXT,
    item_price  DEC(10,2) NOT NULL,
    category_id INTEGER REFERENCES category(category_id),
    store_id    INTEGER REFERENCES store(store_id)
);

CREATE TABLE event (
    event_id    SERIAL NOT NULL PRIMARY KEY,
    event_date  DATE,
    item_id     INTEGER REFERENCES item(item_id),
    quantity    INT    
);

INSERT INTO brands (
    brand_id    SERIAL NOT NULL PRIMARY KEY,
    brand_name  VARCHAR(255) NOT NULL,
    store_id    INTEGER REFERENCES store(store_id),
);
/* DELETED Brands Table on 11/3/19 */

/* This table will establish the many-to-many relationship between item table and the category table*/
CREATE TABLE item_category (
    item_id         INTEGER REFERENCES item(item_id),   
    category_id     INTEGER REFERENCES category(category_id)
);

/* This table will establish the many-to-many relationship between item table and the store table*/
CREATE TABLE item_store (
    item_id      INTEGER REFERENCES item(item_id),   
    store_id     INTEGER REFERENCES store(store_id)
);

/* This table will establish the many-to-many relationship between item table and the event table*/
CREATE TABLE item_event (
    item_id      INTEGER REFERENCES item(item_id),   
    event_id     INTEGER REFERENCES event(event_id)
);

/* DROP the NOT NULL constraint on the item_name column in item table */
ALTER TABLE item ALTER COLUMN item_name DROP NOT NULL;


