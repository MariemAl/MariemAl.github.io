<?php
require_once ("{$ROOT}{$DS}model{$DS}ModelProduitcommande.php");
if(isset($_REQUEST['action']))
$action = $_REQUEST['action'];
else $action="readAll";
switch ($action) {
case "readAll":
$pagetitle = "Affichage les produits d'une commande";
$view = "readAll";
$tab_u = ModelProduitcommande::getAll();
require ("{$ROOT}{$DS}view{$DS}view.php");
break;


case "read":
if(isset($_REQUEST['ID_Produit'])){
$ID_Produit = $_REQUEST['ID_Produit'];
$u = ModelProduitcommande::select($ID_Produit);
if($u!=null){
$pagetitle = "Details du produit dans le catalogue";
$view = "read";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;


case "delete":
if(isset($_REQUEST['ID_Produit'])){
$ID_Produit = $_REQUEST['ID_Produit'];
$del = ModelProduitcommande::select($ID_Produit);
 if($del!=null){
$del->delete($ID_Produit);
header('Location:index.php?controller=Produitcommande&action=readAll');
}
}

case "create":
$pagetitle = "Enregistrer un produit dans le  catalogue";
$view = "create";
require ("{$ROOT}{$DS}view{$DS}view.php");
break;

case "created":
if(isset($_REQUEST['ID_Produit']) &&
isset($_REQUEST['ID_Cmd']) ){
$ID_Produit = $_REQUEST["ID_Produit"];
$ID_Cmd = $_request["ID_Cmd"];
$recherche = ModelProduitcommande::select($ID_Produit);
if($recherche==null){
$u = new ModelProduitcommande($ID_Produit,$ID_Cmd);
$tab = array(
"ID_Produit" => $ID_Produit,
"ID_Cmd" => $ID_Cmd
);
$u->insert($tab);
$pagetitle = "produit dans un catalogue Enregistré";
$view = "created";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}break;



case "update":
if(isset($_REQUEST['ID_Produit'])){
$ID_Produit = $_REQUEST ['ID_Produit'];
$up = ModelProduitcommande::select($ID_Produit);
if($up!=null){
$pagetitle = "Modifier un produit dans un  catalogue";
$view = "update";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}

case "updated":
if(isset($_REQUEST['ID_Produit']) &&
isset($_REQUEST['ID_Cmd']) ){
$oldID = $_REQUEST ['ID_Produit'];
$tab = array(
"ID_Produit" => $_REQUEST["ID_Produit"],
"ID_Cmd" =>$_REQUEST["ID_Cmd"]
 );
$o = ModelProduitcommande::select($oldID);
if($o!=null){
$u = $o->update($tab, $oldncin);
$pagetitle = "produit au catalogue  modifié";
$view = "updated";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;
}
?>