 


<?php
require_once('../../controller/postC.php');
  $postC = new postC(); 
$postC= $postC->deletepost($_GET['idpost']);
header('Location: listepost.php');



?>