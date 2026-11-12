CREATE TABLE IF NOT EXISTS `reservations` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `car` INT NOT NULL,
    `customer` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(50) NOT NULL,
    `date` DATE NOT NULL,
    `days` INT NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    CONSTRAINT `fk_reservations_car`
    FOREIGN KEY (`car`) REFERENCES `cars` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `reservations` (`car`, `customer`, `email`, `phone`, `date`, `days`, `status`)
VALUES (1, 'Martin Kováč', 'martin.kovac@example.com', '+421 905 123 456', '2026-11-15', 3, 'Potvrdená'),
       (3, 'Jana Nováková', 'jana.novakova@example.com', '+421 911 987 654', '2026-11-20', 5, 'Čaká na schválenie'),
       (5, 'Peter Horváth', 'peter.horvath@example.com', '+421 948 555 222', '2026-12-01', 2, 'Potvrdená');
