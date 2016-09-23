<?php

  try
  {
    $output = shell_exec(`mysqldump --default-character-set=UTF8 --user=root --password=root gsb_frais > /var/www/GSBProject/scripts/backupDatabase.sql`);

    echo('Base de données correctement sauvegardée !');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

?>
