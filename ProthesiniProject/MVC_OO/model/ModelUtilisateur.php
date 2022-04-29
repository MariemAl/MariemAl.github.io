<?php
require_once ("Model.php");

Class ModelUtilisateur extends Model{
    private $ID_Utilisateur;
    private $nom;
    private $prenom;
    private $adresse;
    private $email;
    private $mdp;
    private $role;

    protected static $table = 'utilisateur';
    protected static $primary = 'ID_Utilisateur'; 

    public function __construct($ID_Utilisateur = NULL, $nom = NULL, $prenom= NULL, $adresse = NULL, $email= NULL, $mdp= NULL, $role=2) {
        $this->ID_Utilisateur = $ID_Utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->role = $role;
    } 
    
    //les getters 
    public function getID_Utilisateur() {
        return $ID_Utilisateur;
    }

    public function getNom() {
        return $nom;
    }

    public function getPrenom() {
        return $prenom;
    }

    public function getAdresse() {
        return $adresse;
    }

    public function getEmail() {
        return $email;
    }

    public function getMdp() {
        return $mdp;
    }

    public function getRole() {
        return $role;
    }


    //les setters 
  
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}
?>