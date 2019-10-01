<?php include 
("chausstorefd.php");

connexion();

$brand ='';
$category ='';
$color = '';
$product = '';
$size = '';
$stock = '';

"INSERT INTO simplon_chaustore(id, brand, category, color, product, size, stock) VALUES('','San Marina','basket','red','50', '40', '10')"
$sql = " INSERT INTO simplon_chaustore (id, brand, category, color, product, size, stock) " ;
$sql .= "VALUES('','".$_POST['brand']."','".$_POST['category']."','".$_POST['color']."','".$_POST['category']."','".$_POST['product']."','".$_POST['size']."','".$_POST['stock']."')";
mysql_query($sql) or die(mysql_error());
?>

