
CREATE TABLE IF NOT EXISTS `klasse` (
  `id` int(11 ) NOT NULL AUTO_INCREMENT,
  `navn` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `beskrivelse` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etternavn` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fornavn` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `klasse` int(11) NOT NULL,
  `mobil` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `www` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `epost` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `opprettet` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT fk_klasse FOREIGN KEY (klasse) REFERENCES klasse (id) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

SET foreign_key_checks = 0;

INSERT INTO klasse (navn, beskrivelse) VALUES ('1DT', 'Foerste Datateknikk');
INSERT INTO klasse (navn, beskrivelse) VALUES ('2DT', 'Andre Datateknikk');
INSERT INTO klasse (navn, beskrivelse) VALUES ('3DT', 'Tredje Datateknikk');

INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Pettersson', 'Peter', '1DT', '11223344', null, 'peter@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Olsen', 'Kurt', '2DT', '55667788', null, 'kurt@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Nordmann', 'Sonia', '3DT', '99002211', null, 'sonia@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Jordan', 'Michael', '2DT', '00223344', null, 'michael@gmail.com', null);
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('LeCorbusier', 'Frank', '2DT', '11667788', null, 'frank@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Sørmann', 'Lisa', '3DT', '77002211', null, 'lisa@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Testsson', 'test', '1DT', '66223344', null, 'test@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Olsen', 'Frode', '2DT', '22667788', null, 'frode@gmail.com', null);
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Vestmann', 'vest', '3DT', '99992211', null, 'vest@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Databasesson', 'Elias', '2DT', '55223344', null, 'elias@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Jensen', 'Omar', '1DT', '66667788', null, 'omar@gmail.com', NOW());
INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES ('Skogman', 'Rania', '3DT', '22442211', null, 'rania@gmail.com', NOW());

SET foreign_key_checks = 1;






