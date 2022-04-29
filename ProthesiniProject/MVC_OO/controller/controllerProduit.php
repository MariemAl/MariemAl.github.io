<?php
require_once ("{$ROOT}{$DS}model{$DS}ModelProduit.php");
if(isset($_REQUEST['action']))
$action = $_ REQUEST['action'];
else $action="readAll";

switch ($action) {

case "open":
$view = "open";
require ("{$ROOT}{$DS}view{$DS}view.php");
break;

case "readAll":
$pagetitle = "Affichage des produits";
$view = "readAll";
$tab_p = ModelProduit::getAll();
require ("{$ROOT}{$DS}view{$DS}view.php");
break;


case "read":
if(isset($_REQUEST['ID_Produit'])){
$ID_Produit = $_REQUEST['ID_Produit'];
$p = ModelProduit::select($ID_Produit);
if($p!=null){
$pagetitle = "Details du produit";
$view = "read";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;


case "delete":
if(isset($_REQUEST['ID_Produit'])){
$ID_Produit = $_REQUEST['ID_Produit'];
$del = ModelProduit::select($ID_Produit);
if($del!=null){
$del->delete($ID_Produit);
header('Location:index.php?controller=utilisateur&action=readAll');
}
}

case "create":
$pagetitle = "Enregistrer un produit";
$view = "create";
require ("{$ROOT}{$DS}view{$DS}view.php");
break;

case "created":
if(isset($_REQUEST['ID_Produit']) &&
isset($_REQUEST['label']) && isset($_REQUEST['quantite'])&&
isset($_REQUEST['prix'])){
$ID_Produit = $_REQUEST["ID_Produit"];
$label= $_POST["label"];
$quantite = $_POST["quantite"];
$prix = $_POST["prix"];
$recherche = ModelProduit::select($ID_Produit);
if($recherche==null){
$p = new ModelProduit($ID_Produit,$label,$quantite,$prix );
$tab = array(
"ID_Produit" => $ID_Produit,
"label" => $label,
"quantite" => $quantite,
"prix" => $prix);
$p->insert($tab);
$pagetitle = "produit Enregistré";
$view = "created";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}break;

case "update":
if(isset($_REQUEST['ID_Produit'])){
$ID_Produit = $_REQUEST ['ID_Produit'];
$up = ModelProduit::select($ID_Produit);
if($up!=null){
$pagetitle = "Modifier le produit";
$view = "update";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}

case "updated":
if(isset($_REQUEST['ID_Produit']) &&
isset($_REQUEST['label']) && isset($_REQUEST['quantite'])&&
isset($_REQUEST['prix'])){
$oldID = $_REQUEST ['ID_Produit'];
$tab = array(
"ID_Produit" => $_REQUEST["ID_Produit"],
"label" =>$_REQUEST["label"],
"quantite" => $_REQUEST ["quantite"] );
$o = ModelProduit::select($oldID);
if($o!=null){
$u = $o->update($tab, $oldncin);
$pagetitle = "produit modifié";
$view = "updated";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;
}
?>