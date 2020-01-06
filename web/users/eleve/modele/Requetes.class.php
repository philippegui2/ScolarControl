<?php
/*
 * fichier de configuration de requetes vers la base de données
 * @author Philippe Kolama GUILAVOGUI
 * This is a database requests file
 */

Class RequeteLocal
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
                    echo "Erreur de connexion à la base de données";
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
                exit('Erreur : ' . $e->getMessage());//à modifier pour éviter l'affichage des erreurs
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

    // fonction qui renvoie les infos sur la scolarite de l'etudiant
    public function getInfoScolariteForStudent($matricule){
        $req = 'select * from payement inner join offre on payement.idOffre=offre.idOffre where payement.matUser=:mat';
        $params = array('mat'=>$matricule);

        return $this->select($req,$params);
    }

    // fonction qui retourne les evaluations de l'etudiant

    public function getInfoEvaluationForStudent($classe){
        $req = 'select * from evaluation 
                inner join cours on cours.idCours=evaluation.idCours
                where cours.idClasse=:classe';
        $params= array('classe'=>$classe);

        return $this->select($req,$params);
    }

    // fonction qui retourne la classe d'un etudiant
    public function getClasseForStudent($matricule){
        $req='select idClasse from eleve where eleve.matUser=:mat';
        $params = array('mat'=>$matricule);

        return $this->select($req,$params);
    }
}