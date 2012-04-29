ALTER TABLE schedules ADD sec  VARCHAR(255) DEFAULT '0' NOT NULL AFTER id;
ALTER TABLE schedules ADD min  VARCHAR(255) DEFAULT '0' NOT NULL AFTER sec;
ALTER TABLE schedules ADD hour VARCHAR(255) DEFAULT '0' NOT NULL AFTER min;
ALTER TABLE schedules ADD dom  VARCHAR(255) DEFAULT '0' NOT NULL AFTER hour;
ALTER TABLE schedules ADD mon  VARCHAR(255) DEFAULT '*' NOT NULL AFTER dom;
ALTER TABLE schedules ADD dow  VARCHAR(255) DEFAULT '*' NOT NULL AFTER mon;
ALTER TABLE Treatments ADD year VARCHAR(255) DEFAULT '*'          AFTER dow;
ALTER TABLE schedules DROP repeatPeriod; 
ALTER TABLE schedules DROP repeatInterval;

ALTER TABLE schedules CHANGE startDate begin DATE DEFAULT '1970-01-01' NOT NULL;
ALTER TABLE schedules CHANGE endDate end DATE DEFAULT '2099-12-31' NOT NULL;
ALTER TABLE schedules ADD xTreatment   TINYINT UNSIGNED DEFAULT 0          NOT NULL AFTER end;
ALTER TABLE schedules ADD xSummaryTime TIME             DEFAULT '07:00:00' NOT NULL AFTER xTreatment;
ALTER TABLE schedules ADD xMedTime     TIME             DEFAULT '12:00:00' NOT NULL AFTER xSummaryTime;
ALTER TABLE schedules ADD xTimesPerDay TINYINT UNSIGNED DEFAULT 1          NOT NULL AFTER xMedTime;
ALTER TABLE schedules ADD xTimeBetween TINYINT UNSIGNED DEFAULT 60         NOT NULL AFTER xTimesPerDay;
ALTER TABLE schedules ADD xEndTime     TIME             DEFAULT '00:00:00' NOT NULL AFTER xTimeBetween;
ALTER TABLE schedules ADD xBoolClosed  BOOLEAN          DEFAULT 1          NOT NULL AFTER xEndTime;
ALTER TABLE schedules ADD xMessage     TEXT                                         AFTER xBoolClosed;

ALTER TABLE schedules DROP preferredTime;
ALTER TABLE schedules DROP preferredInitialTime;
ALTER TABLE schedules DROP preferredWarnings;
ALTER TABLE schedules DROP preferredWarningDelay;
ALTER TABLE schedules DROP customMessage;

UPDATE Treatments SET begin='1970-01-01', end='2099-12-31';

ALTER TABLE Treatments DROP sec;
ALTER TABLE Treatments DROP min;
ALTER TABLE Treatments DROP hour;
ALTER TABLE Treatments DROP year;

