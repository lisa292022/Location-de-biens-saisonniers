<?php
    require_once ('../include/connexion.inc.include');
    
    class Biens {
        private $id_bien, $nom_bien, $rue_bien, $Idcom, $superficie_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statut_bien , $id_type_bien, $code;
        
        public function __construct($id_bien) {
             $this->id_bien = $id_bien;
        } 
        public function getId_bien(){
            return $this->id_bien;
        }
        public function getNom_bien(){
            return $this->nom_bien;
        }
        public function getRue_bien(){
            return $this->rue_bien;
        }
        public function getIdcom_bien(){
            return $this->Idcom;
        }
        public function getSuperficie_bien(){
            return $this->superficie_bien;
        }
        public function getNb_couchage(){
            return $this->nb_couchage;
        }
        public function getNb_piece(){
            return $this->nb_piece;
        }
        public function getNb_chambre(){
            return $this->nb_chambre;
        }
        public function getDescriptif(){
            return $this->descriptif;
        }
        public function getRef_bien(){
            return $this->ref_bien;
        }
        public function getStatut_bien(){
            return $this->statut_bien;
        }
        public function getId_type_bien (){
            return $this->id_type_bien;
        }
        public function getCode (){
            return $this->code;
        }
        //Setters
        public function setId_bien($id_bien){
            $this->id_bien = $id_bien;
        }
          public function setNom_bien($nom_bien){
            $this->nom_bien = $nom_bien;
        }
        public function setRue_bien($rue_bien){
            $this->rue_bien = $rue_bien;
        }
        public function setIdcom_bien($Idcom){
            $this->Idcom = $Idcom;
        }
        public function setSuperficie_bien($superficie_bien){
            $this->superficie_bien = $superficie_bien;
        }
        public function setNb_couchage($nb_couchage){
            $this->nb_couchage = $nb_couchage;
        }
        public function setNb_piece($nb_piece){
            $this->nb_piece = $nb_piece;
        }
        public function setNb_chambre($nb_chambre){
            $this->nb_chambre = $nb_chambre;
        }
        public function setDescriptif($descriptif){
            $this->descriptif = $descriptif;
        }
        public function setRef_bien($ref_bien){
            $this->ref_bien = $ref_bien;
        }
        public function setStatut_bien($statut_bien){
            $this->statut_bien = $statut_bien;
        }
        public function setId_type_bien ($id_type_bien){
            $this->id_type_bien = $id_type_bien;
        }
        public function setCode ($code){
            $this->code = $code;
        }
        
        public function getAllBiens() {
        $sql = "SELECT * FROM biens";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getAllBiensValide() {
        $sql = "SELECT * FROM biens WHERE statut_bien='1'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getAllBiensCommune($id_com) {
        $sql = "SELECT * FROM biens WHERE Idcom=".$id_com." AND statut_bien='1'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getAllBiensCommuneNbcouchage($id_com,$nb_couchage) {
        $sql = "SELECT * FROM biens WHERE Idcom=".$id_com." AND nb_couchage=".$nb_couchage." AND statut_bien='1'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getAllBiensNbcouchage($nb_couchage) {
        $sql = "SELECT * FROM biens WHERE nb_couchage=".$nb_couchage." AND statut_bien='1'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getCommuneBiens($id_com) {
        $sql = "SELECT nom_commune_postal FROM communes WHERE Idcom=".$id_com;
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getTarifBien($id_bien) {
        $sql = "SELECT prix_loc FROM tarif WHERE id_bien=".$id_bien;
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getOneBien($id_bien) {
        $sql = "SELECT * FROM biens WHERE id_bien=".$id_bien;
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function insertBien($nom_bien, $rue_bien, $idcom, $superficie_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statut_bien , $id_type_bien) {
        $sql = "INSERT INTO biens (nom_bien, rue_bien, idcom, superficie_bien, nb_couchage, nb_piece, nb_chambre, descriptif, ref_bien, statut_bien, id_type_bien) VALUES ('". $nom_bien."','".$rue_bien."','".$idcom."','".$superficie_bien."','".$nb_couchage."','".$nb_piece."','".$nb_chambre."','".$descriptif."','".$ref_bien."','".$statut_bien."','".$id_type_bien."')";
        $code = $this->code;
        $stmt=$code->Query($sql);
        // Ajout du tarif au bien
        $id_bien=$code->lastInsertId();
        $sql = "INSERT INTO tarif (date_deb_tarif,date_fin_tarif,prix_loc,id_bien) VALUES ('2023-01-01','2024-12-31',100,".$id_bien.")";
        $stmt2=$code->Query($sql);
        return $stmt;
        }

        public function updateBien($id_bien, $nom_bien, $rue_bien, $Idcom, $superficie_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statut_bien , $id_type_bien) {
        $sql = "UPDATE biens SET nom_bien='".$nom_bien."',rue_bien='".$rue_bien."',Idcom='".$Idcom."',superficie_bien='".$superficie_bien."',nb_couchage='".$nb_couchage."',nb_piece='".$nb_piece."',nb_chambre='".$nb_chambre."',descriptif='".$descriptif."',ref_bien='".$ref_bien."',statut_bien='".$statut_bien."',id_type_bien='".$id_type_bien."' WHERE id_bien='".$id_bien."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }

        public function deleteBien($id_bien) {
        $sql = "DELETE FROM biens WHERE id_bien ='".$id_bien."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
        public function getCommentairesBien($id_bien) {
        $sql = "SELECT commentaire FROM reservation WHERE id_bien=".$id_bien." AND moderation='0' AND commentaire!=''";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }
    }
?>
