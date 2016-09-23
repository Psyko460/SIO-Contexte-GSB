<?php

  include('connection.php');

  try
  {
    $output = shell_exec('mysqldump --opt --default-character-set=UTF8 --single-transaction --protocol=TCP -u --user=root --password='' --host=localhost gsb_frais > backupDatabase.sql');

    echo('Base de données correctement sauvegardée !');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>
