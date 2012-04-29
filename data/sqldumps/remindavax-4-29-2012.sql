-- MySQL dump 10.13  Distrib 5.5.20, for osx10.7 (i386)
--
-- Host: localhost    Database: remindavax
-- ------------------------------------------------------
-- Server version	5.5.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Doctors`
--

DROP TABLE IF EXISTS `Doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctors`
--

LOCK TABLES `Doctors` WRITE;
/*!40000 ALTER TABLE `Doctors` DISABLE KEYS */;
INSERT INTO `Doctors` VALUES (1,'KathleenNHecker@mailinator.com','password','Kathleen','Hecker','phone0'),(2,'funky@monkeys.com','newpassword',NULL,NULL,NULL),(3,'Doctor@m.com','asdfasdf','Someone','sldjf','230238923'),(4,'OthoBoffin@trashymail.com','her4ohDi4','Otho','Boffin','781-239-3330'),(5,'PearlGamgee@dodgit.com','Iqueidaegh7','Pearl','Gamgee','703-810-5543'),(6,'EstellaGawkroger@pookmail.com','ve3Ohgae1','Estella','Gawkroger','252-362-5975'),(7,'ChicaGawkroger@spambob.com','Sohdooz8Tai','Chica ','Gawkroger','804-957-3511'),(8,'TimBurrowes@spambob.com','Quo4niSh0','Tim','Burrowes','719-222-3760'),(9,'LauraGreenhand@trashymail.com','Weequei9Alahc','Laura','Greenhand','706-555-1710'),(10,'AlaricSackville@mailinator.com','aa7ieJoogh','Alaric','Sackville','616-359-0103'),(11,'DonnamiraBanks@spambob.com','roh6phuZ1ch','Donnamira','Banks','775-468-1005'),(12,'BanazirChubb@spambob.com','geadee0ieV7','Banazir','Chubb','443-712-2127'),(13,'PandoraBanks@mailinator.com','laeti8Toh','Pandora','Banks','314-512-6327'),(14,'CaraClayhanger@spambob.com','ti4heiTh7ei','Cara','Clayhanger','409-994-4248'),(15,'CaramellaBrandagamba@mailinator.com','EeLah3Sa1f','Caramella','Brandagamba','213-288-2169'),(16,'RowanGalbassi@mailinator.com','Shi9Eewai','Rowan','Galbassi','810-266-3122'),(17,'CorneliaBrockhouse@mailinator.com','Diequ1Oilie','Cornelia','Brockhouse','760-488-3160'),(18,'MagnusTunnelly@spambob.com','AeBeege3bie','Magnus','Tunnelly','662-721-5395'),(19,'RudigarGoldworthy@spambob.com','eed2eePh0','Rudigar','Goldworthy','610-790-6003'),(20,'SemolinaLabingi@mailinator.com','Faengeuch0p','Semolina','Labingi','510-940-1088'),(21,'bitch@psych.edu','randomvar','bitch','psych',''),(22,'jared@gmail.com','password','Jared','Wong','1234567'),(23,'jaredwww@gmail.com','password','Jared','Wong','1234567'),(24,'blarg@blarg.com','password','blarg','blarg','1234567'),(25,'jared@microsoft.com','password','Jared','Wong','12345677'),(26,'me@jaredlwong.com','password','Jared','Wong','1234567');
/*!40000 ALTER TABLE `Doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Drugs`
--

DROP TABLE IF EXISTS `Drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Drugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `treatment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `treatment` (`treatment`),
  CONSTRAINT `treatment` FOREIGN KEY (`treatment`) REFERENCES `TreatmentTypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Drugs`
--

LOCK TABLES `Drugs` WRITE;
/*!40000 ALTER TABLE `Drugs` DISABLE KEYS */;
INSERT INTO `Drugs` VALUES (1,'Ethambutol',1),(2,'Isoniazid',1),(3,'Pyrazinamide',1),(4,'Rifampicin',1);
/*!40000 ALTER TABLE `Drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(100) DEFAULT NULL,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messages`
--

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;
INSERT INTO `Messages` VALUES (1,'610-941-5339','Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 20:0. Take Ethambutol for Tuberculosis at 23:20. Take Ethambutol for Tuberculosis at 26:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(2,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 20:0. Take Ethambutol for Tuberculosis at 23:20. Take Ethambutol for Tuberculosis at 26:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(3,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 20:0. Take Ethambutol for Tuberculosis at 23:20. Take Ethambutol for Tuberculosis at 26:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(4,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(5,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(6,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(7,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(8,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(9,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).'),(10,'4088960767','Take Ethambutol for Tuberculosis at 16:40. Text back \'itookit\' to affirm that you have taken your prescribed drug(s).');
/*!40000 ALTER TABLE `Messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patients`
--

DROP TABLE IF EXISTS `Patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctorId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(320) DEFAULT NULL,
  `age` tinyint(3) unsigned DEFAULT NULL,
  `gender` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctorId` (`doctorId`),
  CONSTRAINT `doctorId` FOREIGN KEY (`doctorId`) REFERENCES `Doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patients`
--

LOCK TABLES `Patients` WRITE;
/*!40000 ALTER TABLE `Patients` DISABLE KEYS */;
INSERT INTO `Patients` VALUES (1,1,'Michael','Daniels','4088960767','JackDFenimore@mailinator.com',0,0),(2,1,'firstp1','lastp1','4088960767','diff@email.com',NULL,NULL),(3,1,'John','Smith','4088960767','different@email.com',NULL,NULL),(4,1,'firstp0','lastp0','4088960767','email@email.com',NULL,NULL),(5,1,'firstp0','lastp0','4088960767','email@email.com',NULL,NULL),(6,1,'first-test','last-test','4088960767','email@email.com',NULL,NULL),(8,1,'newpatient','lastname','4088960767','funky@monkeys.com',NULL,NULL),(9,1,'Valerie','Ludwig','4088960767','ValerieTLudwig@spambob.com',NULL,NULL),(10,1,'Alejandro','Larsen','4088960767','AlejandroMLarsen@pookmail.com',NULL,NULL),(11,1,'Jared','Wong','4088960767','asdf@asdf.com',NULL,NULL),(12,1,'Vivek','Bhalla','4088960767','vbhalla@st.edu',NULL,NULL),(13,1,'blob','blob','4088960767','',NULL,NULL),(14,1,'Patricia','Matthews','4088960767','PatriciaRMatthews@dodgit.com',NULL,NULL),(15,1,'Carol','Hurst','4088960767','CarolTHurst@spambob.com',NULL,NULL),(16,1,'Jeffrey','Jackson','4088960767','JeffreyMJackson@mailinator.com',NULL,NULL),(17,1,'Seth','Wagner','4088960767','SethGWagner@spambob.com',NULL,NULL),(18,1,'Susie','Gibbons','4088960767','SusieSGibbons@trashymail.com',NULL,NULL),(19,1,'Marion','McKnight','4088960767','MarionPMcKnight@pookmail.com',NULL,NULL),(20,1,'Vance','Alexander','4088960767','VanceBAlexander@trashymail.com',NULL,NULL),(21,1,'Rosa','Keating','4088960767','RosaWKeating@pookmail.com',NULL,NULL),(22,1,'Thomas','Schmitt','4088960767','ThomasTSchmitt@spambob.com',NULL,NULL),(23,1,'Dennis','Fallin','4088960767','DennisJFallin@trashymail.com',NULL,NULL),(24,1,'Karen','Sprague','4088960767','KarenGSprague@trashymail.com',NULL,NULL),(25,1,'Bruce','Walter','4088960767','BruceSWalter@spambob.com',NULL,NULL),(26,1,'Martha','Perez','4088960767','MarthaWPerez@mailinator.com',NULL,NULL),(27,1,'Denise','Gordon','4088960767','DeniseEGordon@spambob.com',NULL,NULL),(28,1,'Tammy','Lopez','4088960767','TammyJLopez@dodgit.com',NULL,NULL),(29,1,'Melissa','Jozwiak','4088960767','MelissaMJozwiak@pookmail.com',NULL,NULL),(30,1,'Charles','Carroll','4088960767','CharlesACarroll@dodgit.com',NULL,NULL),(31,1,'Denese','Baptiste','4088960767','DeneseJBaptiste@spambob.com',NULL,NULL),(32,1,'Linda','Farley','4088960767','LindaAFarley@spambob.com',NULL,NULL),(33,1,'Lisa','Ebeling','4088960767','LisaREbeling@dodgit.com',NULL,NULL),(34,1,'Bonnie','Shepard','4088960767','BonnieTShepard@trashymail.com',NULL,NULL),(35,1,'Joseph','Alexander','4088960767','JosephKAlexander@mailinator.com',NULL,NULL),(36,1,'Keitha','Rodriquez','4088960767','KeithaJRodriquez@mailinator.com',NULL,NULL),(37,1,'Vanessa','Marshall','4088960767','VanessaDMarshall@dodgit.com',NULL,NULL),(38,1,'Joseph','Franklin','4088960767','JosephJFranklin@trashymail.com',NULL,NULL),(39,1,'Carrie','Gallegos','4088960767','CarrieOGallegos@mailinator.com',NULL,NULL),(40,1,'John','Brannon','4088960767','JohnLBrannon@pookmail.com',NULL,NULL),(41,1,'Sharon','Urban','4088960767','SharonPUrban@spambob.com',NULL,NULL),(42,1,'Vanessa','Poole','4088960767','VanessaJPoole@spambob.com',NULL,NULL),(43,1,'Kirk','Still','4088960767','KirkAStill@dodgit.com',NULL,NULL),(44,1,'Veronica','Snow','4088960767','VeronicaBSnow@mailinator.com',NULL,NULL),(45,1,'John','Madden','4088960767','JohnPMadden@trashymail.com',NULL,NULL),(46,1,'Michelle','Bellino','4088960767','MichelleJBellino@mailinator.com',NULL,NULL),(47,1,'Larry','Cannon','4088960767','LarryPCannon@pookmail.com',NULL,NULL),(48,1,'Cynthia','Castorena','4088960767','CynthiaBCastorena@trashymail.com',NULL,NULL),(49,1,'Natalie','Mason','4088960767','NatalieJMason@trashymail.com',NULL,NULL),(50,1,'John','Fields','4088960767','JohnPFields@pookmail.com',NULL,NULL),(51,1,'Robert','Ruiz','4088960767','RobertJRuiz@spambob.com',NULL,NULL),(52,1,'Linda','Thompson','4088960767','LindaGThompson@mailinator.com',NULL,NULL),(53,1,'Tamera','Reid','4088960767','TameraSReid@mailinator.com',NULL,NULL),(54,1,'Jamie','Downey','4088960767','JamieCDowney@trashymail.com',NULL,NULL),(55,1,'Soledad','Kratz','4088960767','SoledadTKratz@spambob.com',NULL,NULL),(56,1,'James','Molina','4088960767','JamesMMolina@trashymail.com',NULL,NULL),(57,1,'William','Mitchell','4088960767','WilliamAMitchell@spambob.com',NULL,NULL),(58,1,'Amanda','Bryan','4088960767','AmandaABryan@dodgit.com',NULL,NULL),(59,1,'Kay','Vanleer','4088960767','KayRVanleer@trashymail.com',NULL,NULL),(60,1,'Mary','Haag','4088960767','MaryCHaag@mailinator.com',NULL,NULL),(61,1,'Joseph','Stam','4088960767','JosephBStam@trashymail.com',NULL,NULL),(62,1,'Jacob','Carson','4088960767','JacobDCarson@pookmail.com',NULL,NULL),(63,1,'James','Pyle','4088960767','JamesYPyle@mailinator.com',NULL,NULL),(64,1,'Betty','Berry','4088960767','BettyRBerry@dodgit.com',NULL,NULL),(65,1,'Robert','Andress','4088960767','RobertEAndress@dodgit.com',NULL,NULL),(66,1,'Susan','Pace','4088960767','SusanFPace@dodgit.com',NULL,NULL),(67,1,'Fred','Brownlee','4088960767','FredHBrownlee@trashymail.com',NULL,NULL),(68,1,'Robert','Roberts','4088960767','RobertVRoberts@mailinator.com',NULL,NULL),(69,1,'Jessica','Mazza','4088960767','JessicaJMazza@mailinator.com',NULL,NULL),(70,1,'Woodrow','Betty','4088960767','WoodrowFBetty@pookmail.com',NULL,NULL),(71,1,'Joan','Cushman','4088960767','JoanJCushman@dodgit.com',NULL,NULL),(72,1,'Allison','Borden','4088960767','AllisonDBorden@pookmail.com',NULL,NULL),(73,1,'Kelly','Croom','4088960767','KellyLCroom@dodgit.com',NULL,NULL),(74,1,'Mary','Reid','4088960767','MaryJReid@dodgit.com',NULL,NULL),(75,1,'James','Moorman','4088960767','JamesMMoorman@dodgit.com',NULL,NULL),(76,1,'Mike','Wu','4088960767','MikeMWu@mailinator.com',NULL,NULL),(77,1,'Patricia','Findley','4088960767','PatriciaDFindley@spambob.com',NULL,NULL),(78,1,'Shirley','Miller','4088960767','ShirleyLMiller@mailinator.com',NULL,NULL),(79,1,'Melinda','Cruz','4088960767','MelindaMCruz@trashymail.com',NULL,NULL),(80,1,'Mark','Hathaway','4088960767','MarkTHathaway@dodgit.com',NULL,NULL),(81,1,'Bryant','Danley','4088960767','BryantTDanley@trashymail.com',NULL,NULL),(82,1,'Edelmira','Madrid','4088960767','EdelmiraKMadrid@pookmail.com',NULL,NULL),(83,1,'Will','Reyna','4088960767','WillFReyna@spambob.com',NULL,NULL),(84,1,'Stephanie','Thomas','4088960767','StephanieDThomas@trashymail.com',NULL,NULL),(85,1,'Dawn','Salinas','4088960767','DawnJSalinas@dodgit.com',NULL,NULL),(86,1,'Diane','Alpert','4088960767','DianeGAlpert@spambob.com',NULL,NULL),(87,1,'Charles','Mooney','4088960767','CharlesMMooney@pookmail.com',NULL,NULL),(88,1,'Daniel','Blanchard','4088960767','DanielDBlanchard@pookmail.com',NULL,NULL),(89,1,'Alma','Sipple','4088960767','AlmaDSipple@pookmail.com',NULL,NULL),(90,1,'Roxanna','Thompson','4088960767','RoxannaJThompson@trashymail.com',NULL,NULL),(91,1,'William','Adams','4088960767','WilliamMAdams@pookmail.com',NULL,NULL),(92,1,'Bert','Duckworth','4088960767','BertDDuckworth@mailinator.com',NULL,NULL),(93,1,'Christopher','Shreve','4088960767','ChristopherKShreve@dodgit.com',NULL,NULL),(94,1,'Denise','Roe','4088960767','DeniseJRoe@mailinator.com',NULL,NULL),(95,1,'Elmer','Griffin','4088960767','ElmerMGriffin@trashymail.com',NULL,NULL),(96,1,'Linda','Oconnell','4088960767','LindaWOconnell@spambob.com',NULL,NULL),(97,1,'Andrew','Hinton','4088960767','AndrewJHinton@trashymail.com',NULL,NULL),(98,1,'Gary','Foster','4088960767','GaryLFoster@trashymail.com',NULL,NULL),(99,1,'Ramona','Chaffee','4088960767','RamonaAChaffee@mailinator.com',NULL,NULL),(100,1,'Robert','Lupo','4088960767','RobertJLupo@mailinator.com',NULL,NULL),(101,1,'John','Williams','4088960767','JohnDWilliams@mailinator.com',NULL,NULL),(102,1,'Ella','Gallagher','4088960767','EllaAGallagher@dodgit.com',NULL,NULL),(103,1,'Florence','Gurney','4088960767','FlorenceJGurney@dodgit.com',NULL,NULL),(104,1,'Justin','Bearden','4088960767','JustinSBearden@mailinator.com',NULL,NULL),(105,1,'Robert','Perez','4088960767','RobertJPerez@trashymail.com',NULL,NULL),(106,1,'Edward','Kirk','4088960767','EdwardJKirk@spambob.com',NULL,NULL),(107,1,'Joseph','Fitting','4088960767','JosephIFitting@dodgit.com',NULL,NULL),(108,1,'Vicky','Holder','4088960767','VickyWHolder@mailinator.com',NULL,NULL),(109,1,'John','Strauser','4088960767','JohnSStrauser@mailinator.com',NULL,NULL),(110,1,'George','Quinones','4088960767','GeorgeCQuinones@trashymail.com',NULL,NULL),(111,1,'Betty','Gilbert','4088960767','BettyDGilbert@mailinator.com',NULL,NULL),(112,1,'Shelia','Freeman','4088960767','SheliaSFreeman@trashymail.com',NULL,NULL),(113,1,'Lorena','Thomas','4088960767','LorenaJThomas@dodgit.com',NULL,NULL),(114,1,'','','4088960767',NULL,NULL,NULL),(115,22,'Jamie','Wong','1234567','jamieknawong@gmail.com',0,0),(116,23,'Ulysses','Wong','123456','ulysses@bing.com',NULL,NULL),(117,24,'blarg','blarg','1234678','blarg@lkjsdf.com',NULL,NULL),(118,25,'Joy','Ming','1234567','joy@harvard.edu',NULL,NULL),(119,26,'Joy','Mine','123457','joy@harvard.edu',NULL,NULL);
/*!40000 ALTER TABLE `Patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Prescriptions`
--

DROP TABLE IF EXISTS `Prescriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Prescriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientId` int(11) NOT NULL,
  `dom` varchar(255) NOT NULL DEFAULT '0',
  `mon` varchar(255) NOT NULL DEFAULT '*',
  `dow` varchar(255) NOT NULL DEFAULT '*',
  `year` varchar(255) DEFAULT '*',
  `begin` date NOT NULL DEFAULT '1970-01-01',
  `end` date NOT NULL DEFAULT '2099-12-31',
  `xSnotB` tinyint(1) NOT NULL DEFAULT '1',
  `xSummaryTime` int(11) unsigned NOT NULL DEFAULT '420',
  `xBeforeMins` int(11) unsigned NOT NULL DEFAULT '15',
  `xMedTime` int(11) unsigned NOT NULL DEFAULT '720',
  `xWarningAfterLast` int(11) unsigned NOT NULL DEFAULT '60',
  `xEndTime` int(11) unsigned NOT NULL DEFAULT '1440',
  `xDrug` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `xDrug` (`xDrug`),
  KEY `patientId` (`patientId`),
  CONSTRAINT `drugConstraint` FOREIGN KEY (`xDrug`) REFERENCES `Drugs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `patientId` FOREIGN KEY (`patientId`) REFERENCES `Patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prescriptions`
--

LOCK TABLES `Prescriptions` WRITE;
/*!40000 ALTER TABLE `Prescriptions` DISABLE KEYS */;
INSERT INTO `Prescriptions` VALUES (1,1,'*','*','*','*','1970-01-01','2099-12-31',1,690,0,1000,30,1440,1),(2,2,'*','*','*','*','1970-01-01','2099-12-31',1,900,0,1200,30,1500,1),(3,1,'0','*','*','*','1970-01-01','2099-12-31',1,900,0,1400,30,1440,1),(4,1,'0','*','*','*','1970-01-01','2099-12-31',1,900,0,1600,30,1440,1),(5,1,'0','*','*','*','1970-01-01','2099-12-31',1,900,0,1000,30,1440,1),(6,1,'0','*','*','*','1970-01-01','2099-12-31',1,900,0,1000,30,1440,1),(7,1,'0','*','*','*','1970-01-01','2099-12-31',1,900,0,1000,30,1440,1),(8,1,'0','*','*','*','1970-01-01','2099-12-31',1,900,0,1000,30,1440,1),(9,1,'0','4','2','*','1970-01-01','2099-12-31',1,900,0,1000,30,1440,1),(10,1,'0','*','*','*','1970-01-01','2099-12-31',1,900,0,1000,30,1440,1),(11,117,'*','*','*','*','2012-04-01','2012-04-11',0,0,0,0,0,0,1),(12,118,'*','*','*','*','2012-04-21','2012-05-18',0,0,0,0,0,0,4),(13,119,'*','*','*','*','2012-04-21','2012-05-21',0,0,0,0,0,0,2);
/*!40000 ALTER TABLE `Prescriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Queue`
--

DROP TABLE IF EXISTS `Queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PreNotWarn` tinyint(1) unsigned NOT NULL,
  `prescriptionId` int(11) NOT NULL,
  `WarnDPF` tinyint(2) unsigned DEFAULT NULL,
  `WarnId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescriptionId` (`prescriptionId`),
  CONSTRAINT `prescriptionId` FOREIGN KEY (`prescriptionId`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Queue`
--

LOCK TABLES `Queue` WRITE;
/*!40000 ALTER TABLE `Queue` DISABLE KEYS */;
INSERT INTO `Queue` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL);
/*!40000 ALTER TABLE `Queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Treatments`
--

DROP TABLE IF EXISTS `Treatments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Treatments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Treatments`
--

LOCK TABLES `Treatments` WRITE;
/*!40000 ALTER TABLE `Treatments` DISABLE KEYS */;
INSERT INTO `Treatments` VALUES (1,'Tuberculosis','tuberculosis medication'),(2,'chemotherapy','chemotherapy medication'),(3,'allergies','allergy shots'),(4,'cholesterol','cholesterol medication'),(5,'antibacterial','antibacterial medication'),(6,'HIV','');
/*!40000 ALTER TABLE `Treatments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-04-29 17:10:13
