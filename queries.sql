-- Xhesi's scripts
SELECT COUNT(*) FROM users;

SELECT club_name
FROM clubs c1
WHERE EXISTS (
      SELECT 1
      FROM clubs c2
      WHERE c1.club_name <> c2.club_name
      AND c1.club_size = c2.club_size
);

SELECT users.username, users.user_id
FROM users
INNER JOIN club_participants ON users.user_id = club_participants.user_id;

SELECT user_id from club_participants ORDER BY join_date DESC;

SELECT clubs.club_name, COUNT(users.user_id) AS member_count
FROM users
JOIN club_participants ON users.user_id = club_participants.user_id
JOIN clubs ON clubs.club_id = club_participants.club_id
GROUP BY clubs.club_name;

-- mine and Joni's scripts

-- Select the usernames of club leaders:
SELECT u.username
FROM users u
JOIN club_leaders cl ON u.user_id = cl.user_id;

-- Select the total number of members in each club:
SELECT c.club_name, COUNT(cm.user_id) AS member_count
FROM clubs c
LEFT JOIN club_members cm ON c.club_id = cm.club_id
GROUP BY c.club_name;

-- Select events with their attendees' usernames:
SELECT e.event_name, u.username
FROM events e
JOIN event_attendees ea ON e.event_id = ea.event_id
JOIN users u ON ea.user_id = u.user_id;

-- Select users who are leaders of more than one club:
SELECT u.username, COUNT(cl.club_id) AS club_count
FROM users u
JOIN club_leaders cl ON u.user_id = cl.user_id
GROUP BY u.username
HAVING club_count > 1;

-- Select clubs and their event counts:
SELECT c.club_name, COUNT(ce.event_id) AS event_count
FROM clubs c
LEFT JOIN club_events ce ON c.club_id = ce.club_id
GROUP BY c.club_name;

-- Select events with more than 100 attendees:
SELECT e.event_name
FROM events e
JOIN event_attendees ea ON e.event_id = ea.event_id
GROUP BY e.event_name
HAVING COUNT(ea.user_id) > 100;Select the average club size:

-- Select users who have created personal events:
SELECT u.username, COUNT(pe.event_id) AS personal_event_count
FROM users u
LEFT JOIN personal_events pe ON u.user_id = pe.user_id
GROUP BY u.username;

-- Select the average club size:
SELECT AVG(club_size) AS avg_club_size
FROM clubs;

-- Select event leaders and their event names:
SELECT u.username, e.event_name
FROM users u
JOIN event_leaders el ON u.user_id = el.user_id
JOIN events e ON el.event_id = e.event_id;

-- Select users who have accepted event invitations:
SELECT u.username
FROM users u
JOIN event_invitations ei ON u.user_id = ei.receiver_id
WHERE ei.accept_before < NOW();

--  Anja's scripts

--Select the total numbers of club moderators in each club
SELECT c.club_name, COUNT(cm.user_id) AS moderator_count
FROM clubs c
LEFT JOIN club_moderators cm ON c.club_id = cm.club_id
GROUP BY c.club_name;

--Select club moderatores usernames for each club
SELECT c.club_name, u.username AS moderator_username
FROM clubs c
JOIN club_moderators cm ON c.club_id = cm.club_id
JOIN users u ON cm.user_id = u.user_id;

--Select events with the total number of attendees
SELECT e.event_name, COUNT(ea.user_id) AS attendee_count
FROM events e
LEFT JOIN event_attendees ea ON e.event_id = ea.event_id
GROUP BY e.event_name;

--Select users members of at least one club
SELECT DISTINCT u.username
FROM users u
JOIN club_members cm ON u.user_id = cm.user_id;

--Select club members (not moderatores and not leaders)
SELECT DISTINCT u.username
FROM users u
JOIN club_members cm ON u.user_id = cm.user_id
LEFT JOIN club_leaders cl ON u.user_id = cl.user_id
LEFT JOIN club_moderators cmr ON u.user_id = cmr.user_id
WHERE cl.user_id IS NULL AND cmr.user_id IS NULL;

--Select users who have sent an event invitation
SELECT DISTINCT u.username
FROM users u
JOIN event_invitations ei ON u.user_id = ei.sender_id;


