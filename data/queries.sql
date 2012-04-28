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

CREATE TABLE drugs (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(300) NOT NULL,
  `common_treatment` VARCHAR(300)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Drugs
CHANGE `common_treatment` `commonTreatment` VARCHAR(300);

INSERT INTO Drugs (`name`,`commonTreatment`) VALUES ('Ethambutol','Tuberculosis');
INSERT INTO Drugs (`name`,`commonTreatment`) VALUES ('Isoniazid','Tuberculosis');
INSERT INTO Drugs (`name`,`commonTreatment`) VALUES ('Pyrazinamide','Tuberculosis');
INSERT INTO Drugs (`name`,`commonTreatment`) VALUES ('Rifampicin','Tuberculosis');
INSERT INTO Drugs (`name`) VALUES (`Ethambutol`);
INSERT INTO Drugs (`name`) VALUES (`Ethambutol`);
INSERT INTO Drugs (`name`) VALUES (`Ethambutol`);
INSERT INTO Drugs (`name`) VALUES (`Ethambutol`);
INSERT INTO Drugs (`name`) VALUES (`Ethambutol`);
INSERT INTO Drugs (`name`) VALUES (`Ethambutol`);
INSERT INTO Drugs (`name`) VALUES (`Ethambutol`);

ALTER TABLE `Schedules` ADD KEY `xDrug` (`xDrug`);
ALTER TABLE `Schedules` ADD CONSTRAINT `drugConstraint` FOREIGN KEY (`xDrug`) REFERENCES `Drugs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Schedules` ADD CONSTRAINT `drugConstraint` FOREIGN KEY (`ownerId`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

CREATE INDEX `index` ON `Drugs` (`id`);


