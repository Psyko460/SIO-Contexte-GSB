<?php
    /**
     * Classe d'accès aux données.

     * Utilise les services de la classe PDO
     * pour l'application GSB
     * Les attributs sont tous statiques,
     * les 4 premiers pour la connexion
     * $monPdo de type PDO
     * $monPdoGsb qui contiendra l'unique instance de la classe

     * @package default
     * @author Cheri Bibi
     * @version    1.0
     * @link       http://www.php.net/manual/fr/book.pdo.php
     */

    class PdoGsb
    {
        private static $serveur='mysql:host=localhost';
        private static $bdd='dbname=gsb_frais';
        private static $user='root' ;
        private static $mdp='ArtemisLL' ;
        private static $monPdo;
        private static $monPdoGsb=null;

        /**
         * Constructeur privé, crée l'instance de PDO qui sera sollicitée
         * pour toutes les méthodes de la classe
         */
        private function __construct()
        {
            PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp);
            PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
        }

        public function _destruct()
        {
            PdoGsb::$monPdo = null;
        }

        /**
         * Fonction statique qui crée l'unique instance de la classe

         * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();

         * @return l'unique objet de la classe PdoGsb
         */
        public  static function getPdoGsb()
        {
            if(PdoGsb::$monPdoGsb==null)
            {
                PdoGsb::$monPdoGsb= new PdoGsb();
            }
            return PdoGsb::$monPdoGsb;
        }

        /**
        * Retourne les informations d'un visiteur

        * @param $login
        * @param $mdp
        * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
        */
        public function getInfosVisiteur($login, $mdp)
        {
            $reqVisitor = "SELECT Visiteur.id AS id, Visiteur.nom AS nom, Visiteur.prenom AS prenom, Visiteur.mdp FROM Visiteur
            WHERE Visiteur.login='$login'";

            $reqComptable = "SELECT Comptable.id AS id, Comptable.nom AS nom, Comptable.prenom AS prenom, Comptable.mdp FROM Comptable
            WHERE Comptable.login='$login'";

            $rsVisitor = PdoGsb::$monPdo->query($reqVisitor);
            $ligneVisitor = $rsVisitor->fetch();

            if (password_verify($mdp, $ligneVisitor['mdp']))
            {
                return $ligneVisitor;
            }
            else
            {
               $rsComptable = PdoGsb::$monPdo->query($reqComptable);
               $ligneComptable = $rsComptable->fetch();

               if (password_verify($mdp, $ligneComptable['mdp']))
               {
                   return $ligneComptable;
               }
            }
        }

        /**
        * Vérifie le type d'utilisateur qui se connecte

        * @param $login
        * @param $mdp
        * @return le rôle de l'utilisateur
        */
        public function getUserType($login, $mdp)
        {
            $query = "SELECT role AS role FROM Utilisateur, Visiteur WHERE Visiteur.id=Utilisateur.id AND Utilisateur.role='Visiteur'
               AND login='$login'";
            $rs = PdoGsb::$monPdo->query($query);
            $count = $rs->rowCount();
            $result = $rs->fetch();

            if ($count == 0)
            {
               $query = "SELECT role AS role FROM Utilisateur, Comptable WHERE Comptable.id=Utilisateur.id AND Utilisateur.role='Comptable'
                  AND login='$login'";
               $rs = PdoGsb::$monPdo->query($query);
               $result = $rs->fetch();

               return "Comptable";
            }

            return "Visiteur";
        }

        /**
         * Retourne les informations de tous les visiteurs

         * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
        */
        public function getLesVisiteurs()
        {
            $req = "SELECT id AS id, nom AS name, prenom AS firstName FROM Visiteur";
            $rs = PdoGsb::$monPdo->query($req);
            $lesLignes = $rs->fetchAll();
            return $lesLignes;
        }

        /**
         * Retourne les informations du compte d'un visiteur passé en paramètre'
         * @param $idVisiteur
         * @return le rôle, le nom, le prénom, le login, l'adresse, le CP, la ville, la date d'embauche, ainsi que l'e-mail
        */
        public function getAccountInformations($idVisiteur)
        {
            $req = "SELECT role, nom, prenom, login, adresse, cp, ville, dateEmbauche FROM Utilisateur, Visiteur
                WHERE Utilisateur.id = Visiteur.id AND Utilisateur.id = '$idVisiteur'";
            $res = PdoGsb::$monPdo->query($req);
            $laLigne = $res->fetch();
            return $laLigne;
        }

        /**
         * Encrypte les mots de passe dans la base de donnée et change Visiteur.mdp CHAR(30->255)

         * @return Les requêtes executées
        */
        public function cryptPasswordDbVisitors()
        {
            $alter = "ALTER TABLE `Visiteur` CHANGE COLUMN `mdp` `mdp` CHAR(255) NULL DEFAULT NULL AFTER `login`";
            PdoGsb::$monPdo->query($alter);
            $req = "SELECT id, mdp FROM Visiteur";
            $rs = PdoGsb::$monPdo->query($req);
            $value = "";

            foreach ($rs->fetchAll() as $row)
            {
                $id = $row['id'];
                $pwd = password_hash($row['mdp'], PASSWORD_BCRYPT);
                $req2= "UPDATE `Visiteur` SET `mdp`='$pwd' WHERE `id`='$id';";
                $value .= $req2 . '<br>';
                $rs2 = PdoGsb::$monPdo->query($req2);
            }
            return $value;
        }

        /**
         * Encrypte les mots de passe dans la base de donnée et change Comptable.mdp CHAR(30->255)

         * @return Les requêtes executées
        */
        public function cryptPasswordDbComptable()
        {
            $alter = "ALTER TABLE `Comptable` CHANGE COLUMN `mdp` `mdp` CHAR(255) NULL DEFAULT NULL AFTER `login`";
            PdoGsb::$monPdo->query($alter);
            $req = "SELECT id, mdp FROM Comptable";
            $rs = PdoGsb::$monPdo->query($req);
            $value = "";

            foreach ($rs->fetchAll() as $row)
            {
                $id = $row['id'];
                $pwd = password_hash($row['mdp'], PASSWORD_BCRYPT);
                $req2= "UPDATE `Comptable` SET `mdp`='$pwd' WHERE `id`='$id';";
                $value .= $req2 . '<br>';
                $rs2 = PdoGsb::$monPdo->query($req2);
            }
            return $value;
        }

        public function getAllFichesFrais($idVisiteur)
        {
           $req = "SELECT nbJustificatifs, montantValide, dateModif, libelle FROM FicheFrais, Etat WHERE idVisiteur = '$idVisiteur'
              AND FicheFrais.idEtat = Etat.id";
           $res = PdoGsb::$monPdo->query($req);
           $lesLignes = $res->fetchAll();
           $nbLignes = count($lesLignes);

           for ($i=0; $i<$nbLignes; $i++)
           {
               $date = $lesLignes[$i]['dateModif'];
               $lesLignes[$i]['dateModif'] =  dateAnglaisVersFrancais($date);
           }
           return $lesLignes;
        }

        public function getFichesFraisInPayment($idVisiteur)
        {
           $req = "SELECT nbJustificatifs, montantValide, dateModif, libelle FROM FicheFrais, Etat WHERE idVisiteur = '$idVisiteur'
              AND FicheFrais.idEtat = Etat.id AND idEtat='PA'";
           $res = PdoGsb::$monPdo->query($req);
           $lesLignes = $res->fetchAll();
           $nbLignes = count($lesLignes);

           for ($i=0; $i<$nbLignes; $i++)
           {
               $date = $lesLignes[$i]['dateModif'];
               $lesLignes[$i]['dateModif'] =  dateAnglaisVersFrancais($date);
           }
           return $lesLignes;
        }

        public function getFichesFraisRefunded($idVisiteur)
        {
           $req = "SELECT nbJustificatifs, montantValide, dateModif, libelle FROM FicheFrais, Etat WHERE idVisiteur = '$idVisiteur'
              AND FicheFrais.idEtat = Etat.id AND idEtat='RB'";
           $res = PdoGsb::$monPdo->query($req);
           $lesLignes = $res->fetchAll();
           $nbLignes = count($lesLignes);

           for ($i=0; $i<$nbLignes; $i++)
           {
               $date = $lesLignes[$i]['dateModif'];
               $lesLignes[$i]['dateModif'] =  dateAnglaisVersFrancais($date);
           }
           return $lesLignes;
        }

        public function getFichesFraisValidated($idVisiteur)
        {
           $req = "SELECT nbJustificatifs, montantValide, dateModif, libelle FROM FicheFrais, Etat WHERE idVisiteur = '$idVisiteur'
              AND FicheFrais.idEtat = Etat.id AND idEtat='VA'";
           $res = PdoGsb::$monPdo->query($req);
           $lesLignes = $res->fetchAll();
           $nbLignes = count($lesLignes);

           for ($i=0; $i<$nbLignes; $i++)
           {
               $date = $lesLignes[$i]['dateModif'];
               $lesLignes[$i]['dateModif'] =  dateAnglaisVersFrancais($date);
           }
           return $lesLignes;
        }

        public function getAllMedicines()
        {
           $req = "SELECT * FROM Medicament";
           $res = PdoGsb::$monPdo->query($req);
           $lesLignes = $res->fetchAll();
           
           return $lesLignes;
        }

        public function getAllFournisseurs()
        {
           $req = "SELECT * FROM Fournisseur";
           $res = PdoGsb::$monPdo->query($req);
           $lesLignes = $res->fetchAll();
           
           return $lesLignes;
        }

        public function getAllOrders()
        {
           $req = "SELECT Compt.prenom, Compt.nom, M.libelle, F.nom AS nomFournisseur, C.quantite, C.montant, C.date 
              FROM Comptable Compt, Medicament M, Fournisseur F, Commander C
              WHERE C.idComptable = Compt.id AND C.idMedicament = M.id AND C.idFournisseur = F.id";
           $res = PdoGsb::$monPdo->query($req);
           $lesLignes = $res->fetchAll();
           
           return $lesLignes;
        }

        /**
         * Retourne sous forme d'un tableau associatif toutes les lignes de frais hors forfait
         * concernées par les deux arguments

         * La boucle foreach ne peut être utilisée ici car on procède
         * à une modification de la structure itérée - transformation du champ date-

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @return tous les champs des lignes de frais hors forfait sous la forme d'un tableau associatif
        */
        public function getLesFraisHorsForfait($idVisiteur,$mois)
        {
            $req = "SELECT * FROM LigneFraisHorsForfait WHERE LigneFraisHorsForfait.idVisiteur='$idVisiteur'
            AND LigneFraisHorsForfait.mois='$mois'";
            $res = PdoGsb::$monPdo->query($req);
            $lesLignes = $res->fetchAll();
            $nbLignes = count($lesLignes);

            for ($i=0; $i<$nbLignes; $i++)
            {
                $date = $lesLignes[$i]['date'];
                $lesLignes[$i]['date'] =  dateAnglaisVersFrancais($date);
            }
            return $lesLignes;
        }

        /**
         * Retourne le nombre de justificatif d'un visiteur pour un mois donné

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @return le nombre entier de justificatifs
        */
        public function getNbjustificatifs($idVisiteur, $mois)
        {
            $req = "SELECT FicheFrais.nbJustificatifs AS nb FROM FicheFrais WHERE FicheFrais.idVisiteur='$idVisiteur' AND FicheFrais.mois='$mois'";
            $res = PdoGsb::$monPdo->query($req);
            $laLigne = $res->fetch();
            return $laLigne['nb'];
        }

        /**
         * Retourne sous forme d'un tableau associatif toutes les lignes de frais au forfait
         * concernées par les deux arguments

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @return l'id, le libelle et la quantité sous la forme d'un tableau associatif
        */
        public function getLesFraisForfait($idVisiteur, $mois)
        {
            $req = "SELECT FraisForfait.id AS idfrais, FraisForfait.libelle AS libelle, LigneFraisForfait.quantite AS quantite, FraisForfait.montant AS montant,
            (montant*quantite) AS total FROM LigneFraisForfait INNER JOIN FraisForfait ON FraisForfait.id=LigneFraisForfait.idFraisForfait
            WHERE LigneFraisForfait.idVisiteur='$idVisiteur' AND LigneFraisForfait.mois='$mois' ORDER BY LigneFraisForfait.idFraisForfait";
            $res = PdoGsb::$monPdo->query($req);
            $lesLignes = $res->fetchAll();
            return $lesLignes;
        }

        /**
         * Retourne tous les id de la table FraisForfait

         * @return un tableau associatif
        */
        public function getLesIdFrais()
        {
            $req = "SELECT FraisForfait.id AS idfrais FROM FraisForfait ORDER BY FraisForfait.id";
            $res = PdoGsb::$monPdo->query($req);
            $lesLignes = $res->fetchAll();
            return $lesLignes;
        }

        /**
         * Met à jour la table ligneFraisForfait

         * Met à jour la table ligneFraisForfait pour un visiteur et
         * un mois donné en enregistrant les nouveaux montants

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @param $lesFrais tableau associatif de clé idFrais et de valeur la quantité pour ce frais
         * @return un tableau associatif
        */
        public function majFraisForfait($idVisiteur, $mois, $lesFrais)
        {
            $lesCles = array_keys($lesFrais);
            foreach ($lesCles as $unIdFrais)
            {
                $qte = $lesFrais[$unIdFrais];
                $req = "UPDATE LigneFraisForfait SET LigneFraisForfait.quantite=$qte
                WHERE LigneFraisForfait.idVisiteur='$idVisiteur' AND LigneFraisForfait.mois='$mois'
                AND LigneFraisForfait.idFraisForfait='$unIdFrais'";
                PdoGsb::$monPdo->exec($req);
            }
        }

        /**
         * met à jour le nombre de justificatifs de la table fichefrais
         * pour le mois et le visiteur concerné

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
        */
        public function majNbJustificatifs($idVisiteur, $mois, $nbJustificatifs)
        {
            $req = "UPDATE FicheFrais SET nbJustificatifs=$nbJustificatifs
            WHERE FicheFrais.idVisiteur='$idVisiteur' AND FicheFrais.mois='$mois'";
            PdoGsb::$monPdo->exec($req);
        }

        /**
         * Teste si un visiteur possède une fiche de frais pour le mois passé en argument

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @return vrai ou faux
        */
        public function estPremierFraisMois($idVisiteur,$mois)
        {
            $ok = false;
            $req = "SELECT COUNT(*) AS nblignesfrais FROM FicheFrais
            WHERE FicheFrais.mois='$mois' AND FicheFrais.idVisiteur='$idVisiteur'";
            $res = PdoGsb::$monPdo->query($req);
            $laLigne = $res->fetch();

            if ($laLigne['nblignesfrais'] == 0)
            {
                $ok = true;
            }
            return $ok;
        }

        /**
         * Teste si un visiteur possède une fiche de frais validée pour le mois passé en argument

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @return vrai ou faux
        */
        public function hasValidatedOrInPaymentCard($idVisiteur, $mois)
        {
            $ok = false;
            $req = "SELECT COUNT(*) AS nblignesfrais from FicheFrais
            WHERE FicheFrais.mois='$mois' AND FicheFrais.idVisiteur='$idVisiteur'
            AND idEtat IN ('VA', 'PA', 'RB')";
            $res = PdoGsb::$monPdo->query($req);
            $laLigne = $res->fetch();

            if($laLigne['nblignesfrais'] == 0)
            {
                $ok = true;
            }
            return $ok;
        }

        /**
         * Retourne le dernier mois en cours d'un visiteur

         * @param $idVisiteur
         * @return le mois sous la forme aaaamm
        */
        public function dernierMoisSaisi($idVisiteur)
        {
            $req = "SELECT MAX(mois) AS dernierMois FROM FicheFrais WHERE FicheFrais.idVisiteur='$idVisiteur'";
            $res = PdoGsb::$monPdo->query($req);
            $laLigne = $res->fetch();
            $dernierMois = $laLigne['dernierMois'];
            return $dernierMois;
        }

        /**
         * Crée une nouvelle fiche de frais et les lignes de frais au forfait pour un visiteur et un mois donnés

         * récupère le dernier mois en cours de traitement, met à 'CL' son champs idEtat, crée une nouvelle fiche de frais
         * avec un idEtat à 'CR' et crée les lignes de frais forfait de quantités nulles
         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
        */
        public function creeNouvellesLignesFrais($idVisiteur,$mois)
        {
            $dernierMois = $this->dernierMoisSaisi($idVisiteur);
            $laDerniereFiche = $this->getLesInfosfichefrais($idVisiteur,$dernierMois);

            if ($laDerniereFiche['idEtat']=='CR')
            {
                $this->majEtatfichefrais($idVisiteur, $dernierMois,'CL');
            }

            $req = "INSERT INTO FicheFrais(idVisiteur,mois,nbJustificatifs,montantValide,dateModif,idEtat)
            VALUES('$idVisiteur','$mois',0,0,now(),'CR')";
            PdoGsb::$monPdo->exec($req);
            $lesIdFrais = $this->getLesIdFrais();

            foreach ($lesIdFrais as $uneLigneIdFrais)
            {
                $unIdFrais = $uneLigneIdFrais['idfrais'];
                $req = "INSERT INTO LigneFraisForfait(idVisiteur,mois,idFraisForfait,quantite)
                VALUES('$idVisiteur','$mois','$unIdFrais',0)";
                PdoGsb::$monPdo->exec($req);
             }
        }

        /**
         * Crée un nouveau frais hors forfait pour un visiteur un mois donné
         * à partir des informations fournies en paramètre

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @param $libelle : le libelle du frais
         * @param $date : la date du frais au format français jj//mm/aaaa
         * @param $montant : le montant
        */
        public function creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$date,$montant)
        {
            $req = "INSERT INTO LigneFraisHorsForfait (idVisiteur, mois, libelle, date, montant)
            VALUES('$idVisiteur','$mois','$libelle','$date',$montant)";
            PdoGsb::$monPdo->exec($req);
        }

        /**
         * Supprime le frais hors forfait dont l'id est passé en argument

         * @param $idFrais
        */
        public function supprimerFraisHorsForfait($idFrais)
        {
            $req = "DELETE FROM LigneFraisHorsForfait WHERE LigneFraisHorsForfait.id='$idFrais'";
            PdoGsb::$monPdo->exec($req);
        }

        /**
         * Retourne les mois pour lesquel un visiteur a une fiche de frais

         * @param $idVisiteur
         * @return un tableau associatif de clé un mois -aaaamm- et de valeurs l'année et le mois correspondant
        */
        public function getLesMoisDisponibles($idVisiteur)
        {
            $req = "SELECT FicheFrais.mois AS mois FROM FicheFrais WHERE FicheFrais.idVisiteur='$idVisiteur'
            ORDER BY FicheFrais.mois DESC";
            $res = PdoGsb::$monPdo->query($req);
            $lesMois =array();
            $laLigne = $res->fetch();

            while ($laLigne != null)
            {
                $mois = $laLigne['mois'];
                $numAnnee =substr( $mois,0,4);
                $numMois =substr( $mois,4,2);
                $lesMois["$mois"]=array(
                    "mois"=>"$mois",
                    "numAnnee"  => "$numAnnee",
                    "numMois"  => "$numMois"
                );
                $laLigne = $res->fetch();
            }
            return $lesMois;
        }

        /**
         * Retourne les informations d'une fiche de frais d'un visiteur pour un mois donné

         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         * @return un tableau avec des champs de jointure entre une fiche de frais et la ligne d'état
        */
        public function getLesInfosfichefrais($idVisiteur,$mois)
        {
            $req = "SELECT FicheFrais.idEtat AS idEtat, FicheFrais.dateModif AS dateModif, FicheFrais.nbJustificatifs AS nbJustificatifs,
                    FicheFrais.montantValide AS montantValide, Etat.libelle AS libEtat FROM FicheFrais INNER JOIN Etat ON FicheFrais.idEtat=Etat.id
                    WHERE FicheFrais.idVisiteur='$idVisiteur' AND FicheFrais.mois='$mois'";
            $res = PdoGsb::$monPdo->query($req);
            $laLigne = $res->fetch();
            return $laLigne;
        }

        /**
         * Modifie l'état, le montant, et la date de modification d'une fiche de frais

         * Modifie le champ idEtat, le champ montantValide, et met la date de modif à aujourd'hui
         * @param $idVisiteur
         * @param $mois sous la forme aaaamm
         */

        public function majEtatfichefrais($idVisiteur, $mois, $etat, $montantValide)
        {
            $req = "UPDATE FicheFrais SET idEtat='$etat', dateModif = now(), montantValide='$montantValide'
                WHERE FicheFrais.idVisiteur ='$idVisiteur' AND FicheFrais.mois='$mois'";
            PdoGsb::$monPdo->exec($req);
        }

        /**
         * Modifie le libellé d'une ligne de frais hors forfait

         * Modifie le champ libelle avec "REFUSE" au début
         * @param $idFrais
         */

        public function majLibelleLigneFraisHorsForfait($idFrais)
        {
            $req = "UPDATE LigneFraisHorsForfait SET libelle=CONCAT('REFUSE - ', libelle)
                WHERE id='$idFrais'";
            PdoGsb::$monPdo->exec($req);
        }

        public function getMedicinePrice($idMedicine)
        {
            $req = "SELECT prix FROM Medicament WHERE id=$idMedicine";
            $res = PdoGsb::$monPdo->query($req);
            $laLigne = $res->fetch();
           
            return $laLigne['prix'];
        }

        public function addNewMedicine($libelle, $composition, $effets, $posologie, $prix, $tauxRemboursement)
        {
            $req = "INSERT INTO Medicament (libelle, composition, effets, posologie, prix, tauxRemboursement)
                VALUES('$libelle', '$composition', '$effets', '$posologie', $prix, $tauxRemboursement)";
            PdoGsb::$monPdo->exec($req);
        }

        public function addNewOrder($idComptable, $idMedicine, $idFournisseur, $amount, $price)
        {
            $req = "INSERT INTO Commander (idComptable, idMedicament, idFournisseur, quantite, montant, date)
                VALUES('$idComptable', $idMedicine, $idFournisseur, $amount, $price, NOW())";
            PdoGsb::$monPdo->exec($req);
        }
    }
?>
