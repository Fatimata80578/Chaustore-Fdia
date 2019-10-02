<?php 
require_once 'formchaustore.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link href="chausstore.css" rel=stylesheet type ="text/css">
<title>Chaustore catégories</title>
</head>
<body>
<h1> Gestion des catégories </h1>
<div> </div>
<h2>Ajouter une catégorie </h2>
<form  class="gestioncool" method='post'>
<input type='text' name='new' placeholder='nouvelle categorie'> 
<input type='submit' name='new1' value='Ajouter'>
</form>
<h2> Categories existantes</h2>
<?php
if(isset($_POST['new1'])){
    $nom = htmlspecialchars($_POST['new']);
    $sql = "INSERT INTO category (name) VALUE('$nom')";
    mysqli_query($conn,$sql);
}
$cate = "SELECT * FROM category";
$sendcategory = mysqli_query($conn,$cate);
while($fullcategory= mysqli_fetch_assoc($sendcategory)){?>

    
    <div id='categories'> <?php echo $fullcategory['name']; ?>
    <form  class ="gestioncool" method='post'>
    <input type='text' name='categ' placeholder='nouveau nom'>
    <input type ='submit' name='catego<?php echo $fullcategory['id']; ?>' value='modifier'>
    <input type ='submit' name='categor<?php echo $fullcategory['id']; ?>' value='supprimer'>
    </form>
</div>  

<?php
if (isset($_POST['categor'.$fullcategory['id']])){
    header("location: chauscategory2.php?id=".$fullcategory['id']);
};
if (isset($_POST['catego'.$fullcategory['id']])){
    $newname = htmlspecialchars($_POST['categ']);
    $id = intval($fullcategory['id']);
    $changereq = "UPDATE category SET name = '$newname' where id = '$id'";
    mysqli_query($conn,$changereq);
    header("location: chauscategory.php");
}
?>
<?php }; ?>
<?php

if (isset($_POST['categorie'.$fullcategory['id']])){
    header("location:chauscategory2.php?id=".$fullcategory['id']);
};


        
?>

</body>
</html>