<?php
   include '../gsbMVC/include/class.pdogsb.inc.php';
   $pdo = PdoGsb::getPdoGsb();
   echo $pdo->cryptPasswordDbVisitors();
   echo $pdo->cryptPasswordDbComptable();
?>
