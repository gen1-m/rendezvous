-- 3*N queries, 14 each member, at least N joins, at least one aggregation function, and one group by/having clause
--if you wnat to test the queries please comment out the table output


SELECT COUNT(*) FROM users;

+----------+
| COUNT(*) |
+----------+
|       13 |
+----------+
1 row in set (0.001 sec)


SELECT club_name
FROM clubs c1
WHERE EXISTS (
      SELECT 1
      FROM clubs c2
      WHERE c1.club_name <> c2.club_name
      AND c1.club_size = c2.club_size
);

+------------+
| club_name  |
+------------+
| 'swimming' |
| volleyball |
+------------+


SELECT users.username, users.user_id
FROM users
INNER JOIN club_participants ON users.user_id = club_participants.user_id;

+------------+---------+
| username   | user_id |
+------------+---------+
| xhesilda   |       1 |
|  'alice'   |       3 |
|  'jane'    |       4 |
|  'john'    |       2 |
|  'emily'   |       8 |
|  'sarah'   |       6 |
|  'david'   |       7 |
|  'samuel'  |       9 |
|  'olivia'  |      10 |
|  'michael' |       5 |
+------------+---------+

SELECT user_id from club_participants ORDER BY join_date DESC;
+---------+
| user_id |
+---------+
|       1 |
|       9 |
|       8 |
|       7 |
|       6 |
|       5 |
|       4 |
|       3 |
|       2 |
|      10 |
+---------+


SELECT clubs.club_name, COUNT(users.user_id) AS member_count
FROM users
JOIN club_participants ON users.user_id = club_participants.user_id
JOIN clubs ON clubs.club_id = club_participants.club_id
GROUP BY clubs.club_name;

+-----------+--------------+
| club_name | member_count |
+-----------+--------------+
| 'API'     |            2 |
| 'FINTECH' |            1 |
| 'IBM'     |            2 |
| 'kikbox'  |            2 |
| GDSC      |            3 |
+-----------+--------------+
