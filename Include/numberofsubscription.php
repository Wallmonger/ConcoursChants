<?php
    include('db.php');
    $etatCheckNumber = $bdd->prepare(
        "SELECT COUNT(*) FROM `participation` WHERE 1"
    );

  $etatCheckNumber->execute();
  $resultNumber = $etatCheckNumber->fetchAll();
  $result = $resultNumber[0][0];

  echo $result;
?>