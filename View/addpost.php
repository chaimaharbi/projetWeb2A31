<?php
require_once('..\controller\postC.php');
require_once('..\model\post.php');

$postC = new postC();


if (
    isset($_POST["idpost"]) &&
    isset($_POST["datepost"]) &&
    isset($_POST["adress"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["des"]) &&
    isset($_POST["nblike"]) &&
    isset($_POST["nbdislike"]) && isset($_POST["image"])
) {
    if (
        !empty($_POST["idpost"]) &&
        !empty($_POST["datepost"]) &&
        !empty($_POST["adress"]) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["des"]) &&
        !empty($_POST["nblike"]) &&
        !empty($_POST["nbdislike"]) && isset($_POST["image"])
    ) {
        $post = new post(
            $_POST["idpost"],
            $_POST["datepost"],
            $_POST["adress"],
            $_POST["titre"],
            $_POST["des"],
            $_POST["nblike"],
            $_POST["nbdislike"],
            $_POST["image"]
        );


        $postC->addpost($post);
    }
    header('Location: back_office\listepost.php');
}
