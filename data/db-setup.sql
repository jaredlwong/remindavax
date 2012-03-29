CREATE TABLE `MainUsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(320) DEFAULT NULL,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY (`ownerId`),
  FOREIGN KEY (`ownerId`) REFERENCES `MainUsers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date DEFAULT '1000-01-01',
  `endDate` date DEFAULT '9999-12-31',
  `repeatPeriod` int NOT NULL,
  `repeatInterval` int NOT NULL,
  `preferredTime` time NOT NULL,
  `preferredInitialTime` int DEFAULT '120',
  `preferredWarnings` int DEFAULT '2',
  `preferredWarningDelay` int DEFAULT '60',
  `customMessage` TEXT,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY (`ownerId`),
  FOREIGN KEY (`ownerId`) REFERENCES `Patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Treatments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL DEFAULT '1000-01-01',
  `endDate` date NOT NULL DEFAULT '9999-12-31',
  `repeatPeriod` int(11) NOT NULL,
  `repeatInterval` int(11) NOT NULL,
  `type` TINYINT(3) UNSIGNED NOT NULL,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  FOREIGN KEY (`ownerId`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1

CREATE TABLE `Queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nextTime` time NOT NULL,
  `messageCount` int NOT NULL,
  `maxMessageCount` int NOT NULL,
  `confirmationCode` TEXT NOT NULL,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY(`id`),
  FOREIGN KEY (`ownerId`) REFERENCES `Schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(100) NOT NULL,
  `earlyReminderTime` time NOT NULL,
  `primaryResponseTime` time NOT NULL,
  `message` text NOT NULL,
  `messagesSent` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nextTime` time NOT NULL,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  CONSTRAINT `queue_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `treatments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `TreatmentTypes` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `type` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `TreatmentTypes` (title,type) VALUES('tuberculosis','tuberculosis medication');
INSERT INTO `TreatmentTypes` (title,type) VALUES('chemotherapy','chemotherapy medication');
INSERT INTO `TreatmentTypes` (title,type) VALUES('allergies','allergy shots');
INSERT INTO `TreatmentTypes` (title,type) VALUES('cholesterol','cholesterol medication');
INSERT INTO `TreatmentTypes` (title,type) VALUES('antibacterial','antibacterial medication');
