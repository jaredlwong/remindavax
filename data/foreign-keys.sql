ALTER TABLE `Queue` ADD COLUMN `prescriptionId` INT NOT NULL;
ALTER TABLE `Queue` ADD KEY `prescriptionId` (`prescriptionId`);
ALTER TABLE `Queue` ADD CONSTRAINT `prescriptionId` FOREIGN KEY (`prescriptionId`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `patientId` INT NOT NULL;
ALTER TABLE `Prescriptions` ADD KEY `patientId` (`patientId`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `patientId` FOREIGN KEY (`patientId`) REFERENCES `Patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `doctorId` INT NOT NULL;
ALTER TABLE `Patients` ADD KEY `doctorId` (`doctorId`);
ALTER TABLE `Patients` ADD CONSTRAINT `doctorId` FOREIGN KEY (`doctorId`) REFERENCES `Doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

UPDATE `Patients` SET doctorId = 1 WHERE doctorId = 0;