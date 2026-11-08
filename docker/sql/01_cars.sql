CREATE TABLE IF NOT EXISTS `cars` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `mileage` INT NOT NULL,
    `transmission` VARCHAR(50) NOT NULL,
    `seats` INT NOT NULL,
    `feature` VARCHAR(100) NOT NULL,
    `image` VARCHAR(500) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cars` (`title`, `price`, `mileage`, `transmission`, `seats`, `feature`, `image`)
VALUES ('Audi RS6 Avant 2022', 145.00, 14000, 'Automat', 5, 'Quattro 4x4',
        'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?auto=format&fit=crop&w=600&q=80'),
       ('Ford Explorer Platinum', 78.90, 28500, 'Automat', 7, '4x4 AWD',
        'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=600&q=80'),
       ('Porsche Panamera GTS', 165.00, 9200, 'Automat', 4, 'Sport Chrono',
        'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=600&q=80'),
       ('BMW M4', 119.00, 18400, 'Automat', 4, 'M-Packet',
        'https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=600&q=80'),
       ('BMW M4 Competition', 129.00, 6500, 'Automat', 4, 'Karbón paket',
        'https://images.unsplash.com/photo-1580273916550-e323be2ae537?auto=format&fit=crop&w=600&q=80'),
       ('McLaren 720S Coupé', 290.00, 3800, 'Automat', 2, '529 kW (720 k)',
        'https://images.unsplash.com/photo-1621615578530-cbf3c443165f?q=80&w=687&auto=format&fit=crop&w=600&q=80');