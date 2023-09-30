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

CREATE TABLE club_leaders (
    club_leader_id INT PRIMARY KEY,
    FOREIGN KEY (club_id) REFERENCES club_participants(club_id),
    FOREIGN KEY (user_id) REFERENCES club_participants(user_id)
)

CREATE TABLE club_moderators (
    club_mod_id INT PRIMARY KEY,
    FOREIGN KEY (club_id) REFERENCES club_participants(club_id),
    FOREIGN KEY (user_id) REFERENCES club_participants(user_id) 
)

CREATE TABLE club_members (
    club_member_id INT PRIMARY KEY,
    FOREIGN KEY (club_id) REFERENCES club_participants(club_id),
    FOREIGN KEY (user_id) REFERENCES club_participants(user_id)    
)

CREATE TABLE events (
    event_id INT PRIMARY KEY,
    event_size INT,
    event_name VARCHAR(255),
    event_desc VARCHAR(255),
    event_privacy ENUM('private', 'public'),
    event_time DATETIME
);

CREATE TABLE club_events (
    club_event_id INT PRIMARY KEY,
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

CREATE TABLE personal_events (
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (event_id) REFERENCES events(user_id)
);

CREATE TABLE event_participants (
    FOREIGN KEY (event_id) REFERENCES events(event_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE event_attendees (
    event_attendee_id INT PRIMARY KEY,
    FOREIGN KEY (event_id) REFERENCES event_participants(event_id),
    FOREIGN KEY (user_id) REFERENCES event_participants(user_id)
);

CREATE event_leaders (
    event_leader INT PRIMARY KEY,
    FOREIGN KEY (event_id) REFERENCES event_participants(event_id),
    FOREIGN KEY (user_id) REFERENCES event_participants(user_id)    
);

CREATE event_invitations (
    accept_before DATETIME,
    FOREIGN KEY (event_id) REFERENCES events(event_id),
    FOREIGN KEY (sender_id) REFERENCES users(user_id),
    FOREIGN KEY (receiver_id) REFERENCES users(user_id),
    CHECK (sender_id <> receiver_id)
);