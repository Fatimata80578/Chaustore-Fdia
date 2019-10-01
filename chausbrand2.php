<?php 
require_once 'formchaustore.php';?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link href="chausstore.css" rel=stylesheet type ="text/css">
<title>Confirmer marque et retour</title>
</head>
<body>
<h1> Voulez vous vraiment supprimer cette marque? </h1>
<form class="gestioncool" method="post">
<input type ='submit' name='confirm' value='confirmer'>
<input type ='submit' name='return' value='retour'>
</form>
<div> </div>
</body>
</html>
<?php
if (isset($_POST['return'])){
    header("location: chausbrand.php");
};

if (isset ($_POST['confirm'])){
    $id = intval($_GET['id']);
    $col = "DELETE FROM color where id='$id'";
    mysqli_query($conn,$col);
    header("location: chausbrand.php");
}
?>
