CREATE TABLE users (
    id          SERIAL PRIMARY KEY, 
    first_name  VARCHAR(20),
    last_name   VARCHAR(20)
);
CREATE TABLE notes (
    id          SERIAL PRIMARY KEY,
    note        VARCHAR(100),
    user_id     INTEGER REFERENCES users(id),
    talk_id     INTEGER REFERENCES talks(id),
    speaker_id  INTEGER REFERENCES speaker(id)
);
CREATE TABLE talks (
    id          SERIAL PRIMARY KEY,
    talk_date   DATE,
    year        SMALLINT,
    is_spring   BOOLEAN NOT NULL,
    speaker_id  INTEGER REFERENCES speaker(id)
);
CREATE TABLE speaker (
    id          SERIAL PRIMARY KEY,
    first_name  VARCHAR(50),
    last_name   VARCHAR(50)
);