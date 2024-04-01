<?php
include("initbdd.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee&family=DM+Sans:opsz,wght@9..40,300&family=Honk&family=Inter:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"><link rel="stylesheet" href="style.css">
  <title>Fast Food Fighter | home</title>
  <link rel="icon" type="img/1.png" href="img/1.png">

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
<a href="index.php">
<img src="img/home.png" width="50px" style="margin-right:20px">
</a>
</div>
    
  </div>
 <div class="index_text">
 <h1> Choose your culinary warrior </h1>

 </div> 
 <?php
echo "<p>There's  ". Personnage::getCompteur()." Fast food characters</p>";
?>
 <div class="container">
    <div class="character">
        <?php
        foreach($personnages as $perso) {
            
                echo '<div class="character_1">';
                echo '<img src="' . $perso->getImage() . '" alt="' . $perso->getName() . '" width="150px">';
                echo '<div class="info">';
                echo '<p>Name: ' . $perso->getName() . '</p>';
                echo '<p>PV: ' . $perso->getPv() . '</p>';
                echo '<p>ATK: ' . $perso->getAtk() . '</p>';
                echo'<br>';
                echo '</div>';
                echo '</div>';
            
            
        }
        ?>
    </div>

    <form id="battle_form" action="./battle.php" method="post">
        <label for="food_selected">Fast food 1 </label>
        <select class="homeInput" name="perso_1" id="food_selected">
            <option value="" disabled selected>Select your Character</option>
            <?php foreach ($personnages as $key => $value) {
                echo '<option value="' . $value->getId() . '">' . $value->getName() . '</option>';
            } ?>
        </select>



        <label for="food_selected_2">Fast food 2</label>
        <select class="homeInput" name="perso_2" id="food_selected_2">
            <option value="" disabled selected>Select your rival </option>
            <?php foreach ($personnages as $key => $value) {
                echo '<option value="' . $value->getId() . '">' . $value->getName() . '</option>';
            } ?>
        </select>

        <input type="submit" value="Battle">
    </form>
</div>



<div id="error_message" style="color: red; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>

<script>
    document.getElementById('battle_form').addEventListener('submit', function(event) {
        var perso_1_selected = document.getElementById('food_selected').value;
        var perso_2_selected = document.getElementById('food_selected_2').value;

        if (perso_1_selected === '') {
            document.getElementById('error_message').innerText = 'You forgot to select your character';
            event.preventDefault();
        } else if (perso_2_selected === '') {
            document.getElementById('error_message').innerText = 'You forgot to select your rival ';
            event.preventDefault(); 
        }
    });
</script>



</body>
</html>

