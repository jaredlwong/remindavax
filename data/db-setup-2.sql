CREATE TABLE `MainUsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

CREATE TABLE `Patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(320) DEFAULT NULL,
  `earlyReminderTime` time NOT NULL DEFAULT '08:00:00',
  `primaryResponseTime` time NOT NULL DEFAULT '13:00:00',
  `age` tinyint(3) unsigned DEFAULT NULL,
  `gender` tinyint(3) unsigned DEFAULT NULL,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `mainusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

CREATE TABLE `Treatments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL DEFAULT '1000-01-01',
  `endDate` date NOT NULL DEFAULT '9999-12-31',
  `repeatPeriod` int(11) NOT NULL,
  `repeatInterval` int(11) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  CONSTRAINT `treatments_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

CREATE TABLE `TreatmentTypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;