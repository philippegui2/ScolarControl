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
            $params = array();
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
        
        public function getAllEleveSimple(){
            $req= "SELECT * FROM `users` where matUser in (SELECT matUser from eleve)";
            return $this->select($req,$params);
        }
        
        public function getAllEleve(){
            $req= "SELECT users.*, classe.id idClasse, classe.libelle libelleClasse, departement.id idDepartement, departement.libelle libelleDepartement FROM `users` INNER JOIN eleve ON users.matUser=eleve.matUser INNER JOIN classe ON eleve.idClasse=classe.id INNER JOIN departement ON classe.departement=departement.id";
            return $this->select($req,$params);
        }
        
        public function getEleveByClasse($idClasse){//récupère les élèves inscris dans une classe données
            $req= "SELECT * FROM `users` where matUser in (SELECT matUser from eleve WHERE idClasse=:idClasse)";
            $params = array(
                    "idClasse" => $idClasse
            );
            return $this->select($req,$params);
        }
        
        public function getEleveById($idEleve){
            ;
        }
        
        public function getEleveClasseById($idEleve){
            $req= "SELECT classe.id FROM `users` INNER JOIN eleve ON users.matUser=eleve.matUser INNER JOIN classe ON eleve.idClasse=classe.id where eleve.matUser=:idEleve";
            $params = array(
                    "idEleve" => $idEleve
            );
            return $this->select($req,$params);
        }
        
        public function getAllEleveAndNoteByClasse($idClasse,$idMatiere){//récupère toutes les notes de tous les élèves d'une classe données dans une matière donnée
            $req="SELECT users.matUser, users.prenomUser, users.nomUser, notes.*, matiere.libelle from `users` INNER JOIN eleve ON users.matUser=eleve.matUser RIGHT JOIN notes ON eleve.matUser=notes.matUser INNER JOIN matiere ON notes.idMatiere=matiere.id WHERE eleve.idClasse=:idClasse and notes.idMatiere=:idMatiere";
            $params = array(
                "idClasse" => $idClasse,
                "idMatiere" => $idMatiere
            );
            return $this->select($req,$params);
        }
        
        public function getEnseignantByClasse($idClasse){//récupère les formateurs qui enseignent dans une classe données
            $req="SELECT * FROM `users` where matUser in (SELECT cours.matUser from cours INNER JOIN `matiere-classe` ON cours.idClasse=`matiere-classe`.idClasse INNER JOIN classe ON `matiere-classe`.idClasse=classe.id where classe.id=:idClasse)";
            $params = array(
                    "idClasse" => intval($idClasse) 
            );
            return $this->select($req,$params);
        }
        
        public function getAllChefsAndAdjoint(){//récupère les chefs de classe de tous les départements et leur adjoint
            $req="SELECT users.matUser matUser, users.nomUser nomUser, users.prenomUser prenomUser, users.emailUser emailUser, eleve.role role, classe.libelle libClasse, departement.libelle libDepartement FROM users INNER JOIN eleve ON users.matUser=eleve.matUser INNER JOIN classe ON eleve.idClasse=classe.id INNER JOIN departement ON classe.departement=departement.id WHERE role=2 or role=3 ORDER BY classe.libelle";
            $params = array( 
            );
            return $this->select($req,$params);
        }
        
        public function getAllRespoAndAdjoint(){//récupère les chefs de classe de tous les départements et leur adjoint
            $req="SELECT classe.profResponsable, classe.libelle libClasse, departement.libelle libDepartement from classe INNER JOIN departement ON classe.departement=departement.id";

            //$req="SELECT users.matUser matUser, users.nomUser nomUser, users.prenomUser prenomUser, eleve.role role, classe.libelle libClasse, departement.libelle libDepartement FROM users INNER JOIN eleve ON users.matUser=eleve.matUser INNER JOIN classe ON eleve.idClasse=classe.id INNER JOIN departement ON classe.departement=departement.id WHERE role=2 or role=3 ORDER BY classe.libelle";

            $params = array(
                    //"idClasse" => intval($idClasse) 
            );
            return $this->select($req,$params);
        }
        
        public function getInfoRespoAndAdjoint(){//récupère les informations des chefs de classe de tous les départements et leur adjoint
            $req="SELECT users.matUser matUser, users.contactUser contactUser from users INNER JOIN formateur ON users.matUser=formateur.matUser WHERE formateur.role=2";
            $params = array(
                   
            );
            return $this->select($req,$params);
        }
        
        public function getAllRespoDepartement(){//récupère les chefs de classe de tous les départements et leur adjoint
            $req="SELECT departement.responsable, departement.libelle libDepartement from departement";
            $params = array(
 
            );
            return $this->select($req,$params);
        }
        
        public function getInfoRespoDepartement(){//récupère les informations des chefs de classe de tous les départements et leur adjoint
            $req="SELECT users.matUser matUser, users.contactUser contactUser from users INNER JOIN formateur ON users.matUser=formateur.matUser WHERE formateur.role=3";
            $params = array(
                   
            );
            return $this->select($req,$params);
        }
        
        public function getEnseignantByDepartement($idDepartement){//récupère les formateurs qui enseignent dans un département donné
            $req="SELECT * FROM `users` where matUser in (SELECT cours.matUser from cours INNER JOIN `matiere-classe` ON cours.idClasse=`matiere-classe`.idClasse INNER JOIN classe ON `matiere-classe`.idClasse=classe.id INNER JOIN departement ON classe.departement=departement.id where departement.id=:idDepartement)";
            $params = array(
                    "idDepartement" => intval($idDepartement) 
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
        
        public function getDepartementByClasse($idClasse){//récupère le département dans lequel se trouve une classe donnée
            $req= "SELECT departement FROM `classe` WHERE id=idClasse";
            $params = array(
                "idClasse" => $idClasse
            );
            return $this->select($req,$params);
        }

        public function getClasse($idClasse){//récupère les classes
            $req= "SELECT * FROM `classe` order by libelle";
            return $this->select($req,$params);
        }
        
        public function getClasseById($idClasse){//récupère les classes
            $req="select classe.id as idClasse, classe.libelle as libelleClasse, classe.chefClasse as chefClasse, classe.adjointChef as adjointChef, classe.profResponsable as profResponsable, departement.id as idDepartement, departement.libelle as libelleDepartement from classe, departement where classe.departement=departement.id and classe.id=:idClasse ORDER BY classe.libelle";
            $params = array(
                "idClasse" => $idClasse
            );
            return $this->select($req,$params);
        }

        public function getClasseDepartement(){//récupération des classes et leur département
            $req="select classe.id as idClasse, classe.libelle as libelleClasse, classe.chefClasse as chefClasse, classe.adjointChef as adjointChef, classe.profResponsable as profResponsable, departement.id as idDepartement, departement.libelle as libelleDepartement from classe, departement where classe.departement=departement.id ORDER BY classe.libelle";
            return $this->select($req,$params);
        }

        public function getClasseByEnseignant($idEnseignant){ //Récupération des classes dans lesquelles enseignat un enseignant donné
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
            $req="SELECT matcla.idMatiere, matcla.idClasse, matcla.coefficient coefMatiere, classe.id, classe.libelle libelleClasse, classe.departement, departement.id idDepartement, departement.libelle libelleDepartement, matiere.id, matiere.libelle libelleMatiere FROM `matiere-classe` matcla INNER JOIN classe ON matcla.idClasse=classe.id INNER JOIN departement ON classe.departement=departement.id INNER JOIN matiere ON matcla.idMatiere=matiere.id";
            return $this->select($req,$params);
        }
        
        public function getMatiereClasseDepartementEnseignant(){//récupère les matières leur classe et départements
            $req="SELECT users.prenomUser,users.nomUser, matcla.idMatiere, matcla.idClasse, matcla.coefficient coefMatiere, classe.id, classe.libelle libelleClasse, classe.departement, departement.id idDepartement, departement.libelle libelleDepartement, matiere.id, matiere.libelle libelleMatiere FROM `matiere-classe` matcla INNER JOIN classe ON matcla.idClasse=classe.id INNER JOIN departement ON classe.departement=departement.id INNER JOIN matiere ON matcla.idMatiere=matiere.id LEFT JOIN cours ON matcla.idMatiere=cours.idMatiere LEFT JOIN formateur ON cours.matUser=formateur.matUser LEFT JOIN users ON formateur.matUser=users.matUser";
            return $this->select($req,$params);
        }

        public function getMatiereByClasse($idClasse){//récupère les matières en fonction de la classe
            $req="SELECT mc.idMatiere idMatiere, mc.coefficient coefMatiere, m.libelle libelleMatiere from `matiere-classe` mc INNER JOIN matiere m ON mc.idMatiere=m.id where mc.idClasse=:idClasse";
            $params = array(
                    "idClasse" => $idClasse
            );
            return $this->select($req,$params);
        }
        
        public function getMatiereByEnseignant($idEnseignant){//récupère la liste des matières enseignées par un enseignant donné
            $req="select matUser, idMatiere, idClasse, matiere.id, matiere.libelle libMatiere, departement.id idDepartement, departement.libelle libDepartement, classe.id, classe.libelle libClasse,classe.departement from cours, classe, departement, matiere WHERE idMatiere=matiere.id and idClasse=classe.id and classe.departement=departement.id and `matUser` = :matUser";
            $params = array(
                "matUser" => $idEnseignant
            );
            return $this->select($req,$params);
        }
        
        public function getMatiereByEnseignantAndClasse($idClasse,$idUser){//récupère la liste des matières enseignées par un enseignant donné dans une classe donnée
            $req="SELECT m.id idMatiere, m.libelle libelleMatiere, cours.idCours idCours from `matiere-classe` mc INNER JOIN matiere m ON mc.idMatiere=m.id INNER JOIN cours ON mc.idMatiere=cours.idMatiere WHERE mc.idClasse=:idClasse and cours.matUser=:idUser";
            $params = array(
                    "idClasse" => $idClasse,
                    "idUser"   => $idUser
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
        public function getCours(){//récupère la liste des matières enseignées par un enseignant donné
            $req="SELECT cours.*, users.prenomUser, users.nomUser FROM `cours` INNER JOIN formateur ON cours.matUser=formateur.matUser INNER JOIN users ON formateur.matUser=users.matUser";
            $params = array();
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
            $req="SELECT n.idMatiere, n.noteControle, n.noteTP, n.noteExamen, m.libelle from notes n INNER JOIN matiere m ON n.idMatiere=m.id where n.matUser=:matUser";
            $params = array(
                "matUser" => $idEleve
            );
            return $this->select($req,$params);
        }

        public function getNoteByUserandMatiere($idEleve,$idMatiere){//récupération des notes en fonction de l'utilisateur et de la matière
            $req="SELECT * from notes where matUser=:matUser and idMatiere=:idMatiere";
            $params = array(
                "matUser" => $idEleve,
                "idMatiere" => $idMatiere,
            );
            return $this->select($req,$params);
        }

        //get Calendar by Id Classe

        public function getCalendarByIdClasse($idClasse){
            $req="SELECT * from calendrier where idClasse=:idClasse";
            $params = array(
                "idClasse" => $idClasse
                
            );
            return $this->select($req,$params);
        }
        
        public function getMessagesByUser($matUser){
            $req="SELECT * from message where correspondant=:matUser and supprime=0 ORDER BY idMessage desc";
            $params = array(
                "matUser" => $matUser,
            );
            return $this->select($req,$params);
        }

        public function getCahierTexte($idMatiere,$idClasse){
            $req="SELECT cahiertexte.*, partiecours.nomPartie, partiecours.etatPartie, partiecours.observation from cahiertexte INNER JOIN partiecours ON cahiertexte.idPartie=partiecours.idPartie WHERE cahiertexte.idMatiere=:idMatiere AND cahiertexte.idClasse=:idClasse ORDER BY partiecours.idPartie ASC";
            $params = array(
                "idMatiere" => $idMatiere,
                "idClasse" => $idClasse
                );
            return $this->select($req,$params);
        }
        
        public function getOffre(){
            $req="SELECT * from offre";
            $params = array();
            return $this->select($req,$params);
        }
        
        public function getPayementByEleve($idEleve){
            $req="SELECT payement.*, eleve.matUser from eleve INNER JOIN payement ON eleve.matUser=payement.matuser where eleve.matuser=:idEleve";
            $params = array("idEleve"=> $idEleve);
            return $this->select($req,$params);
        }
    //fin méthodes de recupération dans la base de données

    //méthodes d'enregistement dans la base de données
        public function setUser($donnees,$photo){//enregistrement des nouveaux utilisateurs
            $req = "INSERT INTO `users` (`matUser`, `prenomUser`, `nomUser`, `pseudoUser`, `sexeUser`, `naissanceUser`, `lieuNaissance`, `adresseUser`, `contactUser`, `passwordUser`, `dateInscription`, `photo`,`supprimer`, `statutUser`) VALUES (:matUser, :prenomUser, :nomUser, :pseudoUser, :sexeUser, :naissanceUser, :lieuNaissance, :adresseUser, :contactUser,:passwordUser, :dateInscription, :photo,:supprimer, :statutUser)";
            $params = array(
                    "matUser" => $donnees["matUser"],
                    "prenomUser" => $donnees["prenomUser"],
                    "nomUser" => mb_strtoupper($donnees["nomUser"]),
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
             "matUser" => htmlspecialchars($donnees["matUser"]),
             "idClasse" => htmlspecialchars($donnees["idClasse"])
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
        /*  Insertion en Emploi du temps debut */
        public function setEmploi($donnees){ // enregistrement pour 8h
            $req = "INSERT INTO `calendrier` ( `idClasse`, `lundi`,`mardi`,`mercredi`,  `jeudi`,`vendredi`,`samedi`) VALUES (:idClasse , :lundi , :mardi , :mercredi,:jeudi,:vendredi, :samedi)";
            $params = array(
                "idClasse" => $donnees["idClasse"],
                "lundi" =>       $donnees["lundi_8"].'*'.$donnees["lundi_9"].'*'.$donnees["lundi_10"].'*'       
                                 .$donnees["lundi_11"].'*'.$donnees["lundi_12"].'*'.$donnees["lundi_13"].'*'
                                 .$donnees["lundi_14"].'*'.$donnees["lundi_15"].'*'.$donnees["lundi_16"].'*'
                                 .$donnees["lundi_17"].'*'.$donnees["lundi_18"].'*'.$donnees["lundi_19"],

                "mardi" =>       $donnees["mardi_8"].'*'.$donnees["mardi_9"].'*'.$donnees["mardi_10"].'*'       
                                 .$donnees["mardi_11"].'*'.$donnees["mardi_12"].'*'.$donnees["mardi_13"].'*'
                                 .$donnees["mardi_14"].'*'.$donnees["mardi_15"].'*'.$donnees["mardi_16"].'*'
                                 .$donnees["mardi_17"].'*'.$donnees["mardi_18"].'*'.$donnees["mardi_19"],

                "mercredi" => $donnees["mercredi_8"].'*'.$donnees["mercredi_9"].'*'.$donnees["mercredi_10"].'*'       
                                 .$donnees["mercredi_11"].'*'.$donnees["mercredi_12"].'*'.$donnees["mercredi_13"].'*'
                                 .$donnees["mercredi_14"].'*'.$donnees["mercredi_15"].'*'.$donnees["mercredi_16"].'*'
                                 .$donnees["mercredi_17"].'*'.$donnees["mercredi_18"].'*'.$donnees["mercredi_19"],

                "jeudi" =>       $donnees["jeudi_8"].'*'.$donnees["jeudi_9"].'*'.$donnees["jeudi_10"].'*'       
                                 .$donnees["jeudi_11"].'*'.$donnees["jeudi_12"].'*'.$donnees["jeudi_13"].'*'
                                 .$donnees["jeudi_14"].'*'.$donnees["jeudi_15"].'*'.$donnees["jeudi_16"].'*'
                                 .$donnees["jeudi_17"].'*'.$donnees["jeudi_18"].'*'.$donnees["jeudi_19"],

                "vendredi" => $donnees["vendredi_8"].'*'.$donnees["vendredi_9"].'*'.$donnees["vendredi_10"].'*'       
                                 .$donnees["vendredi_11"].'*'.$donnees["vendredi_12"].'*'.$donnees["vendredi_13"].'*'
                                 .$donnees["vendredi_14"].'*'.$donnees["vendredi_15"].'*'.$donnees["vendredi_16"].'*'
                                 .$donnees["vendredi_17"].'*'.$donnees["vendredi_18"].'*'.$donnees["vendredi_19"],
                "samedi" => $donnees["samedi_8"].'*'.$donnees["samedi_9"].'*'.$donnees["samedi_10"].'*'       
                                 .$donnees["samedi_11"].'*'.$donnees["samedi_12"].'*'.$donnees["samedi_13"].'*'
                                 .$donnees["samedi_14"].'*'.$donnees["mardi_15"].'*'.$donnees["samedi_16"].'*'
                                 .$donnees["samedi_17"].'*'.$donnees["samedi_18"].'*'.$donnees["samedi_19"]

            );
            return $this->insert($req,$params);
        }
        
         /*  Insertion en Emploi du temps Fin */
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
            $req="INSERT INTO `cours` (`matUser`, `idMatiere`,`idClasse`,`idCours`) VALUES (:matUser, :idMatiere, :idClasse,NULL)";
            $params = array(
                "matUser" => $idEnseignant,
                "idMatiere" => $idMatiere,
                "idClasse" => $idClasse
            );
            return $this->insert($req,$params);
        }
        
        public function setMessage($correspondant,$expediteur,$message,$objet){//récupère la liste des matières enseignées par un enseignant donné
            $req="INSERT INTO `message` (`idMessage`,`objetMessage`,`expediteurMessage`,`correspondant`,`contenuMessage`) VALUES (NULL,:objetMessage,:expediteurMessage,:correspondant,:contenuMessage)";
            $params = array(
                "objetMessage" => $objet,
                "expediteurMessage" => $expediteur,
                "correspondant" => $correspondant,
                "contenuMessage" => $message
            );
            return $this->insert($req,$params);
        }
        
        public function setNote($donnees){//récupère la liste des matières enseignées par un enseignant donné
            $req="INSERT INTO `notes` (`matUser`, `idMatiere`,`noteControle`,`noteTP`,`noteExamen`) VALUES (:matUser, :idMatiere, :noteControle, :noteTP, :noteExamen)";
            $params = array(
                "matUser" => $donnees["identifiant"],
                "idMatiere" => $donnees["idMatiere"],
                "noteControle" => $donnees["noteControle"],
                "noteTP" => $donnees["noteTP"],
                "noteExamen" => $donnees["noteExamen"]
            );
            return $this->insert($req,$params);
        }
        
        public function setCahierTexte($donnees,$idPartie){//
            $req="INSERT INTO `cahiertexte` (`idMatiere`,`idClasse`,`idPartie`) VALUES (:idMatiere, :idClasse, :idPartie)";
            $params = array(
                "idMatiere" => $donnees["idMatiere"],
                "idClasse" => $donnees["idClasse"],
                "idPartie" => $idPartie
            );
            return $this->insert($req,$params);
        }
        
        public function setPartieCours($donnees){//
            $req="INSERT INTO `partiecours` (`idPartie`,`nomPartie`,`etatPartie`,`observation`) VALUES (NULL,:nomPartie, :etatPartie, :observation)";
            $params = array(
                "nomPartie" => $donnees["nomPartieMatiere"],
                "etatPartie" => 0,
                "observation" => " "
            );
            return $this->insert($req,$params);
        }

        public function setFichePresence($idClasse){//
            $req="INSERT INTO `fichepresence`(`idFichePresence`,`idClasse`) VALUES (NULL,:idClasse)";
            $params = array(
                "idClasse" => $idClasse
            );
            return $this->insert($req,$params);
        }
        
        public function setAbsents($idFiche,$idEleve){//
            $req="INSERT INTO `absents`(`idFiche`,`idEleve`) VALUES (:idFiche,:idEleve)";
            $params = array(
                "idFiche" => htmlspecialchars($idFiche),
                "idEleve" => htmlspecialchars($idEleve)
            );
            return $this->insert($req,$params);
        }
        
        public function setEvaluation($donnees,$date){//
            $req="INSERT INTO `evaluation`(`idEvaluation`,`dateEvaluation`,`typeEvaluation`,`idCours`) VALUES (NULL,:dateEvaluation,:typeEvaluation,:idCours)";
            $params = array(
                "dateEvaluation" => htmlspecialchars($date),
                "typeEvaluation" => htmlspecialchars($donnees['typeEvaluation']),
                "idCours" => htmlspecialchars($donnees['idCours'])
            );
            return $this->insert($req,$params); 		
        }
        
        public function setOffre($donnees){//Ajoute une nouvelle offre à la base de données
            $req="INSERT INTO `offre`(`idOffre`,`libelleOffre`,`prixOffre`) VALUES (NULL,:libelleOffre,:prixOffre)";
            $params = array(
                "libelleOffre" => htmlspecialchars($donnees['libelleOffre']),
                "prixOffre" => htmlspecialchars($donnees['prixOffre'])
            );
            return $this->insert($req,$params); 		
        }
        
        public function setPayement($idEleve,$idOffre,$montant){//Ajoute une nouvelle offre à la base de données
            $req="INSERT INTO `payement`(matUser, idOffre, montantPayement) VALUES (:matUser,:idOffre,:montantPayement)";
            $params = array(
                "matUser" => htmlspecialchars($idEleve),
                "idOffre" => htmlspecialchars($idOffre),
                "montantPayement" => htmlspecialchars($montant)
            );
            return $this->insert($req,$params); 		
        }
        //fin méthodes d'enregistement dans la base de données

    //méthodes de mise à jour dans la base de données
        public function updateEmploi($donnees){ // enregistrement pour 8h
            $req = "UPDATE `calendrier` SET `lundi` = :lundi,`mardi` = :mardi,`mercredi` = :mercredi,`jeudi` = :jeudi,`vendredi` = :vendredi, `samedi` = :samedi WHERE idClasse = :idClasse";
            $params = array(
                "idClasse" => $donnees["idClasse"],
                "lundi" =>       $donnees["lundi_8"].'*'.$donnees["lundi_9"].'*'.$donnees["lundi_10"].'*'       
                                 .$donnees["lundi_11"].'*'.$donnees["lundi_12"].'*'.$donnees["lundi_13"].'*'
                                 .$donnees["lundi_14"].'*'.$donnees["lundi_15"].'*'.$donnees["lundi_16"].'*'
                                 .$donnees["lundi_17"].'*'.$donnees["lundi_18"].'*'.$donnees["lundi_19"],

                "mardi" =>       $donnees["mardi_8"].'*'.$donnees["mardi_9"].'*'.$donnees["mardi_10"].'*'       
                                 .$donnees["mardi_11"].'*'.$donnees["mardi_12"].'*'.$donnees["mardi_13"].'*'
                                 .$donnees["mardi_14"].'*'.$donnees["mardi_15"].'*'.$donnees["mardi_16"].'*'
                                 .$donnees["mardi_17"].'*'.$donnees["mardi_18"].'*'.$donnees["mardi_19"],

                "mercredi" => $donnees["mercredi_8"].'*'.$donnees["mercredi_9"].'*'.$donnees["mercredi_10"].'*'       
                                 .$donnees["mercredi_11"].'*'.$donnees["mercredi_12"].'*'.$donnees["mercredi_13"].'*'
                                 .$donnees["mercredi_14"].'*'.$donnees["mercredi_15"].'*'.$donnees["mercredi_16"].'*'
                                 .$donnees["mercredi_17"].'*'.$donnees["mercredi_18"].'*'.$donnees["mercredi_19"],

                "jeudi" =>       $donnees["jeudi_8"].'*'.$donnees["jeudi_9"].'*'.$donnees["jeudi_10"].'*'       
                                 .$donnees["jeudi_11"].'*'.$donnees["jeudi_12"].'*'.$donnees["jeudi_13"].'*'
                                 .$donnees["jeudi_14"].'*'.$donnees["jeudi_15"].'*'.$donnees["jeudi_16"].'*'
                                 .$donnees["jeudi_17"].'*'.$donnees["jeudi_18"].'*'.$donnees["jeudi_19"],

                "vendredi" => $donnees["vendredi_8"].'*'.$donnees["vendredi_9"].'*'.$donnees["vendredi_10"].'*'       
                                 .$donnees["vendredi_11"].'*'.$donnees["vendredi_12"].'*'.$donnees["vendredi_13"].'*'
                                 .$donnees["vendredi_14"].'*'.$donnees["vendredi_15"].'*'.$donnees["vendredi_16"].'*'
                                 .$donnees["vendredi_17"].'*'.$donnees["vendredi_18"].'*'.$donnees["vendredi_19"],
                "samedi" => $donnees["samedi_8"].'*'.$donnees["samedi_9"].'*'.$donnees["samedi_10"].'*'       
                                 .$donnees["samedi_11"].'*'.$donnees["samedi_12"].'*'.$donnees["samedi_13"].'*'
                                 .$donnees["samedi_14"].'*'.$donnees["mardi_15"].'*'.$donnees["samedi_16"].'*'
                                 .$donnees["samedi_17"].'*'.$donnees["samedi_18"].'*'.$donnees["samedi_19"]

            );
            return $this->insert($req,$params);
        }
        
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
        
        public function updateNote($donnees){
            $req = "UPDATE `notes` SET `noteControle` = :noteControle, `noteTP` = :noteTP, `noteExamen`=:noteExamen WHERE `notes`.`matUser` = :matUser AND `notes`.`idMatiere` = :idMatiere";
            $params = array(
                "matUser" => $donnees["identifiant"],
                "idMatiere" => $donnees["idMatiere"],
                "noteControle" => $donnees["noteControle"],
                "noteTP" => $donnees["noteTP"],
                "noteExamen" => $donnees["noteExamen"]
            );
            return $this->update($req,$params);
        }
        
        public function updatePartieCours($donnees){
            $req = "UPDATE `partiecours` SET `etatPartie` = 1, observation=:observation WHERE idPartie=:idPartie";
            $params = array(
                "idPartie" => $donnees["idPartie"],
                "observation" => $donnees["observation"]
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
    
    public function updateChef($donnees){//Choix d'un chef
        $req = "update eleve set role= 2 where matUser=:pseudo";
        $params = array(
            "pseudo"=> explode("|", $donnees["chefClasse"])[0]
        );
        return $this->update($req,$params);
    }
    
    public function updateReinitChef($donnees){//Enlève l'ancien chef de classe
        $req ="update eleve set role= 1 where role=2 and idClasse=:idClasse";
        $params = array(
            "idClasse"=>$donnees["idClasse"]
        );
        return $this->update($req,$params);
    }
    
    public function updateChefClasse($donnees){//Ajouter le chef au niveau de la table classe
        $req = "update classe set chefClasse=:pseudo WHERE id=:idClasse";
        $params = array(
            "pseudo"=>$donnees["chefClasse"],
            "idClasse"=>$donnees["idClasse"]
        );
        return $this->update($req,$params);
    }
    
    public function updateAdjoint($donnees){//Choix d'un chef de classe
        $req = "update eleve set role= 3 where matUser=:pseudo";
        $params = array(
            "pseudo"=>explode("|", $donnees["adjointChef"])[0]
        );
        return $this->update($req,$params);
    }
    
    public function updateReinitAdjoint($donnees){//Enlève l'ancien chef de classe
        $req = "update eleve set role= 1 WHERE role=3 and idClasse=:idClasse";
        $params = array(
            "idClasse"=>$donnees["idClasse"]
        );
        return $this->update($req,$params);
    }
    
    public function updateAdjointClasse($donnees){//Ajouter l'adjoint eu niveau de la table classe
        $req = "update classe set adjointChef=:pseudo WHERE id=:idClasse";
        $params = array(
            "pseudo"=>$donnees["adjointChef"],
            "idClasse"=>$donnees["idClasse"]
        );
        return $this->update($req,$params);
    }

    public function updateEnseignantResponsable($donnees){//Ajouter le role de responsable à un enseigant 
        $req = "update formateur set role= 2 where matUser=:pseudo";
        $params = array(
            "pseudo"=>explode("|", $donnees["respClasse"])[0]
        );
        return $this->update($req,$params);
    }
    
    public function updateReinitResponsable($donnees){//Enlève l'ancien responsable de classe
        $req = "update formateur set role= 1 WHERE role=2 and matUser=:pseudo";
        $params = array(
            "pseudo"=>$donnees["idProf"]
        );
        return $this->update($req,$params);
    }
    
    public function updateResponsableClasse($donnees){//Affecter un prof responsable à une classe 
        $req = "update classe set profResponsable=:pseudo WHERE id=:idClasse";
        $params = array(
            "pseudo"=>$donnees["respClasse"],
            "idClasse"=>$donnees["idClasse"]
        );
        return $this->update($req,$params);
    }
    
    public function updateEraseResponsableClasse($donnees){//Affecter un prof responsable à une classe 
        $req = "update classe set profResponsable=:pseudo WHERE `profResponsable` LIKE :user";
        $params = array(
            "pseudo"=>" ",
            "user"=>"%".$donnees["respDepartement"]."%"
        );
        return $this->update($req,$params);
    }
    
    public function updateReinitResponsableDepartement($donnees){//Enlève l'ancien responsable du département
        $req = "update formateur set role= 1 WHERE role=3 and matuser=:matUser";
        $params = array(
            "matUser"=>explode("|", $donnees["respDepartement"])[0]
        );
        return $this->update($req,$params);
    }
    
    public function updateEnseignantResponsableDepartement($donnees){//Ajouter le role de responsable à un enseigant 
        $req = "update formateur set role= 3 where matUser=:pseudo";
        $params = array(
            "pseudo"=>explode("|", $donnees["respDepartement"])[0]
        );
        return $this->update($req,$params);
    } 
    
    public function updateResponsableDepartement($donnees){//Affecter un prof responsable à une classe
        $req = "UPDATE `departement` SET `responsable` = :pseudo WHERE `departement`.`id` = :idDepartement";
        $params = array(
            "pseudo"=>$donnees["respDepartement"],
            "idDepartement"=>$donnees["idDepartement"]
        );
        return $this->update($req,$params);
    }

    public function updateEraseResponsableDepartement($donnees){//Affecter un prof responsable à une classe
        $req = "UPDATE `departement` SET `responsable` = '' WHERE `responsable` LIKE :user";
        $params = array(
            "user"=>"%".$donnees["respClasse"]."%"
        );
        return $this->update($req,$params);
    }
    
    public function updateClasseEleve($donnees){//Affecter un prof responsable à une classe
        $req = "UPDATE `eleve` SET `idClasse`=:idClasse WHERE matUser=:idEleve";
        $params = array(
            "idClasse"=>$donnees["idClasse"],
            "idEleve"=>$donnees["idEleve"]
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
    public function user($pseudo){
        $req = "select * from users where matUser = :pseudo Limit 1";
        $params = array(
            "pseudo"=>$pseudo
        );
        return $this->select($req,$params);
    }

    public function getClasseByDeptAndRespo(){
        
    }
}
