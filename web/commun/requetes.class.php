<?php
/*
*fichier de configuration de requetes vers la base de données
*
*/
Class Requetes
{
    private $base;
    private $hostName;
    private $baseName;
    private $userName;
	  private $password;

	public function __construct($hostName, $baseName, $userName, $password){
  	$this->hostName = $hostName;
		$this->baseName = $baseName;
		$this->userName = $userName;
		$this->password = $password;
		$this->connect();
	}

    private function connect(){
				try{
					$this->base = new PDO('mysql:host='.$this->hostName.';dbname='.$this->baseName.';charset=utf8',$this->userName,$this->password);
				}catch(Exception $e){
					echo $e;
				}
		}

	public	function deconnect(){
			try{
				$this->close();
			}catch(Exception $e){
        echo $e;
			}

		}

	public function authentification($login,$password)//recuperation des donnes de l'utilisateur qui respecte les conditions
    {
        $result=$this->base->prepare("select * from users where pseudoUser= :login and passwordUser = :mdpass and supprimer=0");
        $result->execute(array("login"=>$login, "mdpass"=>$password));
        $users=$result->fetch();
        return $users;
    }
}
