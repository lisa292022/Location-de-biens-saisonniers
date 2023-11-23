<?php
require_once ('../include/connexion.inc.include');

class TypeBien {
    private $id_type_bien, $lib_type_bien, $code;

    public function construct($id_type_bien) {
        $this->id_type_bien = $id_type_bien;
    }

    public function getId_type_bien() {
        return $this->id_type_bien;
    }
    public function getLib_type_bien (){
        return $this->lib_type_bien;
    }
    public function getCode (){
        return $this->code;
    }

    public function setId_type_bien($id_type_bien) {
         $this->id_type_bien = $id_type_bien;
    }
    public function setLib_type_bien ($lib_type_bien){
        $this->lib_type_bien = $lib_type_bien;
    }
    public function setCode($code){
        $this->code = $code;
    }

    public function getAllTypeBien() {
        $sql = "SELECT * FROM type_bien";
        $code = $this->code;
        $stmt = $code->Query($sql);
        return $stmt;
    }
    
    public function getOneTypeBien($id_type_bien) {
        $sql = "SELECT * FROM type_bien WHERE id_type_bien= ".$id_type_bien;
        $code = $this->code;
        $stmt = $code->Query($sql);
        return $stmt;
    }
    
    public function getLibTypeBien($id_type_bien) {
        $sql = "SELECT * FROM type_bien WHERE id_type_bien= ".$id_type_bien;
        $code = $this->code;
        $stmt = $code->Query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['lib_type_bien'];
    }

    public function getIdTypeBien($lib_type_bien) {
        $sql = "SELECT * FROM type_bien WHERE lib_type_bien= '".$lib_type_bien."'";
        $code = $this->code;
        $stmt = $code->Query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id_type_bien'];
    }    
    
    public function insertTypeBien($lib_type_bien) {
        $sql = "INSERT INTO type_bien (lib_type_bien) VALUES ('". $lib_type_bien."')";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }

    public function updateTypeBien($id_type_bien, $lib_type_bien) {
        $sql = "UPDATE type_bien SET lib_type_bien= '".$lib_type_bien."' WHERE id_type_bien='".$id_type_bien."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }

    public function deleteTypeBien($id_type_bien) {
        $sql = "DELETE FROM type_bien WHERE id_type_bien='".$id_type_bien."'";
        $code = $this->code;
        $stmt=$code->Query($sql);
        return $stmt;
    }
}
?>
