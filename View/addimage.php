<?php
require_once ('../controller/imageC.php');
require_once ('../model/image.php');

$image = null;
$imageC = new imageC();

if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["des"]) &&
    isset($_POST["date"]) &&
    isset($_POST["statue"]) &&
    isset($_FILES["photo"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["des"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["statue"]) &&
        !empty($_FILES["photo"])
    ) {
        $image = new image(
            $_POST["id"],
            $_POST["nom"],
            $_POST["des"],
            $_POST["date"],
            $_POST["statue"]
        );

        $fileValidationResult = $imageC->validateFileUpload($_FILES["photo"]);
        if ($fileValidationResult) {
            $imageC->addimage($image);
            move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
            header('Location: back_office/Listeimage.php');
            exit(); 
        } else {
            echo "Erreur lors de la validation du fichier.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
} else {
    echo "Erreur : données manquantes dans le formulaire.";
}
?>
