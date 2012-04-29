ALTER TABLE `Prescriptions` ADD COLUMN `dose_1` INT NOT NULL;
ALTER TABLE `Prescriptions` ADD KEY `dose_1` (`dose_1`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_1` FOREIGN KEY (`dose_1`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_2` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_2` (`dose_2`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_2` FOREIGN KEY (`dose_2`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_3` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_3` (`dose_3`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_3` FOREIGN KEY (`dose_3`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_4` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_4` (`dose_4`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_4` FOREIGN KEY (`dose_4`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_5` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_5` (`dose_5`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_5` FOREIGN KEY (`dose_5`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_6` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_6` (`dose_6`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_6` FOREIGN KEY (`dose_6`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_7` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_7` (`dose_7`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_7` FOREIGN KEY (`dose_7`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_8` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_8` (`dose_8`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_8` FOREIGN KEY (`dose_8`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_9` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_9` (`dose_9`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_9` FOREIGN KEY (`dose_9`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Prescriptions` ADD COLUMN `dose_10` INT;
ALTER TABLE `Prescriptions` ADD KEY `dose_10` (`dose_10`);
ALTER TABLE `Prescriptions` ADD CONSTRAINT `dose_10` FOREIGN KEY (`dose_10`) REFERENCES `Doses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
