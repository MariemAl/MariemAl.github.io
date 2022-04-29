<?php

require_once ("{$ROOT}{$DS}model{$DS}ModelPanier.php"); 

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
	else $action="readAll";	
	
switch ($action) {
    case "readAll":
        $pagetitle = "Liste des paniers";
        $view = "readAll";
       	$tab_u = ModelPanier::getAll();
        require ("{$ROOT}{$DS}view{$DS}view.php");
        break;

	
		
	case "delete":
		if(isset($_REQUEST['ID_Panier'])){
			$ID_Panier = $_REQUEST['ID_Panier'];
			$del = ModelPanier::select($ID_Panier);
			if($del!=null){
			$del->delete($ID_Panier);
			header('Location: index.php?controller=Panier&action=readAll');
			}
		}
	    break;
	
	case "create":
		$pagetitle = "Enregistrer un panier";
		$view = "create";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
		

	
	case "update":
		if(isset($_REQUEST['ID_Panier'])){
			$ID_Panier = $_REQUEST['ID_Panier'];
			$up = ModelPanier::select($ID_Panier); 
			if($up!=null){
				$pagetitle = "Modifier le panier";
				$view = "update";
				require ("{$ROOT}{$DS}view{$DS}view.php");			
			}
			
		}
		break;
		

}
?>
