INSERT INTO `patients` (`name`, `surname`,`email`,`phone`,`nid`,`date`,`time`)
VALUES ("Avram", "Joyce","ultrices@tinciduntorciquis.ca","51042702","36756429","2022-06-23","08:30"),
("Magee", "Barlow","nulla.Donec@eu.ca","98924980","03265665","2022-06-15","08:25"),
("Dillon", "Little","ac.metus@euismod.co.uk","47541006","84624512","2022-06-23","14:02"),
("Allistair", "Valenzuela","orci.lobortis.augue@metusfacilisis.org","25777687","64783360","2022-07-01","15:50"),
("Herrod", "Holmes","dolor.vitae@dolorsitamet.com","40027272","78092006","2022-06-15","09:20"),
("Mason", "Knowles","vitae.aliquam.eros@aliquamenimnec.com","26821799","05715091","2022-06-15","09:40"),
("Theodore", "Oneal","odio.Phasellus@dolor.net","89646355","52930288","2022-06-16","08:05"),
("Fulton", "Payne","ultrices.iaculis.odio@penatibus.com","79577953","95859948","2022-06-16","08:40"),
("Vincent", "Franco","adipiscing.lacus.Ut@nonquam.com","38813984","13960355","2022-06-16","08:30"),
("Vance", "Fulton","ipsum.dolor@antelectus.org","85451610","29158213","2022-06-16","09:20");

INSERT INTO `patients` (`name`,`surname`,`email`,`phone`,`nid`,`date`,`time`) 
VALUES ("Cain", "Wall","dui.augue@fermentumfermentumarcu.edu","93323868","94536008","2022-06-23","16:05"),
("Travis", "Vang","vitae@egetlaoreet.org","87939556","45234433","2022-09-12","10:50"),
("Dustin","Barry","Quisque.ornare.tortor@ligulaconsectetuerrhoncus.co.uk","95992020","57487821","2022-06-23","09:10"),
("Mason", "Harding","imperdiet.dictum.magna@Cumsociis.net","75384955","63362996","2022-06-17","08:04"),
("Lucian","Bartlett","nec@et.com","07384019","59734343","2022-06-19","10:15"),
("Lamar", "Roy","a.arcu.Sed@id.co.uk","34968500","86411171","2022-06-30","08:45"),
("Julian","Greer","condimentum.Donec.at@ametrisus.net","00126654","41406493","2022-07-03","10:55"),
("Sawyer","Orr","Fusce.feugiat.Lorem@AeneanmassaInteger.com","35208019","57308838","202207-05","11:10"),
("Jarrod","Burnett","velit.Pellentesque@libero.co.uk","94145883","16812727","2022-07-05","11:40"),
("Lawrence","Yates","sed.est@purusgravidasagittis.edu","84891191","82294547","2022-07-05","14:50");



CREATE TABLE `personnel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `med_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

INSERT INTO `personnel`(`med_id`) VALUES ('med2022')