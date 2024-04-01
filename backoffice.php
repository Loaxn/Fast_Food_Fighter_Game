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

<?php
    if (isset($_POST["create_perso"])) {
        $res = $manager->addPersonnage();
        if ($res) {
            header("Location: main-page.php");
            exit(); 
        } else {
            echo "Error";
        }
    }
    
?>

<h1 style="text-align:center;color: #ff99c8">Fast Food Fighter | Backoffice</h1>
<?php
echo "<h2 style='font-family:Poppins'>There's  ". Personnage::getCompteur()." Fast food characters</h2>";
?>
<form action="backoffice.php" method="post">
<h3 style='font-family:bungee; color:#3a0ca3'>Create a new character</h3>

    <label for="nom">Name:</label><br>
    <input type="text" id="nom" name="name"><br>
    
    <label for="pv">PV:</label><br>
    <input type="number" id="pv" name="pv"><br>
    
    <label for="atk">ATK:</label><br>
    <input type="number" id="atk" name="atk"><br>
    
    <label for="image">Image:</label><br>
    <input type="text" id="image" name="img"><br>

    <input type="submit" value="Create" name="create_perso">
</form>

<style>
    /* Style pour le formulaire */
    form {
        max-width: 400px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; 
    }

    /* Style pour le bouton */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Style pour le bouton au survol */
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>



</body>
</html>