-- Active: 1708258436611@@127.0.0.1@3306@mysql
CREATE DATABASE fedbank;
CREATE TABLE customers(Name VARCHAR (15),Email VARCHAR (30),Account_no int(20),Balance int(10));
INSERT into customers VALUES("Thomas Kovoor","kovoor@gmail.com",20213375,19767);
SELECT * FROM customers;
INSERT INTO customers VALUES("Sayanth CV","sayanthanoob@gmail.com",20253375,17283);
DELETE FROM customers WHERE `Name`="Derick Johnson";
CREATE Table transactions(ID int(3) PRIMARY KEY,Sender_AccountNo int(10),Sender_Name VARCHAR(15),Receiver_AccountNo int(10),Receiver_Name VARCHAR(15),Amount_transferred int(9),Sender_Balance int(9),Receiver_Balance int (9),Status VARCHAR(4),date DATE);
SELECT * FROM transactions;

