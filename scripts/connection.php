<?php

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb_frais', 'root', '');
  }
  catch (Exception $e)
  {
    die("Erreur : " . $e_>getMessage());
  }
  
?>
