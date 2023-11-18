<?php
    require_once ('../include/connexion.inc.include');

    class Photo {
    private $id_photo, $nom_photo, $lien_photo, $id_bien, $code;

    public function __construct($id_photo) {
        $this->id_photo= $id_photo;
    }
        public function getId_photo(){
            return $this->id_photo;
        }
        public function getNom_photo(){
            return $this->nom_photo;
        }
        public function getLien_photo(){
            return $this->lien_photo;
        }
         public function getId_bien(){
            return $this->id_bien;
        }
         public function getCode(){
            return $this->code;
        }
        //Setters
        public function setId_photo($id_photo){
            $this->id_bien = $id_photo;
        }
        public function setNom_photo($nom_photo){
            $this->id_bien = $nom_photo;
        }
        public function setLien_photo($lien_photo){
            $this->lien_photo = $lien_photo;
        }
        public function setId_bien($id_bien){
            $this->id_bien = $id_bien;
        }
        public function setCode($code){
            $this->code = $code;
        }

        public function getAllPhotos() {
        $sql = "SELECT * FROM photos";
        $code = $this->code;
        $stmt = $code->Query($sql);
        return $stmt;
        }
       
        public function getOnePhoto($id_photo) {
        $sql = "SELECT * FROM photos WHERE id_photo =" .$id_photo;
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
        }

    public function insertPhoto($id_photo, $nom_photo, $lien_photo, $id_bien) {
        $SQL = "INSERT INTO photos (id_photo, nom_photo, lien_photo, id_bien) VALUES ('".$id_photo."','".$nom_photo."','".$lien_photo."','".$id_bien."')";
        $code = $this->code;
        $stmt=$code->Query($SQL);
        return $stmt;
    }

    public function updatePhoto($id_photo, $nom_photo, $lien_photo, $id_bien) {
        $SQL = "UPDATE photos SET  nom_photo='".$nom_photo."',lien_photo='".$lien_photo."',id_bien='".$id_bien."' WHERE id_photo ='".$id_photo."'";
        $code = $this->code;
        $stmt=$code->Query($SQL);
        return $stmt;
    }

    public function deletePhoto($id_photo) {
        $SQL = "DELETE FROM photos WHERE id_photo ='".$id_photo."'";
        $code = $this->code;
        $stmt=$code->Query($SQL);
        return $stmt;
    }
}
?>            
?>

