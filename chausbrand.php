<?php 
require_once 'formchaustore.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link href="chausstore.css" rel=stylesheet type ="text/css">
<title>Chaustore marques</title>
</head>
<body>
<h1> Gestion des marques </h1>
<div> </div>
<h2>Ajouter une marque </h2>
<form  class="gestioncool" method='post'>
<input type='text' name='new' placeholder='nouveau brand'> 
<input type='submit' name='new1' value='Ajouter'>
</form>
<h2> Marques existantes</h2>
<?php
if(isset($_POST['new1'])){
    $nom = htmlspecialchars($_POST['new']);
    $sql = "INSERT INTO brand (name) VALUE('$nom')";
    mysqli_query($conn,$sql);
}
$bran = "SELECT * FROM brand";
$sendbrand = mysqli_query($conn,$bran);
while($fullmarque= mysqli_fetch_assoc($sendbrand)){?>

    
    <div id='marques'> <?php echo $fullmarque['name']; ?>
    <form  class ="gestioncool" method='post'>
    <input type='text' name='marq' placeholder='nouveau nom'>
    <input type ='submit' name='marqu<?php echo $fullmarque['id']; ?>' value='modifier'>
    <input type ='submit' name='marque<?php echo $fullmarque['id']; ?>' value='supprimer'>
    </form>
</div>  

<?php
if (isset($_POST['marque'.$fullmarque['id']])){
    header("location: chausbrand2.php?id=".$fullmarque['id']);
};
if (isset($_POST['marqu'.$fullmarque['id']])){
    $newname = htmlspecialchars($_POST['marqu']);
    $id = intval($fullmarque['id']);
    $changereq = "UPDATE brand SET name = '$newname' where id = '$id'";
    mysqli_query($conn,$changereq);
    header("location: chausbrand.php");
}
?>
<?php }; ?>
<?php

if (isset($_POST['marque'.$fullmarque['id']])){
    header("location:chausbrand2.php?id=".$fullmarque['id']);
};


        
?>

</body>
</html>