CREATE TABLE users (
    user_id INT PRIMARY KEY,
    username VARCHAR(32),
    user_password TEXT
);

CREATE TABLE clubs (
    club_id INT PRIMARY KEY,
    club_size INT,
    club_name VARCHAR(32),
    club_desc VARCHAR(255)
);

CREATE TABLE club_participants (
    join_date DATETIME,     /*added this*/
    user_id INT,
    club_id INT,
    PRIMARY KEY (user_id, club_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (club_id) REFERENCES clubs(club_id)
);

CREATE TABLE club_leaders (
    user_id INT,
    club_id INT,
    PRIMARY KEY (user_id, club_id),
    FOREIGN KEY (user_id) REFERENCES club_participants(user_id),
    FOREIGN KEY (club_id) REFERENCES club_participants(club_id)
);

CREATE TABLE club_moderators (
    user_id INT,
    club_id INT,
    PRIMARY KEY (user_id, club_id),
    FOREIGN KEY (user_id) REFERENCES club_participants(user_id),
    FOREIGN KEY (club_id) REFERENCES club_participants(club_id)
);

CREATE TABLE club_members (
    user_id INT,
    club_id INT,
    PRIMARY KEY (user_id, club_id),
    FOREIGN KEY (user_id) REFERENCES club_participants(user_id),
    FOREIGN KEY (club_id) REFERENCES club_participants(club_id)
);

CREATE TABLE events (
    event_id INT PRIMARY KEY,
    event_size INT,
    event_name VARCHAR(32),
    event_desc VARCHAR(255),
    event_privacy ENUM('private', 'public'),
    event_time DATETIME
);

CREATE TABLE club_events (
    club_event_id INT PRIMARY KEY,
    event_id INT,
    club_id INT,
    FOREIGN KEY (event_id) REFERENCES events(event_id),
    FOREIGN KEY (club_id) REFERENCES clubs(club_id)
);

CREATE TABLE personal_events (
    user_id INT,
    event_id INT,
    PRIMARY KEY (user_id, event_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

CREATE TABLE event_participants (
    rsvp_status ENUM('attending', 'not attending', 'pending'), /*added this*/
    user_id INT,
    event_id INT,
    PRIMARY KEY (user_id, event_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

CREATE TABLE event_attendees (
    event_attendee_id INT PRIMARY KEY,
    user_id INT,
    event_id INT,
    FOREIGN KEY (user_id) REFERENCES event_participants(user_id),
    FOREIGN KEY (event_id) REFERENCES event_participants(event_id)
);

CREATE TABLE event_leaders (
    event_leader INT PRIMARY KEY,
    user_id INT,
    event_id INT,
    FOREIGN KEY (user_id) REFERENCES event_participants(user_id),
    FOREIGN KEY (event_id) REFERENCES event_participants(event_id)
);

CREATE TABLE event_invitations (
    accept_before DATETIME,
    event_id INT,
    sender_id INT,
    receiver_id INT,
    PRIMARY KEY (event_id, sender_id, receiver_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id),
    FOREIGN KEY (sender_id) REFERENCES users(user_id),
    FOREIGN KEY (receiver_id) REFERENCES users(user_id)
);
