<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Fonctions{
    public function __construct(){
    }
    public function liens(){
    
    }
    public function formatDate($dateAnglais){
        return date("d/m/Y", strtotime($dateAnglais));
    }
    
    public function age($date){
        $now=date("Y-m-d");
        
        $diffjour=floor((strtotime($now)-strtotime($date))/86400);
        if ($diffjour<30)
        {
            $jour=$diffjour." jours";
        }
        else if($diffjour<30*24)
        {
            $moiss=floor($diffjour/30)." mois";
                        $jour=floor($diffjour%30)." jours";

        }
        else 
                {
                  $an=floor($diffjour/(365))." ans";
                  $jourrestant=floor($diffjour%(365));
                  $moiss=floor($jourrestant/30)." mois";
                  $jour=floor($jourrestant%30)." jours";
        }
        return $an." ".$moiss;
    }
    
    public function dateFrEn($date){        
        return implode("-",array_reverse(explode("/", $date)));
		//$date=explode("/",$date1);
		//return $date[2]."-".$date[1]."-".$date[0];
    }
    
    public function enregImg($fichier,$nouveauNom,$cheminEnreg){
        if (isset($fichier) AND $fichier["error"] == 0)
        {   
          // Testons si le fichier n'est pas trop gros
          if ($fichier['size'] <= 3000000)
          {

                   // Testons si l'extension est autorisée
                  $infosfichier = pathinfo($fichier['name']);//recuperation de toutes les infos du fichier
                  $extension_upload = $infosfichier['extension'];//recuperation de l'extension du fichier
                  $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');//tableau des extensions acceptées
                  $fichierphoto=$nouveauNom.".".$infosfichier['extension'];//nouveau nom du fichier
                  if (in_array($extension_upload, $extensions_autorisees))//si l'extension du fichier fait partir des extensions autorisées
                  {
                      move_uploaded_file($fichier['tmp_name'], $cheminEnreg.$fichierphoto);//deplacement du fichier dans le bon dossier
                      return array(1,$cheminEnreg.$fichierphoto);//renvoie du chemin pour enregistrement dans la base de données
                  }  else {
                      return array(0,"l'extension de votre fichier n'est pas autorisé");//renvoie d'erreur
                  }
          }  else {
              return array(0,"la taille du fichier est élevé");//renvoie d'erreur
          }


        }  else {
            return array(0,"erreur lors de la recuperation du fichier");
        }
    }
}

