<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
define("MAILUSER", "automate@madmakiti.com");
define("MAILPASS", "*a24268834C");
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
    
    //methode dimportation des images sur le serveur
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
    
    //methode d'envoi des emails
    public function envoieMail($email,$prenom,$message,$alternative){
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;
        $mail->IsSMTP(); // activation des fonctions SMTP
        $mail->SMTPAuth = true; // on l’informe que ce SMTP nécessite une autentification
        // $mail->SMTPSecure = 'ssl';//'ssl'; // protocole utilisé pour sécuriser les mails 'ssl' ou 'tls'
        $mail->Host = "mail09.lwspanel.com";//"smtp.gmail.com"; // définition de l’adresse du serveur SMTP : 25 en local, 465 pour ssl et 587 pour tls
        //$mail->Port = 143;//465; // définition du port du serveur SMTP
        $mail->Username = MAILUSER;// le nom d’utilisateur SMTP
        $mail->Password = MAILPASS;// son mot de passe SMTP

        // Paramètres du mail
        $mail->AddAddress($email,$prenom); // ajout du destinataire
        $mail->From = "automate@madmakiti.com";//"urbinonani@gmail.com"; // adresse mail de l’expéditeur
        $mail->FromName = "MadinaMakiti"; // nom de l’expéditeur
        $mail->AddReplyTo("urbinonani@gmail.com","Noreplay"); // adresse mail et nom du contact de retour
        $mail->IsHTML(true); // envoi du mail au format HTML
        $mail->Subject = "Sujet"; // sujet du mail
        $mail->Body =  $message;// le corps de texte du mail en HTML
        $mail->AltBody =  $alternative;// le corps de texte du mail en texte brut si le HTML n'est pas supporté

        if(!$mail->Send()){ // envoi du mail
            return "Mailer Error: " . $mail->ErrorInfo; // affichage des erreurs, s’il y en a
        }
        else{
            return  "Le message a bien été envoyé !";
        }

    }
}

