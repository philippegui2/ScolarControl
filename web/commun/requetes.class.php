<?php
/*
 * fichier de configuration de requetes vers la base de données
 * @author Philippe Kolama GUILAVOGUI
 * This is a database requests file
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
            $req= "SELECT * FROM `users` order by prenomUser";
            return $this->select($req,$params);
        }
    
        public function getUserByid($id){
            $req= "SELECT * FROM `users` WHERE matUser=:matUser";
            $params = array(
                    "matUser" => $id
            );
            return $this->select($req,$params);
        }
        
        public function getStatut(){
            $req= "SELECT * FROM `statut`";
            return $this->select($req,$params);
        }
        
        public function getDepartement(){
            $req= "SELECT * FROM `departement`";
            return $this->select($req,$params);
        }
        
        public function getClasse(){
            $req= "SELECT * FROM `classe` order by libelle";
            return $this->select($req,$params);
        }
        
        public function getMatiere(){
            $req= "SELECT * FROM `matiere` order by libelle";
            return $this->select($req,$params);
        }
        
        public function getMatiereClasseDepartement(){
            $req="SELECT m.id idMatiere, m.libelle libelleMatiere, m.coefficient coefMatiere, c.id idClasse, c.libelle libelleClasse, d.id idDepartement,d.libelle libelleDepartement from matiere m, classe c, departement d where m.idClasse=c.id and c.departement=d.id";
            return $this->select($req,$params);
        }
        
        
        public function getMatiereByClasse($idClasse){
            $req="SELECT mc.idMatiere idMatiere, mc.coefficient coefMatiere, m.libelle libelleMatiere from matiere_classe mc INNER JOIN matiere m ON mc.idMatiere=m.id where mc.idClasse=:idClasse";
            $params = array(
                    "idClasse" => $idClasse,
            );
            return $this->select($req,$params);
        }
        
        public function getNoteByUserandMatiere($idEleve,$idMatiere){
            $req="SELECT * from notes where matUser=:matUser and idMatiere=:idMatiere";
            $params = array(
                "matUser" => $idEleve,
                "idMatiere" => $idMatiere,
            );
            return $this->select($req,$params);
        }
        
        public function getEleveById($idEleve){
            ;  
        }
        
        public function getClasseDepartement(){
            $req="select classe.id as idClasse, classe.libelle as libelleClasse, departement.id as idDepartement, departement.libelle as libelleDepartement from classe, departement where classe.departement=departement.id";
            return $this->select($req,$params);
        }
    //fin méthodes de recupération dans la base de données
    
    //méthodes d'enregistement dans la base de données
        public function setUser($donnees,$photo){//enregistrement des nouveaux utilisateurs
            $req = "INSERT INTO `users` (`matUser`, `prenomUser`, `nomUser`, `pseudoUser`, `sexeUser`, `naissanceUser`, `lieuNaissance`, `adresseUser`, `contactUser`, `passwordUser`, `dateInscription`, `photo`,`supprimer`, `statutUser`) VALUES (:matUser, :prenomUser, :nomUser, :pseudoUser, :sexeUser, :naissanceUser, :lieuNaissance, :adresseUser, :contactUser,:passwordUser, :dateInscription, :photo,:supprimer, :statutUser)";
            $params = array(
                    "matUser" => $donnees["matUser"],
                    "prenomUser" => $donnees["prenomUser"],
                    "nomUser" => $donnees["nomUser"],
                    "pseudoUser" => $donnees["matUser"],
                    "sexeUser" => $donnees["sexeUser"],
                    "naissanceUser" => implode("-",array_reverse(explode("/",$donnees["naissanceUser"]))),
                    "lieuNaissance" => $donnees["lieuNaissanceUser"],
                    "adresseUser" => $donnees["adresseUser"],
                    "contactUser" => $donnees["contactUser"],
                    "passwordUser" => MD5($donnees["matUser"]),
                    "dateInscription" => date("Y-m-d"),
                    "photo" => $photo,
                    "supprimer" => 0,
                    "statutUser" => $donnees["statutProfil"]
            );
            return $this->insert($req,$params);
        }
        
        public function setDepartement($donnees){//enregistrement des nouveaux départements
            $req = "INSERT INTO `departement` (`id`, `libelle`) VALUES (NULL, :libelle)";
            $params = array(
             "libelle" => $donnees["libDpt"]   
            );
            return $this->insert($req,$params);
        }
        
        public function setClasse($donnees){//enregistrement des nouvelles classes
            $req = "INSERT INTO `classe` (`id`, `libelle`, `departement`) VALUES (NULL, :libelle, :departement)";
            $params = array(
             "libelle" => $donnees["libDpt"],
             "departement" => $donnees["departement"]
            );
            return $this->insert($req,$params);
        }
        
        public function setMatiere($donnees){//enregistrement des nouvelles classes
            $req = "INSERT INTO `matiere` (`id`, `libelle`, `idClasse`) VALUES (NULL, :designation, :idClasse)";
            $params = array(
                "designation" => $donnees["designation"],
                "idClasse" => $donnees["classeMatiere"]
            );
            return $this->insert($req,$params);
        }
        
        public function setClasseMatiere($classe,$matiere,$coefficient){//enregistrement des nouvelles classes
            $req = "INSERT INTO `matiere_classe` (`idClasse`, `idMatiere`,`coefficient`) VALUES (:idClasse, :idMatiere,:coefficient)";
            $params = array(
             "idClasse" => $classe,
             "idMatiere" => $matiere,
             "coefficient" => $coefficient,
            );
            return $this->insert($req,$params);
        }

        public function setEleve($donnees){
            $req = "INSERT INTO `eleve` (`matUser`, `idClasse`) VALUES (:matUser, :idClasse)";
            $params = array(
             "matUser" => $donnees["matUser"],
             "idClasse" => $donnees["classeEleve"]
            );
            return $this->insert($req,$params);
        }
                

        //fin méthodes d'enregistement dans la base de données
    
    //méthodes de mise à jour dans la base de données
    
    //fin méthodes de mise à jour dans la base de données
    

}


