<?php

require_once('config.php');

class imageC
{
    function addimage($image)
{
    $sql = "INSERT INTO image (id, nom, des, date, statue) 
            VALUES ( :id, :nom, :des, :date, :statue)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        if (!$query->execute([
            'id' => $image->getid(),
            'nom' => $image->getnom(),
            'des' => $image->getdes(),
            'date' => $image->getdate(),
            'statue' => $image->getstatue(),
        ])) {
            echo "SQL Error: " . $query->errorInfo()[2];
        } else {
            // Insertion successful
            echo "image details added successfully!";
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

    
    public function listeimage()
    {
        $sql = "SELECT * FROM image";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteimage($id)
    {
        $sql = "DELETE FROM image WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showimage($id)
    {
        $sql = "SELECT * FROM image WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $id = $query->fetch();
            return $id;
        } catch (Exception $e) {
            // Log or handle the exception
            throw new Exception('Error showing image: ' . $e->getMessage());
        }
    } // Ajout de l'accolade de fermeture manquante ici

    function updateimage($image, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE image SET
            nom = :nom,
            des = :des,
            date=:date,
            statue=:statue
            
            WHERE id=:id'
            );
            $query->execute([
                'id' => $id,
                'nom' => $image->getnom(),
                'des' => $image->getdes(),
                'date' => $image->getdate(),
                'statue' => $image->getstatue()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); 
        }
    }
    function validateFileUpload($file)
    {
        if ($file['error'] == 0) {
            if ($file['size'] <= 10 * 1024 * 1024) {
                $allowedTypes = array('png', 'jpeg', 'svg');
                $fileParts = pathinfo($file['name']);
                $fileExt = strtolower($fileParts['extension']);
                if (in_array($fileExt, $allowedTypes)) {
                    return true;
                } else {
                    return "Invalid file type. Allowed types: " . implode(', ', $allowedTypes);
                }
            } else {
                return "File size exceeds limit (10MB)";
            }
        } else {
            return "File upload error: " . $file['error'];
        }
    }
}
