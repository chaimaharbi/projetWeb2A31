 


<?php
 require_once('../../controller/imageC.php');
 $imageC = new imageC(); 
$imageC= $imageC->deleteimage($_GET['id']);
header('Location: listeimage.php');



?>