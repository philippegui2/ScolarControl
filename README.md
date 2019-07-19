@@ -1,69 +0,0 @@
# ScolarControl
gestion scolaire
## Objectifs #
* Permettre:
	* Une gestion facile des dossiers des élèves
        * Une bonne gestionn transparente des notes
	* Un bon suivi des elèves
	* Une bonne gestion de tous les acteurs participants à la scolarité
	* une gestion efficaces des payements scolaires 
	* Aux parents d'élèves de surveiller les activités scolaires des leurs enfants
	* Une bonne gestion des salles et des emplois du temps
        * Possibilité de concevoir des évalustion en ligne (QCM)
        * Association d'une bibliothèque numérique
##Taches à réaliser #
* Developpement:
        * - [x] Modification des informations des élèves (Tidiane & Mamci)[Se baser sur le code de la suppression]
        * - [x] Supresion des utilisateurs, avec ajout de popup-modal pour confirmation
	* - [x] Choix des langages de programmation
	* - [x] Développement des IHM
	* - [x] Authentification des utilisateurs lors de la connexion
	* - [x] Envoi des utilisateurs vers la bonne vue en fonction de leur statut _enseignant_ _élève_ _parent d'élève_
	* - [x] Ajout des restictions en fonction du dit statut
	* - [ ] developpement des 
	* - [x] Repartition des vues en fonctions des status
	* - [x] Début de developpement de la vue admin
	* - [x] Début de developpement de la vue élève (Jean)
        * - [x] Obliger l'élève à modifier son mot de passe lors de la première connexion (Jean)
        * - [x] Page accueil (Jean)
        * - [x] Visualisation des notes dans les matières (Jean)
        * - [ ] Visualisation de l'état de la scolarité
        * - [ ] Visualisation de l'emploi du temps
        * - [ ] Visualisation de la régularité aux cours [les absences]
        * - [x] Fonction ajout de département
        * - [x] Fonction ajout d'élève
        * - [x] Fonction ajout de classe
        * - [x] Fonction ajout de Matière
	* - [ ] Début de developpement de la vue enseignant
        * - [ ] Possibilité d'ajout des enseignats aux classes
	* - [ ] Début de developpement de la vue gardien
        * - [ ] Ajouter la possibilité de fabriquer des requètes avec des cases à cocher (ex. effectif de tous les DUT1)
        * - [ ] Ajouter la gestion des presences en module paramètrable (par API optionnel)
        * - [ ] Ajouter le module d'évaluation des élèves
        * - [ ] Ajouter le module d'évaluation des enseignants
        * - [ ] Modifier la fonction de hachage MD5 -> SHA1
* Base de données:
	* - [x] Choix du type de base de données en fonction du nombre de requetes par unité de temps et du type d'information
	* - [x] Création de la base de données
	* - [ ] Ajout des tables en fonction de la nécessité
	* - [ ] Ajout des clés dans le respect total des règles
* Systèmes & Télécoms:
	* - [ ] Ajout d'evoie de notificaions par SMS

	
##Taches Réalisées #
* Développement:
	* Choix des langages de programmation _php /Objet_ _Javascript/Jquery_ _Ajax_ _JSON_
	* Développement des IHM
	* Athentification des utilisateurs lors de la connexion
	* Envoi des utilisateurs vers la bonne vue en fonction de leur statut _enseignant_ _élève_ _parent d'élève_
	* Repartition des vues en fonctions des status
	* Début de developpement de la vue admin
	* Début de developpement de la vue élève
*	Base de données:
	* Type de base de données choisie _Mysql_
	* Création de la base de données
* Systèmes & Télécoms

##Focntionnalités à ajouter##
*possibilité de voir la liste des élèves qui ne sont pas en règles et ceci par classe (zone comptabilité)
