<?php


$controller = "Commande";
require_once ("{$ROOT}{$DS}model{$DS}ModelCommande.php"); 

if(isset($_REQUEST['action']))	
	$action = $_REQUEST['action'];
	else $action="readAll";	
	
switch ($action) {
    case "readAll":
        $pagetitle = "Liste des commandes";
        $view = "readAll";
       	$tab_u = ModelCommande::getAll();
        require ("{$ROOT}{$DS}view{$DS}view.php");
        break;

	case "read":	
		if(isset($_REQUEST['ID_Cmd'])){
			$ID_Cmd = $_REQUEST['ID_Cmd'];
			$u = ModelCommande::select($ID_Cmd);
				if($u!=null){
					$pagetitle = "Details de la commande";
					$view = "read";
					require ("{$ROOT}{$DS}view{$DS}view.php");
				}
			}	
		break;
		
	case "delete":
		if(isset($_REQUEST['ID_Cmd'])){
			$ID_Cmd = $_REQUEST['ID_Cmd'];
			$del = ModelCommande::select($ID_Cmd);
			if($del!=null){
			$del->delete($ID_Cmd);
			
			header('Location: index.php?controller=Commande&action=readAll');
			}
		}
	    break;
	
	case "create":
		$pagetitle = "Enregistrer une commande";
		$view = "create";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
		
	case "created": 
		if(isset($_REQUEST['ID_Cmd']) && isset($_REQUEST['prix']) && isset($_REQUEST['modePayement ']) && isset($_REQUEST['ID_Client '])){
			$ID_Cmd = $_REQUEST["ID_Cmd"];
			$prix = $_REQUEST["prix"];
			$modePayement = $_REQUEST["modePayement"];
			$ID_Client = $_REQUEST["ID_Client"];
			$recherche = ModelCommande::select($ID_Cmd);
			if($recherche==null){
									
				$u = new ModelCommande($ID_Cmd, $prix, $modePayement,$ID_Client);	
				$tab = array(
				"ID_Cmd" => $ID_Cmd,
				"prix" => $prix,
				"modePayement" => $modePayement,
				"ID_Client" => $ID_Client
				);				
				$u->insert($tab);
				$pagetitle = "commande Enregistrée";
				$view = "created";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}	
		}
		break;
	
	case "update":
		if(isset($_REQUEST['ID_Cmd'])){
			$ID_Cmd = $_REQUEST['ID_Cmd'];
			$up = ModelCommande::select($ID_Cmd);
			if($up!=null){
				$pagetitle = "Modifier la commande";
				$view = "update";
				require ("{$ROOT}{$DS}view{$DS}view.php");			
			}
			
		}
		break;
		
	case "updated": 
		if(isset($_REQUEST['ID_Cmd']) && isset($_REQUEST['prix']) && isset($_REQUEST['modePayement ']) && isset($_REQUEST['ID_Client '])){
			$oldID_Cmd = $_REQUEST['ID_Cmd'];
			$tab = array(
   			$ID_Cmd = $_REQUEST["ID_Cmd"];
			$prix = $_REQUEST["prix"];
			$modePayement = $_REQUEST["modePayement"];
			$ID_Client = $_REQUEST["ID_Client"];
   			 );
			$o = ModelCommande::select($oldID_Cmd);
			if($o!=null){
				$u = ModelCommande::update($tab, $oldID_Cmd);		
				$pagetitle = "Commande modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
		}	
		break;
		
	
}
?>
