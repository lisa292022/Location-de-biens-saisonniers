<?php

    require_once ('../include/connexion.inc.include');

    class Reservations{
        
        private $id_reservation,$date_resa,$date_deb_resa,$date_fin_resa,$commentaire,$moderation,$annulation_resa,$id_client,$id_bien,$code;
        
        public function __construct($id_reservation) {
            $this->id_reservation=$id_reservation;
        }
        
        //Getters
        public function getid_reservation() {
            return $this->id_reservation;
        }
        public function getdate_resa() {
            return $this->date_resa;
        }
        public function getdate_deb_resa() {
            return $this->date_deb_resa;
        }
        public function getdate_fin_resa() {
            return $this->date_fin_resa;
        }
        public function getcommentaire() {
            return $this->commentaire;
        }
        public function getmoderation() {
            return $this->moderation;
        }
        public function getannulation_resa() {
            return $this->annulation_resa;
        }
        public function geid_client() {
            return $this->id_client;
        }
        public function getid_bien() {
            return $this->id_bien;
        }
        public function getcode() {
            return $this->code;
        }
        
        //Setters
        public function setid_reservation($id) {
            $this->id_reservation=$id;
        }
        public function setdate_resa($date) {
            $this->date_resa=$date;
        }
        public function setdate_deb_resa($date_deb) {
            $this->date_deb_resa=$date_deb;
        }
        public function setdate_fin_resa($date_fin) {
            $this->date_fin_resa=$date_fin;
        }
        public function setcommentaire($comm) {
            $this->commentaire=$comm;
        }
        public function setmoderation($mod) {
            $this->moderation=$mod;
        }
        public function setannulation_resa($annul) {
            $this->annulation_resa=$annul;
        }
        public function setid_client($id) {
            $this->id_client=$id;
        }
        public function setid_bien($id) {
            $this->id_bien=$id;
        }
        public function setcode($code) {
            $this->code=$code;
        }
        
        public function getAllReservation(){
            $SQL="SELECT id_reservation AS id, date_deb_resa AS start, date_fin_resa AS end, title, annulation_resa, commentaire, moderation FROM reservation";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        public function getAllReservationBien($id_bien){
            $SQL="SELECT id_reservation AS id, date_deb_resa AS start, date_fin_resa AS end, title, id_bien, id_client, annulation_resa, commentaire, moderation FROM reservation WHERE id_bien='".$id_bien."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function getAllReservationClient($id_client){
            $SQL="SELECT id_reservation AS id, date_deb_resa AS start, date_fin_resa AS end, title, id_bien, id_client, annulation_resa, commentaire, moderation FROM reservation WHERE id_client='".$id_client."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
         public function getAllReservationClientBien($id_client,$id_bien){
            $SQL="SELECT id_reservation AS id, date_deb_resa AS start, date_fin_resa AS end, title, id_bien, id_client, annulation_resa, commentaire, moderation FROM reservation WHERE id_client='".$id_client."' AND id_bient='".$id_bien."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function getOneReservation($id_reservation){
            $SQL="SELECT * FROM reservation WHERE id_reservation=".$id_reservation;
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
              
        }
        /*public function getNomBien($id_reservation){
            $SQL="SELECT nom_bien FROM bien INNER JOIN reservation ON reservation.id_bien=bien.id_bien WHERE id_reservation=".$id_reservation;
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
              
        }*/
        
        public function insertReservation($date_deb_resa,$date_fin_resa,$id_client,$id_bien,$title) {          
            $SQL="INSERT INTO reservation (date_deb_resa,date_fin_resa,commentaire,moderation,annulation_resa,id_client,id_bien,title) "
                    . "VALUES ('".$date_deb_resa."','".$date_fin_resa."',' ',' ',' ',$id_client,$id_bien,'".$title."')";
            echo $SQL;
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;

        }
        public function updateReservation($id_reservation,$date_resa,$date_deb_resa,$date_fin_resa,$commentaire,$moderation,$annulation_resa,$id_client,$id_bien) {
            $SQL="UPDATE reservation SET date_resa='".$date_resa."',date_deb_resa='".$date_deb_resa."',date_fin_resa='".$date_fin_resa."',commentaire='".$commentaire."',moderation='".$moderation."',annulation_resa='".$annulation_resa."',id_client='".$id_client."',id_bien='".$id_bien."' WHERE id_reservation='".$id_reservation."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function deplaceReservation($id_reservation,$date_resa,$date_deb_resa,$date_fin_resa) {
            $SQL="UPDATE reservation SET date_resa='".$date_resa."',date_deb_resa='".$date_deb_resa."',date_fin_resa='".$date_fin_resa."' WHERE id_reservation='".$id_reservation."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function commenterReservation($id_reservation,$commentaire) {
            $SQL="UPDATE reservation SET commentaire='".$commentaire."' WHERE id_reservation='".$id_reservation."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function annulerReservation($id_reservation) {
            $SQL="UPDATE reservation SET annulation_resa='1' WHERE id_reservation='".$id_reservation."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function modererReservation($id_reservation) {
            $SQL="UPDATE reservation SET moderation='1' WHERE id_reservation='".$id_reservation."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function updateModerationReservation($id_reservation,$moderation) {
            $SQL="UPDATE reservation SET moderation='".$moderation."' WHERE id_reservation='".$id_reservation."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function deleteReservation($id){
             //Paramètres pour l'exécution de la requête
            $SQL="DELETE FROM reservation WHERE id_reservation ='".$id."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function dejaReservation($start,$end,$id_bien){
             //Paramètres pour l'exécution de la requête
            //$SQL="select count(*) FROM reservation WHERE id_bien='".$id_bien."' AND ( '".$start."' > date_deb_resa AND '".$start."' < date_fin_resa ) OR ( '".$end."' > date_deb_resa AND '".$end."' < date_fin_resa )";
            $SQL="select count(*) FROM reservation WHERE id_bien='".$id_bien."' AND annulation_resa='0' AND(( date_fin_resa >= '".$start."' AND date_fin_resa <= '".$end."' ) OR ( date_deb_resa >= '".$start."' AND date_deb_resa <= '".$end."' ))";
    
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
    }



?>

