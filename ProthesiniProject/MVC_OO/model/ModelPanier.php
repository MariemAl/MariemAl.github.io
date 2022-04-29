<?php
require_once ("Model.php");

Class ModelPanier extends ModelCommande {
    private $code ;

    protected static $table = 'panier';
    protected static $primary = 'ID_panier';

    public function __construct($ID_Cmd = NULL, $prix = NULL, $modePayement = NULL, $ID_Utilisateur, $code) {
        $this->ID_Cmd = $ID_Cmd;
        $this->prix = $prix;
        $this->modePayement = $modePayement;
        $this->ID_Utilisateur = $ID_Utilisateur;
        $this->code = $code;
    } 

    public function getCode() {
        return $code;
    }

    public function setCode($code) {
        $this->code = $code;
    }
}