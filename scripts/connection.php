<?php

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb_frais', 'root', 'ArtemisLL');
  }
  catch (Exception $e)
  {
    die("Erreur : " . $e_>getMessage());
  }

?>
