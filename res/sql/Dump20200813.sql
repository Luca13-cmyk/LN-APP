-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: lnapp
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `tb_calen`
--

LOCK TABLES `tb_calen` WRITE;
/*!40000 ALTER TABLE `tb_calen` DISABLE KEYS */;
INSERT INTO `tb_calen` VALUES (1,'Jan'),(2,'Feb'),(3,'Mar'),(4,'Apr'),(5,'May'),(6,'Jun'),(7,'Jul'),(8,'Aug'),(9,'Sep'),(10,'Oct'),(11,'Nov'),(12,'Dec');
/*!40000 ALTER TABLE `tb_calen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (11,'Luca Negrette','lucanegrette@hotmail.com',73988634088,'2020-02-26 17:24:16');
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (11,11,'luca13-cmyk','$2y$12$rKaQ/xZ.Lrz7/J6CKRkzsOc8UfXhbSjbZmm.rWbTgpHm1fW3.VLnu',1,'2020-02-26 17:25:15');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tb_visits`
--

LOCK TABLES `tb_visits` WRITE;
/*!40000 ALTER TABLE `tb_visits` DISABLE KEYS */;
INSERT INTO `tb_visits` VALUES (1,4,'390'),(2,1,'1'),(3,2,'1'),(4,3,'1'),(5,5,'1'),(6,6,'1'),(7,7,'106'),(8,8,'1'),(9,9,'1'),(10,10,'1'),(11,11,'1'),(12,12,'1');
/*!40000 ALTER TABLE `tb_visits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lnapp'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_userspasswordsrecoveries_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`luca13cmyk`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create`(
piduser INT,
pdesip VARCHAR(45)
)
BEGIN
  
  INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usersupdate_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`luca13cmyk`@`localhost` PROCEDURE `sp_usersupdate_save`(
piduser INT,
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT
)
BEGIN
  
    DECLARE vidperson INT;
    
  SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
    desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
  WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
    deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin
  WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_users_save` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`luca13cmyk`@`localhost` PROCEDURE `sp_users_save`(
pdesperson VARCHAR(64), 
pdeslogin VARCHAR(64), 
pdespassword VARCHAR(256), 
pdesemail VARCHAR(128), 
pnrphone BIGINT, 
pinadmin TINYINT
)
BEGIN
  
    DECLARE vidperson INT;
    
  INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_visits` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`luca13cmyk`@`localhost` PROCEDURE `sp_visits`(
pid_calen int, 
pqntd int
)
BEGIN
  
	DECLARE vidperson INT;

SELECT qntd INTO vidperson FROM tb_visits WHERE id_calen = pid_calen;

  UPDATE tb_visits 
	SET 
    qntd = vidperson+1
    WHERE id_calen = pid_calen;
    
    SELECT mon.month, vis.qntd
    FROM tb_calen mon, tb_visits vis
    WHERE mon.id = vis.id_calen;
    
    -- UPDATE tb_visits SET qntd = pqntd WHERE id_calen = 4; 

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-13 18:15:32
