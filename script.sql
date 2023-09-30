CREATE TABLE users (
    user_id INT PRIMARY KEY,
    username VARCHAR(255),
    user_password VARCHAR(255)
);

CREATE TABLE clubs (
    club_id INT PRIMARY KEY,
    club_size INT,
    club_name VARCHAR(255),
    club_desc VARCHAR(255)
);

CREATE TABLE club_participants (
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (club_id) REFERENCES clubs(club_id)
);


CREATE TABLE events (
    event_id INT PRIMARY KEY,
    event_size INT,
    event_name VARCHAR(255),
    event_desc VARCHAR(255),
    event_privacy ENUM('private', 'public'),
    event_time DATETIME
);