<?php
require_once ("{$ROOT}{$DS}model{$DS}ModelCatalogue.php");
if(isset($_REQUEST['action']))
$action = $_REQUEST['action'];
else $action="readAll";
switch ($action) {
case "readAll":
$pagetitle = "Affichage les catalogues";
$view = "readAll";
$tab_u = ModelCatalogue::getAll();
require ("{$ROOT}{$DS}view{$DS}view.php");
break;


case "read":
if(isset($_REQUEST['ID_catalogue'])){
$ID_Catalogue = $_REQUEST['ID_Catalogue'];
$u = ModelCatalogue::select($ID_Catalogue);
if($u!=null){
$pagetitle = "Details du catalogues";
$view = "read";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;


case "delete":
if(isset($_REQUEST['ID_Catalogue'])){
$ID_Catalogue = $_REQUEST['ID_Catalogue'];
$del = ModelCatalogue::select($ncin);
 if($del!=null){
$del->delete($ID_Catalogue);
header('Location:index.php?controller=catalogue&action=readAll');
}
}

case "create":
$pagetitle = "Enregistrer un catalogue";
$view = "create";
require ("{$ROOT}{$DS}view{$DS}view.php");
break;

case "created":
if(isset($_REQUEST['ID_Catalogue']) &&
isset($_REQUEST['label']) ){
$ID_Catalogue = $_REQUEST["ID_Catalogue"];
$label= $_request["label"];
$recherche = ModelCatalogue::select($ID_Catalogue);
if($recherche==null){
$u = new ModelCatalogue($ID_Catalogue,$label);
$tab = array(
"ID_Catalogue" => $ID_Catalogue,
"label" => $label
);
$u->insert($tab);
$pagetitle = "catalogue Enregistré";
$view = "created";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}break;



case "update":
if(isset($_REQUEST['ID_Catalogue'])){
$ID_Catalogue = $_REQUEST ['ID_Catalogue'];
$up = ModelCatalogue::select($ID_Catalogue);
if($up!=null){
$pagetitle = "Modifier un catalogue";
$view = "update";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}

case "updated":
if(isset($_REQUEST['ID_Catalogue']) &&
isset($_REQUEST['label']) ){
$oldID = $_REQUEST ['ID_Catalogue'];
$tab = array(
"ID_Catalogue" => $_REQUEST["ID_Catalogue"],
"label" =>$_REQUEST["label"]
 );
$o = ModelCatalogue::select($oldID);
if($o!=null){
$u = $o->update($tab, $oldncin);
$pagetitle = "catalogue modifié";
$view = "updated";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;
}
?>