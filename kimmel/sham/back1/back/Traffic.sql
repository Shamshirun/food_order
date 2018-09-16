CREATE DATABASE VEHICLE;

USE VEHICLE;

CREATE TABLE OWNER (
    owner_id VARCHAR(10),
    name     VARCHAR(10),
    phone    INT(11),
    address  VARCHAR(50),
    dob      DATE,
    PRIMARY KEY (owner_id)
);

CREATE TABLE OFFENCE (
    offence_id   INT AUTO_INCREMENT,
    offence_name VARCHAR(30),
    offence_fine INT(5),
    PRIMARY KEY(offence_id)
);

CREATE TABLE POLICE(
   police_id    VARCHAR(10),
   password     VARCHAR(15),
   jursdication VARCHAR(50),
   PRIMARY KEY(police_id)
);

CREATE TABLE VEHICLE_INFO (
    reg_no        VARCHAR(20) UNIQUE,
    insured       BOOLEAN,
    emission_test BOOLEAN,
    model         VARCHAR(20),
    make          VARCHAR(20),
    owner_id      VARCHAR(10),
    PRIMARY KEY(reg_no),
    FOREIGN KEY(owner_id) REFERENCES OWNER(owner_id)
);

CREATE TABLE PCASE(
   case_id    INT AUTO_INCREMENT,
   offence_id INT,
   paid       BOOLEAN,
   date_of    DATE,
   reg_no     VARCHAR(20),
   location   VARCHAR(20),
   due_amt    INT(5),
   PRIMARY KEY (case_id),
   FOREIGN KEY (offence_id) REFERENCES OFFENCE(offence_id),
   FOREIGN KEY (reg_no) REFERENCES VEHICLE(reg_no)
);

CREATE TABLE NOTIFICATION(
   case_id  INT,
   owner_id VARCHAR(15),
   notify   VARCHAR(50),
   FOREIGN KEY (case_id) REFERENCES PCASE(case_id),
   FOREIGN KEY (owner_id) REFERENCES OWNER(owner_id)
);

CREATE TABLE RECEIPT(
   receipt_id INT AUTO_INCREMENT,
   reg_no     VARCHAR(20),
   case_id    INT,
   date_in    DATE,
   amount     INT,
   police_id  VARCHAR(10),
   PRIMARY KEY (receipt_id),
   FOREIGN KEY (reg_no) REFERENCES VEHICLE(reg_no),
   FOREIGN KEY (case_id) REFERENCES PCASE(case_id),
   FOREIGN KEY (police_id) REFERENCES POLICE(police_id)
);
