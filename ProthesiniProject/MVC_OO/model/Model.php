<?php 
//importation du fichier de configuration 
require_once ("{$ROOT}{$DS}config{$DS}Conf.php");

class Model{
private static $pdo;
/*créer une seule instance de la classe PDO*/
public static function Init(){
    $host = Conf::getHostname();
    $dbname = Conf::getDatabase();
    $login = Conf::getLogin();
    $pass = Conf::getPassword();
    try{
    self::$pdo = new
    PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
    }
    catch(PDOException $e) {
    die ($e->getMessage());
    }
}

//Création d’un objet de la classe PDO
public static function getAll(){
    $SQL="SELECT * FROM ".static::$table;
    $rep = self::$pdo->query($SQL);
    $rep->setFetchMode(PDO::FETCH_CLASS,
    'Model'. ucfirst( static::$table));
    return $rep->fetchAll();
}

public static function select($cle_primaire) {
    $sql = "SELECT * from ".static::$table." WHERE
    ".static::$primary."=:cle_primaire";
    $req_prep = self::$pdo->prepare($sql);
    $req_prep->bindParam(":cle_primaire", $cle_primaire);
    $req_prep->execute();
    $req_prep->setFetchMode(PDO::FETCH_CLASS,
    'Model'. ucfirst( static::$table));
    if ($req_prep->rowCount()==0){
    return null;
    }
    else{
    $rslt = $req_prep->fetch();
    return $rslt; }    
}

public function delete($cle_primaire) {
    $sql = "DELETE FROM ".static::$table." WHERE".static::$primary."=:cle_primaire";
    $req_prep = self::$pdo->prepare($sql);
    $req_prep->bindParam(":cle_primaire", $cle_primaire);
    $req_prep->execute();
}

public function login($username, $password) {
	$sql = "SELECT * from user WHERE ".static::$user."=:email AND ".static::$pass."=:mdp";
	$req_prep = model::$pdo->prepare($sql);
	$req_prep->bindParam(":email", $username);
	$req_prep->bindParam(":mdp", $password);
	
	$req_prep->execute();
	$req_prep->setFetchMode(PDO::FETCH_CLASS, 'model'.ucfirst(static::$table));
	echo ($req_prep);
	if ($req_prep->rowCount()==0){
		return null;
		die();
	  }else{
		
		$rslt = $req_prep;
		return $rslt;
	}
	  
  }

public function update($tab, $cle_primaire) {
    $sql = "UPDATE ".static::$table." SET";
		foreach ($tab as $cle => $valeur){
			$sql .=" ".$cle."=:new".$cle.",";
		}
		$sql=rtrim($sql,",");
		$sql.=" WHERE ".static::$primary."=:oldid;";
		
		  $req_prep = model::$pdo->prepare($sql);
		  $values = array();
	  
	  foreach ($tab as $cle => $valeur){
				$values[":new".$cle] = $valeur;
		  }

		  $values[":oldid"] = $cle_primaire;
		  $req_prep->execute($values);
		  $obj = model::select($tab[static::$primary]);
		  return $obj;
}


public static function insert($tab){
    $sql = "INSERT INTO ".static::$table." VALUES(";
    foreach ($tab as $cle => $valeur){
		$sql .=" :".$cle.",";
	}
	$sql=rtrim($sql,",");
	echo"hello insert";
	$sql.=");";
    $req_prep = model::$pdo->prepare($sql);
    $values = array();
    foreach ($tab as $cle => $valeur)
      		$values[":".$cle] = $valeur;
	$req_prep->execute($values);
	
  }
}


Model::Init();

     
?>