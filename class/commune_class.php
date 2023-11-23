<?php
    require_once ('../include/connexion.inc.include');
    
    class Commune {
        private $id_com, $nom_commune_postal, $code_postal, $code;
        
        public function __construct($id_com) {
             $this->id_com = $id_com;
        } 
        public function getId_Commune(){
            return $this->id_com;
        }
        public function getnom_commune_postal(){
            return $this->nom_commune_postal;
        }
        public function getcode_postal(){
            return $this->code_postal;
        }
        public function getCode (){
            return $this->code;
        }
        //Setters
        public function setId_Commune($id_com){
            $this->id_com = $id_com;
        }
          public function setnom_commune_postal($nom_commune_postal){
            $this->nom_commune_postal = $nom_commune_postal;
        }
        public function setcode_postal($code_postal){
            $this->code_postal = $code_postal;
        }
        public function setCode ($code){
            $this->code = $code;
        }
        
        public function getAllCommunes() {
        $sql = "SELECT * FROM communes";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getnom_commune_postal_code_postal($id_com) {
        $sql = "SELECT nom_commune_postal, code_postal FROM communes WHERE Idcom=".$id_com;
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getidcom($code_postal, $nom_commune_postal) {
        $code_postal_entier = intval($code_postal); 
        $sql = "SELECT Idcom FROM communes WHERE nom_commune_postal='".$nom_commune_postal."' AND code_postal=".$code_postal_entier;
        $code = $this->code;
        $stmt=$code->Query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['Idcom'];
        }
        public function getidcomCouple($code_postal_et_nom_commune_postal) {
        $taille=strlen($code_postal_et_nom_commune_postal);
        $code_postal=substr($code_postal_et_nom_commune_postal,$taille-5, 5);
        $code_postal_entier = intval($code_postal);
        if ($code_postal_entier > 9999) {
            $nom_commune_postal=substr($code_postal_et_nom_commune_postal,0, $taille-5);
        }
        else {
            $nom_commune_postal=substr($code_postal_et_nom_commune_postal,0, $taille-4);
        }
        $sql = "SELECT Idcom FROM communes WHERE nom_commune_postal='".$nom_commune_postal."' AND code_postal=".$code_postal_entier;
        $code = $this->code;
        $stmt=$code->Query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['Idcom'];
        }
        public function getOneCommune($id_com) {
        $sql = "SELECT * FROM communes WHERE id_bien=".$id_com;
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        // TODO
        public function insertCommune($id_bien, $nom_bien, $rue_bien, $Idcom, $superficie_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statut_bien , $id_type_bien) {
        $sql = "INSERT INTO biens (id_bien, nom_bien, rue_bien, Idcom, superficie_bien, nb_couchage, nb_piece, nb_chambre, descriptif, ref_bien, statut_bien, id_type_bien) VALUES ('".$id_bien."','". $nom_bien."','".$rue_bien."','".$Idcom."','".$superficie_bien."','".$nb_couchage."','".$nb_piece."','".$nb_chambre."','".$descriptif."','".$ref_bien."','".$statut_bien."','".$id_type_bien."')";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        // TODO
        public function updateCommune($id_bien, $nom_bien, $rue_bien, $Idcom, $superficie_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statut_bien , $id_type_bien) {
        $sql = "UPDATE biens SET nom_bien='".$nom_bien."',rue_bien='".$rue_bien."',Idcom='".$Idcom."',superficie_bien='".$superficie_bien."',nb_couchage='".$nb_couchage."',nb_piece='".$nb_piece."',nb_chambre='".$nb_chambre."',descriptif='".$descriptif."',ref_bien='".$ref_bien."',statut_bien='".$statut_bien."',id_type_bien='".$id_type_bien."' WHERE id_bien='".$id_bien."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        // TODO
        public function deleteCommune($id_bien) {
        $sql = "DELETE FROM biens WHERE id ='".$id_bien."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
    }
?>

