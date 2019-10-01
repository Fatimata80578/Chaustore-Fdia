<?php 
require_once 'formchaustore.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link href="chausstore.css" rel=stylesheet type ="text/css">
<title>Chaustore couleurs</title>
</head>
<body>
<h1> Gestion des couleurs </h1>
<div> </div>
<h2>Ajouter une couleur </h2>
<form  class="gestioncool" method='post'>
<input type='text' name='new' placeholder='nouvelle couleur'> 
<input type='submit' name='new1' value='Ajouter'>
</form>
<h2> Couleurs existantes</h2>
<?php
if(isset($_POST['new1'])){
    $nom = htmlspecialchars($_POST['new']);
    $sql = "INSERT INTO color (name) VALUE('$nom')";
    mysqli_query($conn,$sql);
}
$couleur = "SELECT * FROM color";
$sendcolor = mysqli_query($conn,$couleur);
while($fullcolor= mysqli_fetch_assoc($sendcolor)){?>

    
    <div id='couleurs'> <?php echo $fullcolor['name']; ?>
    <form  class ="gestioncool" method='post'>
    <input type='text' name='formu' placeholder='nouveau nom'>
    <input type ='submit' name='formul<?php echo $fullcolor['id']; ?>' value='modifier'>
    <input type ='submit' name='formula<?php echo $fullcolor['id']; ?>' value='supprimer'>
    </form>
</div>  

<?php
if (isset($_POST['formula'.$fullcolor['id']])){
    header("location: delete.php?id=".$fullcolor['id']);
};
if (isset($_POST['formul'.$fullcolor['id']])){
    $newname = htmlspecialchars($_POST['formu']);
    $id = intval($fullcolor['id']);
    $changereq = "UPDATE color SET name = '$newname' where id = '$id'";
    mysqli_query($conn,$changereq);
    header("location: chausstorefd.php");
}
?>
<?php }; ?>
<?php

if (isset($_POST['formula'.$fullcolor['id']])){
    header("location: delete.php?id=".$fullcolor['id']);
};
      
?>
</body>
</html>
