ALTER TABLE `Patients` ADD COLUMN `prescription_1` INT NOT NULL;
ALTER TABLE `Patients` ADD KEY `prescription_1` (`prescription_1`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_1` FOREIGN KEY (`prescription_1`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_2` INT;
ALTER TABLE `Patients` ADD KEY `prescription_2` (`prescription_2`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_2` FOREIGN KEY (`prescription_2`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_3` INT;
ALTER TABLE `Patients` ADD KEY `prescription_3` (`prescription_3`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_3` FOREIGN KEY (`prescription_3`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_4` INT;
ALTER TABLE `Patients` ADD KEY `prescription_4` (`prescription_4`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_4` FOREIGN KEY (`prescription_4`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_5` INT;
ALTER TABLE `Patients` ADD KEY `prescription_5` (`prescription_5`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_5` FOREIGN KEY (`prescription_5`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_6` INT;
ALTER TABLE `Patients` ADD KEY `prescription_6` (`prescription_6`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_6` FOREIGN KEY (`prescription_6`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_7` INT;
ALTER TABLE `Patients` ADD KEY `prescription_7` (`prescription_7`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_7` FOREIGN KEY (`prescription_7`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_8` INT;
ALTER TABLE `Patients` ADD KEY `prescription_8` (`prescription_8`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_8` FOREIGN KEY (`prescription_8`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_9` INT;
ALTER TABLE `Patients` ADD KEY `prescription_9` (`prescription_9`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_9` FOREIGN KEY (`prescription_9`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Patients` ADD COLUMN `prescription_10` INT;
ALTER TABLE `Patients` ADD KEY `prescription_10` (`prescription_10`);
ALTER TABLE `Patients` ADD CONSTRAINT `prescription_10` FOREIGN KEY (`prescription_10`) REFERENCES `Prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;