<!DOCTYPE html>
<html lang="fr">
<head>
    
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/fullcalendar.css" rel="stylesheet" />
    <link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
    
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script-->
    <!--script src="js/jquery-3.7.1.min.js"></script-->
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/gcal.js"></script>
    
    <?php
    include("../reservation/traitement_test.php");
    include("../include/connexion.inc.include");
    require_once('../class/reservation_class.php');
    $oreservation = new Reservations(1);
    $oreservation->setcode($code);
    ?>
</head>
<body>
    
    <?php
    //session_start();
    // récupère réservation
    //header('Content-Type: application/json');
    //$start = $_GET["start"];
    //$end = $_GET["end"];
    //
    //
    //
    
    if (isset($_POST['reserver']))
    {
        // on vient de consulter_bien.php
        if (isset($_POST['id_bien']))
        {
            $id_bien=$_POST['id_bien'];
            echo "bien:",$id_bien;
            session_start();
            if (isset($_SESSION['connecter'])) {
                if ($_SESSION['connecter'] == "oui") {
                    // mémorise l'id du bien pour la réservation
                    $_SESSION['bien']=$id_bien;
        }
    }
            
            
        }
        if (isset($_POST['id_client']))
        {
            // le client est connu car il est connecté
            $id_client=$_POST['id_client'];
            echo "client:",$id_client;
        }
        else
        {
            // le client est inconnu
            $id_client=0;
            echo "client:",$id_client;
        }
            
    }
    
    /*if (isset($_GET['view'])) {
        header('Content-Type: application/json');
        $start = $_GET["start"];
        $end = $_GET["end"];
        $stmt = $oreservation->getAllReservation();
        foreach ($stmt as $unstmt ) {
            $events[] = $unstmt; 
            
        }
        echo json_encode($events);
        exit;
    }
    
    if(isset($_GET["start"]))
    {
        echo '[{"id":2,"title":"titre 2","start":"2023-11-29 00:00:00","end":"2023-11-29 05:00:00"},{"id":3,"title":"titre 3","start":"2023-11-30 12:00:00","end":"2023-11-30 20:00:00"}]';
        //echo '[{"id":2,"title":"titre 2","start":"2023-11-29 00:00:00","end":"2023-11-29 05:00:00"}]';
        exit;
    }
    
    if(isset($_GET['toto']) or isset($_POST['toto']))
    {
        echo '[{id:2,title:"titre 2",start:"2023-11-29 00:00:00",end:"2023-11-29 05:00:00"}]';
        //echo '[{"id":2,"title":"titre 2","start":"2023-11-29 00:00:00","end":"2023-11-29 05:00:00"}]';
        exit;
    }
    /// view est inconnu !!!!!!!
    if(isset($_GET['view']) or isset($_POST['view']))
    {
        
    $id=1;
    $title="titre";
    $start ="2023-11-07 00:00:00";
    $end ="2023-11-30 00:00:00";
    
    $events="";
        $liste_reservation = $oreservation->getAllReservation();
        foreach($liste_reservation as $reservation) {
            //echo '{"id"='.'"'.$reservation['id'].'"'.',"title"='.'"'.$reservation['title'].'"'.',"start"='.'"'.$reservation['start']." 00:00:00".'"'.',"end"='.'"'.$reservation['end']." 12:00:00".'"'."},";
            $events=$events . '{"id":'.$reservation['id'].',"title":'.'"'.$reservation['title'].'"'.',"start":'.'"'.$reservation['start']." 00:00:00".'"'.',"end":'.'"'.$reservation['end']." 12:00:00".'"'."},";
            
        }
        //echo json_encode($events); 
        echo "[".$events."]";
        //echo '[{"id":2,"title":"titre 2","start":"2023-11-29 00:00:00","end":"2023-11-29 05:00:00"}]';
        //echo '[{"id":2,"title":" ","start":"2023-11-29 00:00:00","end":"2023-11-29 12:00:00"},{"id":3,"title":" ","start":"2023-11-30 00:00:00","end":"2023-11-30 12:00:00"},{"id":4,"title":" ","start":"2023-12-01 00:00:00","end":"2023-12-01 12:00:00"},{"id":8,"title":" ","start":"2023-11-29 00:00:00","end":"2023-11-29 12:00:00"},{"id":11,"title":" ","start":"2023-11-29 00:00:00","end":"2023-11-29 12:00:00"},{"id":25,"title":" ","start":"2023-11-30 00:00:00","end":"2023-11-30 12:00:00"},{"id":26,"title":" ","start":"2023-12-01 00:00:00","end":"2023-12-01 12:00:00"},{"id":29,"title":" ","start":"2023-11-28 00:00:00","end":"2023-11-29 12:00:00"},{"id":31,"title":" ","start":"2023-11-29 00:00:00","end":"2023-11-29 12:00:00"},{"id":33,"title":" ","start":"2023-12-01 00:00:00","end":"2023-12-01 12:00:00"},{"id":35,"title":" ","start":"2023-11-30 00:00:00","end":"2023-11-30 12:00:00"},{"id":36,"title":" ","start":"2023-12-02 00:00:00","end":"2023-12-02 12:00:00"},{"id":37,"title":" ","start":"2023-12-01 00:00:00","end":"2023-12-01 12:00:00"}]';
        exit;
    }
     */
    ?>
    
    
    <form id="action" name="action" action="traitement_test.php" method="POST">
    
    <div class="container">
        <div class="row">
            <div id="calendar"></div>
        </div>
    </div>
    
    <!-- Modal -->
<div id="createEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Event</h4>
      </div>
      <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="inputPatient">Event:</label>
                <div class="field desc">
                    <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
                </div>
                <label class="control-label" for="inputPatient">Bien:</label>
                <div class="field desc">
                    <input class="form-control" id="id_bien" name="id_bien" placeholder="Event" type="text" value="<?php echo $id_bien; ?>">   
                    <!--input type="hidden" class="form-control" id="id_bien" name="id_bien" placeholder="Event" type="text" value="<?php echo $id_bien; ?>"-->
                </div>
                <label class="control-label" for="inputPatient">Client:</label>
                <div class="field desc">
                    <input class="form-control" id="id_client" name="id_client" placeholder="Event" type="text" value="<?php echo $id_client; ?>">
                    <!--input type="hidden" class="form-control" id="id_client" name="id_client" placeholder="Event" type="text" value="<?php echo $id_client; ?>"-->
                </div>
            </div>
            
            <input type="hidden" id="startTime"/>
            <input type="hidden" id="endTime"/>
            
            
       
        <div class="control-group">
            <label class="control-label" for="when">When:</label>
            <div class="controls controls-row" id="when" style="margin-top:5px;">
            </div>
        </div>
                   
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Sauver</button>
        <!--form id="ajouter" name="ajouter" action="traitement_test.php" method="POST">
            <!--?php $id_bien=1; $id_client=3 ?-->
        <!--button type="submit" class="btn btn-primary" id="ajouter" name="ajouter">Ajouter</button-->
        </form-->
        
        <input type="hidden" id="startTime" name="startTime" class="form-control" />
        <input type="hidden" id="endTime" name="endTime" class="form-control"/>
        
        
        <!--button type="submit" class="btn btn-primary" id="ajouter" name="ajouter">Ajouter</button-->
    </div>
    </div>

  </div>
</div>


<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Détails de la réservation</h4>
        </div>
        <div id="modalBody" class="modal-body">
        <h4 id="modalTitle" class="modal-title"></h4>
        <div id="modalWhen" style="margin-top:5px;"></div>
        <div id="starttime" style="margin-top:5px;"></div>
        <label class="control-label" for="inputPatient">id_client:</label>
        <h4 id="modalid_client" class="modal-title"></h4>
        <label class="control-label" for="inputPatient">id_bien:</label>
        <h4 id="modalid_bien" class="modal-title"></h4>
        <label class="control-label" for="inputPatient">commentaire:</label>
        <h4 id="modalcommentaire" class="modal-title"></h4>
            <div class="field desc">
                    <input class="form-control" id="modalcommentaire2" name="modalcommentaire2" placeholder="Saisir un commentaire" type="text">
                    
            </div>
        </div>
        <input type="hidden" id="eventID" name="eventID"/>
             <button class="btn" data-dismiss="modal" aria-hidden="true">Retour</button>
            <?php
            // seulement les réservations à venir du client non annulées (en vert) sont annulables
            // **** TODO ****
            $couleur = "green";
            if ($couleur == "green") { ?>
                <button type="submit" class="btn btn-primary" id="annuleButton">Annulation</button>
            <?php } ?>
            
            
            
            <?php 
            // seulement l'admin peut supprimer les réservations
            if (isset($_SESSION['admin'])) {
                if ($_SESSION['admin'] == "oui") { ?>
                <button type="submit" class="btn btn-danger" id="modereButton">Modérer</button>
                <button type="submit" class="btn btn-danger" id="deleteButton">Supprimer</button>
                <!--button type="submit" class="btn btn-primary" id="commentaireButton">Commenter</button-->
            <?php } else { ?>
                <button type="submit" class="btn btn-primary" id="commentaireButton">Commenter</button>
            <?php } } ?>
        </div>
    </div>
</div>
</div>
<!--Modal-->


<div style='margin-left: auto;margin-right: auto;text-align: center;'>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21769945-4', 'auto');
  ga('send', 'pageview');

</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--script src="js/jquery-3.7.1.min.js"></script-->
    <script type="text/javascript" src="js/script.js" value="<?php echo $id_bien; ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.js"></script>
    <?php 
    //include '../reservation/traitement_test.php';
    ?>
    
    
    </form>
    <a href="../front/acceuil.php"><img src="../photo/home.jfif" title="Page d'accueil"></a>
</body>
</html>
