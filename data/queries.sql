INSERT INTO Patients
(`firstName`,`lastName`,`phone`,`email`,`ownerId`)
VALUES ('newpatient','lastname','12345','funky@monkeys.com',2);

INSERT INTO MainUsers
(`email`,`password`)
VALUES ('funky@monkeys.com','newpassword');



ALTER TABLE Patients MODIFY `earlyReminderTime` date NOT NULL;

ALTER TABLE Patients ALTER `earlyReminderTime` SET DEFAULT '08:00:00';

ALTER TABLE Patients 
ADD `earlyReminderTime` TIME NOT NULL DEFAULT '08:00:00' 
AFTER `email`;

ALTER TABLE Patients 
ADD `primaryResponseTime` TIME NOT NULL DEFAULT '13:00:00' 
AFTER `earlyReminderTime`;

ALTER TABLE Patients 
ADD `age` TINYINT UNSIGNED AFTER `primaryResponseTime`;

ALTER TABLE Patients 
ADD `gender` TINYINT UNSIGNED AFTER `age`;

