<?php
include("initbdd.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food Fighter | Backoffice</title>
    <link rel="icon" type="img/1.png" href="img/1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee&family=DM+Sans:opsz,wght@9..40,300&family=Honk&family=Inter:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"><link rel="stylesheet" href="style.css">
  
</head>
<body>
<div class="nav">
    <div class="settings">
        <a href="backoffice.php">
        <img src="img/setting.png" width="50px" style="margin-right:20px">   
        </a>
<a href="backoffice_1.php">
        <img src="img/modify.png" width="50px" style="margin-right:20px">   
</a>
<a href="main-page.php">
<img src="img/home.png" width="50px" style="margin-right:20px">
</a>
</div>
    
  </div>

<h1 style="text-align: center; color: #ff99c8 ">Modify characters</h1>
<?php
echo "<h2 style='font-family: Poppins;'>There's " . Personnage::getCompteur() . " Fast food characters</h2>";
?>


<!-- MODIFIER PERSO PHP -->
<?php
if (isset($_POST["perso_edit"])) {
    $result = $manager->modifypersonnage();
    if ($result) {
        echo "okay";
    } else {
        echo "Error";
    }
}
?>

<?php
// ON REMET GET ALL PERSONNAGES POUR QUE LES INFO DES PERSO SOIT UPDATE A CHAQUE RECHARGEMENT DE PAGE
$personnages= $manager->getAllPersonnage();
foreach ($personnages as $perso) {
    //FORMULAIRE POUR MODIFIER CHAQUE PERSO
    echo '<div class="character_2">';
    echo "<p> Name: " . $perso->getName() . "</p>";
    echo "<p> Atk: " . $perso->getAtk() . "</p>";
    echo "<p> Pv: " . $perso->getPv() . "</p>";
    echo "<img src='" . $perso->getImage() . "' alt='" . $perso->getName() . "' width='150'>";
    echo '<form class="" method="POST">';
echo '<input type="text" value="' . $perso->getName() . '" name="name">';
echo '<input type="hidden" name="id" value="' . $perso->getId() . '">';
echo '<input type="text" value="' . $perso->getAtk() . '" name="atk">';
echo '<input type="text" value="' . $perso->getPv() . '" name="pv">';
echo '<input type="text" value="' . $perso->getImage() . '" name="img">';
echo '<button type="submit" name="perso_edit" value="Change">Change</button>';
echo '<button class="deleteTool" type="submit" name="delete"><img src="./img/delete.png" alt="" width="30"></button>';
echo '</form>';

    echo "</div>";

    
}

if (isset($_POST["delete"])) {
    $id = $_POST['id'];
    $result = $manager->deletepersonnage($id);
    if ($result) {
        echo "Deleted !";
    } else {
        echo "Error";
    }
}
?>
</body>
</html>