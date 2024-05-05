<?php
class image{
    private ?string $id ; 
    private ?string $nom = null;
    private ?string $des = null;
    private ?string $date = null;
    private ?string $statue = null;
    
    public function __construct($id, $nom, $des, $date, $statue)
    {
     $this->id=$id;
     $this->nom=$nom;
     $this->des=$des;
     $this->date=$date;
     $this->statue=$statue;     
    }
    
    public function getid(){
        return $this->id;
    }

    
    public function setid($id){
        $this->id = $id;
        return $this;
    }

    public function getnom(){
        return $this->nom;
    }
    
    public function setnom($nom){
        $this->nom = $nom;
        return $this;
    }

    public function getdes(){
        return $this->des;
    }
    
    public function setdes($des){
        $this->des = $des;
        return $this;
    }
    public function getdate(){
        return $this->date;
    }
    
    public function setdate($date){
        $this->date = $date;
        return $this;
    }


    public function getstatue(){
        return $this->statue;
    }
    
    public function setstatue($statue){
        $this->statue = $statue;
        return $this;
    }
}
?>
