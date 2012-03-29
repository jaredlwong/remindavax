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
-- Table structure for table `MainUsers`
--

DROP TABLE IF EXISTS `MainUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MainUsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MainUsers`
--

LOCK TABLES `MainUsers` WRITE;
/*!40000 ALTER TABLE `MainUsers` DISABLE KEYS */;
INSERT INTO `MainUsers` VALUES (1,'KathleenNHecker@mailinator.com','password','Kathleen','Hecker','phone0'),(2,'funky@monkeys.com','newpassword',NULL,NULL,NULL),(3,'Doctor@m.com','asdfasdf','Someone','sldjf','230238923'),(4,'OthoBoffin@trashymail.com','her4ohDi4','Otho','Boffin','781-239-3330'),(5,'PearlGamgee@dodgit.com','Iqueidaegh7','Pearl','Gamgee','703-810-5543'),(6,'EstellaGawkroger@pookmail.com','ve3Ohgae1','Estella','Gawkroger','252-362-5975'),(7,'ChicaGawkroger@spambob.com','Sohdooz8Tai','Chica ','Gawkroger','804-957-3511'),(8,'TimBurrowes@spambob.com','Quo4niSh0','Tim','Burrowes','719-222-3760'),(9,'LauraGreenhand@trashymail.com','Weequei9Alahc','Laura','Greenhand','706-555-1710'),(10,'AlaricSackville@mailinator.com','aa7ieJoogh','Alaric','Sackville','616-359-0103'),(11,'DonnamiraBanks@spambob.com','roh6phuZ1ch','Donnamira','Banks','775-468-1005'),(12,'BanazirChubb@spambob.com','geadee0ieV7','Banazir','Chubb','443-712-2127'),(13,'PandoraBanks@mailinator.com','laeti8Toh','Pandora','Banks','314-512-6327'),(14,'CaraClayhanger@spambob.com','ti4heiTh7ei','Cara','Clayhanger','409-994-4248'),(15,'CaramellaBrandagamba@mailinator.com','EeLah3Sa1f','Caramella','Brandagamba','213-288-2169'),(16,'RowanGalbassi@mailinator.com','Shi9Eewai','Rowan','Galbassi','810-266-3122'),(17,'CorneliaBrockhouse@mailinator.com','Diequ1Oilie','Cornelia','Brockhouse','760-488-3160'),(18,'MagnusTunnelly@spambob.com','AeBeege3bie','Magnus','Tunnelly','662-721-5395'),(19,'RudigarGoldworthy@spambob.com','eed2eePh0','Rudigar','Goldworthy','610-790-6003'),(20,'SemolinaLabingi@mailinator.com','Faengeuch0p','Semolina','Labingi','510-940-1088');
/*!40000 ALTER TABLE `MainUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patients`
--

DROP TABLE IF EXISTS `Patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patients`
--

LOCK TABLES `Patients` WRITE;
/*!40000 ALTER TABLE `Patients` DISABLE KEYS */;
INSERT INTO `Patients` VALUES (1,'Michael','Daniels','610-941-5339','JackDFenimore@mailinator.com','08:00:00','13:00:00',NULL,NULL,1),(2,'firstp1','lastp1','phonep1','diff@email.com','07:00:00','14:00:00',NULL,NULL,1),(3,'John','Smith','4081231234','different@email.com','08:00:00','13:00:00',NULL,NULL,1),(4,'firstp0','lastp0','phonep0','email@email.com','08:00:00','13:00:00',NULL,NULL,1),(5,'firstp0','lastp0','phonep0','email@email.com','08:00:00','13:00:00',NULL,NULL,1),(6,'first-test','last-test','phonep0','email@email.com','08:00:00','13:00:00',NULL,NULL,1),(8,'newpatient','lastname','12345','funky@monkeys.com','08:00:00','13:00:00',NULL,NULL,2),(9,'Valerie','Ludwig','601-558-5308','ValerieTLudwig@spambob.com','08:00:00','13:00:00',NULL,NULL,1),(10,'Alejandro','Larsen','651-260-6182','AlejandroMLarsen@pookmail.com','08:00:00','13:00:00',NULL,NULL,1),(11,'Jared','Wong','12341234','asdf@asdf.com','08:00:00','13:00:00',NULL,NULL,3),(12,'Vivek','Bhalla','12345','vbhalla@st.edu','08:00:00','13:00:00',NULL,NULL,1),(13,'blob','blob','4088950850','','08:00:00','13:00:00',NULL,NULL,4),(14,'Patricia','Matthews','484-808-3120','PatriciaRMatthews@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(15,'Carol','Hurst','904-421-6529','CarolTHurst@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(16,'Jeffrey','Jackson','864-328-3696','JeffreyMJackson@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(17,'Seth','Wagner','240-417-5736','SethGWagner@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(18,'Susie','Gibbons','248-329-1457','SusieSGibbons@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(19,'Marion','McKnight','912-293-0711','MarionPMcKnight@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(20,'Vance','Alexander','603-864-7246','VanceBAlexander@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(21,'Rosa','Keating','646-758-5232','RosaWKeating@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(22,'Thomas','Schmitt','775-292-5127','ThomasTSchmitt@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(23,'Dennis','Fallin','864-261-1953','DennisJFallin@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(24,'Karen','Sprague','562-594-7906','KarenGSprague@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(25,'Bruce','Walter','785-742-6368','BruceSWalter@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(26,'Martha','Perez','716-290-4005','MarthaWPerez@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(27,'Denise','Gordon','562-334-3405','DeniseEGordon@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(28,'Tammy','Lopez','910-426-4642','TammyJLopez@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(29,'Melissa','Jozwiak','615-498-9857','MelissaMJozwiak@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(30,'Charles','Carroll','252-434-5162','CharlesACarroll@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(31,'Denese','Baptiste','347-328-9910','DeneseJBaptiste@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(32,'Linda','Farley','626-263-8929','LindaAFarley@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(33,'Lisa','Ebeling','206-779-8735','LisaREbeling@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(34,'Bonnie','Shepard','217-663-6195','BonnieTShepard@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(35,'Joseph','Alexander','808-941-5321','JosephKAlexander@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(36,'Keitha','Rodriquez','404-727-8923','KeithaJRodriquez@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(37,'Vanessa','Marshall','530-438-1343','VanessaDMarshall@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(38,'Joseph','Franklin','212-446-3120','JosephJFranklin@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(39,'Carrie','Gallegos','701-867-6896','CarrieOGallegos@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(40,'John','Brannon','304-203-9041','JohnLBrannon@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(41,'Sharon','Urban','210-258-0034','SharonPUrban@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(42,'Vanessa','Poole','610-699-3234','VanessaJPoole@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(43,'Kirk','Still','310-454-1935','KirkAStill@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(44,'Veronica','Snow','386-698-2267','VeronicaBSnow@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(45,'John','Madden','562-409-1885','JohnPMadden@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(46,'Michelle','Bellino','478-285-5014','MichelleJBellino@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(47,'Larry','Cannon','805-906-8223','LarryPCannon@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(48,'Cynthia','Castorena','402-813-5637','CynthiaBCastorena@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(49,'Natalie','Mason','803-368-0173','NatalieJMason@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(50,'John','Fields','580-401-0753','JohnPFields@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(51,'Robert','Ruiz','303-228-8629','RobertJRuiz@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(52,'Linda','Thompson','734-891-3135','LindaGThompson@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(53,'Tamera','Reid','608-678-6182','TameraSReid@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(54,'Jamie','Downey','630-873-2557','JamieCDowney@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(55,'Soledad','Kratz','303-245-6400','SoledadTKratz@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(56,'James','Molina','713-928-4079','JamesMMolina@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(57,'William','Mitchell','202-425-6867','WilliamAMitchell@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(58,'Amanda','Bryan','702-367-5890','AmandaABryan@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(59,'Kay','Vanleer','716-687-2323','KayRVanleer@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(60,'Mary','Haag','530-427-5995','MaryCHaag@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(61,'Joseph','Stam','701-317-6269','JosephBStam@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(62,'Jacob','Carson','303-434-1232','JacobDCarson@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(63,'James','Pyle','817-435-1164','JamesYPyle@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(64,'Betty','Berry','505-551-8447','BettyRBerry@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(65,'Robert','Andress','314-255-2345','RobertEAndress@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(66,'Susan','Pace','615-699-7696','SusanFPace@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(67,'Fred','Brownlee','830-452-0416','FredHBrownlee@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(68,'Robert','Roberts','253-304-8176','RobertVRoberts@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(69,'Jessica','Mazza','563-357-6707','JessicaJMazza@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(70,'Woodrow','Betty','201-244-5207','WoodrowFBetty@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(71,'Joan','Cushman','972-886-4144','JoanJCushman@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(72,'Allison','Borden','937-588-0052','AllisonDBorden@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(73,'Kelly','Croom','704-687-7239','KellyLCroom@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(74,'Mary','Reid','310-859-5822','MaryJReid@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(75,'James','Moorman','941-906-7043','JamesMMoorman@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(76,'Mike','Wu','214-632-2456','MikeMWu@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(77,'Patricia','Findley','352-215-0206','PatriciaDFindley@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(78,'Shirley','Miller','252-612-3009','ShirleyLMiller@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(79,'Melinda','Cruz','814-236-0548','MelindaMCruz@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(80,'Mark','Hathaway','443-308-1535','MarkTHathaway@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(81,'Bryant','Danley','815-403-5191','BryantTDanley@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(82,'Edelmira','Madrid','203-391-0072','EdelmiraKMadrid@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(83,'Will','Reyna','619-466-9712','WillFReyna@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(84,'Stephanie','Thomas','817-206-0933','StephanieDThomas@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(85,'Dawn','Salinas','479-787-5597','DawnJSalinas@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(86,'Diane','Alpert','812-635-2694','DianeGAlpert@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(87,'Charles','Mooney','706-452-2120','CharlesMMooney@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(88,'Daniel','Blanchard','510-591-0972','DanielDBlanchard@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(89,'Alma','Sipple','917-765-3440','AlmaDSipple@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(90,'Roxanna','Thompson','414-328-4542','RoxannaJThompson@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(91,'William','Adams','978-730-3019','WilliamMAdams@pookmail.com','08:00:00','13:00:00',NULL,NULL,19),(92,'Bert','Duckworth','757-499-8775','BertDDuckworth@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(93,'Christopher','Shreve','763-542-7571','ChristopherKShreve@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(94,'Denise','Roe','484-308-0281','DeniseJRoe@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(95,'Elmer','Griffin','770-338-5317','ElmerMGriffin@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(96,'Linda','Oconnell','701-709-4972','LindaWOconnell@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(97,'Andrew','Hinton','425-445-4902','AndrewJHinton@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(98,'Gary','Foster','601-629-0560','GaryLFoster@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(99,'Ramona','Chaffee','580-756-2978','RamonaAChaffee@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(100,'Robert','Lupo','805-698-3805','RobertJLupo@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(101,'John','Williams','781-421-8009','JohnDWilliams@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(102,'Ella','Gallagher','207-853-0163','EllaAGallagher@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(103,'Florence','Gurney','949-661-3877','FlorenceJGurney@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(104,'Justin','Bearden','617-365-7719','JustinSBearden@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(105,'Robert','Perez','520-797-6316','RobertJPerez@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(106,'Edward','Kirk','706-751-1375','EdwardJKirk@spambob.com','08:00:00','13:00:00',NULL,NULL,19),(107,'Joseph','Fitting','208-266-3497','JosephIFitting@dodgit.com','08:00:00','13:00:00',NULL,NULL,19),(108,'Vicky','Holder','774-222-6780','VickyWHolder@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(109,'John','Strauser','618-371-4770','JohnSStrauser@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(110,'George','Quinones','914-597-3620','GeorgeCQuinones@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(111,'Betty','Gilbert','323-956-8196','BettyDGilbert@mailinator.com','08:00:00','13:00:00',NULL,NULL,19),(112,'Shelia','Freeman','606-763-2242','SheliaSFreeman@trashymail.com','08:00:00','13:00:00',NULL,NULL,19),(113,'Lorena','Thomas','949-278-4105','LorenaJThomas@dodgit.com','08:00:00','13:00:00',NULL,NULL,19);
/*!40000 ALTER TABLE `Patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Queue`
--

DROP TABLE IF EXISTS `Queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Queue`
--

LOCK TABLES `Queue` WRITE;
/*!40000 ALTER TABLE `Queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `Queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreatmentTypes`
--

DROP TABLE IF EXISTS `TreatmentTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TreatmentTypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreatmentTypes`
--

LOCK TABLES `TreatmentTypes` WRITE;
/*!40000 ALTER TABLE `TreatmentTypes` DISABLE KEYS */;
INSERT INTO `TreatmentTypes` VALUES (1,'tuberculosis','tuberculosis medication'),(2,'chemotherapy','chemotherapy medication'),(3,'allergies','allergy shots'),(4,'cholesterol','cholesterol medication'),(5,'antibacterial','antibacterial medication');
/*!40000 ALTER TABLE `TreatmentTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Treatments`
--

DROP TABLE IF EXISTS `Treatments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Treatments`
--

LOCK TABLES `Treatments` WRITE;
/*!40000 ALTER TABLE `Treatments` DISABLE KEYS */;
INSERT INTO `Treatments` VALUES (5,'2012-03-07','2012-03-11',1,1,1,1),(6,'1000-01-01','9999-12-21',0,1,1,1),(7,'1000-01-01','9999-12-31',0,1,1,1),(8,'1000-01-01','9999-12-31',0,1,1,1),(9,'1000-01-01','9999-12-31',0,1,1,1),(10,'1000-01-01','9999-12-31',0,1,1,1),(11,'1000-01-01','9999-12-31',0,1,1,1),(12,'1000-01-01','9999-12-31',0,1,1,1),(13,'1000-01-01','9999-12-31',0,1,1,1),(14,'1000-01-01','9999-12-31',0,1,1,1),(15,'1000-01-01','9999-12-31',0,1,1,1),(16,'2012-03-01','2012-03-29',0,1,1,1),(17,'2012-03-05','2012-03-13',0,1,1,1),(18,'2000-11-30','2012-11-30',0,1,1,2),(19,'1000-01-01','2000-11-23',0,1,1,2),(20,'1000-01-01','9999-12-31',0,1,1,2),(21,'1000-01-01','9999-12-31',1,1,1,1),(22,'1000-01-01','9999-12-31',1,1,1,1),(23,'1000-01-01','9999-12-31',0,1,1,1),(24,'2012-03-01','2012-03-31',0,1,1,14),(25,'2012-03-01','2012-03-23',0,1,2,14),(26,'2012-03-01','2012-03-30',0,2,1,14),(27,'2012-03-01','2012-03-30',0,2,1,14);
/*!40000 ALTER TABLE `Treatments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL DEFAULT '1000-01-01',
  `endDate` date NOT NULL DEFAULT '9999-12-31',
  `repeatPeriod` int(11) NOT NULL,
  `repeatInterval` int(11) NOT NULL,
  `preferredTime` time NOT NULL,
  `preferredInitialTime` int(11) DEFAULT '120',
  `preferredWarnings` int(11) DEFAULT '2',
  `preferredWarningDelay` int(11) DEFAULT '60',
  `customMessage` text,
  `ownerId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,'2012-03-01','2012-03-31',1,1,'00:00:00',121,3,60,'Herp da derp.',3),(2,'2012-03-01','2012-03-09',0,10,'00:00:00',120,3,60,'',1),(3,'2012-03-01','2012-03-09',0,1,'12:00:00',120,3,60,'',10),(4,'0000-00-00','0000-00-00',0,1,'12:00:00',120,3,60,'',2),(5,'2012-03-01','2012-03-31',0,1,'12:00:00',120,3,60,'',14),(6,'0000-00-00','0000-00-00',0,1,'12:00:00',120,3,60,'',14),(7,'2012-03-01','2012-03-29',0,3,'12:00:00',120,3,60,'',14),(8,'2012-03-01','2012-03-30',1,2,'12:00:00',120,3,60,'',14);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-29 13:58:13
