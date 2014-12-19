DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ap_paterno` varchar(100) NOT NULL,
  `ap_materno` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `curp` varchar(100) DEFAULT NULL,
  `cedula` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `mnpio` int(11) NOT NULL,
  `colonia` int(11) NOT NULL,
  `direccion` text,
  `cp` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Campos_Unicos` (`username`,`rfc`,`curp`,`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Alejandro Fedle','Rueda','Jimenez','arueda','397d526cd4a521110d290ace72cc8ba4','RUJA780323','ruja','ruja','9611120913','alecz23@live.com',7,101,66,'MZ 12 Edif. 79 B','12836','2014-06-09','11:40:57'),(3,'Karelly Anahi','Ramirez','Velazquez','kramirez','7373293c5383dc5a690552ade0ae71a4','1','1','1','1','kramirez@live.com',1,1,1,'1','20000','2014-06-03','11:47:28'),(4,'Prueba','Prueba','','prueba','7373293c5383dc5a690552ade0ae71a4','','','','','alecz@live.com',7,101,66,'conocido','12836','2014-06-13','14:06:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-24 17:55:27
