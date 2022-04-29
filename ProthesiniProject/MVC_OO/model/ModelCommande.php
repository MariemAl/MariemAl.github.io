<?php
require_once ("Model.php");

Class ModelCommande extends Model{
    protected $ID_Cmd;
    protected $prix;
    protected $modePayement;
    protected $ID_Utilisateur;

    protected static $table = 'commande';
    protected static $primary = 'ID_Cmd'; 

    public function __construct($ID_Cmd = NULL, $prix = NULL, $modePayement = NULL, $ID_Utilisateur) {
        $this->ID_Cmd = $ID_Cmd;
        $this->prix = $prix;
        $this->modePayement = $modePayement;
        $this->ID_Utilisateur = $ID_Utilisateur;
    } 
    
    //les getters 
    public function getID_Cmd() {
        return $ID_Cmd;
    }

    public function getPrix() {
        return $prix;
    }

    public function getModePayement() {
        return $modePayement;
    }

    public function getID_Utilisateur() {
        return $ID_Utilisateur;
    }

    //les setters 
    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setModePayement($modePayement) {
        $this->modePayement = $modePayement;
    }
    
}
?>