<?php

class Personnage
{

    // les fonctions en privée et les fonctions en public il faut mettre public
    // private $pv;
    // private $atk;
    // private $name;

    protected $pv;
    protected $atk;
    protected $name;
    protected $id;
    protected $image;

    // création du compteur static
    private static $compteur = 0;
    private const MAXLIFE = 300;

    // CREATION DES GETTERS ET SETTERS (set c'est pour affecter et pas forcément modifier en fonction de ce qu'il y a en paramètre)
    // dès qu'il y a des valeurs qui changent (ex : pv du perso après avoir été attaqué), on doit mettre set, sinon get
    

    public function getImage()
    {
        return $this->image;
    }

    public function getPv()
    {
        return $this->pv;
    }

    public function getAtk()
    {
        return $this->atk;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getCompteur()
    { 
            return self::$compteur;
        
    }

    public function getId(){
        return $this->id;
    }


    public function setImage($image)
    {
        $this->image=$image;
    }
    
    public function setPv($pv)
    {
        if ($pv >= 0 && $pv <= 400) {
            $this->pv = $pv;
        } else {
            $this->pv = 100;
        }
    }

    public function setAtk($atk)
    {
        $this->atk = $atk;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    private static function setCompteur()
    { 
            self::$compteur++;
        
    }

    public function setId($id){
        $this->id=$id;
    }


  // CONSTRUCTEUR
  public function __construct(array $donnees)
  {
      $this->hydrate($donnees);
      self::setCompteur();
  }
  
  

// Fonction d'hydratation
public function hydrate(array $donnees){
    if(isset($donnees['id'])) {
        $this->setId($donnees['id']);
    }
    if(isset($donnees['name'])) {
        $this->setName($donnees['name']);
    }
    if(isset($donnees['pv'])) {
        $this->setPv($donnees['pv']);
    }
    if(isset($donnees['atk'])) {
        $this->setAtk($donnees['atk']);
    }
    if(isset($donnees['img'])) {
        $this->setImage($donnees['img']);
    }
}



    // LES AUTRES METTHODES
    public function crier()
    {
        return 'Vous ne passerez pas !';
    }

    public function is_alive()
    {
        return ($this->pv <= 0) ? "Il est mort" : "Il est vivant!";
    }
    

    public function regenerer(Personnage $perso)
{
    if (!isset($x)) {
        $this->pv = 300;
        return "on vous à regenerer";
    } else {
        $this->setPv($this->pv + $x);
    }
}

    public function attaquer(Personnage $perso)
    {
        $perso->pv -= $this->atk;
        return $this->name . " attaque " . $perso->name . " de " . $this->atk . " et a actuellement " . $this->pv;
    }

    public function reinitPV()
    {
        $this->pv = self::MAXLIFE;
    }

    
}