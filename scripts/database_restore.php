<?php

  try
  {
    $restore = shell_exec(`mysql --user=root --password=root < /var/www/GSBProject/scripts/backupDatabase.sql`);

    echo('Base de données correctement importée !');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

?>
