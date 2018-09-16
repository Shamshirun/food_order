insert into OWNER values('A1','shyam','1234156723','bangalore','20/11/1983');

 insert into OWNER values('B1','sarita','9934156723','bangalore','10/1/1983');

 insert into OWNER values('C1','selina','9922156723','mangalore','10/2/1783');

 


insert into VEHICLE values('ka20',1,1,'bmw','deo','A1');

 insert into VEHICLE values('ka22',1,1,'indica','deo','B1');

 insert into VEHICLE values('ka32',0,1,'hyundai','swift','C1');



 insert into POLICE values('p1','geeta','bangalore');

 insert into POLICE values('p2','deepika','mangalore');

insert into POLICE values('p3','sangita','mangalore');





mysql> DESC OWNER;
+----------+--------------+------+-----+---------+-------+
| Field    | Type         | Null | Key | Default | Extra |
+----------+--------------+------+-----+---------+-------+
| owner_id | varchar(10)  | NO   | PRI |         |       |
| name     | varchar(30)  | YES  |     | NULL    |       |
| phone    | varchar(10)  | YES  |     | NULL    |       |
| address  | varchar(100) | YES  |     | NULL    |       |
| dob      | varchar(100) | YES  |     | NULL    |       |
+----------+--------------+------+-----+---------+-------+
5 rows in set (0.00 sec)

mysql> select * from OWNER;
+----------+-------------------------+------------+------------------------------+------------+
| owner_id | name                    | phone      | address                      | dob        |
+----------+-------------------------+------------+------------------------------+------------+
| 111      | Ruthvik Vijayakumar     | 8970464490 | Rajajinagar, Industrial Town | 1996-03-13 |
| 121      | Aravind Kumar Halahalli | 8296392602 | Mogha, Kalburgi              | 1997-02-15 |
| 124      | Deepika R               | 8892841337 | Peenya                       | 1997-08-15 |
| A1       | shyam                   | 1234156723 | bangalore                    | 20/11/1983 |
| B1       | sarita                  | 9934156723 | bangalore                    | 10/1/1983  |
| C1       | selina                  | 9922156723 | mangalore                    | 10/2/1783  |
+----------+-------------------------+------------+------------------------------+------------+
6 rows in set (0.00 sec)






mysql> desc VEHICLE;
+---------------+-------------+------+-----+---------+-------+
| Field         | Type        | Null | Key | Default | Extra |
+---------------+-------------+------+-----+---------+-------+
| reg_no        | varchar(20) | NO   | PRI |         |       |
| insured       | tinyint(1)  | YES  |     | NULL    |       |
| emission_test | tinyint(1)  | YES  |     | NULL    |       |
| model         | varchar(20) | YES  |     | NULL    |       |
| make          | varchar(20) | YES  |     | NULL    |       |
| owner_id      | varchar(10) | YES  | MUL | NULL    |       |
+---------------+-------------+------+-----+---------+-------+
6 rows in set (0.00 sec)

mysql> select * from VEHICLE;
+------------+---------+---------------+----------------+------------+----------+
| reg_no     | insured | emission_test | model          | make       | owner_id |
+------------+---------+---------------+----------------+------------+----------+
| KA03MB1888 |       0 |             0 | 800            | Maruthi    | 124      |
| KA04MB1873 |       1 |             1 | Dio            | Honda      | 111      |
| ka20       |       1 |             1 | bmw            | deo        | A1       |
| ka22       |       1 |             1 | indica         | deo        | B1       |
| ka32       |       0 |             1 | hyundai        | swift      | C1       |
| KA32ET7926 |       0 |             0 | Splendor Plus  | Hero Honda | 121      |
+------------+---------+---------------+----------------+------------+----------+
6 rows in set (0.00 sec)



mysql> DESC POLICE;
+--------------+-------------+------+-----+---------+-------+
| Field        | Type        | Null | Key | Default | Extra |
+--------------+-------------+------+-----+---------+-------+
| police_id    | varchar(10) | NO   | PRI |         |       |
| password     | varchar(15) | YES  |     | NULL    |       |
| jursdication | varchar(50) | YES  |     | NULL    |       |
+--------------+-------------+------+-----+---------+-------+
3 rows in set (0.00 sec)

mysql> select * from POLICE;
+------------+----------+--------------+
| police_id  | password | jursdication |
+------------+----------+--------------+
| 12RAJ55478 | kulli123 | Rajajinagar  |
| p1         | geeta    | bangalore    |
| p2         | deepika  | mangalore    |
| p3         | sangita  | mangalore    |
+------------+----------+--------------+
4 rows in set (0.00 sec)




