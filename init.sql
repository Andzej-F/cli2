--
-- 'registration' database creation script
--
CREATE DATABASE IF NOT EXISTS `cli2`;

use `cli2`;

--
-- Table structure for `patients`
--
CREATE TABLE `patients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET=utf8mb4;

-- 
-- Example data
-- 
INSERT INTO `patients` (`id`, `name`, `surname`, `email`, `phone`, `nid`, `date`, `time`) VALUES
(1, 'Avram', 'Joyce', 'ultrices@tinciduntor.ca', '51042702', '36756429', '2022-06-23', '08:30'),
(2, 'Magee', 'Barlow', 'nulla.Donec@eu.ca', '98924980', '3265665', '2022-06-15', '08:25'),
(3, 'Dillon', 'Little', 'ac.metus@euismod.co.uk', '47541006', '84624512', '2022-06-23', '14:02'),
(4, 'Allistair', 'Valenzuela', 'orci.augue@metusfacili.org', '25777687', '64783360', '2022-07-01', '15:50'),
(5, 'Herrod', 'Holmes', 'dolor.vitae@dolorsi.com', '40027272', '78092006', '2022-06-15', '09:20'),
(6, 'Mason', 'Knowles', 'aliquam.eros@aliqua.com', '26821799', '5715091', '2022-06-15', '09:40'),
(7, 'Theodore', 'Oneal', 'odio.Phasellus@dolor.net', '89646355', '52930288', '2022-06-16', '08:05'),
(8, 'Fulton', 'Payne', 'trices.iaculis@penatibus.com', '79577953', '95859948', '2022-06-16', '08:40'),
(9, 'Vincent', 'Franco', 'iscing.lacus@nonquam.com', '38813984', '13960355', '2022-06-16', '08:30'),
(10, 'Vance', 'Fulton', 'ipsum.dolor@antelect.org', '85451610', '29158213', '2022-06-16', '09:20'),
(11, 'Cain', 'Wall', 'dui.augue@fermentum.edu', '93323868', '94536008', '2022-06-23', '16:05'),
(12, 'Travis', 'Vang', 'vitae@egetlaoreet.org', '87939556', '45234433', '2022-09-12', '10:50'),
(13, 'Dustin', 'Barry', 'Quisque.ornare@ligu.co.uk', '95992020', '57487821', '2022-06-23', '09:10'),
(14, 'Mason', 'Harding', 'imperdiet.dictum@ociis.net', '75384955', '63362996', '2022-06-17', '08:04'),
(15, 'Lucian', 'Bartlett', 'nec@et.com', '7384019', '59734343', '2022-06-19', '10:15'),
(16, 'Lamar', 'Roy', 'a.arcu.Sed@id.co.uk', '34968500', '86411171', '2022-06-30', '08:45'),
(17, 'Julian', 'Greer', 'dimentum.Donec@ametris.net', '126654', '41406493', '2022-07-03', '10:55'),
(18, 'Sawyer', 'Orr', 'Fusce.feugiat@Aeneanmas.com', '35208019', '57308838', '2022-07-05', '11:10'),
(19, 'Jarrod', 'Burnett', 'velit.Pellentes@libero.co.uk', '94145883', '16812727', '2022-07-05', '11:40'),
(20, 'Lawrence', 'Yates', 'sed.est@purusgravid.edu', '84891191', '82294547', '2022-07-05', '14:50');

--
-- Table structure for `personnel`
--
CREATE TABLE `personnel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `med_id` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- Example data
-- 
INSERT INTO `personnel` (`id`, `med_id`) VALUES (1, 'med2022')



