<?php

    require_once ('../include/connexion.inc.include');

    class Tarif{
        
        private $id_tarif,$date_deb_tarif,$date_fin_tarif,$prix_loc,$id_bien,$code;
        
        public function __construct($id_tarif) {
            $this->id_tarif=$id_tarif;
        }
        
        //Getters
        public function getid_tarif() {
            return $this->id_tarif;
        }
        public function getdate_deb_tarif() {
            return $this->date_deb_tarif;
        }
        public function getdate_fin_tarif() {
            return $this->date_fin_tarif;
        }
        public function getprix_loc() {
            return $this->prix_loc;
        }
        public function getid_bien() {
            return $this->id_bien;
        }    
        public function getcode() {
            return $this->code;
        }
        
        //Setters
        public function setid_tarif($id) {
            $this->id_tarif=$id;
        }
        public function setdate_deb_tarif($date_deb) {
            $this->date_deb_tarif=$date_deb;
        }
        public function setdate_fin_tarif($date_fin) {
            $this->date_fin_tarif=$date_fin;
        }
        public function setprix_loc($prix) {
            $this->prix_loc=$prix;
        }
        public function setid_bien($id_bien) {
            $this->id_bien=$id_bien;
        }
        public function setcode($code) {
            $this->code=$code;
        }
        
        public function getAllTarif(){
            $SQL="SELECT * FROM tarif";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function getOneTarif($id_tarif){
            $SQL="SELECT * FROM tarif WHERE id_tarif=".$id_tarif;
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;   
        }
        
        public function insertTarif($date_deb_tarif,$date_fin_tarif,$prix_loc,$id_bien) {          
            $SQL="INSERT INTO tarif (date_deb_tarif,date_fin_tarif,prix_loc,id_bien) VALUES ('".$date_deb_tarif."','".$date_fin_tarif."','".$prix_loc."','".$id_bien."')";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        public function updateTarif($id_tarif,$date_deb_tarif,$date_fin_tarif,$prix_loc,$id_bien) {
            $SQL="UPDATE tarif SET id_tarif='".$id_tarif."',date_deb_tarif='".$date_deb_tarif."',date_fin_tarif='".$date_fin_tarif."',prix_loc='".$prix_loc."',id_bien='".$id_bien."' WHERE id_tarif='".$id_tarif."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function deleteTarif($id){
             //Paramètres pour l'exécution de la requête
            $SQL="DELETE FROM tarif WHERE id_tarif ='".$id."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
    }



?>

