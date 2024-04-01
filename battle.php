<?php
include("initbdd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food Fighter</title>
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
<?php

session_start();
if(isset($_POST['perso_1'])){
    $_SESSION['perso_1']= $manager->getOnePersonnageById($_POST['perso_1']) ;

}

if(isset($_POST['perso_2'])){
    $_SESSION['perso_2']= $manager->getOnePersonnageById($_POST['perso_2']) ;

}

?>



<form class="attaque_button" method="post">
<button type="submit" name="fight" value="fight" class="pixel-corners">Fight</button>
</form>
<form class="overlayButton" method="post">
    <button id="overlayButtonRest" type="submit" name="regenerer" value="regenerer" class="pixel-corners">Regenerate</button>
</form>

<form class="overlayButton" method="post">
    <button type="submit" name="Exit" value="Exit" class="pixel-corners">Exit</button>
</form>


<?php

//fight

if (isset($_POST["fight"])){
    $_SESSION['perso_1']->attaquer($_SESSION['perso_2']);
    $_SESSION['perso_2']->attaquer($_SESSION['perso_1']);

     
}

//regener

if (isset($_POST["regenerer"])){
    $_SESSION['perso_1']->regenerer($_SESSION['perso_1']);
    $_SESSION['perso_2']->regenerer($_SESSION['perso_2']);

 

    }

//alive 

if ($_SESSION['perso_1']->is_alive() === "Il est mort") {
    echo "<script>alert('{$_SESSION['perso_1']->getName()} has beaten you!'); window.location.href = 'main-page.php';</script>";
    exit; 
} else if ($_SESSION['perso_2']->is_alive() === "Il est mort") {
    echo "<script>alert('{$_SESSION['perso_2']->getName()} has beaten you!'); window.location.href = 'main-page';</script>";
    exit; 
}



//exit

if(isset($_POST['Exit'])) {
    session_destroy();
    header("Location: main-page.php"); 
    
}

// mettre une div pour afficher les deux personnage 
?>
<div class="characters-container">
    <div class="character-info">
        <?php
        echo "<img src='" . $_SESSION['perso_2']->getImage() . "' width='150px'>";
        echo "<div class='info-text'>";
        echo "<p>PV: " . $_SESSION['perso_2']->getPv() . "</p>";
        echo "<p>ATK: " . $_SESSION['perso_2']->getAtk() . "</p>";
        echo "</div>";
        ?>
    </div>

    <div class="character-info">
        <?php
        echo "<img src='" . $_SESSION['perso_1']->getImage() . "' width='200px'>";
        echo "<div class='info-text'>";
        echo "<p>PV: " . $_SESSION['perso_1']->getPv() . "</p>";
        echo "<p>ATK: " . $_SESSION['perso_1']->getAtk() . "</p>";
        echo "</div>";
        ?>
    </div>
</div>

<style>
    /* Style des boutons */
.attaque_button,
.overlayButton {
    display: inline-block;
    margin-right: 10px; /* Ajoute un espacement entre les boutons */
    margin-top:10%;
}

.pixel-corners {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.pixel-corners:hover {
    background-color: #45a049;
}


</style>



</body>
</html>