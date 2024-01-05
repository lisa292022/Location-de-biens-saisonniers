$(document).ready(function(id_bien){
        var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek'
            },
            //defaultView: 'agendaWeek',
            defaultView: 'month',
            editable: true,
            selectable: true,
            allDaySlot: false,
                        
            //events qui marche 
            events: 'json-events-bd.php',
            //events: 'json-events-bd.php?view=1?id_client=id_client?id_bien=id_bien',
            //events qui marche
            //events: [{"id":2,"title":"Autre client","start":"2023-11-29 00:00:00","end":"2023-11-29 05:00:00","startEditable":false},{"id":3,"title":"MOI","start":"2023-11-30 12:00:00","end":"2023-11-30 20:00:00"}],
            
            /*events:{
                url: 'affichage_test.php?view=1',
                cache: true,
                type: 'GET',
                error: function() {
                    alert('there was an error while fetching events!');
                    },
                success: function(json) {
                   alert(json);
                   }
                },
            */
           
           /*events:{
                url: 'json-events-bd.php?view=1?id_client=8?id_bien=2',
                data: 'action=init&id_client=8&id_bien=2' ,
                type: 'POST',
                error: function() {
                    alert('there was an error while fetching events!');
                    },
                success: function(json) {
                   alert(json);
                   }
                },
           
*/           
            eventClick:  function(event, jsEvent, view) {
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').val(event.id);
                $('#starttime').val(event.start);
                $('#modalid_client').text(event.id_client);
                $('#modalid_bien').text(event.id_bien);
                $('#modalcommentaire').html(event.commentaire);
                $('#modalcommentaire2').val(event.commentaire);
                $('#calendarModal').modal();
            },
            
            //header and other values
            select: function(start, end, jsEvent) {
                endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                commentaire = "";
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
                $('#createEventModal #when').text(mywhen);
                // ne marche pas si on met pas les valeurs en dur 2023/01/03
                //$('#createEventModal #id_client').val(1);
                //$('#createEventModal #id_bien').val(2);
                //id_client = 1;
                //id_bien = 2;
                $('#createEventModal #id_client').text(id_client);
                $('#createEventModal #id_bien').text(id_bien);
                $('#createEventModal #commentaire').text(commentaire);
                $('#createEventModal').modal('toggle');
           },
           eventDrop: function(event, delta){
               $.ajax({
                   url: 'affichage_test.php',
                   data: 'action=deplace&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   //alert(json);
                   }
               });
           },
           eventResize: function(event) {
               $.ajax({
                   url: 'affichage_test.php',
                   data: 'action=deplace&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                   type: "POST",
                   success: function(json) {
                       //alert(json);
                   }
               });
           }
        });
               
       $('#submitButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doSubmit();
       });
       
       $('#deleteButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete();
       });
       
       $('#annuleButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doAnnuler();
       });
       
       $('#modereButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doModerer();
       });
       
       $('#commentaireButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doCommenter();
       });
       
       // appelé par le bouton Delete
       // supprime un event
       // supprime une reservation en base
       // fonction à garder
       function doDelete(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: 'affichage_test.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   //else
                   //     return false;
                    
                   
               }
           });
           
           $.ajax({
               url: 'traitement_test.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   alert(json);
                   }
           });
       }
       
       // appelé par le bouton Annuler
       // annule un event
       // annule une reservation en base
       // fonction à garder
       function doAnnuler(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           /*$.ajax({
               url: 'affichage_test.php',
               data: 'action=annule&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   
                    
                   
               }
           });*/
           
           $.ajax({
               url: 'traitement_test.php',
               data: 'action=annule&id='+eventID,
               type: "POST",
               success: function(json) {
                   alert(json);
                   }
           });
       }
       
       // appelé par le bouton Moderer
       // Modère un event
       // Modère une reservation en base
       // fonction à garder
       function doModerer(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           /*$.ajax({
               url: 'affichage_test.php',
               data: 'action=modere&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   
                    
                   
               }
           });*/
           
           $.ajax({
               url: 'traitement_test.php',
               data: 'action=modere&id='+eventID,
               type: "POST",
               success: function(json) {
                   alert(json);
                   }
           });
       }
       
       // appelé par le bouton Commenter
       // commente un event
       // commente une reservation en base
       // fonction à garder
       function doCommenter(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           var commentaire = $('#modalcommentaire2').val();
           //var commentaire = 'TEST';
           
           $.ajax({
               url: 'traitement_test.php',
               data: 'action=commentaire&id='+eventID+'&commentaire='+commentaire,
               type: "POST",
               success: function(json) {
                   alert(json);
                   }
           });
       }
       
       
       // appelé par le Save
       // ajoute un event
       // ajoute une reservation en base
       // fonction à garder
       function doSubmit(){
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
           //var id_bien = "2"; //$('#id_bien').val();
           //var id_client = "1"; //$('#id_client').val();
           var id_bien = $('#id_bien').val();
           var id_client = $('#id_client').val();
           var commentaire = $('#commentaire').val();
           
           /*$.ajax({
               url: 'affichage_test.php',
               data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime,
               type: "POST",
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                   },
                   true);
               }
           });*/
           
           
           $.ajax({
               url: 'traitement_test.php',
               data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime+'&id_bien='+id_bien+'&id_client='+id_client+'&commentaire='+commentaire,
               type: "POST",
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                       id_bien: id_bien,
                       id_client: id_client,
                       commentaire: commentaire,
                   },
                   true);
                   alert(json);
                   }
           });
           
           $.ajax({
               url: 'affichage_test.php',
               data: 'action=rafraichir',
               type: "POST",
               success: function(json) {
                   //alert(json);
               }
           });
           
       }
       
       // appelé par le bouton Ajouter
       // ajoute un event
       // fonction de test
       function doAjouter(){
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
           var id_bien = "2"; //$('#id_bien').val();
           var id_client = "1"; //$('#id_client').val();
           
           $.ajax({
               url: 'affichage_test2.php',
               data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime,
               type: "POST",
               success: function(json) {
                   alert(json);
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                   },
                   true);
               }
           });         
       }
       
    });