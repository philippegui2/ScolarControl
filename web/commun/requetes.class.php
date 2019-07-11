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

        public function authentification($login,$password)//recuperation des donnes de l'utilisateur qui respecte les conditions
        {
            $result=$this->base->prepare("select * from users where pseudoUser= :login and passwordUser = :mdpass and supprimer=0");
            $result->execute(array("login"=>$login, "mdpass"=>$password));
            $users=$result->fetch();
            return $users;
        }
    //fin méthodes secondaires
    //méthodes de recupération dans la base de données
        public function getUser(){//récupère les utilisateurs
            $req= "SELECT * FROM `users` where supprimer=0 order by prenomUser";
            return $this->select($req,$params);
        }

        public function getUserByid($id){//récupère les utilisateurs en fonction de l'id
            $req= "SELECT * FROM `users` WHERE matUser=:matUser and supprimer=0";
            $params = array(
                    "matUser" => $id
            );
            return $this->select($req,$params);
        }

        public function getUserByStatut($statutUser){//récupère les utilisateurs par statut
            $req= "SELECT * FROM `users` where supprimer=0 and statutUser=:statutUser order by prenomUser";
            $params = array(
                    "statutUser" => $statutUser
            );
            return $this->select($req,$params);
        }
        
        public function getEleveByClasse($idClasse){//récupère les élèves inscris dans une classe données
            $req= "SELECT * FROM `users` where matUser in (SELECT matUser from eleve WHERE idClasse=:idClasse)";
            $params = array(
                    "idClasse" => $idClasse
            );
            return $this->select($req,$params);
        }

        public function getStatut(){//récupère les statuts
            $req= "SELECT * FROM `statut`";
            return $this->select($req,$params);
        }

        public function getDepartement(){//récupère les départements
            $req= "SELECT * FROM `departement`";
            return $this->select($req,$params);
        }

        public function getClasse(){//récupère les classes
            $req= "SELECT * FROM `classe` order by libelle";
            return $this->select($req,$params);
        }

        public function getClasseDepartement(){//récupération des classes et leur département
            $req="select classe.id as idClasse, classe.libelle as libelleClasse, departement.id as idDepartement, departement.libelle as libelleDepartement from classe, departement where classe.departement=departement.id ORDER BY classe.libelle";
            return $this->select($req,$params);
        }

        public function getClasseByEnseignant($idEnseignant){ //Récupération des classes par enseignant
            $req="SELECT cours.matUser, cours.idClasse, departement.id idDepartement, departement.libelle libDepartement, classe.id, classe.libelle libClasse, classe.departement from cours,classe,departement where idClasse=classe.id and classe.departement=departement.id and `matUser` = :matUser GROUP BY idClasse";
            $params = array(
                "matUser" => $idEnseignant
            );
            return $this->select($req,$params);
        }

       public function getMatiere(){//récupère les matières
            $req= "SELECT * FROM `matiere` order by libelle";
            return $this->select($req,$params);
        }

        public function getMatiereClasseDepartement(){//récupère les matières leur classe et départements
            #$req="SELECT m.id idMatiere, m.libelle libelleMatiere, m.coefficient coefMatiere, c.id idClasse, c.libelle libelleClasse, d.id idDepartement,d.libelle libelleDepartement from matiere m, classe c, departement d where m.idClasse=c.id and c.departement=d.id";
            $req="SELECT matcla.idMatiere, matcla.idClasse, matcla.coefficient coefMatiere, classe.id, classe.libelle libelleClasse, classe.departement, departement.id idDepartement, departement.libelle libelleDepartement, matiere.id, matiere.libelle libelleMatiere FROM `matiere-classe` matcla INNER JOIN classe ON matcla.idClasse=classe.id INNER JOIN departement ON classe.departement=departement.id INNER JOIN matiere ON matcla.idMatiere=matiere.id";
            return $this->select($req,$params);
        }


        public function getMatiereByClasse($idClasse){//récupère les matières en fonction de la classe
            $req="SELECT mc.idMatiere idMatiere, mc.coefficient coefMatiere, m.libelle libelleMatiere from matiere_classe mc INNER JOIN matiere m ON mc.idMatiere=m.id where mc.idClasse=:idClasse";
            $params = array(
                    "idClasse" => $idClasse
            );
            return $this->select($req,$params);
        }
        
        public function getMatiereByEnseignant($idEnseignant){//récupère la liste des matières enseignées par un enseignant donné
            $req="select matUser, idMatiere, idClasse, matiere.id, matiere.libelle libMatiere, departement.id idDepartement, departement.libelle libDepartement, classe.id, classe.libelle libClasse,classe.departement from cours,classe,departement,matiere WHERE idMatiere=matiere.id and idClasse=classe.id and classe.departement=departement.id and `matUser` = :matUser";
            $params = array(
                "matUser" => $idEnseignant
            );
            return $this->select($req,$params);
        }
        
        public function getIDMatiereByEnseignant($idEnseignant){//récupère la liste des matières enseignées par un enseignant donné ainsi que leur classe
            $req="select * from cours where `matUser` = :matUser";
            $params = array(
                "matUser" => $idEnseignant
            );
            return $this->select($req,$params);
        }
        
        public function getCoursByEnseignantMatiereClasse($idEnseignant,$idMatiere,$idClasse){//récupère la liste des matières enseignées par un enseignant donné
            $req="SELECT * FROM `cours` where `matUser` = :matUser and idMatiere = :idMatiere and idClasse = :idClasse";
            $params = array(
                "matUser" => $idEnseignant,
                "idMatiere" => $idMatiere,
                "idClasse" => $idClasse
            );
            return $this->select($req,$params);
        }

        public function getNoteByUser($idEleve){//Récupération de la note d'un utilisateur en fonction de son matricule
            //$req="SELECT n.idMatiere idMatiere, n.noteControle noteControle, n.noteTP noteTP, n.noteExamen noteExamen, m.libelle libelleMatiere, m.coefficient coefMatiere from matiere m, note n where n.idMatiere=m.id and n.matUser=:matUser";
            $req="SELECT n.idMatiere, n.noteControle, n.noteTP, n.noteExamen, m.libelle, m.coefficient  from notes n INNER JOIN matiere m ON n.idMatiere=m.id where matUser=:matUser";
            $params = array(
                "matUser" => $idEleve
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

        public function setEleve($donnees){//ajout d'un élève
            $req = "INSERT INTO `eleve` (`matUser`, `idClasse`) VALUES (:matUser, :idClasse)";
            $params = array(
             "matUser" => $donnees["matUser"],
             "idClasse" => $donnees["classeEleve"]
            );
            return $this->insert($req,$params);
        }

        public function setFormateur($donnees){//ajout d'un enseignat
            $req = "INSERT INTO `formateur` (`matUser`) VALUES (:matUser)";
            $params = array(
             "matUser" => $donnees["matUser"]
            );
            return $this->insert($req,$params);
        }

        public function setFormateurClasse($donnees){//Affection d'une classe à un formateur
            $req = "INSERT INTO `formateur_classe` (`matUser`, `idClasse`) VALUES (:matUser,:idClasse)";
            $params = array(
             "matUser" => $donnees["matUser"],
             "idClasse" => $donnees["idClasse"]
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

        public function setMatiere($donnees){//enregistrement des nouvelles matières
            $req = "INSERT INTO `matiere` (`id`, `libelle`) VALUES (NULL, :libelle)";
            $params = array(
                "libelle" => $donnees["designation"]
            );
            return $this->insert($req,$params);
        }

        public function setClasseMatiere($classe,$matiere,$coefficient){//enregistrement des nouvelles classes
            $req = "INSERT INTO `matiere-classe` (`idMatiere`,`idClasse`,`coefficient`) VALUES (:idMatiere,:idClasse,:coefficient)";
            $params = array(
             "idMatiere" => $matiere,
             "idClasse" => $classe,
             "coefficient" => $coefficient,
            );
            return $this->insert($req,$params);
        }
        
        public function setCours($idEnseignant,$idMatiere,$idClasse){//récupère la liste des matières enseignées par un enseignant donné
            $req="INSERT INTO `cours` (`matUser`, `idMatiere`,`idClasse`) VALUES (:matUser, :idMatiere, :idClasse)";
            $params = array(
                "matUser" => $idEnseignant,
                "idMatiere" => $idMatiere,
                "idClasse" => $idClasse
            );
            return $this->insert($req,$params);
        }

        //fin méthodes d'enregistement dans la base de données

    //méthodes de mise à jour dans la base de données
        public function updateUser($donnees){
            $req = "UPDATE `users` SET `prenomUser` = :prenomUser,`nomUser` = :nomUser,`naissanceUser` = :naissanceUser,`lieuNaissance` = :lieuNaissance,`adresseUser` = :adresseUser, `contactUser` = :contactUser,`sexeUser` = :sexeUser WHERE `users`.`matUser` = :matUser";
            $params = array(
             "prenomUser" => $donnees["prenomUser"],
             "nomUser" => $donnees["nomUser"],
             "naissanceUser" => $donnees["naissanceUser"],
             "lieuNaissance" => $donnees["lieuNaissance"],
             "adresseUser" => $donnees["adresseUser"],
             "contactUser" => $donnees["contactUser"],
             "sexeUser" => $donnees["sexeUser"],
             "matUser" => $donnees["matUser"]
            );
            return $this->update($req,$params);
        }
    //fin méthodes de mise à jour dans la base de données


    //méthodes de suppression dans la base de données
        public function delUser($donnees){
            $req = "UPDATE `users` SET `supprimer` = 1 WHERE `users`.`matUser` = :matUser";
            $params = array(
             "matUser" => $donnees["matUser"]
            );
            return $this->delete($req,$params);
        }
        
        public function delCoursByEnseignant($idEnseignant){
            $req = "DELETE FROM `cours` WHERE `cours`.`matUser` = :matUser";
            $params = array(
             "matUser" => $idEnseignant
            );
            return $this->delete($req,$params);
        }
    //fin méthodes de suppression dans la base de données

    //mise a jour du password eleve
    public function updatePassword($pseudo,$password){

        $req = "update users set passwordUser= :password where pseudoUser=:pseudo";
        $params = array(
            "password"=>$password,
            "pseudo"=>$pseudo
        );
        return $this->update($req,$params);
    }

    // recuperation de la liste des mmatieres d'un eleve
    public function listeMatiere ($pseudo){

        $req = "select matiere.libelle from eleve
                inner join matiereClasse on matiereClasse.idClasse = eleve.idClasse
                inner join matiere on matiereClasse.idMatiere = matiere.id
                where matUser = :pseudo
                ";
        $params = array(
            "pseudo"=>$pseudo
        );

        return $this->select($req,$params);
    }

    //recuperation des notes d'un etudiant
    public function bulletin($pseudo){

        $req = "select * from notes
                 inner join matiere on matiere.id = notes.idmatiere
                where matuser = :pseudo
                " ;
        $params = array(
            "pseudo"=>$pseudo
        );

        return $this->select($req,$params);
    }

    // recuperation des infos d'un user
    public function user ($pseudo){

        $req = "select * from users where matUser = :pseudo Limit 1";
        $params = array(
            "pseudo"=>$pseudo
        );

        return $this->select($req,$params);
    }
}
