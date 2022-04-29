<?php
require_once ("{$ROOT}{$DS}model{$DS}ModelUtilisateur.php");
if(isset($_REQUEST['action']))
$action = $_REQUEST['action'];
else $action="open";
switch ($action) {

case "open":
$pagetitle="homepage";
$view = "Open";
require ("{$ROOT}{$DS}view{$DS}view.php");
break;

case "readAll":
$pagetitle = "Affichage des utilisateurs";
$view = "readAll";
$tab_u = ModelUtilisateur::getAll();
require ("{$ROOT}{$DS}view{$DS}view.php");
break;


case "read":
if(isset($_REQUEST['ID_Utilisateur'])){
$ID_Utilisateur = $_REQUEST['ID_Utilisateur'];
$u = ModelUtilisateur::select($ID_Utilisateur);
if($u!=null){
$pagetitle = "Details du l'utilisateur";
$view = "read";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;


case "delete":
if(isset($_REQUEST['ID_Utilisateur'])){
$ID_Utilisateur = $_REQUEST['ID_Utilisateur'];
$del = ModelUtilisateur::select($ID_Utilisateur);
if($del!=null){
$del->delete($ID_Utilisateur);
header('Location:index.php?controller=utilisateur&action=readAll');
}
}

case "create":
$pagetitle = "Enregistrer un compte";
$view = "create";
require ("{$ROOT}{$DS}view{$DS}view.php");
break;

case "created":
if(isset($_REQUEST['ID_Utilisateur']) &&
isset($_REQUEST['nom']) && isset($_REQUEST['prenom'])&&
isset($_REQUEST['adresse'])&& isset($_REQUEST['email']) && isset($_REQUEST['mdp']) && isset($_REQUEST['role'])){
$ID_Utilisateur = $_REQUEST["ID_utilisateur"];
$nom= $_request["nom"];
$prenom = $request["prenom"];
$adresse = $request["adresse"];
$email = $request["email"];
$mdp = $request["mdp"];
$role = $request["role"];
$recherche = ModelUtilisateur::select($ID_Utilisateur);
if($recherche==null){
$u = new ModelUtilisateur($ID_utilisateur,$nom,$prenom,$adresse,$email,$mdp,$role );
$tab = array(
"ID_utilisateur" => $ID_utilisateur,
"nom" => $nom,
"prenom" => $prenom,
"adresse" => $adresse,
"email" => $email,
"mdp" => $mdp,
"role"=>$role);
$u->insert($tab);
$pagetitle = "utilisateur Enregistré";
$view = "created";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}break;



case "update":
if(isset($_REQUEST['ID_Utilisateur'])){
$ID_Utilisateur = $_REQUEST ['ID_Utilisateur'];
$up = ModelUtilisateur::select($ID_Utilisateur);
if($up!=null){
$pagetitle = "Modifier un utilisateur";
$view = "update";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}

case "updated":
if(isset($_REQUEST['ID_Utilisateur']) &&
isset($_REQUEST['nom']) && isset($_REQUEST['prenom'])&&
isset($_REQUEST['adresse'])&& isset($_REQUEST['email']) && 
isset($_REQUEST['mdp']) && isset($_REQUEST['role'])){
$oldID = $_REQUEST ['ID_Utilisateur'];
$tab = array(
"ID_Utilisateur" => $_REQUEST["ID_Utilisateur"],
"nom" => $_REQUEST["nom"],
"prenom" => $_REQUEST ["prenom"],
"adresse" => $_REQUEST ["adresse"],
"mdp" => $_REQUEST ["mdp"],
"role" => $_REQUEST ["role"]
 );
$o = ModelUtilisateur::select($oldID);
if($o!=null){
$u = $o->update($tab, $oldncin);
$pagetitle = "utilisateur modifié";
$view = "updated";
require ("{$ROOT}{$DS}view{$DS}view.php");
}
}
break;
}
?>