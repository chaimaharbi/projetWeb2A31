<?php
class post
{
    private ?string $idpost;
    private ?string $datepost = null;
    private ?string $adress = null;
    private ?string $titre = null;
    private ?string $des = null;
    private ?string $nblike = null;
    private ?string $nbdislike = null;
    private ?string $image = null;



    public function __construct($idpost, $datepost, $adress, $titre, $des, $nblike, $nbdislike, $image)
    {
        $this->idpost = $idpost;
        $this->datepost = $datepost;
        $this->adress = $adress;
        $this->titre = $titre;
        $this->des = $des;
        $this->nblike  = $nblike;
        $this->nbdislike = $nbdislike;
        $this->image = $image;
    }

    public function getimage()
    {
        return $this->image;
    }
    public function getidpost()
    {
        return   $this->idpost;
    }
    public function setidpost($idpost)
    {
        $this->idpost = $idpost;
        return $this;
    }

    public function getdatepost()
    {
        return   $this->datepost;
    }
    public function setdatepost($datepost)
    {
        $this->datepost = $datepost;
        return $this;
    }

    public function getadress()
    {
        return   $this->adress;
    }
    public function setadress($adress)
    {
        $this->adress = $adress;
        return $this;
    }

    public function gettitre()
    {
        return   $this->titre;
    }
    public function settitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }
    public function getdes()
    {
        return   $this->des;
    }
    public function setdes($des)
    {
        $this->des = $des;
        return $this;
    }
    public function getnblike()
    {
        return   $this->nblike;
    }
    public function setnblike($nblike)
    {
        $this->nblike = $nblike;
        return $this;
    }
    public function getnbdislike()
    {
        return   $this->nbdislike;
    }
    public function setnbdislike($nbdislike)
    {
        $this->nbdislike = $nbdislike;
        return $this;
    }
}
