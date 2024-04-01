<?php
$db = new PDO('mysql:host=localhost;dbname=poo_sgbd;port=3306', 'root', '');

function chargerClasse($classe)
{
  require_once $classe . '.php'; 
}

spl_autoload_register('chargerClasse'); 
require("PersonnageManager.php");

$manager= new PersonnageManager($db);
$personnages= $manager->getAllPersonnage();

?>