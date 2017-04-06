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
    // constructeur
    public function __construct($hostName, $baseName, $userName, $password){
    $this->hostName = $hostName;
            $this->baseName = $baseName;
            $this->userName = $userName;
            $this->password = $password;
            $this->connect();
    }
    //méthodes principales
        //connexion à la base de données
        private function connect(){
            try{
                    $this->base = new PDO('mysql:host='.$this->hostName.';dbname='.$this->baseName.';charset=utf8',$this->userName,$this->password);
                    $this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                    echo $e;
            }
        }
        //déconnection
        public  function deconnect(){
            try{
                    $this->close();
            }catch(Exception $e){
                echo $e;
            }
        }
        //sélecteur
        private function select($req, $params, $methode=PDO::FETCH_NAMED){
            $req = $this->base->prepare($req);
            $req->execute($params);
            return $req->fetchall($methode);
        }
        //inséreur
        private function insert($req, $params){
            try {
                $req = $this->base->prepare($req);
                $req->execute($params);
                return $this->base->lastInsertId();
                }
            catch(Exception $e) {
                exit('Erreur : ' . $e->getMessage());
            }
        }
        //updateur
        private function update($req, $params){
                $req = $this->base->prepare($req);
                $req->execute($params);
        }
        //deleteur
        private function delete($req, $params){
                $req = $this->base->prepare($req);
                $req->execute($params);
        }
    //fin méthodes principales
    //méthodes secondaires
    
        public function authentification($login,$password)//recuperation des donnes de l'utilisateur qui respecte les conditions
        {
            $result=$this->base->prepare("select * from users where pseudoUser= :login and passwordUser = :mdpass and supprimer=0");
            $result->execute(array("login"=>$login, "mdpass"=>$password));
            $users=$result->fetch();
            return $users;
        }
    //fin méthodes secondaires
    //méthodes de recupération dans la base de données
        public function getUser(){
            $req= "SELECT * FROM `users`";
            return $this->select($req,$params);
        }
    
        public function getUserByid($id){
            
        }
        
        public function getStatut(){
            $req= "SELECT * FROM `statut`";
            return $this->select($req,$params);
        }
    
    //fin méthodes de recupération dans la base de données
    
    //méthodes d'enregistement dans la base de données
        public function setUser($donnees){
            $req = "INSERT INTO `users` (`matUser`, `prenomUser`, `nomUser`, `pseudoUser`, `sexeUser`, `naissanceUser`, `passwordUser`, `supprimer`, `statutUser`) VALUES (:matUser, :prenomUser, :nomUser, :pseudoUser, :sexeUser, :naissanceUser, :passwordUser, :supprimer, :statutUser)";
            $params = array(
                    "matUser" => $donnees["matUser"],
                    "prenomUser" => $donnees["prenomUser"],
                    "nomUser" => $donnees["nomUser"],
                    "pseudoUser" => $donnees["matUser"],
                    "sexeUser" => $donnees["sexeUser"],
                    "naissanceUser" => $donnees["naissanceUser"],
                    "passwordUser" => MD5($donnees["matUser"]),
                    "supprimer" => 0,
                    "statutUser" => $donnees["statutProfil"]
            );
            return $this->insert($req,$params);
            
        }


        //fin méthodes d'enregistement dans la base de données
    
    //méthodes de mise à jour dans la base de données
    
    //fin méthodes de mise à jour dans la base de données
    

}


