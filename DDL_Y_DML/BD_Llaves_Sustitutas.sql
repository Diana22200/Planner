CREATE DATABASE  IF NOT EXISTS `surrogate_keys` ;
USE `surrogate_keys`;

-- -----------------------------------------------------
-- Table `class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `class` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` INT NOT NULL,
  `subject` VARCHAR(60) NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
UNIQUE INDEX `uk_code_class` (`code` ASC) VISIBLE)
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `year`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `year` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `number_year` INT NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_num_year` (`number_year` ASC) VISIBLE)
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `activity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `activity` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` INT NOT NULL,
  `title` VARCHAR(40) NOT NULL,
  `description` VARCHAR(500) NULL DEFAULT NULL,
  `type` VARCHAR(10) NULL DEFAULT NULL,
  `deadline` DATE NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  `link` VARCHAR(500) NULL DEFAULT NULL,
  `classid` INT NOT NULL,
  `Yearid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_code_act` (`code` ASC) VISIBLE,
  INDEX `fk_class_acti` (`classid` ASC) VISIBLE,
  INDEX `fk_year_acti` (`Yearid` ASC) VISIBLE,
  CONSTRAINT `fk_class_acti`
    FOREIGN KEY (`classid`)
    REFERENCES `class` (`id`),
  CONSTRAINT `fk_year_acti`
    FOREIGN KEY (`Yearid`)
    REFERENCES `year` (`id`))
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `mode`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mode` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `modality` VARCHAR(15) NOT NULL,
  `session_time` VARCHAR(30) NOT NULL,
  `education_level` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_mode_course` (`modality` ASC, `session_time` ASC, `education_level` ASC) VISIBLE)
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` INT NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  `num_students` INT NULL DEFAULT NULL,
  `program_name` VARCHAR(60) NOT NULL,
  `trimestre` INT NOT NULL,
  `Modeid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_code_course` (`code` ASC) VISIBLE,
  INDEX `fk_cour_mode` (`Modeid` ASC) VISIBLE,
  CONSTRAINT `fk_cour_mode`
    FOREIGN KEY (`Modeid`)
    REFERENCES `mode` (`id`))
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `course_class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `course_class` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_class` INT NOT NULL,
  `id_course` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_course_class` (`id_class` ASC, `id_course` ASC) VISIBLE,
  INDEX `fk_cocl_cour` (`id_course` ASC) VISIBLE,
  CONSTRAINT `fk_cocl_cour`
    FOREIGN KEY (`id_course`)
    REFERENCES `course` (`id`),
  CONSTRAINT `fk_cour_class`
    FOREIGN KEY (`id_class`)
    REFERENCES `class` (`id`))
ENGINE = InnoDB

;



-- -----------------------------------------------------
-- Table `document`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `document` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acronym_doc` VARCHAR(10) NOT NULL,
  `name` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_acronym_doc` (`acronym_doc` ASC) VISIBLE,
  UNIQUE INDEX `uk_name_doc` (`name` ASC) VISIBLE)
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `message` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(500) NOT NULL,
  `shipping_date` TIMESTAMP NOT NULL,
  `title` VARCHAR(40) NOT NULL,
  `code` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_code_msg` (`code` ASC) VISIBLE)
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_type_role` (`type` ASC) VISIBLE)
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `num_doc` INT NOT NULL,
  `documentid` INT NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  `names` VARCHAR(60) NOT NULL,
  `surname` VARCHAR(60) NOT NULL,
  `url_prof_pic` VARCHAR(500) NULL DEFAULT NULL,
  `email` VARCHAR(40) NOT NULL,
  `password` VARCHAR(16) NOT NULL,
  `Roleid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_ema_user` (`email` ASC) VISIBLE,
  UNIQUE INDEX `uk_doc_user` (`num_doc` ASC, `documentid` ASC) VISIBLE,
  INDEX `fk_user_role` (`Roleid` ASC) VISIBLE,
  CONSTRAINT `fk_docu_user`
    FOREIGN KEY (`documentid`)
    REFERENCES `document` (`id`),
  CONSTRAINT `fk_user_role`
    FOREIGN KEY (`Roleid`)
    REFERENCES `role` (`id`))
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `qualification`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `qualification` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `score` INT NULL DEFAULT NULL,
  `Userid` INT NOT NULL,
  `Activityid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_score_user` (`Activityid` ASC, `Userid` ASC) VISIBLE,
  INDEX `fk_user_qual` (`Userid` ASC) VISIBLE,
  CONSTRAINT `fk_qual_acti`
    FOREIGN KEY (`Activityid`)
    REFERENCES `activity` (`id`),
  CONSTRAINT `fk_user_qual`
    FOREIGN KEY (`Userid`)
    REFERENCES `user` (`id`))
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `situation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `situation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(10) NOT NULL,
  `messageid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_situation` (`messageid` ASC, `name` ASC) VISIBLE,
  CONSTRAINT `fk_mess_situ`
    FOREIGN KEY (`messageid`)
    REFERENCES `message` (`id`))
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `user_class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_class` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Userid` INT NOT NULL,
  `classid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_user_class` (`Userid` ASC, `classid` ASC) VISIBLE,
  INDEX `fk_uscl_role` (`classid` ASC) VISIBLE,
  CONSTRAINT `fk_uscl_role`
    FOREIGN KEY (`classid`)
    REFERENCES `class` (`id`),
  CONSTRAINT `fk_user_uscl`
    FOREIGN KEY (`Userid`)
    REFERENCES `user` (`id`))
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `user_course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Userid` INT NOT NULL,
  `Courseid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_user_course` (`Userid` ASC, `Courseid` ASC) VISIBLE,
  INDEX `fk_usco_cour` (`Courseid` ASC) VISIBLE,
  CONSTRAINT `fk_usco_cour`
    FOREIGN KEY (`Courseid`)
    REFERENCES `course` (`id`),
  CONSTRAINT `fk_user_usco`
    FOREIGN KEY (`Userid`)
    REFERENCES `user` (`id`))
ENGINE = InnoDB

;


-- -----------------------------------------------------
-- Table `user_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_message` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Userid` INT NOT NULL,
  `messageid` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uk_user_message` (`Userid` ASC, `messageid` ASC) VISIBLE,
  INDEX `fk_mess_usme` (`messageid` ASC) VISIBLE,
  CONSTRAINT `fk_mess_usme`
    FOREIGN KEY (`messageid`)
    REFERENCES `message` (`id`),
  CONSTRAINT `fk_user_usme`
    FOREIGN KEY (`Userid`)
    REFERENCES `user` (`id`))
ENGINE = InnoDB
;




-- -----------------------------------------------------
-- INSERT INTO `document`
-- -----------------------------------------------------
INSERT INTO document(`id`, `acronym_doc`, `name`)
values(0,'TI','Tarjeta de identidad');
INSERT INTO document(`id`, `acronym_doc`, `name`)
values(0,'CC','Cedula de Ciudadanía');
INSERT INTO document(`id`, `acronym_doc`, `name`)
values(0,'Pas','Pasaporte');
INSERT INTO document(`id`, `acronym_doc`, `name`)
values(0,'DNI','Documento Nacional de Identificación');
INSERT INTO document(`id`, `acronym_doc`, `name`)
values(0,'NIT','Número de Identificación Tributaria');
-- -----------------------------------------------------
-- INSERT INTO `year`
-- -----------------------------------------------------
INSERT INTO `year`(`id`, `number_year`, `status`)
values(0,'2018','inactivo');
INSERT INTO `year`(`id`, `number_year`, `status`)
values(0,'2019','inactivo');
INSERT INTO `year`(`id`, `number_year`, `status`)
values(0,'2020','inactivo');
INSERT INTO `year`(`id`, `number_year`, `status`)
values(0,'2021','activo');
INSERT INTO `year`(`id`, `number_year`, `status`)
values(0,'2022','inactivo');
-- -----------------------------------------------------
-- INSERT INTO `message`
-- -----------------------------------------------------
INSERT INTO `message`(`id`, `text`, `shipping_date`, `title`, `code`)
values(0,'Mi nombre es incorrecto',0,'CAMBIO DE DATOS','34567');
INSERT INTO `message`(`id`, `text`, `shipping_date`, `title`, `code`)
values(0,'¿A cuál nombre desea cambiar?',0,'CAMBIO DE NOMBRE','12345');
INSERT INTO `message`(`id`, `text`, `shipping_date`, `title`, `code`)
values(0,'Quiero actualizar mi tipo de documento, pues ahora soy mayor de edad.',0,'ACTUALIZACIÓN INFO','23456');
INSERT INTO `message`(`id`, `text`, `shipping_date`, `title`, `code`)
values(0,'Presento problemas para utilizar la plataforma, no puedo acceder al link de la actividad',0,'AYUDA PLATAFORMA','45678');
INSERT INTO `message`(`id`, `text`, `shipping_date`, `title`, `code`)
values(0,'Mi correo es incorrecto',0,'CAMBIO DE CORREO','91011');
-- -----------------------------------------------------
-- INSERT INTO `Mode`
-- -----------------------------------------------------
INSERT INTO `mode`(`id`, `modality`, `session_time`, `education_level`)
values(0,'Presencial','Diurna','Técnico');
INSERT INTO `mode`(`id`, `modality`, `session_time`, `education_level`)
values(0,'Virtual','Mañana','Tecnólogo');
INSERT INTO `mode`(`id`, `modality`, `session_time`, `education_level`)
values(0,'Virtual','Tarde','Curso corto');
INSERT INTO `mode`(`id`, `modality`, `session_time`, `education_level`)
values(0,'Presencial','Nocturna','Técnico');
INSERT INTO `mode`(`id`, `modality`, `session_time`, `education_level`)
values(0,'Presencial','Tarde','Curso corto');
INSERT INTO `mode`(`id`, `modality`, `session_time`, `education_level`)
values(0,'Presencial','Diurna','Tecnólogo');
-- -----------------------------------------------------
-- INSERT INTO `Class`
-- -----------------------------------------------------
INSERT INTO `class`(`id`, `code`, `subject`, `status`)
values(0,'9283','Promover','Activo');
INSERT INTO `class`(`id`, `code`, `subject`, `status`)
values(0,'2342','Ejercer derechos del trabajo','Inactivo');
INSERT INTO `class`(`id`, `code`, `subject`, `status`)
values(0,'6433','bilingüismo','Activo');
INSERT INTO `class`(`id`, `code`, `subject`, `status`)
values(0,'9543','ADSI','Activo');
INSERT INTO `class`(`id`, `code`, `subject`, `status`)
values(0,'8324','Educación Física','Inactivo');
-- -----------------------------------------------------
-- INSERT INTO `Role`
-- -----------------------------------------------------
INSERT INTO `role`(`id`, `type`)
values(0,'Administrador');
INSERT INTO `role`(`id`, `type`)
values(0,'Aprendiz');
INSERT INTO `role`(`id`, `type`)
values(0,'Instructor');  
-- -----------------------------------------------------
-- INSERT INTO `user`
-- -----------------------------------------------------
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1001348758',1,'Activo','Stephanny Diana Alejandra','Guevara Bocanegra',
'https://postimg.cc/fVz37wjq',
'sdguevara85@misena.edu.co','*sjshdafiwu',1);
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1012346253','1','Activo','Heidy Natalia','Pinto Peña',
'https://i.postimg.cc/HkmDff2W/Whats-App-Image-2021-05-19-at-10-37-46-PM.jpg',
'hnpinto3@misena.edu.co','*Najkjskjas','3');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1013099805','1','Activo','Anyi Stefania','Becerra Martinez',
'https://i.postimg.cc/W1nqZ1g9/ad2cd732-f521-4acd-8993-3e87ade1e27f.jpg',
'asbecerra5@misena.edu.co','Asfjhfj','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1001044333','2','Activo','Cristian Camilo','Garcia Garcia',
'https://i.postimg.cc/tg4ZNGz9/Cristian-chikito.jpg',
'ccgarcia333@misena.edu.co','Ccuishdai','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1000131959','1','Inactivo','Andrés Camilo','Hernández Guerrero',
'https://i.postimg.cc/P5h8Nwpp/andres.jpg',
'achernandez959@misena.edu.co','*Askhdu','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1030520171','1','Activo','Anderson Camilo','Jimenez Villareal',
'https://i.pinimg.com/564x/67/74/c6/6774c61b2a00008f1f82b364b4bc6be1.jpg',
'acjimenez171@misena.edu.co','id032jsui','3');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1000161919','1','Activo','William Alejandro','Bermudez Quiroga',
'https://i.pinimg.com/564x/06/e1/44/06e1441cb163c317889e3ef45a62cefd.jpg',
'wabermudez91@misena.edu.co','jhsj234243','3');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1014176695','1','Activo','Juan Camilo','Rojas Rojas',
'https://i.pinimg.com/564x/c1/ef/13/c1ef13e75a7e91015ae1479e25cf5113.jpg',
'jcrojas596@misena.edu.co','aaaai823h3','3');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1003000638','2','Activo','Elizabeth Esther','Gonzalez velasquez',
'https://i.pinimg.com/564x/06/19/f4/0619f4140977610d3da52d0fe2afc70f.jpg',
'eegonzalez83@misena.edu.co','EEGV100ksdjue','3');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1000604423','1','Activo','Johan Styven','Castro Forero',
'https://i.pinimg.com/564x/e6/0d/21/e60d217d1fe700d20141056a699336f2.jpg',
'jscastro324@misena.edu.co','sjhajsksi7','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1013096053','1','Activo','Camilo Andrés','Galindo Rivera',
'https://i.pinimg.com/564x/93/1b/92/931b92942c5f7f96c7452ed3228d0e9f.jpg',
'cagalindo35@misena.edu.co','jhuiehw','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1006094577','2','Activo','Luis Fernando','Perdomo Enciso',
'https://i.pinimg.com/564x/f6/2a/81/f62a817bb27218ad3b8d191dd1ea03a7.jpg',
'lfperdomo77@misena.edu.co','sadhjhnew','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1000708656','1','Activo','Juan David','Mercado Torres',
'https://i.pinimg.com/564x/5f/56/96/5f5696074cfdd50e6ed7ac411c136cf3.jpg',
'jdmercado656@misena.edu.co','juishiew','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1025140590','1','Activo','BRAYAN STEVEN','HORTA QUEVEDO',
'https://i.pinimg.com/564x/6b/9a/66/6b9a66332552988dc43e1f78e020e779.jpg',
'bshorta0@misena.edu.co','Nhafhsdj','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1001049702','2','Activo','IRIS DAYANA','ACOSTA MONCADA',
'https://i.pinimg.com/564x/74/f0/69/74f069fee2dbd50ef41c71cd3fd7c5ae.jpg',
'idacosta20@misena.edu.co','Sdfxfjv','2');
INSERT INTO `user`(`id`, `num_doc`, `documentid`, `status`, `names`, `surname`, `url_prof_pic`, `email`, `password`,`Roleid`)
values(0,'1001174023','2','Activo','JUAN CARLOS','GUERRERO ARANZAZU',
'https://i.pinimg.com/564x/52/8f/76/528f767cbdfd82a50257712e569a44c5.jpg',
'jcguerrero3204@misena.edu.co','Ijsfbs','2');
-- -----------------------------------------------------
-- INSERT INTO `user_message`
-- -----------------------------------------------------
INSERT INTO user_message(`id`, `Userid`,  `messageid`)
values(0,'3','1');
INSERT INTO user_message(`id`, `Userid`,  `messageid`)
values(0,'1','2');
INSERT INTO user_message(`id`, `Userid`,  `messageid`)
values(0,'4','4');
INSERT INTO user_message(`id`, `Userid`,  `messageid`)
values(0,'2','5');
INSERT INTO user_message(`id`, `Userid`,  `messageid`)
values(0,'5','3');
INSERT INTO user_message(`id`, `Userid`,  `messageid`)
values(0,'1','3');
-- -----------------------------------------------------
-- INSERT INTO `course`
-- -----------------------------------------------------
INSERT INTO `course`(`id`, `code`, `status`, `num_students`, `program_name`, `trimestre`, `Modeid`)
values(0,'2251585','activo','31','Análisis y Desarrollo de Sistemas de Información','2','6');
INSERT INTO course(id, code, status, num_students, program_name, trimestre, Modeid)
values(0,'2049893','activo','32','Electricidad Industrial','5','6');
INSERT INTO course(id, code, status, num_students, program_name, trimestre, Modeid)
values(0,'2141398','activo','35','gestion de redes de datos','3','4');
INSERT INTO course(id, code, status, num_students, program_name, trimestre, Modeid)
values(0,'2022661','activo','30','instalacion de redes internas de telecomunicaciones','4','4');
INSERT INTO course(id, code, status, num_students, program_name, trimestre, Modeid)
values(0,'1964769','activo','29','Mantenimiento de Equipos Electrónicos de Audio y Video','3','6');
-- -----------------------------------------------------
-- INSERT INTO `activity`
-- -----------------------------------------------------
INSERT INTO `activity`(`id`, `code`, `title`, `description`, `type`, `deadline`, `status`, `link`, `classid`, `Yearid`)
values(0,'2201','Llaves naturales','hacer el código SQL de este diseño que está usando solo llaves naturales',
'Tarea','2021-07-06','activo','https://classroom.google.com/u/3/c/Mjg5MDMwMTkyMjgy/a/Mjg5OTE5NjE0NTA2/details','4','4');
INSERT INTO `activity`(`id`, `code`, `title`, `description`, `type`, `deadline`, `status`, `link`, `classid`, `Yearid`)
values(0,'2202','Llaves surrogates','hacer el código SQL de este diseño que está usando solo llaves surrogates',
'Tarea','2021-07-06','activo','https://classroom.google.com/u/3/c/Mjg5MDMwMTkyMjgy/a/MjkwMzEzNjgwODA0/details','4','4');
INSERT INTO `activity`(`id`, `code`, `title`, `description`, `type`, `deadline`, `status`, `link`, `classid`, `Yearid`)
values(0,'2203','Guías de DML y DDL','Realizar las sentencias DDL del proyecto a partir del modelo entidad relación ysentencias DML del proyecto para agregar la información.',
'Tarea','2021-06-14','activo','https://classroom.google.com/u/1/c/Mjg5MDMwMTkyMjgy/a/MjkwMzEzNjgwOTcx/details','4','4');
INSERT INTO `activity`(`id`, `code`, `title`, `description`, `type`, `deadline`, `status`, `link`, `classid`, `Yearid`)
values(0,'2204','Actividad definiciones','Vizualice el siguiente video relacionando el tema con su proyecto formativo',
'Tarea','2021-05-14','inactivo','https://www.napofilm.net/es/napos-films/films?page=2&view_mode=page_grid','1','4');
INSERT INTO `activity`(`id`, `code`, `title`, `description`, `type`, `deadline`, `status`, `link`, `classid`, `Yearid`)
values(0,'2205','Tell me the most important dates','You need to record your voice, and tell me the most important dates in Colombia. Submit in here the activity.',
'Activity','2021-05-18','inactivo','https://classroom.google.com/u/1/c/Mjg5NDA4MjYzMTQ3/a/MjkwNTIwNjUyNDQ5/details','3','4');
-- -----------------------------------------------------
-- INSERT INTO `course_class`
-- -----------------------------------------------------
INSERT INTO `course_class`(`id`, `id_class`, `id_course`)
values(0,'4','1');
INSERT INTO `course_class`(`id`, `id_class`, `id_course`)
values(0,'1','2');
INSERT INTO `course_class`(`id`, `id_class`, `id_course`)
values(0,'2','3');
INSERT INTO `course_class`(`id`, `id_class`, `id_course`)
values(0,'3','4');
INSERT INTO `course_class`(`id`, `id_class`, `id_course`)
values(0,'5','5');
-- -----------------------------------------------------
-- INSERT INTO `user_class`
-- -----------------------------------------------------
/*Aquí solo van profesores*/
INSERT INTO `user_class`(`id`, `Userid`, `classid`)
values(0,'2','4');
INSERT INTO `user_class`(`id`, `Userid`, `classid`)
values(0,'6','1');
INSERT INTO `user_class`(`id`, `Userid`, `classid`)
values(0,'7','2');
INSERT INTO `user_class`(`id`, `Userid`, `classid`)
values(0,'8','3');
INSERT INTO `user_class`(`id`, `Userid`, `classid`)
values(0,'9','5');
-- -----------------------------------------------------
-- INSERT INTO `user_course`
-- -----------------------------------------------------
/*Aquí solo van estudiantes*/
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'3','1');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'4','1');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'10','2');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'11','3');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'12','4');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'13','5');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'14','2');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'15','3');
INSERT INTO `user_course`(`id`, `Userid`, `Courseid`)
values(0,'16','4');

-- -----------------------------------------------------
-- INSERT INTO `qualification`
-- -----------------------------------------------------
INSERT INTO `qualification`(`id`, `score`, `Userid`, `Activityid`)
values(0,'50','3','2');
INSERT INTO `qualification`(`id`, `score`, `Userid`, `Activityid`)
values(0,'35','4','1');
INSERT INTO `qualification`(`id`, `score`, `Userid`, `Activityid`)
values(0,'38','3','1');
INSERT INTO `qualification`(`id`, `score`, `Userid`, `Activityid`)
values(0,'45','4','2');
INSERT INTO `qualification`(`id`, `score`, `Userid`, `Activityid`)
values(0,'20','12','5');
-- -----------------------------------------------------
-- INSERT INTO `situation`
-- -----------------------------------------------------
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Enviado','3');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Recibido','3');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Enviado','2');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Recibido','2');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Enviado','1');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Recibido','1');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Enviado','4');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Recibido','4');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Enviado','5');
INSERT INTO `situation`(`id`, `name`, `messageid` )
values(0,'Recibido','5');


/*Este join se ha realizado para la parte de iniciar sesión*/


SELECT user.id, document.id, acronym_doc, num_doc, password FROM  user
INNER JOIN  document on document.id = user.id;


/*Este join se ha realizado para la parte de registrarse*/


SELECT user.id, document.id, names, surname, user.Roleid, acronym_doc, email, password FROM user
INNER JOIN  document ON document.id = user.id;


/*Este join se ha hecho para la parte de Clases, saber el nombre del profesor y la materia*/


SELECT user.id, user_class.id, class.id, names, surname, class.subject FROM user
INNER JOIN user_class ON  user_class.id = user.id 
INNER JOIN class ON class.id = user.id;


/*Este join se ha hecho para la parte de los cronogramas*/


SELECT user.id, activity.id, class.id, qualification.id, type, activity.title, activity.deadline, activity.status, subject, qualification.score, year.id, year.number_year FROM class
INNER JOIN user ON user.id = class.id
INNER JOIN activity ON activity.id = class.id 
INNER JOIN qualification ON qualification.id = class.id  
INNER JOIN year ON year.id = class.id;


/*Este join se ha hecho para la parte en la que se pueden ver los mensajes enviados*/


SELECT user.id, user_message.id, message.id, user.names, user.surname, user.email, message.title, message.text FROM user
INNER JOIN user_message ON user_message.id = user.id 
INNER JOIN message ON message.id = user.id;


/*Este join se ha hecho para la parte de perfil estudiante*/


SELECT user.id, document.id, class.id, user_class.id, course.id, user_course.id, course.trimestre, mode.id, class.subject, names, surname, email, mode.session_time, mode.education_level, mode.modality, course.program_name, num_doc, acronym_doc FROM user
INNER JOIN user_class ON user_class.id = user.id
INNER JOIN class ON class.id = user.id
INNER JOIN user_course ON user_course.id = user.id
INNER JOIN course ON course.id = user.id
INNER JOIN mode ON mode.id = user.id
INNER JOIN document ON document.id = user.id;


/*Este join se ha hecho para la parte de perfil de profesor*/


SELECT user.id, user_class.id, class.id, document.id, names, surname, email, class.subject, num_doc, document.id, acronym_doc FROM user
INNER JOIN user_class ON user_class.id = user.id
INNER JOIN class ON class.id = user.id
INNER JOIN document ON document.id = user.id;


/*Este join se ha hecho para saber si el usuario asociado a la clase el aprendiz o instructor*/


SELECT user.id, user_class.id, class.id, role.id, user.names, user.surname, role.type, class.code, class.subject FROM user
INNER JOIN user_class ON user_class.id = user.id
INNER JOIN class ON class.id = user.id
INNER JOIN role ON role.id = user.id;


/*Este join se ha hecho para la parte de bandeja de entrada de los mensajes*/


SELECT user.id, user_message.id, message.id, situation.id, message.shipping_date, message.title, names, surname FROM user
INNER JOIN user_message ON user_message.id = user.id
INNER JOIN message ON message.id = user.id
INNER JOIN situation ON situation.id = user.id;


/*Este join se ha hecho para la parte de enviar mensaje*/


SELECT user.id, user_message.id, message.id, situation.id, user.num_doc, user.names, user.names, user.surname, user.url_prof_pic, user.email, user.password, situation.name, message.text, message.shipping_date, message.title, message.code,  user.email FROM user
INNER JOIN user_message ON user_message.id = user.id
INNER JOIN message ON message.id = user.id
INNER JOIN situation ON situation.id = user.id;