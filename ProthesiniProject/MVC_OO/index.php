<?php
/* __DIR__ est une constante "magique" de PHP qui contient le
chemin du dossier courant */
$ROOT = __DIR__;
/* DS contient '/' sur Linux et '\' sur Windows*/
$DS = DIRECTORY_SEPARATOR;
$controleur_default = "Utilisateur" ;

if(!isset($_REQUEST['controller'])){
//$controller récupère $controller_default;
$controller=$controleur_default;}
else {
// $controller recupère le contrôleur passé dans l'URL
$controller = $_REQUEST['controller']; }

switch ($controller) {

case "Panier" :
require ("{$ROOT}{$DS}controller{$DS}controllerPanier.php");
break;

case "Commande" :
require ("{$ROOT}{$DS}controller{$DS}controllerCommande.php");
break;

case "Produit" :
require ("{$ROOT}{$DS}controller{$DS}controllerProduit.php");
break;

case "Catalogue" :
require ("{$ROOT}{$DS}controller{$DS}controllerCatalogue.php");
break;

case "Administrateur" :
require ("{$ROOT}{$DS}controller{$DS}controllerAdministrateur.php");
break;

case "Client" :
require("{$ROOT}{$DS}controller{$DS}controllerClient.php");
break;

case "Utilisateur" :
require ("{$ROOT}{$DS}controller{$DS}controllerUtilisateur.php");
break;

case "default" :
require ("{$ROOT}{$DS}controller{$DS}controllerUtilisateur.php");
break;
}

?>

