<?php
     $user = 'benjaminl';
     $password = 'benjaminl';
     $database_link = 'mysql:host=localhost;dbname=chant;charset=utf8';
   
   
   
   /************************************************ */
   
   try 
   {
     $bdd = new PDO(
       $database_link,
       $user,
       $password,
     );
   } catch (PDOException $e) 
   {
     die('Erreur:'. $e->getMessage());
     echo "Erreur mec !";
   }
   /********************************************** */
   
?>