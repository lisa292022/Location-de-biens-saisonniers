<?php
include("../include/connexion.inc.include");
require_once('../class/reservation_class.php');
require_once('../class/biens_class.php');
require_once('../class/client_class.php');


    $oReservation= new Reservations(1);
    $oReservation->setcode($code);
    $lesreservations=$oReservation->getAllReservation();
    $oBiens = new Biens(1);
    $oClient = new Client(1);
    

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = session_id();
}

$uid = $_SESSION['user'];  // set your user id settings
$datetime_string = date('c', time());

if(isset($_POST['ajouter'])){
        echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
        $oReservation->insertReservation($_POST['startTime'],$_POST['endTime'],intval($_POST['id_client']),intval($_POST['id_bien']));
        header('Location: affichage_test.php');
    }
    
   
    
    
if (isset($_POST['action']) or isset($_GET['view'])) {
    if (isset($_GET['view'])) {
        header('Content-Type: application/json');
        $start = $_GET["start"];
        $end =  $_GET["end"];

        $result = "SELECT `id_reservation` as `id`, `date_deb_resa` as `start`, `date_fin_resa` as `end`, `commentaire` as `title` FROM  `reservation` WHERE (DATE(date_deb_resa) >= '$start' AND DATE(date_deb_resa) <= '$end') AND id_client='" . $uid . "'";
        $events = array();

        while ($row = $result) {
            $events[] = $row;
        }

        echo json_encode($events);
        exit;
    } elseif ($_POST['action'] == "add") {
        // Ajoute une réservation
        echo "<script>alert('Etes-vous certain de vouloir ajouter ???');</script>;";
        $oReservation->insertReservation($_POST['start'],$_POST['end'],intval($_POST['id_client']),intval($_POST['id_bien']));
        header('Location: affichage_test.php');
        header('Content-Type: application/json');
        echo '{"id":"' . $code . '"}';
        exit;
    } elseif ($_POST['action'] == "update") {
        $oReservation->updateReservation($_POST['date_resa'],$_POST['date_deb_resa'],$_POST['date_fin_resa'],$_POST['commentaire'],$_POST['moderation'],$_POST['annulation_resa'],$id_client,$id_bien);
        header('Location: affichage_test.php');
        exit;
    } elseif ($_POST['action'] == "delete") {
        // Supprime une réservation
        $id_reservation = $_POST['id'];
        $oReservation->deleteReservation($id_reservation);
        header('Location: affichage_test.php');
        exit;
    }
}
?>
