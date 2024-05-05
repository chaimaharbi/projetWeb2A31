<?php

require_once('config.php');

class postC
{
    function addpost($post)
    {
        $sql = "INSERT INTO post (id_user, idpost, datepost, adress, titre, des,nblike, nbdislike,id_image) 
        VALUES (1, :idpost, :datepost, :adress, :titre, :des,:nblike, :nbdislike,:image)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idpost' => $post->getidpost(),
                'datepost' => $post->getdatepost(),
                'adress' => $post->getadress(),
                'titre' => $post->gettitre(),
                'des' => $post->getdes(),
                'nblike' => $post->getnblike(),
                'nbdislike' => $post->getnbdislike(),
                'image' => $post->getimage()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listepost()
    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletepost($idpost)
    {
        $sql = "DELETE FROM post WHERE idpost = :idpost";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idpost', $idpost);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showpost($idpost)
    {
        $sql = "SELECT * FROM post WHERE idpost = :idpost";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idpost', $idpost);
            $query->execute();
            $idpost = $query->fetch();
            return $idpost;
        } catch (Exception $e) {
           
            throw new Exception('Error showing post: ' . $e->getMessage());
        }
    } 

    function updatepost($post, $idpost)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET
            datepost = :datepost,
            adress = :adress,
            titre=:titre,
            des=:des,
            nblike=:nblike,
            nbdislike=:nbdislike,
            id_image = :image
            WHERE idpost=:idpost'
            );
            $query->execute([
                'idpost' => $post->getidpost(),
                'datepost' => $post->getdatepost(),
                'adress' => $post->getadress(),
                'titre' => $post->gettitre(),
                'des' => $post->getdes(),
                'nblike' => $post->getnblike(),
                'nbdislike' => $post->getnbdislike(),
                'image' => $post->getimage()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); 
        }
    }

}
