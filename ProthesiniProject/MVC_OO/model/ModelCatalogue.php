<?php
require_once ("Model.php");

Class ModelCatalogue extends Model{
    private $ID_Catalogue;
    private $label;

    protected static $table = 'catalogue';
    protected static $primary = 'ID_Catalogue'; 

    public function __construct($ID_Catalogue = NULL, $label = NULL) {
        $this->ID_Catalogue = $ID_Catalogue;
        $this->label = $label;
    } 
    
    //les getters 
    public function getID_Catalogue() {
        return $ID_Catalogue;
    }

    public function getLabel() {
        return $label;
    }

    //les setters 
    public function setLabel($label) {
        $this->label = $label;
    }

}
?>