<?php

  include('connection.php');

  try
  {
    $output = shell_exec("mysqldump --opt --default-character-set=UTF8 --single-transaction --protocol=TCP -u --user=root --host=localhost gsb_frais > /var/www/GSBProject/scripts/backupDatabase.sql");
    echo $output;

    echo("Base de données correctement sauvegardée !");
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>
