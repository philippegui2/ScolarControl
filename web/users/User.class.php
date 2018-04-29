<?php
/*
*fichier de tout type d'utilisateur
*
*/
Class User
{
    private $matricule;
    private $nom;
    private $prenom;
    private $pseudo;
    private $sexe;
    private $naissance;
    //constructeur
    public function __construct($matricule, $prenom, $nom, $pseudo, $sexe, $naissance)
    {
      $this->matricule = $matricule;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->pseudo = $pseudo;
      $this->sexe = $sexe;
      $this->naissance = $naissance;
    }
    //getteurs et setteurs
    public function getMatricule()
    {
      return $this->matricule;
    }

    public function setMatricule($matricule)
    {
      $this->matricule = $matricule;
    }
    //
    // public function getNom()
    // {
    //   return $this->$nom;
    // }
    //
    // public function setNom($nom)
    // {
    //   $this->$nom=$nom;
    // }
    //
    // public function getPrenom()
    // {
    //   return $this->$prenom;
    // }
    //
    // public function setPrenom($prenom)
    // {
    //   $this->$prenom=$prenom;
    // }
    //
    // public function getPseudo()
    // {
    //   return $this->$pseudo;
    // }
    //
    // public function setPseudo($pseudo)
    // {
    //   $this->$pseudo=$pseudo;
    // }
    //
    // public function getSexe()
    // {
    //   return $this->$sexe;
    // }
    //
    // public function setSexe($sexe)
    // {
    //   $this->$sexe=$sexe;
    // }
    //
    // public function getNaissance()
    // {
    //   return $this->$naissance;
    // }
    //
    // public function setNaissance($naissance)
    // {
    //   $this->$naissance=$naissance;
    // }
}
