<?php
require_once ("Model.php");

Class ModelProduit extends Model{
    private $ID_Produit;
    private $label;
    private $quantite;
    private $prix;
    private $ID_Catalogue;

    protected static $table = 'produit';
    protected static $primary = 'ID_Produit'; 

    public function __construct($ID_Produit = NULL, $label = NULL,$quantite = NULL, $prix = NULL, $ID_Catalogue = NULL) {
        $this->ID_Produit = $ID_Produit;
        $this->label = $label;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->ID_Catalogue = $ID_Catalogue;
    } 
    
    //les getters 
    public function getID_Produit() {
        return $ID_Produit;
    }

    public function getLabel() {
        return $label;
    }

    public function getQuantite() {
        return $quantite;
    }

    public function getPrix() {
        return $prix;
    }

    public function getID_Catalogue() {
        return $ID_Catalogue;
    }

    //les setters 
    public function setLabel($label) {
        $this->label = $label;
    }

    public function SetQuantite() {
        $this->quantite = $quantite;
    }

    public function SetPrix() {
        $this->prix = $prix;
    }

}
?>