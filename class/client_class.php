<?php

    require_once ('../include/connexion.inc.include');

    class Client{
        
        private $id_client,$nom_client,$prenom_client,$rue_client,$cop_client,$vil_client,$mail_client,$mdp_client,$statut_client,$valid_client,$code;
        
        public function __construct($id) {
            $this->id_client=$id;
        }
        
        //Getters
        public function getid_client() {
            return $this->id_client;
        }
        public function getnom_client() {
            return $this->nom_client;
        }
        public function getprenom_client() {
            return $this->prenom_client;
        }
        public function getrue_client() {
            return $this->rue_client;
        }
        public function getcop_client() {
            return $this->cop_client;
        }
        public function getvil_client() {
            return $this->vil_client;
        }
        public function getmail_client() {
            return $this->mail_client;
        }
        public function getmdp_client() {
            return $this->mdp_client;
        }
        public function getstatut_client() {
            return $this->statut_client;
        }
        public function getvalid_client() {
            return $this->valid_client;
        }
        public function getcode() {
            return $this->code;
        }
        
        //Setters
        public function setid_client($id) {
            $this->id_client=$id;
        }
        public function setnom_client($nom) {
            $this->nom_client=$nom;
        }
        public function setprenom_client($p) {
            $this->prenom_client=$p;
        }
        public function setrue_client($rue) {
            $this->rue_client=$rue;
        }
        public function setcop_client($cop) {
            $this->cop_client=$cop;
        }
        public function setvil_client($vil) {
            $this->vil_client=$vil;
        }
        public function setmail_client($mail) {
            $this->mail_client=$mail;
        }
        public function setmdp_client($mdp) {
            $this->mdp_client=$mdp;
        }
        public function setstatut_client($s) {
            $this->statut_client=$s;
        }
        public function setvalid_client($v) {
            $this->valid_client=$v;
        }
        public function setcode($code) {
            $this->code=$code;
        }
        
        public function getAllClient(){
            $SQL="SELECT * FROM clients";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function getOneClient($id_client){
            $SQL="SELECT * FROM clients WHERE id_client=".$id_client;
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function insertClient($id_client,$nom_client,$prenom_client,$rue_client,$idcom,$mail_client,$mdp_client,$statut_client,$valid_client) {          
            $SQL="INSERT INTO clients (id_client,nom_client,prenom_client,rue_client,idcom,mail_client,mdp_client,statut_client,valid_client) VALUES ('".$id_client."','".$nom_client."','".$prenom_client."','".$rue_client."','".$idcom."','".$mail_client."','".$mdp_client."','".$statut_client."','".$valid_client."')";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function insertClientSansId($nom_client,$prenom_client,$rue_client,$idcom,$mail_client,$mdp_client,$statut_client,$valid_client) {          
            $SQL="INSERT INTO clients (nom_client,prenom_client,rue_client,idcom,mail_client,mdp_client,statut_client,valid_client) VALUES ('".$nom_client."','".$prenom_client."','".$rue_client."','".$idcom."','".$mail_client."','".$mdp_client."','".$statut_client."','".$valid_client."')";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function updateClient($id_client,$nom_client,$prenom_client,$rue_client,$idcom,$mail_client,$mdp_client,$statut_client,$valid_client) {
            $SQL="UPDATE clients SET nom_client='".$nom_client."',prenom_client='".$prenom_client."',rue_client='".$rue_client."',Idcom='".$idcom."',mail_client='".$mail_client."',mdp_client='".$mdp_client."',statut_client='".$statut_client."',valid_client='".$valid_client."' WHERE id_client='".$id_client."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function deleteClient($id){
             //Paramètres pour l'exécution de la requête
            $SQL="DELETE FROM clients WHERE id_client ='".$id."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        
        public function ExisteClient($mail_client){
            $SQL="SELECT * FROM clients WHERE mail_client='".$mail_client."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
        public function GetNomClient($id){
            $SQL="SELECT nom_client, prenom_client FROM clients WHERE id_client ='".$id."'";
            $code = $this->code;
            $stmt=$code->Query($SQL);
            return $stmt;
        }
    }



?>

