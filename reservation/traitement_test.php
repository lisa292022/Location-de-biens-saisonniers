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

/*if(isset($_POST['ajouter'])){
        echo "<script>alert('Etes-vous certain de vouloir ajouter ?');</script>;";
        $oReservation->insertReservation($_POST['startTime'],$_POST['endTime'],intval($_POST['id_client']),intval($_POST['id_bien']));
        header('Location: affichage_test.php');
    }
*/    
   
    
    
if (isset($_POST['action'])) {
    /*if (isset($_GET['view'])) {
        header('Content-Type: application/json');
        $start = $_GET["start"];
        $end = $_GET["end"];

        $stmt = $code->prepare("SELECT `id_reservation` as `id`, `date_deb_resa` as `start`, `date_fin_resa` as `end`, `title` as `title` FROM  `reservation` WHERE (DATE(date_deb_resa) >= '$start' AND DATE(date_deb_resa) <= '$end') AND id_client='" . $uid . "'");
        $stmt->bind_param("sss", $start, $end, $uid);
        $stmt->execute();
        $stmt->bind_result($id, $start, $end, $title);
        
        $events = array();
        while ($stmt->fetch()) {
            $events[] = array('id' => $id, 'start' => $start, 'end' => $end, 'title' => $title);
        }*/
    if ($_POST['action'] == "add") {
        if ($_POST['id_client']!='0') {
        // teste si le bien n'est pas deja réservé
        $dejaReserve=$oReservation->dejaReservation($_POST['start'],$_POST['end'],$_POST['id_bien']);
        $nb = $dejaReserve->fetchColumn();
        if ($nb != 0) {
            echo "<script>alert('Bien déjà réservé');</script>;";
        }
        else {
            // Ajoute une réservation
            echo "<script>alert('Etes-vous certain de vouloir ajouter ???');</script>;";
            $oReservation->insertReservation($_POST['start'],$_POST['end'],intval($_POST['id_client']),intval($_POST['id_bien']),$_POST['title']);
            //header('Location: affichage_test.php');
            header('Refresh: 1;URL=affichage_test.php');
        }
        }
        exit;
    } elseif ($_POST['action'] == "update") {
        $oReservation->updateReservation($_POST['id'],$_POST['date_resa'],$_POST['start'],$_POST['end'],$_POST['commentaire'],$_POST['moderation'],$_POST['annulation_resa'],$id_client,$id_bien);
        header('Location: affichage_test.php');
        exit;
    } elseif ($_POST['action'] == "deplace") {
        $oReservation->deplaceReservation($_POST['id'],$_POST['date_resa'],$_POST['start'],$_POST['end']);
        header('Location: affichage_test.php');
        exit;
    } elseif ($_POST['action'] == "annule") {
        // Annule une réservation
        $id_reservation = $_POST['id'];
        $oReservation->annulerReservation($id_reservation);
        header('Location: affichage_test.php');
        exit; 
    } elseif ($_POST['action'] == "modere") {
        // Modère une réservation
        $id_reservation = $_POST['id'];
        $oReservation->modererReservation($id_reservation);
        header('Location: affichage_test.php');
        exit; 
    } elseif ($_POST['action'] == "commentaire") {
        // commente une réservation
        $id_reservation = $_POST['id'];
        $oReservation->commenterReservation($id_reservation,$_POST['commentaire']);
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
// on modifie la moderation depuis bien_modifier
elseif (isset($_POST['modifier_moderation'])) {
        // Modère une réservation
        $id_reservation = $_POST['modifier_moderation'];
        $moderation_texte = $_POST['moderation'.$id_reservation];
        if ($moderation_texte == "Oui") { $moderation = 1;} else { $moderation = 0;} 
        echo $moderation;
        $oReservation->updateModerationReservation($id_reservation,$moderation);
        $MonBienId=$_POST['id_bien'];
            ?>
            <?php
            if(isset($MonBienId))
            {
            ?>
            <form name="myForm" id="myForm"  action="../biens/bien_modifier.php" method="POST">
                <input name="modifier" value="<?php echo $MonBienId;?>" />
            </form>

            <script>
            function submitform()
            {
            document.getElementById("myForm").submit();
            }
            window.onload = submitform;
            </script>
            <?php
            }
            ?>
        
        <?php
        exit; 
    }
?>
